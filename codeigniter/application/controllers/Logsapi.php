<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logsapi extends CI_Controller
{
    // This function the new page of Section Data
    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "logData" => $this->Log_model->getLogsByPages(array("user_id" => $this->session->userdata("user_token")), ($this->input->post("page") - 1 ) * 10),
            "pages" => $this->Log_model->getLogPages(array("user_id" => $this->session->userdata("user_token")))
        );

        echo json_encode($json_response);
    }
}
