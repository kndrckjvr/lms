<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TransactionApi extends CI_Controller
{
    // This function is when the controller is used this will automatically called.
    // This function is for checking if th
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->input->post("token"))) show_404();
        } else if ($this->agent->is_browser()) {
            if (empty($this->session->userdata("user_token"))) show_404();
        } else {
            return;
        }
    }

    // This function is for creating transactions
    // only the admin can access this function
    public function create()
    {
        // Checks for login data
        if ($this->agent->is_mobile()) {
            if ($this->input->post("user_token") != 1) show_404();
        } else if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_token") != 1) show_404();
        } else {
            return;
        }

        // Default Process Transaction Data
        $transactionData = array(
            "transaction_date" => strtotime("now"),
            "return_date" => 0,
            "amount_paid" => 0,
            "status" => $this->input->post("status"),
            "itembook_id" => $this->input->post("itembook_id"),
            "user_id" => $this->input->post("user_id")
        );

        // Default Process Item Book Data
        $itemBookData = array(
            "itembook_id" => $transactionData["itembook_id"]
        );

        // Checks for Type of Transaction
        // Transaction types:
        // 1 - reserve
        // 2 - borrow
        // 3 - returned
        // 4 - paid
        // 5 - disabled
        // 6 - enable
        switch ($transactionData["status"]) {
            case "1":
                // Change the status of the Item Book to reserved
                $itemBookData["status"] = 2;
                break;
            case "2":
                // Change the status of the Item Book to borrowed
                $itemBookData["status"] = 3;
                break;
            case "3":
                // Check for the last Transaction where the book was borrowed
                if ($lastTransactionData = $this->Transaction_model->getTransactionsByBook(array("transactiontbl.itembook_id" => $this->input->post("itembook_id")))) {
                    $transactionData["user_id"] = $lastTransactionData[0]->user_id;
                }

                // Get the penalty for the date of the last transaction
                $penalty = $this->Penalty_model->getPenalty($lastTransactionData[0]->transaction_date);

                // Get the current date and time
                $transactionData["return_date"] = strtotime("now");

                // Check if the penalty is going to be applied
                if (strtotime("now") > strtotime("+" . $penalty[0]->penalty_day . " day", $lastTransactionData[0]->transaction_date)) {
                    // Apply penalty based on the number of days exceeded
                    $transactionData["amount_paid"] = $penalty[0]->penalty_amount * ceil((strtotime("now") - strtotime("+" . $penalty[0]->penalty_day . " day", $lastTransactionData[0]->transaction_date)) / 86400);
                }

                // Change the status of the Item Book to available
                $itemBookData["status"] = 1;
                break;
            case "4":
                // Remove Item Book
                $transactionData["itembook_id"] = 0;

                // Get Payment
                $transactionData["amount_paid"] = $this->input->post("payment");

                // Get Total of the Penalty
                $penalties = $this->Transaction_model->getUserPenalties(array("user_id" => $this->input->post("user_id"), "status" => "3"));
                $paid = $this->Transaction_model->getUserPaid(array("user_id" => $this->input->post("user_id"), "status" => "4"));

                // If Payment is greater than the Total Penalty
                if ($transactionData["amount_paid"] > ($penalties - $paid)) {
                    echo json_encode(array(
                        "response" => 0,
                        "errorMessage" => "Payment is greater than the penalty"
                    ));
                    return;
                }
                break;
            case "5":
                // Get Current Admin Disabling the Book
                $transactionData["user_id"] = $this->session->userdata("user_token");

                // Change the status of the Item Book to disabled
                $itemBookData["status"] = 4;
                break;
            case "6":
                // Get Current Admin Enabling the Book
                $transactionData["user_id"] = $this->session->userdata("user_token");

                // Change the status of the Item Book to available
                $itemBookData["status"] = 1;
                break;
        }

        // Insert Transaction Data
        if ($this->Transaction_model->createTransaction($transactionData)) {
            if ($transactionData["status"] == 4) {
                echo json_encode(array(
                    "response" => 1
                ));
                return;
            }
            if ($this->Book_model->updateBook("itembooktbl", array("status" => $itemBookData["status"]), array("itembook_id" => $itemBookData["itembook_id"]))) {
                echo json_encode(array(
                    "response" => 1,
                    "data" => $transactionData
                ));
                return;
            }
        }
    }

    // Search for Transaction
    public function search()
    {
        $json_response = array(
            "response" => 1,
            "pages" => $this->Transaction_model->getTransactionPages(($this->session->userdata("user_type") == 0 ? array("user_id" => $this->session->userdata("user_type")) : array()), $this->input->post("search_text")),
            "transactionData" => $this->Transaction_model->getTransaction(0, ($this->session->userdata("user_type") == 0 ? array("user_id" => $this->session->userdata("user_type")) : array()), $this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    // New Page of Transaction
    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Transaction_model->getTransactionPages(($this->session->userdata("user_type") == 0 ? array("user_id" => $this->session->userdata("user_type")) : array()), $this->input->post("search_text")),
            "transactionData" => $this->Transaction_model->getTransaction(($this->input->post("page") - 1) * 10, ($this->session->userdata("user_type") == 0 ? array("user_id" => $this->session->userdata("user_type")) : array()))
        );
        echo json_encode($json_response);
    }

    // User Creates a transaction (for reserve)
    public function userCreate()
    {
        $transactionData = array(
            "transaction_date" => strtotime("now"),
            "return_date" => 0,
            "amount_paid" => 0,
            "status" => 1,
            "itembook_id" => $this->input->post("itembook_id"),
            "user_id" => $this->session->userdata("user_token")
        );
        $itemBookData = array(
            "itembook_id" => $transactionData["itembook_id"],
            "status" => 2
        );
        if ($this->Transaction_model->createTransaction($transactionData)) {
            if ($this->Book_model->updateBook("itembooktbl", array("status" => $itemBookData["status"]), array("itembook_id" => $itemBookData["itembook_id"]))) {
                echo json_encode(array(
                    "response" => 1,
                    "data" => $transactionData
                ));
                return;
            }
        }
    }
}
