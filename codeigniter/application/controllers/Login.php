<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    // This function is for rendering the home page of the application
	public function index()
	{
		if ($this->session->userdata("user_token")) redirect("user", "location");
		$data = array('page_title' => "Library Management System");
		$this->load->view('templates/header', $data);
		$this->load->view('login/login_form');
		$this->load->view('templates/footer');
	}

    // This function is for rendering register
	public function register()
	{
		if ($this->session->userdata("user_token")) redirect("user", "location");
		$data = array('page_title' => "Library Management System");
		$this->load->view('templates/header', $data);
		$this->load->view('login/register_form');
		$this->load->view('templates/footer');
	}

    // This function is for rendering forgot password
	public function forgot_password()
	{
		if ($this->session->userdata("user_token")) redirect("user", "location");
		$data = array('page_title' => "Library Management System");
		$this->load->view('templates/header', $data);
		$this->load->view('login/forgot_password_form');
		$this->load->view('templates/footer');
	}

    // This function is for rendering register
	public function new_password()
	{
		if ($this->session->userdata("user_token")) redirect("user", "location");
		if ($this->uri->segment(3)) {
			$data = array('page_title' => "Library Management System");
			$this->load->view('templates/header', $data);
			$this->load->view('login/new_password_form');
			$this->load->view('templates/footer');
		} else {
			redirect(base_url());
		}
	}
}
