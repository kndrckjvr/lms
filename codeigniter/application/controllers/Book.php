<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
	public function index()
	{
        redirect("user", "location");
    }

    public function search() {
        if($this->session->userdata("user_token") && $this->session->userdata("user_type") == 0) {
            $data = array("page_title" => "Library Management System | Search Books",
            "currentActive" => "Search Books");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_search");
            $this->load->view("templates/footer", $data);
        } else {
            redirect("login", "location");
        }
    }

    public function reserve() {
        if($this->session->userdata("user_token") && $this->session->userdata("user_type") == 0) {
            $data = array("page_title" => "Library Management System | Reserve Book",
            "currentActive" => "Reserve Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_reserve");
            $this->load->view("templates/footer", $data);
        } else {
            redirect("login", "location");
        }
    }

    public function create() {
        if($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array("page_title" => "Library Management System | Create Book",
            "currentActive" => "Create Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_create");
            $this->load->view("templates/footer", $data);
        } else {
            redirect("login", "location");
        }
    }
}
