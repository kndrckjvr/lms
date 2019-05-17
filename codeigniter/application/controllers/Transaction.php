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
        if ($this->session->userdata("user_token")) {
            $data = array(
                "page_title" => "Library Management System | Transactions",
                "currentActive" => "Transactions",
                "transactions" => $this->Transaction_model->getTransaction(array()),
                "transaction_type" => array( "Reserve", "Borrow", "Return", "Pay", "Deactivate", "Activate" ),
                "transaction_status" => array( "primary", "warning", "info", "secondary", "danger", "success")
            );
            if($this->session->userdata("user_type") == 0) 
                $data["transactions"] = $this->Transaction_model->getTransaction(array("transactiontbl.user_id" => $this->session->userdata("user_token")));
            $this->load->view("templates/header", $data);
            $this->load->view("components/nav_sidebar");
            $this->load->view("transaction/transaction_reports");
            $this->load->view("templates/footer", $data);
        } else {
            show_404();
        }
    }
}
