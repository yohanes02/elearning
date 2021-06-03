<?php

class Murid extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Murid_m', 'Pengajar_m', 'Class_m']);
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

    $user_id = $this->session->userdata('user_id');

    $data['teacherData'] = $this->Murid_m->getTeacherData($cls)->row_array();
    $data['participant'] = $this->Murid_m->getClassParticipant($cls)->result_array();
    $all_answer = $this->Murid_m->getAllAnswer($user_id, $cls)->result_array();
    $this->db->order_by("created_date", "desc");
    $data['list'] = $this->Class_m->getTopic($cls)->result_array();

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
    if($iTugas == 0) {
      $tugasDone = "-";
    } else {
      $tugasDone = round((count($all_answer) / $iTugas) * 100, 1);
    }
    $data['materiCount'] = $iMateri;
    $data['tugasCount'] = $iTugas;
    $data['tugasDone'] = $tugasDone;

    $sum_grade = 0;
    foreach ($all_answer as $key => $value) {
      if ($value['grade'] == null) {
        $grade = 0;
      } else {
        $grade = $value['grade'];
      }

      $sum_grade = $sum_grade + $grade;
    }
    // die();

    if (count($all_answer) == 0) {
      $data['avgNilai'] = "-";
    } else {
      $data['avgNilai'] = $sum_grade / count($all_answer);
    }

    $this->template("murid/v_kelas", "Kelas", $data);
  }

  public function tugasdetail($enc)
  {
    $x = explode(".", $enc);
    $tgs_id = $this->aes->bluesun($x[1]);
    // echo $this->aes->bluesun($x[0]);
    // echo $this->aes->bluesun($x[1]);

    $std_id = $this->session->userdata('user_id');

    $data['tugas'] = $this->Pengajar_m->getAssignment($tgs_id)->row_array();
    $data['answer'] = $this->Murid_m->getAnswer($tgs_id, $std_id)->row_array();
    $data['tgs_id'] = $x[1];
    $data['cls_id'] = $x[0];

    // echo $tgs_id
    // print_r($data);
    // die();

    $this->template("murid/v_tugas_detail", "Tugas", $data);
  }

  public function submitJawaban() {
    $post = $this->input->post();
    $tgs_id = $this->aes->bluesun($post['tugas_id']);
  
    $ins = [
      'assignment_id' => $tgs_id,
      'student_id' => $this->session->userdata('user_id'),
      'student_name' => $this->session->userdata('name'),
      'uploaded_date' => date("Y-m-d H:i:s"),
      'cls_id' => $this->aes->bluesun($post['class_id']),
      'status_answer' => $post['status_answer']
    ];

    if(!empty($_FILES['file_jawaban']['name'])) {
      $dir = $post['class_id'] . "_answer";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_jawaban");
      $ins['attachment'] = $upload;
    }

    // print_r($ins);
    // die();

    $this->db->trans_begin();

    $this->Murid_m->insertAnswer($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengirim jawaban');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengirim jawaban');
    }

    redirect('murid/tugasdetail/' . $post['class_id'] . '.' . $post['tugas_id']);
  }

  public function updateJawaban() {
    $post = $this->input->post();
    // $tgs_id = $this->aes->bluesun($post['tugas_id']);
    $answer_id = $post['answer_id'];

    $data = [
      'status_answer' => $post['status_answer'],
      'uploaded_date' => date("Y-m-d H:i:s"),
    ];

    if(!empty($_FILES['file_jawaban']['name'])) {
      $dir = $post['class_id'] . "_answer";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_jawaban");
      $data['attachment'] = $upload;
    }

    $this->db->trans_begin();

    $this->Murid_m->updateAnswer($answer_id, $data);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengirim jawaban');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengirim jawaban');
    }

    redirect('murid/tugasdetail/' . $post['class_id'] . '.' . $post['tugas_id']);
  }

  public function submitFinal() {
    $post = $this->input->post();
    // $tgs_id = $this->aes->bluesun($post['tugas_id']);
    $answer_id = $post['answer_id'];

    $data = [
      'status_answer' => $post['status_answer_finish']
    ];

    print_r($post);
    // die();

    $this->db->trans_begin();

    $this->Murid_m->submitAnswer($answer_id, $data);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengirim jawaban');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengirim jawaban');
    }

    redirect('murid/tugasdetail/' . $post['class_id'] . '.' . $post['tugas_id']);
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

  public function changePassword() {
    $post = $this->input->post();

    $id = $this->session->userdata('user_id');
    $pass = md5($post['old_pass']);

    $isPassSame = $this->User_m->checkOldPassword($id, $pass)->row_array();
    // print_r($isPassSame);
    // die();
    if(!empty($isPassSame)) {
      $data = [
        "password" => md5($post['new_pass'])
      ];

      $this->User_m->changePassword($id, $data);

      redirect('murid/changeProfile');
    }
  }
}
