<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthorApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) show_404();
        } else {
            return;
        }
    }

    public function search()
    {
        $json_response = array(
            "pages" => $this->Author_model->getAuthorPages($this->input->post("search_text")),
            "authorData" => $this->Author_model->getAuthorsByPages(0, $this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

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

    public function create()
    {
        $json_response = array(
            "response" => 1
        );

        $this->form_validation->set_rules('author_first_name', 'Author First Name', 'trim|required|alpha_dash');
        $this->form_validation->set_rules('author_last_name', 'Author Last Name', 'trim|required|alpha_dash');

        if ($this->form_validation->run() == FALSE) {
            $json_response = array("response" => 0);
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            $data = array(
                "author_name" => ucwords($this->input->post("author_first_name") . " " . $this->input->post("author_last_name")),
                "author_fname" => ucwords($this->input->post("author_first_name")),
                "author_lname" => ucwords($this->input->post("author_last_name")),
                "author_sname" => strtoupper($this->input->post("author_first_name")[0]) . ". " . ucwords($this->input->post("author_last_name"))
            );

            if ($authorId = $this->Author_model->createAuthor($data)) {
                $json_response["author_id"] = $authorId;
            }
        }

        echo json_encode($json_response);
    }
}