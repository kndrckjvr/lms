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
            "books" => $this->Book_model->getBook("", 0),
            "pages" => $this->Book_model->getBookPages(""),
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
            "books" => $this->Book_model->getBook("", 0),
            "pages" => $this->Book_model->getBookPages(""),
            "currentActive" => "Reserve Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_reserve");
            $this->load->view("book/book_modal");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }

    public function manager() {
        if($this->session->userdata("user_type") == 1) {
            $data = array("page_title" => "Library Management System | Book Manager",
            "books" => $this->Book_model->getBook("", 0),
            "sections" => $this->Section_model->getSections(array("status" => 1)),
            "book_section_code" => $this->Section_model->getCurrentCode(array("section_id" => "1"))[0]->section_code . sprintf("%'.03d", $this->Section_model->getCurrentCode(array("section_id" => "1"))[0]->section_code_number + 1),
            "pages" => $this->Book_model->getBookPages(""),
            "currentActive" => "Book Manager");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_create");
            $this->load->view("book/book_manage");
            $this->load->view("book/book_modal");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}
