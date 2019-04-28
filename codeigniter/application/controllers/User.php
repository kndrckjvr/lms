<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    
    
	public function index()
	{
        if($this->session->userdata("user_token")) {
            echo "yow";
        } else {
            echo "nope";
        }
	}
}
