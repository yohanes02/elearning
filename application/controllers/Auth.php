<?php

class Auth extends Core_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('auth_model');
		$this->load->library('email');
		// $this->load->helper("security");
	}

	public function index()
	{
		$data['title'] = "Online Learning";
		$this->load->view("components/header", $data);
		$this->load->view("v_login");
		$this->load->view("components/footer");
	}

	public function cekUser()
	{
		// redirect('pengajar');
		redirect('murid');
	}

	public function forgot_pass()
	{
		$data['title'] = "Online Learning - Forgot Password";
		$this->load->view("components/header", $data);
		$this->load->view("v_forgot_password");
		$this->load->view("components/footer");
	}

	public function security_question()
	{
		$data['title'] = "Online Learning - Forgot Password";
		$this->load->view("components/header", $data);
		$this->load->view("v_security_question");
		$this->load->view("components/footer");
	}

	public function new_pass()
	{
		$data['title'] = "Online Learning - New Password";
		$this->load->view("components/header", $data);
		$this->load->view("v_new_password");
		$this->load->view("components/footer");
	}
}
