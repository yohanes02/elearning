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
		$data = [];
		$this->template("v_login", "Login", $data);

	}

	public function cekUser()
	{
		// redirect('pengajar');
		redirect('murid');
	}
}
