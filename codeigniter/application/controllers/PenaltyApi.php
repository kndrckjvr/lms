<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenaltyApi extends CI_Controller
{
    public function getPenalty()
    {
        $penalties = $this->Transaction_model->getUserPenalties(array("user_id" => $this->input->post("user_id"), "status" => "3"));
        $paid = $this->Transaction_model->getUserPaid(array("user_id" => $this->input->post("user_id"), "status" => "4"));
        echo json_encode(array(
            "penalties" => $penalties - $paid,
        ));
    }
}
