<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section extends CI_Controller
{
    
    public function manager()
    {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array(
                "page_title" => "Library Management System | Section Manager",
                "currentActive" => "Section Manager",
                "sections" => $this->Section_model->getSections()
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("section/section_create");
            $this->load->view("section/section_manage");
            $this->load->view("section/section_modal");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}
