<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($userid = $this->session->userdata("user_token")) {
            $data = array(
                "page_title" => "Library Management System",
                "username" => $this->User_model->getUsers(array("user_id" => $userid))[0]->username,
                "currentActive" => "Dashboard"
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("user/user_home");
            $this->load->view("templates/footer");
        } else {
            show_404();
        }
    }

    public function manager()
    {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array(
                "page_title" => "Library Management System | User Manager",
                "currentActive" => "User Manager",
                "pages" => $this->User_model->getUserPages(),
                "users" => $this->User_model->getUserByPages(0)
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("user/user_create");
            $this->load->view("user/user_manage");
            $this->load->view("user/user_modal");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }

    public function profile()
    {
        if ($userid = $this->session->userdata("user_token")) {
            $data = array(
                "page_title" => "Library Management System",
                "currentActive" => "User Profile",
                "username" => $this->User_model->getUsers(array("user_id" => $userid))[0]->username
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            // $this->load->view("components/wip");
            $this->load->view("user/user_profile");
            $this->load->view("templates/footer");
        } else {
            show_404();
        }
    }

    public function logout()
    {
        redirect("userapi/logout");
    }
}
