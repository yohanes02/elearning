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
		$data['title'] = "Online Learning - Pengajar";
		$this->load->view("components/header", $data);
		$this->load->view("v_login");
		$this->load->view("components/footer");
	}

	public function cekUser()
	{
		// redirect('pengajar');
		redirect('murid');
	}
}
