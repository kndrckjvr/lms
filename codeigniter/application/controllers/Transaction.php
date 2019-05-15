<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function pay() {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 1) {
            $data = array(
                "page_title" => "Library Management System | Manage Payment",
                "currentActive" => "Manage Payment",
                "users" => $this->User_model->getUsers()
            );
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("transaction/transaction_pay");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }

    public function reports() {
        if ($this->session->userdata("user_token") && $this->session->userdata("user_type") == 0) {
            $data = array(
                "page_title" => "Library Management System | Transactions",
                "currentActive" => "Transactions",
                "users" => $this->User_model->getUsers()
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
