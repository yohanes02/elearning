<?php

class Murid extends Core_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Pengajar_m', 'Class_m']);
		// $this->load->library('email');
		$this->load->helper("security");
		if ($this->session->userdata('type') != 'student') {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['class_list'] = $this->Class_m->getClassByStudent(2)->result_array();

		$this->template("murid/v_daftar_kelas", "Murid", $data);
	}


	public function kelas($class_id)
	{
		$cls = $this->aes->bluesun($class_id);
		$data['cls_id'] = $class_id;
		$data['cls'] = $this->Class_m->getClass($cls)->row_array();

		$this->db->order_by("created_date", "desc");
		$data['list'] = $this->Class_m->getTopic($cls)->result_array();

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

	public function changeProfile()
	{
		$user_id = $this->session->userdata('user_id');
		$data['profile'] = $this->User_m->getProfile($user_id)->row_array();
		// print_r($data);
		// die();

		$birthdate_str = date_format(new DateTime($data['profile']['birthdate']), 'd M Y');
		$data['profile']['birthdate'] = $birthdate_str;
		$this->template("murid/v_change_profile", "Change Profile", $data);
	}
}
