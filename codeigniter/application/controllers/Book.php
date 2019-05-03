<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata("user_token"))) {
            show_404();
        }
    }

    public function search() {
        if($this->session->userdata("user_type") == 0) {
            $data = array("page_title" => "Library Management System | Search Books",
            "currentActive" => "Search Books");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_search");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }

    public function reserve() {
        if($this->session->userdata("user_type") == 0) {
            $data = array("page_title" => "Library Management System | Reserve Book",
            "currentActive" => "Reserve Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_reserve");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }

    public function create() {
        if($this->session->userdata("user_type") == 1) {
            $data = array("page_title" => "Library Management System | Create Book",
            "sections" => $this->Section_model->getInfo(),
            "currentActive" => "Create Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_create");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }

    public function manage($page = NULL) {
        if($this->session->userdata("user_type") == 1) {
            $data = array("page_title" => "Library Management System | Manage Book",
            "books" => $this->Book_model->getBook($page == NULL ? "1" : $page),
            "currentActive" => "Manage Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_manage");
            $this->load->view("book/book_modal");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}
