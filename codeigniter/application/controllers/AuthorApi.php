<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authorapi extends CI_Controller
{
    // This function is when the controller is used this will automatically called.
    // This function checks if the application is accessed by a mobile device / in a web browser
    // and only the admin can access this API.
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->input->post("token")) || $this->input->post("user_token") != 1) show_404();
        } else if ($this->agent->is_browser()) {
            if (empty($this->session->userdata("user_token")) || $this->session->userdata("user_type") != 1) show_404();
        } else {
            return;
        }
    }

    // This function create an JSON Response for searching an author with a search text.
    public function search()
    {
        $json_response = array(
            "pages" => $this->Author_model->getAuthorPages($this->input->post("search_text")),
            "authorData" => $this->Author_model->getAuthorsByPages(0, $this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    // This function create an JSON Response for changing the page of the authors
    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Author_model->getAuthorPages($this->input->post("search_text")),
            "authorData" => $this->Author_model->getAuthorsByPages(($this->input->post("page") - 1) * 10, $this->input->post("search_text"))
        );

        echo json_encode($json_response);
    }

    // This function create an JSON Response for creating an author this will be accepting firstname and lastname and then
    // automatically generates the short name and the name of the author.
    public function create()
    {
        $json_response = array(
            "response" => 1
        );

        // Data Validations
        $this->form_validation->set_rules('author_first_name', 'Author First Name', 'trim|required');
        $this->form_validation->set_rules('author_last_name', 'Author Last Name', 'trim|required');

        // Check if the validation rules are fulfilled
        if ($this->form_validation->run() == FALSE) {
            // if not form values are inserted and their error message is sent via a JSON Response
            $json_response = array("response" => 0);
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            // Process data to be inserted
            $data = array(
                "author_name" => ucwords($this->input->post("author_first_name") . " " . $this->input->post("author_last_name")),
                "author_fname" => ucwords($this->input->post("author_first_name")),
                "author_lname" => ucwords($this->input->post("author_last_name")),
                "author_sname" => strtoupper($this->input->post("author_first_name")[0]) . ". " . ucwords($this->input->post("author_last_name"))
            );

            // if the data is inserted return the new author_id
            // send 0 if the data is not inserted it means there is an error 
            // while inserting the author's data
            if ($authorId = $this->Author_model->createAuthor($data)) {
                $json_response["author_id"] = $authorId;
            } else {
                $json_response["response"] = 0;
            }
        }

        // JSON Response
        echo json_encode($json_response);
    }

    // This function create an JSON Response for fetching a specific author.
    public function getAuthor()
    {
        // Process data to be sent
        $data = $this->Author_model->getAuthors(array("author_id" => $this->input->post("author_id")));
        $json_response = array(
            "response" => 1,
            "value" => array(
                "author_name" => $data[0]->author_name,
                "author_fname" => $data[0]->author_fname,
                "author_lname" => $data[0]->author_lname
            )
        );

        // JSON Response
        echo json_encode($json_response);
    }

    // This function create an JSON Response for updating a specific author.
    public function update()
    {
        // Default data response
        $json_response = array(
            "response" => 1
        );

        // Data Validations
        $this->form_validation->set_rules('author_first_name', 'Author First Name', 'trim|required');
        $this->form_validation->set_rules('author_last_name', 'Author Last Name', 'trim|required');

        // Check if the validation rules are fulfilled
        if ($this->form_validation->run() == FALSE) {
            // if not form values are inserted and their error message is sent via a JSON Response
            $json_response["response"] = 0;
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            // Process data to be updated
            $data = array(
                "author_name" => ucwords($this->input->post("author_first_name") . " " . $this->input->post("author_last_name")),
                "author_fname" => ucwords($this->input->post("author_first_name")),
                "author_lname" => ucwords($this->input->post("author_last_name")),
                "author_sname" => strtoupper($this->input->post("author_first_name")[0]) . ". " . ucwords($this->input->post("author_last_name"))
            );

            // Check if the data is updated if not send response 0
            if (!$this->Author_model->updateAuthor($data, array("author_id" => $this->input->post("author_id")))) {
                $json_response["response"] = 0;
            }
        }

        // JSON Response
        echo json_encode($json_response);
    }
}
