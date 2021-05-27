<?php

class Murid extends Core_Controller
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
		$this->template("murid/v_daftar_kelas", "Murid", $data);
	}

	public function kelas($class_id)
	{		
		$data = [];
		$this->template("murid/v_kelas", "Kelas", $data);
	}

	public function tugasdetail($tugas_id)
	{
		$data = [];
		$this->template("murid/v_tugas_detail", "Tugas", $data);
	}

	public function materidetail($materi_id)
	{
		$data = [];
		$this->template("murid/v_materi_detail", "Materi", $data);
	}
}
