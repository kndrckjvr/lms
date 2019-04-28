<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $data = array('page_title' => "Library Management System");
		$this->load->view('templates/header', $data);
		$this->load->view('login/login_form');
		$this->load->view('templates/footer');
	}
}
