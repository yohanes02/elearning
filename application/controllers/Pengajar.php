<?php

class Pengajar extends Core_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Class_m']);
		// $this->load->library('email');
		$this->load->helper("security");
	}

	public function index()
	{
		$data['class_list'] = $this->Class_m->getClassByTeacher(1)->result_array();

		$this->template("pengajar/v_daftar_kelas", "Pengajar", $data);
	}

	public function kelas($class_id)
	{
		$cls = $this->aes->bluesun($class_id);
		$data['cls'] = $this->Class_m->getClass($cls)->row_array();
		$data['list'] = $this->Class_m->getTopic($cls)->result_array();
		$this->template("pengajar/v_kelas", "Kelas", $data);
	}

	public function createTugas()
	{
		$cls = $this->input->post('class_id');
		$data = [];
		$this->template("pengajar/v_create_tugas", "Create Tugas", $data);
	}

	public function editTugas($idKelas)
	{
		$data = [];
		$this->template("pengajar/v_edit_tugas", "Edit Tugas", $data);
	}

	public function editMateri($id)
	{
		$mtr_id = $this->aes->bluesun($id);
		
		$data['materi'] = $this->Class_m->getSubject($mtr_id)->row_array();
		$data['mtr_id'] = $id;
		$data['cls_id'] = $this->aes->redmoon($data['materi']['cls_id']);
		$this->template("pengajar/v_edit_materi", "Edit Materi", $data);
	}

	public function createMateri()
	{
		$data['class_id'] = $this->input->post('class_id');
		$this->template("pengajar/v_create_materi", "Create Materi", $data);
	}

	public function submitCreateMateri()
	{
		$post = $this->input->post();

		$cls = $this->aes->bluesun($post['class_id']);

		$ins = [
			'cls_id' 				=> $cls,
			'title' 				=> $post['title_materi'],
			'desc' 					=> $post['description_materi'],
			'created_date'	=> date("Y-m-d H:i:s"),
			'creator_id'		=> 1,
			'creator_name'	=> 'Ana'
		];

		if (!empty($_FILES['file_materi']['name'])) {
			$dir = $post['class_id'] . "_subject";
			$this->session->set_userdata("dir_upload", $dir);
			$upload = $this->ups("file_materi");
			$ins['attachment'] = $upload;
		}

		$this->db->trans_begin();

		$this->Class_m->insertSubject($ins);

		if ($this->db->trans_status() !== FALSE) {
			$this->db->trans_commit();
			$this->session->set_userdata('result', 'Sukses membuat materi');
		} else {
			$this->db->trans_rollback();
			$this->session->set_userdata('result', 'Gagal membuat materi');
		}

		redirect('pengajar/kelas/' . $post['class_id']);
	}


	public function submitEditMateri()
	{
		$post = $this->input->post();

		$mtr = $this->aes->bluesun($post['materi_id']);

		$ins = [
			'title' 				=> $post['title_materi'],
			'desc' 					=> $post['description_materi'],
			'creator_id'		=> 1,
			'creator_name'	=> 'Ana'
		];

		if (!empty($_FILES['file_materi']['name'])) {
			$dir = $post['class_id'] . "_subject";
			$this->session->set_userdata("dir_upload", $dir);
			$upload = $this->ups("file_materi");
			$ins['attachment'] = $upload;
		}

		$this->db->trans_begin();

		$this->Class_m->updateSubject($mtr, $ins);

		if ($this->db->trans_status() !== FALSE) {
			$this->db->trans_commit();
			$this->session->set_userdata('result', 'Sukses mengubah materi');
		} else {
			$this->db->trans_rollback();
			$this->session->set_userdata('result', 'Gagal mengubah materi');
		}

		redirect('pengajar/kelas/' . $post['class_id']);
	}
}
