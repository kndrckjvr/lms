<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginApi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
    }


    public function logincheck()
    {
        if ($this->agent->is_browser()) {
            echo "browser";
        } elseif ($this->agent->is_mobile()) {
            echo "mobile";
        } else {
            echo "unknown";
        }
    }
}
