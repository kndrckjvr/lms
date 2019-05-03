<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SectionApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
    }

    public function create()
    {
        $json_response = array();
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) return;
        } elseif ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) return;
        } else {
            return;
        }

        $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required|is_unique[sectiontbl.section_name]');
        $this->form_validation->set_rules('section_code', 'Section Code', 'trim|required|is_unique[sectiontbl.section_code]');

        if ($this->form_validation->run() == FALSE) {
            $json_response = array("response" => 0, 
                "section_name" => form_error("section_name"), 
                "section_code" => form_error("section_code"));
        } else {
            $data = array(
                "section_name" => $this->input->post("section_name"),
                "section_code" => $this->input->post("section_code"),
                "created_at" => strtotime("now")
            );
            if($this->Section_model->insertSection($data)) {
                $json_response = array("response" => 1);
            } else {
                $json_response = array("response" => 0, "message" => "Error Found");
            }
        }
        echo json_encode($json_response);
    }
}
