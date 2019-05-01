<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("user_token")) redirect("user", "location");
        $data = array('page_title' => "Library Management System");
		$this->load->view('templates/header', $data);
		$this->load->view('login/login_form');
		$this->load->view('templates/footer'); 
	}
}
