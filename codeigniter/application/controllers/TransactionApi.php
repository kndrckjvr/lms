<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionApi extends CI_Controller
{

    public function create()
    {
        $transactionData = array(
            "transaction_date" => strtotime("now"),
            "return_date" => 0,
            "amount_paid" => 0,
            "status" => $this->input->post("status"),
            "itembook_id" => $this->input->post("itembook_id"),
            "user_id" => $this->input->post("user_id")
        );

        $itemBookData = array(
            "itembook_id" => $transactionData["itembook_id"]
        );

        // transaction handler
        // transaction types
        // 1 - reserve
        // 2 - borrow
        // 3 - returned
        // 4 - paid
        // 5 - disabled
        // 6 - enable
        switch ($transactionData["status"]) {
            case "1":
                $itemBookData["status"] = 2;
                break;
            case "2":
                $itemBookData["status"] = 3;
                break;
            case "3":
                if ($lastTransactionData = $this->Transaction_model->getTransactionsByBook(array("transactiontbl.itembook_id" => $this->input->post("itembook_id")))) {
                    $transactionData["user_id"] = $lastTransactionData[0]->user_id;
                }
                $transactionData["return_date"] = strtotime("now");
                if (strtotime("now") > strtotime("+3 day", $lastTransactionData[0]->transaction_date)) {
                    // penalty table
                    // if SELECT penaltyAmount, penaltyDays FROM penaltytbl WHERE penaltyImplementationDate < lastDateTrans ORDER BY ID DESC  
                    $transactionData["amount_paid"] = 20 * ceil((strtotime("now") - strtotime("+3 day", $lastTransactionData[0]->transaction_date)) / 86400);
                }
                $itemBookData["status"] = 1;
                break;
            case "4":
                // logic
                // save transaction amount paid
                break;
            case "5":
                $transactionData["user_id"] = $this->session->userdata("user_token");
                $itemBookData["status"] = 4;
                break;
            case "6":
                $transactionData["user_id"] = $this->session->userdata("user_token");
                $itemBookData["status"] = 1;
                break;
        }
        // echo $itemBookData["itembook_id"];
        // die();
        if ($this->Transaction_model->createTransaction($transactionData)) {
            if ($this->Book_model->updateBook("itembooktbl", array("status" => $itemBookData["status"]), array("itembook_id" => $itemBookData["itembook_id"]))) {
                echo json_encode(array(
                    "response" => 1,
                    "data" => $transactionData
                ));
                return;
            }
        }
        //echo json_encode(array("response" => 1));
    }
}
