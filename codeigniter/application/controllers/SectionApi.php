<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SectionApi extends CI_Controller
{
    // This function checks if the application is accessed by a mobile device / in a web browser
    // and only the admin can access this API.
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->input->post("token")) || $this->input->post("user_token") != 1) show_404();
        } else if ($this->agent->is_browser()) {
            if (empty($this->session->userdata("user_token")) || $this->session->userdata("user_token") != 1) show_404();
        } else {
            return;
        }
    }

    // This function creates sections
    public function create()
    {
        // Default Response Data
        $json_response = array(
            "response" => 1
        );

        // Data Validation
        $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required|is_unique[sectiontbl.section_name]');
        $this->form_validation->set_rules('section_code', 'Section Code', 'trim|required|is_unique[sectiontbl.section_code]|alpha|min_length[2]');

        // Check if the validation rules are fulfilled
        if ($this->form_validation->run() == FALSE) {
            // if not form values are inserted and their error message is sent via a JSON Response
            $json_response = array("response" => 0);
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            // Process Data
            $data = array(
                "section_name" => $this->input->post("section_name"),
                "section_code" => $this->input->post("section_code"),
                "created_at" => strtotime("now")
            );

            // Insert Section Data
            if ($this->Section_model->insertSection($data)) {
                $json_response = array("response" => 1);
            } else {
                $json_response = array("response" => 0, "message" => "Error Found");
            }
        }

        // JSON Response
        echo json_encode($json_response);
    }

    // This function fetchs a specific Section Data
    public function getSection()
    {
        $json_response["value"] = $this->Section_model->getSections(array("section_id" => $this->input->post("section_id")))[0];
        echo json_encode($json_response);
    }

    // This function fetchs Section data
    public function searchSection()
    {
        $json_response = array(
            "pages" => $this->Section_model->getSectionPages($this->input->post("search_text")),
            "sectionData" => $this->Section_model->getSectionByPages(0, $this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    // This function the new page of Section Data
    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Section_model->getSectionPages($this->input->post("search_text")),
            "sectionData" => $this->Section_model->getSectionByPages(($this->input->post("page") - 1) * 10, $this->input->post("search_text"))
        );

        echo json_encode($json_response);
    }

    // This function updates Section Data
    public function update()
    {
        // Default Response Data
        $json_response = array(
            "response" => 1
        );

        // Data Validation
        if (!$this->Section_model->getSections(array("section_id" => $this->input->post("section_id")))[0]->section_name == $this->input->post("section_name"))
            $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required|is_unique[sectiontbl.section_name]');
        $this->form_validation->set_rules('section_code', 'Section Code', 'trim|required|alpha|min_length[2]');

        // Check if the validation rules are fulfilled
        if ($this->form_validation->run() == FALSE) {
            // if not form values are inserted and their error message is sent via a JSON Response
            $json_response = array("response" => 0);
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            // Process Data
            $data = array(
                "section_name" => $this->input->post("section_name"),
                "section_code" => $this->input->post("section_code")
            );

            // Update Section Data
            if (!$this->Section_model->updateSection($data, array("section_id" => $this->input->post("section_id")))) {
                $json_response["response"] = 0;
            }
        }

        echo json_encode($json_response);
    }
}
