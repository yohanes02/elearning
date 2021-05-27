<?php

class Pengajar extends Core_Controller
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
		$data = [];
		$this->template("pengajar/v_daftar_kelas", "Pengajar", $data);
	}

	public function kelas($class_id)
	{
		$data = [];
		$this->template("pengajar/v_kelas", "Kelas", $data);
	}

	public function createTugas()
	{
		$data = [];
		$this->template("pengajar/v_create_tugas", "Create Tugas", $data);
	}

	public function editTugas($idKelas)
	{
		$data = [];
		$this->template("pengajar/v_edit_tugas", "Edit Tugas", $data);
	}

	public function createMateri()
	{
		$data = [];
		$this->template("pengajar/v_create_materi", "Create Materi", $data);
	}
}
