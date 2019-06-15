<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // This function is for rendering user
    public function index()
    {
        if ($userid = $this->session->userdata("user_token")) {
            $data = array(
                "page_title" => "Library Management System",
                "username" => $this->User_model->getUsers(array("user_id" => $userid))[0]->username,
                "penalty" => $this->Transaction_model->getUserPenalties(array("user_id" => $this->session->userdata("user_token"), "status" => "3")) - $this->Transaction_model->getUserPaid(array("user_id" => $this->session->userdata("user_token"), "status" => "4")),
                "allpenalties" => $this->Transaction_model->getUserPenalties(array("status" => "3")),
                "allpaid" => $this->Transaction_model->getUserPaid(array("status" => "4")),
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

    // This function is for rendering user
    // only the admins can access this
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

    // This function is for rendering user
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
            $this->load->view("user/user_profile");
            $this->load->view("templates/footer");
        } else {
            show_404();
        }
    }

    // Logs out the User
    public function logout()
    {
        redirect("userapi/logout");
    }
}
