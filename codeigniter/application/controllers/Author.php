<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Author extends CI_Controller
{
    public function manager() {
        if($this->session->userdata("user_type") == 1) {
            $data = array("page_title" => "Library Management System | Author Manager",
            "currentActive" => "Author Manager");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("author/author_create");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}