<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionApi extends CI_Controller
{
    
    public function create()
    {
        if($userid = $this->Transaction_model->getTransactionsByBook(array("transactiontbl.itembook_id" => $this->input->post("itembook_id")))) {
            if($userid[0]->status == 1 && $this->input->post("status") == "2") {
                
            }
            echo json_encode(array(
                "response" => 1,
                "users" => $userid
            ));
            return;
        }
        //echo json_encode(array("response" => 1));
    }
}
