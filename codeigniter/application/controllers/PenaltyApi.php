<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenaltyApi extends CI_Controller
{
    // This function is when the controller is used this will automatically called.
    // This function checks if the application is accessed by a mobile device / in a web browser
    // and only the admin can access this API.
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->input->post("token")) || $this->input->post("user_token") != 1) show_404();
        } else if ($this->agent->is_browser()) {
            if (empty($this->session->userdata("user_token")) || $this->session->userdata("user_token") != 1) show_404();
        } else {
            return;
        }
    }

    // This function fetchs the penalty of a user
    public function getPenalty()
    {
        $penalties = $this->Transaction_model->getUserPenalties(array("user_id" => $this->input->post("user_id"), "status" => "3"));
        $paid = $this->Transaction_model->getUserPaid(array("user_id" => $this->input->post("user_id"), "status" => "4"));
        echo json_encode(array(
            "penalties" => $penalties - $paid,
        ));
    }

    // This function fetchs for the penalty data
    public function search()
    {
        $json_response = array(
            "pages" => $this->Penalty_model->getPenaltyPages(0, $this->input->post("search_text")),
            "penaltyData" => $this->Penalty_model->getPenaltiesByPages($this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    // This function fetchs the new page of penalties
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

    // This function creates a penalty
    public function create()
    {
        // Default Response Data
        $json_response = array(
            "response" => 1
        );

        // Validation Data
        $this->form_validation->set_rules('penalty_date', 'Penalty Date', 'trim|required');
        $this->form_validation->set_rules('penalty_amount', 'Penalty Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('penalty_day', 'Penalty Day', 'trim|required|numeric|greater_than[0]');

        // Date Validation
        if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("penalty_date"))) {
            $json_response["penalty_date"] = "The Penalty Date field is not in the correct format.";
        }

        // Check if the validation rules are fulfilled
        if ($this->form_validation->run() == FALSE) {
            // if not form values are inserted and their error message is sent via a JSON Response
            $json_response = array("response" => 0);
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            // Check Date Validation again
            if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("penalty_date"))) {
                $json_response["response"] = 0;
                echo json_encode($json_response);
                return;
            }

            // Process Data
            $data = array(
                "penalty_date" => strtotime($this->input->post("penalty_date")),
                "penalty_amount" => $this->input->post("penalty_amount"),
                "penalty_day" => $this->input->post("penalty_day")
            );

            // Insert Data and return New Insert Id
            if ($penaltyId = $this->Penalty_model->createPenalty($data)) {
                $json_response["penalty_id"] = $penaltyId;
            } else {
                $json_response["response"] = 0;
            }
        }

        // JSON Response
        echo json_encode($json_response);
    }
}
