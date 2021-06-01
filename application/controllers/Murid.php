<?php

class Murid extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Murid_m', 'Pengajar_m']);
    // $this->load->library('email');
    $this->load->helper("security");
    if ($this->session->userdata('type') != 'student') {
      redirect('auth');
    }
  }

  public function index()
  {
    // $data = [];
    $data['class_list'] = $this->Murid_m->getClassByStudent()->result_array();
    // print_r($data);
    // die();
    $this->template("murid/v_daftar_kelas", "Murid", $data);
  }

  public function kelas($class_id)
  {
    $data['cls_id'] = $class_id;
    $cls = $this->aes->bluesun($class_id);
    $data['list'] = $this->Pengajar_m->getTopic($cls)->result_array();
    $iMateri = 0;
    $iTugas = 0;
    foreach ($data['list'] as $key => $value) {
      if ($value['type'] === 'Materi') {
        $iMateri++;
      }
      if ($value['type'] === 'Tugas') {
        $iTugas++;
      }
    }
    $data['teacherData'] = $this->Murid_m->getTeacherData($cls)->row_array();
    $data['materiCount'] = $iMateri;
    $data['tugasCount'] = $iTugas;
    $data['participant'] = $this->Murid_m->getClassParticipant($cls)->result_array();

    $this->template("murid/v_kelas", "Kelas", $data);
  }

  public function tugasdetail($tugas_id)
  {
    $data = [];
    $this->template("murid/v_tugas_detail", "Tugas", $data);
  }

  public function materidetail($enc)
  {
    $x = explode(".", $enc);
    $mtr_id = $this->aes->bluesun($x[1]);

    $data['materi'] = $this->Pengajar_m->getSubject($mtr_id)->row_array();
    $data['mtr_id'] = $x[1];
    $data['cls_id'] = $x[0];
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

  public function submitChangeProfile() {
    $post = $this->input->post();

    $birthdate_str = strtotime($post['birthdate']);
    $birthdate = date('Y-m-d', $birthdate_str);


    $data = [
      "email"         => $post['email'],
      "fullname"      => $post['fullname'],
      "phone"         => $post['phone'],
      "address"       => $post['alamat'],
      "gender"        => $post['gender'],
      "birthdate"     => $birthdate,
    ];
    $id = $this->session->userdata("user_id");
    if(!empty($_FILES['profile_pict']['name'])) {
      $dir = $id . "_profile";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("profile_pict");
      $data["picture"] = $upload;
    }

    $this->Murid_m->updateProfile($id, $data);

    redirect('murid');
  }

  public function joinClass($class_code)
  {
    $checkCode = $this->Murid_m->getClassByCode($class_code)->row_array();
    if(empty($checkCode)) {
      echo json_encode("Not Found");
      return;
    }

    $cls_id = $checkCode['id'];
    $user_id = $this->session->userdata('user_id');

    $ins = [
      'cls_id'      => $cls_id,
      'student_id'  => $user_id,
      'join_date'   => date("Y-m-d H:i:s")
    ];
    
    $this->db->trans_begin();

    $this->Murid_m->joiningClass($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo json_encode("Success");
    } else {
      $this->db->trans_rollback();
      echo json_encode("Failed");
    }

    return;

  }
}
