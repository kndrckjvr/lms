<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section extends CI_Controller
{
    
    public function create()
    {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array(
                "page_title" => "Library Management System | Create Section",
                "currentActive" => "Create Section"
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("section/section_create");
            $this->load->view("templates/footer", $data);
        } else {
            redirect("login", "location");
        }
    }
}
