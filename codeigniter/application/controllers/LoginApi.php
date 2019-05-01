<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent"));
    }

    public function logincheck()
    {
        if ($this->agent->is_browser()) {
            if($userdata = $this->User_model->hasValidCredentials($this->input->post("username", TRUE), $this->input->post("password", TRUE))[0]) {
                $this->session->set_userdata("user_token", $userdata->user_id);
                $this->session->set_userdata("user_type", $userdata->user_type);
            }
        } elseif ($this->agent->is_mobile()) {
            echo "mobile";
        } else {
            echo "unknown";
        }
        // print_r($this->session->userdata());
        redirect("user", "location");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("login", "location");
    }
}
