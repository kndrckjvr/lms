<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
    }

    public function login()
    {
        if ($this->agent->is_browser()) {
            if ($userdata = $this->User_model->hasValidCredentials($this->input->post("username", TRUE), $this->input->post("password", TRUE))[0]) {
                $this->session->set_userdata("user_token", $userdata->user_id);
                $this->session->set_userdata("user_type", $userdata->user_type);
                echo json_encode(array("response" => 1));
            } else {
                echo json_encode(array("response" => 0, "message" => "No User Found"));
            }
        } elseif ($this->agent->is_mobile()) {
            echo "mobile";
        } else {
            echo "unknown";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("login", "location");
    }

    public function create()
    {
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) return;
        } elseif ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) return;
        } else {
            return;
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[usertbl.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("response" => 0, "username" => form_error("username"), "password" => form_error("password")));
        } else {
            $data = array(
                "username" => $this->input->post("username"),
                "password" => sha1($this->input->post("password")),
                "user_type" => $this->input->post("user_type"),
                "created_at" => strtotime("now")
            );
            if ($this->User_model->createuser($data)) {
                echo json_encode(array("response" => 1));
            } else {
                echo json_encode(array("response" => 0, "message" => "Error Found"));
            }
        }
    }
}
