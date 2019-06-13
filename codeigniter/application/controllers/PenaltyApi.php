<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenaltyApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) show_404();
        } else {
            return;
        }
    }

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
            "pages" => $this->Penalty_model->getPenaltyPages(0, $this->input->post("search_text")),
            "penaltyData" => $this->Penalty_model->getPenaltiesByPages($this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Penalty_model->getPenaltyPages($this->input->post("search_text")),
            "penaltyData" => $this->Penalty_model->getPenaltiesByPages(($this->input->post("page") - 1) * 10, $this->input->post("search_text"))
        );

        echo json_encode($json_response);
    }

    public function create()
    {
        $json_response = array(
            "response" => 1
        );

        $this->form_validation->set_rules('penalty_date', 'Penalty Date', 'trim|required');
        $this->form_validation->set_rules('penalty_amount', 'Penalty Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('penalty_day', 'Penalty Day', 'trim|required|numeric|greater_than[0]');

        if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("penalty_date"))) {
            $json_response["penalty_date"] = "The Penalty Date field is not in the correct format.";
        }

        if ($this->form_validation->run() == FALSE) {
            $json_response = array("response" => 0);
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("penalty_date"))) {
                $json_response["response"] = 0;
                echo json_encode($json_response);
                return;
            }

            $data = array(
                "penalty_date" => strtotime($this->input->post("penalty_date")),
                "penalty_amount" => $this->input->post("penalty_amount"),
                "penalty_day" => $this->input->post("penalty_day")
            );

            if ($penaltyId = $this->Penalty_model->createPenalty($data)) {
                $json_response["penalty_id"] = $penaltyId;
            }
        }

        echo json_encode($json_response);
    }
}
