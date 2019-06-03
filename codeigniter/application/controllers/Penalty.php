<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penalty extends CI_Controller
{
    
    public function manager()
    {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array(
                "page_title" => "Library Management System | Manage Penalty",
                "currentActive" => "Manage Penalty"
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("components/wip");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}
