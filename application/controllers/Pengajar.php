<?php

class Pengajar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('auth_model');
		// $this->load->library('email');
		$this->load->helper("security");
	}

	public function index()
	{
		$data['title'] = "Online Learning - Pengajar";
		$this->load->view("components/header", $data);
		$this->load->view("pengajar/v_daftar_kelas");
		$this->load->view("components/footer");
	}

	public function kelas($class_id)
	{
		$data['title'] = "Online Learning - Kelas";
		$this->load->view("components/header", $data);
		$this->load->view("pengajar/v_kelas");
		$this->load->view("components/footer");
	}

	public function createTugas()
	{
		$data['title'] = "Online Learning - Create Tugas";
		$this->load->view("components/header", $data);
		$this->load->view("pengajar/v_create_tugas");
		$this->load->view("components/footer");
	}

	public function editTugas($idKelas)
	{
		$data['title'] = "Online Learning - Edit Tugas";
		$this->load->view("components/header", $data);
		$this->load->view("pengajar/v_edit_tugas");
		$this->load->view("components/footer");
	}

	public function createMateri()
	{
		$data['title'] = "Online Learning - Create Materi";
		$this->load->view("components/header", $data);
		$this->load->view("pengajar/v_create_materi");
		$this->load->view("components/footer");
	}
}
