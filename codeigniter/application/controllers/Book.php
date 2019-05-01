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
        if($userid = $this->session->userdata("user_token")) {
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
        if($userid = $this->session->userdata("user_token")) {
            $data = array("page_title" => "Library Management System | Reserve Book",
            "currentActive" => "Reserve Book");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("book/book_search");
            $this->load->view("templates/footer", $data);
        } else {
            redirect("login", "location");
        }
    }
}
