<?php

class Pengajar extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Pengajar_m', 'Class_m']);
    // $this->load->library('email');
    $this->load->helper("security");
    if ($this->session->userdata('type') != 'teacher') {
      redirect('auth');
    }
  }


  public function index()
  {
    $teacher_id = $this->session->userdata('user_id');
    $data['class_list'] = $this->Class_m->getClassByTeacher($teacher_id)->result_array();

    $this->template("pengajar/v_daftar_kelas", "Pengajar", $data);
  }


  public function kelas($class_id)
  {
    $cls = $this->aes->bluesun($class_id);

    $data['cls_id'] = $class_id;
    $data['cls'] = $this->Class_m->getClass($cls)->row_array();

    $asg = $this->Pengajar_m->getAssignment("", $cls)->result_array();

    $this->db->order_by("g.created_date", "desc");
    $this->db->order_by("a.uploaded_date", "desc");
    $awr = $this->Class_m->getAnswer($cls)->result_array();

    $data['awr'] = $awr;

    foreach ($asg as $ky => $val) {
      foreach ($awr as $k => $v) {
        if ($v['assignment_id'] == $val['id']) {
          $asg[$ky]['awr'][] = $v;
        }
      }
    }


    $data['asg'] = $asg;

    $data['std'] = $this->Class_m->getParticipant("", $cls)->result_array();


    $data['fa'] = !empty($data['awr']) ? $data['awr'][0]['assignment_id'] : 'x';

    $this->db->order_by("created_date", "desc");
    $data['list'] = $this->Class_m->getTopic($cls)->result_array();

    $this->template("pengajar/v_kelas", "Kelas", $data);
  }


  public function createTugas()
  {
    $cls = $this->input->post('class_id');

    $data['type'] = [
      'tugas' => 'Tugas',
      'quiz'  => 'Quiz',
      'uts'   => 'UTS',
      'uas'   => 'UAS'
    ];
    $data['class_id'] = $this->input->post('class_id');
    $this->template("pengajar/v_create_tugas", "Create Tugas", $data);
  }


  public function editTugas($enc)
  {
    $x = explode(".", $enc);
    $tgs_id = $this->aes->bluesun($x[1]);

    $data['type'] = [
      'tugas' => 'Tugas',
      'quiz'  => 'Quiz',
      'uts'   => 'UTS',
      'uas'   => 'UAS'
    ];
    $data['tugas'] = $this->Pengajar_m->getAssignment($tgs_id)->row_array();
    $data['tgs_id'] = $x[1];
    $data['cls_id'] = $x[0];
    $this->template("pengajar/v_edit_tugas", "Edit Tugas", $data);
  }


  public function editMateri($enc)
  {
    $x = explode(".", $enc);
    $mtr_id = $this->aes->bluesun($x[1]);

    $data['materi'] = $this->Pengajar_m->getSubject($mtr_id)->row_array();
    $data['mtr_id'] = $x[1];
    $data['cls_id'] = $x[0];
    $this->template("pengajar/v_edit_materi", "Edit Materi", $data);
  }


  public function deleteMateri($enc)
  {

    $x = explode(".", $enc);
    $mtr_id = $this->aes->bluesun($x[1]);

    $this->db->trans_begin();

    $this->Pengajar_m->deleteSubject($mtr_id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses menghapus materi');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal menghapus materi');
    }

    redirect('pengajar/kelas/' . $x[0]);
  }



  public function deleteTugas($enc)
  {

    $x = explode(".", $enc);
    $tgs_id = $this->aes->bluesun($x[1]);

    $this->db->trans_begin();

    $this->Pengajar_m->deleteAssignment($tgs_id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses menghapus tugas');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal menghapus tugas');
    }

    redirect('pengajar/kelas/' . $x[0]);
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
      'cls_id'        => $cls,
      'title'         => $post['title_materi'],
      'desc'          => $post['description_materi'],
      'created_date'  => date("Y-m-d H:i:s"),
      'creator_id'    => $this->session->userdata('user_id'),
      'creator_name'  => $this->session->userdata('name')
    ];

    if (!empty($_FILES['file_materi']['name'])) {
      $dir = $post['class_id'] . "_subject";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_materi");
      $ins['attachment'] = $upload;
    }

    $this->db->trans_begin();

    $this->Pengajar_m->insertSubject($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses membuat materi');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal membuat materi');
    }

    redirect('pengajar/kelas/' . $post['class_id']);
  }


  public function submitCreateTugas()
  {
    $post = $this->input->post();

    $cls = $this->aes->bluesun($post['class_id']);

    $ins = [
      'cls_id'        => $cls,
      'title'         => $post['title_tugas'],
      'desc'          => $post['description_tugas'],
      'type'          => $post['tipe_tugas'],
      'due_date'      => str_replace('T', ' ', $post['due_date']),
      'created_date'  => date("Y-m-d H:i:s"),
      'creator_id'    => $this->session->userdata('user_id'),
      'creator_name'  => $this->session->userdata('name')
    ];

    if (!empty($_FILES['file_tugas']['name'])) {
      $dir = $post['class_id'] . "_assignment";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_tugas");
      $ins['attachment'] = $upload;
    }

    $this->db->trans_begin();

    $this->Pengajar_m->insertAssignment($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses membuat tugas');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal membuat tugas');
    }

    redirect('pengajar/kelas/' . $post['class_id']);
  }


  public function submitEditMateri()
  {
    $post = $this->input->post();

    $mtr = $this->aes->bluesun($post['materi_id']);

    $ins = [
      'title'         => $post['title_materi'],
      'desc'          => $post['description_materi'],
      'creator_id'    => $this->session->userdata('user_id'),
      'creator_name'  => $this->session->userdata('name')
    ];

    if (!empty($_FILES['file_materi']['name'])) {
      $dir = $post['class_id'] . "_subject";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_materi");
      $ins['attachment'] = $upload;
    }

    $this->db->trans_begin();

    $this->Pengajar_m->updateSubject($mtr, $ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengubah materi');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengubah materi');
    }

    redirect('pengajar/kelas/' . $post['class_id']);
  }

  public function changeProfile()
  {
    // $data = [];
    $user_id = $this->session->userdata('user_id');

    $data['profile'] = $this->User_m->getProfile($user_id)->row_array();

    $birthdate_str = date_format(new DateTime($data['profile']['birthdate']), 'd M Y');
    $data['profile']['birthdate'] = $birthdate_str;
    $this->template("pengajar/v_change_profile", "Change Profile", $data);
  }

  public function submitChangeProfile()
  {
    $post = $this->input->post();
    $user_id = $this->session->userdata('user_id');

    $birthdate_str = strtotime($post['birthdate']);
    $birthdate = date('Y-m-d', $birthdate_str);

    $ins = [
      'email'     => $post['email'],
      'fullname'  => $post['fullname'],
      'phone'     => $post['phone'],
      'address'   => $post['alamat'],
      'gender'    => $post['gender'],
      'birthdate' => $birthdate,
    ];

    $id = $this->session->userdata("user_id");

    // print_r($_FILES);
    if (!empty($_FILES['profile_pict']['name'])) {
      // echo "This";
      // $dir = $post['class_id'] . "_subject";
      $dir = $id . "_profile";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups('profile_pict');
      $ins['picture'] = $upload;
    }

    $this->Pengajar_m->updateProfile($id, $ins);

    redirect('pengajar');
  }

  public function submitEditTugas()
  {
    $post = $this->input->post();

    $tgs = $this->aes->bluesun($post['tugas_id']);

    $ins = [
      'title'         => $post['title_tugas'],
      'desc'          => $post['description_tugas'],
      'type'          => $post['tipe_tugas'],
      'due_date'      => str_replace('T', ' ', $post['due_date']),
      'creator_id'    => $this->session->userdata('user_id'),
      'creator_name'  => $this->session->userdata('name')
    ];

    if (!empty($_FILES['file_tugas']['name'])) {
      $dir = $post['class_id'] . "_subject";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_tugas");
      $ins['attachment'] = $upload;
    }

    $this->db->trans_begin();

    $this->Pengajar_m->updateAssignment($tgs, $ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengubah tugas');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengubah tugas');
    }

    redirect('pengajar/kelas/' . $post['class_id']);
  }

  public function changePassword()
  {
    $post = $this->input->post();

    $id = $this->session->userdata('user_id');
    $pass = md5($post['old_pass']);

    $isPassSame = $this->User_m->checkOldPassword($id, $pass)->row_array();
    // print_r($isPassSame);
    // die();
    if (!empty($isPassSame)) {
      $data = [
        "password" => md5($post['new_pass'])
      ];

      $this->User_m->changePassword($id, $data);

      redirect('pengajar/changeProfile');
    }
  }

  public function submitInfo()
  {
    $post = $this->input->post();

    $cls = $this->aes->bluesun($post['class_id']);
    $ttl = strip_tags($post['content']);

    $ins = [
      'cls_id'        => $cls,
      'title'         => $ttl > 50 ? substr($ttl, 0, 50) . "..." : $ttl,
      'desc'          => $post['content'],
      'created_date'  => date("Y-m-d H:i:s"),
      'creator_id'    => $this->session->userdata('user_id'),
      'creator_name'  => $this->session->userdata('name')
    ];

    if (!empty($_FILES['file_attach']['name'])) {
      $dir = $post['class_id'] . "_info";
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("file_attach");
      $ins['attachment'] = $upload;
    }

    $this->db->trans_begin();

    $this->Pengajar_m->insertInfo($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo json_encode(['respon' => "ok"], true);
    } else {
      $this->db->trans_rollback();
      echo json_encode(['respon' => "no"], true);
    }
  }

  public function getPost($enc)
  {

    $cls = $this->aes->bluesun($enc);

    $this->db->order_by("created_date", "desc");
    $list = $this->Class_m->getTopic($cls)->result_array();
    foreach ($list as $key => $value) {

      if ($value['type'] == 'Info') {
        $list[$key]['link_edit'] = "";
        $list[$key]['title'] = $value['type'];
        $list[$key]['spinf'] = $value['desc'];
      } else {
        $list[$key]['link_edit'] =  '<li><a class="dropdown-item" href="' . site_url('pengajar/edit' . $value['type'] . '/' . $enc . '.' .  $this->aes->redmoon($value['id'])) . '">Edit</a></li>';
        $list[$key]['title'] = $value['type'] . " : " . $value['title'];
        $list[$key]['spinf'] = "";
      }

      $list[$key]['link_detail'] = site_url('pengajar/detailPost/' . $value['type'] . '/' . $enc . '.' . $this->aes->redmoon($value['id']));
      $list[$key]['link_delete'] = '<li><a class="dropdown-item" href="' . site_url('pengajar/delete' . $value['type'] . '/' . $enc . '.' .  $this->aes->redmoon($value['id'])) . '">Delete</a></li>';
    }
    echo json_encode($list, true);
  }



  public function deleteInfo($enc)
  {

    $x = explode(".", $enc);
    $inf_id = $this->aes->bluesun($x[1]);

    $this->db->trans_begin();

    $this->Pengajar_m->deleteInfo($inf_id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses menghapus info');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal menghapus info');
    }
    redirect('pengajar/kelas/' . $x[0]);
  }

  public function createClass()
  {

    $post = $this->input->post();

    // $list = $this->Class_m->getClass("", "")->result_array();

    // do {
      $code = $this->getClassCode(6);
    // } while (in_array($code, $list));

    if (!empty($code)) {
      $inp = [
        'code'          => $code,
        'name'          => $post['name'],
        'desc'          => $post['desc'],
        'owner_id'      => $this->session->userdata('user_id'),
        'owner_name'    => $this->session->userdata('name'),
        'created_date'  => date("Y-m-d H:i:s")
      ];


      $this->Class_m->createClass($inp);
      $id = $this->aes->redmoon($this->db->insert_id());

      $ret = array_merge($inp, ['cls_id' => $id]);

      if ($this->db->trans_status() !== FALSE) {
        $this->db->trans_commit();
        echo json_encode(['status' => 'success', 'data' => $ret], true);
      } else {
        $this->db->trans_rollback();
        echo json_encode(['status' => 'failed'], true);
      }
    } else {
      echo json_encode(['status' => 'failed'], true);
    }
  }


  public function rate($enc)
  {
    $awr_id = $this->aes->bluesun($enc);

    $data['awr_id'] = $enc;
    $data['det'] = $this->Class_m->getAnswer("", "", $awr_id)->row_array();
    $data['cls_id'] = $this->aes->redmoon($data['det']['cls_id']);
    $data['com'] = $this->Class_m->getComment($data['det']['assignment_id'], "Tugas")->result_array();

    $this->template("pengajar/v_rate", "Nilai", $data);
  }

  public function submitRate()
  {

    $post = $this->input->post();
    $awr = $this->aes->bluesun($post['awr_id']);

    $this->Pengajar_m->updateAnswer($awr, ['grade' => $post['nilai']]);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengisi penilaian');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengisi penilaian');
    }
    redirect('pengajar/kelas/' . $post['cls_id']);
  }

  public function detailPost($type, $enc)
  {
    $x = explode(".", $enc);
    $cls = $this->aes->bluesun($x[0]);
    $id = $this->aes->bluesun($x[1]);

    $data['cls_id'] = $x[0];
    $data['detail'] = $this->Class_m->getTopic($cls, $type, $id)->row_array();
    $data['com'] = $this->Class_m->getComment($id, $type)->result_array();

    switch ($type) {
      case 'Tugas':
        $data['pth'] = "assignment";
        break;
      case 'Materi':
        $data['pth'] = "subject";
        break;
      default:
        $data['pth'] = "info";
        $data['com'] = [];
        break;
    }

    $this->template("pengajar/v_detail_post", "Detail Post", $data);
  }
}
