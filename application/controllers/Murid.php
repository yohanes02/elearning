<?php

class Murid extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Murid_m']);
    // $this->load->library('email');
    $this->load->helper("security");
    if ($this->session->userdata('type') != 'student') {
      redirect('auth');
    }
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
