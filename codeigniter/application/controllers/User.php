<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
	public function index()
	{
        if($userid = $this->session->userdata("user_token")) {
            $data = array("page_title" => "Library Management System",
            "username" => $this->User_model->getInfo("usertbl", array("user_id" => $userid))[0]->username,
            "currentActive" => "Dashboard");
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("user/user_home");
            $this->load->view("templates/footer");
        } else {
            redirect("login", "location");
        }
    }
    
    public function logout() {
        redirect("loginapi/logout");
    }
}
