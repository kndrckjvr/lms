<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penalty extends CI_Controller
{

    // This function is for rendering penalty/manager 
    // and admins only can access this
    public function manager()
    {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array(
                "page_title" => "Library Management System | Manage Penalty",
                "currentActive" => "Manage Penalty",
                "penalties" => $this->Penalty_model->getPenaltiesByPages(),
                "pages" => $this->Penalty_model->getPenaltyPages()
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("penalty/penalty_create");
            $this->load->view("penalty/penalty_manage");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}
