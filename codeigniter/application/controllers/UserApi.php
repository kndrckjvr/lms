<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation",'email'));
    }

    public function login()
    {
        if ($this->agent->is_browser()) {
            if ($userData = $this->User_model->hasValidCredentials($this->input->post("username", TRUE), $this->input->post("password", TRUE))) {
                $this->session->set_userdata("user_token", $userData[0]->user_id);
                $this->session->set_userdata("user_type", $userData[0]->user_type);
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

    public function register()
    {
        if ($this->agent->is_browser()) {
            $json_response = array();

            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usertbl.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $json_response = array("response" => 0);
                foreach ($this->form_validation->error_array() as $key => $value) {
                    $json_response[$key] = $value;
                }
            } else {
                $data = array(
                    "username" => $this->input->post("username"),
                    "email" => $this->input->post("email"),
                    "password" => sha1($this->input->post("password")),
                    "user_type" => 0,
                    "status" => 1,
                    "created_at" => time()
                );                
                if ($this->User_model->createUser($data)) {
                    $json_response = array("response" => 1);
                } else {
                    $json_response = array("response" => 0, "message" => "Error Found");
                }
            }
        } elseif ($this->agent->is_mobile()) {
            echo "mobile";
        } else {
            echo "unknown";
        }
        echo json_encode($json_response);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("login", "location");
    }

    public function create()
    {
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) show_404();
        } elseif ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) show_404();
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

    public function getusers()
    {
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) show_404();
        } elseif ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) show_404();
        } else {
            return;
        }

        if($this->input->post("action") == "borrow" || $this->input->post("action") == "return") {
            if($userid = $this->Transaction_model->getTransactionsByBook(array("transactiontbl.itembook_id" => $this->input->post("itembook_id")))) {
                if($userid[0]->status == 1 || $userid[0]->status == 2) {
                    echo json_encode(array(
                        "response" => 1,
                        "users" => $this->User_model->getUsers(array("user_id" => $userid[0]->user_id))
                    ));
                    return;
                }
            }
        }
        
        echo json_encode(array(
            "response" => 1,
            "users" => $this->User_model->searchUser($this->input->post("search_text"))
        ));
    }

    // public function sampleemail(){
    //     $this->email->from('bryanbernardo9828@gmail.com', 'NAME');
    //     $this->email->to('bryanbernardo9828@gmail.com');

    //     $this->email->subject('Reset Password');
    //     $this->email->message("Sample Email");
        
    //     if(!$this->email->send()){
    //         $this->email->print_debugger();
    //     }
    //     else{
    //         echo "Emaill Sent";
    //     }
    // }
}
