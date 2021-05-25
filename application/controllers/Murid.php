<?php

class Murid extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        // $this->load->model('auth_model');
        // $this->load->library('email');
		$this->load->helper("security");
    }
	
	public function index() {
		$data['title'] = "Online Learning - Murid";
		$this->load->view("components/header", $data);
		$this->load->view("murid/v_daftar_kelas");
		$this->load->view("components/footer");
	}

	public function kelas($class_id) {
		$data['title'] = "Online Learning - Kelas";
		$this->load->view("components/header", $data);
		$this->load->view("murid/v_kelas");
		$this->load->view("components/footer");
	}
}


?>
