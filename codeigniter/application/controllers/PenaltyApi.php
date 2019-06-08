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

    public function search()
    {
        $json_response = array(
            "pages" => $this->Penalty_model->getPenaltiesByPages($this->input->post("search_text")),
            "userData" => $this->Penalty_model->getPenaltyPages(0, $this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Penalty_model->getPenaltiesByPages($this->input->post("search_text")),
            "userData" => $this->Penalty_model->getPenaltyPages(($this->input->post("page") - 1) * 10, $this->input->post("search_text"))
        );

        echo json_encode($json_response);
    }
}
