<?php

use function PHPSTORM_META\type;

class Auth extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('auth_model');
    $this->load->model(['Auth_m']);
    $this->load->library('email');
    // $this->load->helper("security");
  }

  public function index()
  {
    if ($this->session->userdata('type') == 'teacher') {
      redirect('pengajar');
    } elseif ($this->session->userdata('type') == 'student') {
      redirect('murid');
    } else {
      $this->session->sess_destroy();
      $security = $this->Auth_m->getSecurityQuestion()->result_array();
      $data['title'] = "Online Learning";
      $data['security_question'] = $security;
      // print_r($security);
      // die();
      $this->load->view("components/header", $data);
      $this->load->view("v_login");
      $this->load->view("components/footer");
    }
  }

  public function login()
  {


    $validation_config = array(
      array(
        'field' => 'email_login',
        'label' => 'Email',
        'rules' => 'required'
      ),
      array(
        'field' => 'password_login',
        'label' => 'Password',
        'rules' => 'required'
      ),
    );
    // $this->form_validation->set_rules('email_login', 'Email', 'required');
    // $this->form_validation->set_rules('password_login', 'Password', 'required');
    $this->form_validation->set_rules($validation_config);

    if ($this->form_validation->run() == false) {
      $this->session->set_userdata('err_login_form', 'Email dan password harus diisi.');
      redirect('auth');

      // $data['title'] = "Online Learning";
      // $this->load->view("components/header", $data);
      // $this->load->view("v_login");
      // $this->load->view("components/footer");
    } else {
      $email = $this->input->post('email_login');
      $pass = md5($this->input->post('password_login'));

      $user = $this->Auth_m->getUser($email, $pass)->row_array();

      if (empty($user)) {
        $this->session->set_userdata('login', 'Email dan password tidak cocok. Silahkan cek kembali');
        redirect('auth');
      }

      if ($user['type'] == 's') {
        $type = 'student';
      } else {
        $type = 'teacher';
      }

      $data_session = array(
        'user_id' => $user['id'],
        'type' => $type,
        'name' => $user['fullname']
      );

      $this->session->set_userdata($data_session);

      if ($type == 'student') {
        $data['name'] = $user['fullname'];
        redirect('murid');
      } elseif ($type == 'teacher') {
        $data['name'] = $user['fullname'];
        redirect('pengajar');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }

  public function createNewUser()
  {
    $post = $this->input->post();

    $birthdate_str = strtotime($post['birthdate']);
    $birthdate = date('Y-m-d', $birthdate_str);

    $ins = [
      'email'          => $post['email'],
      'fullname'      => $post['fullname'],
      'password'      => md5($post['password']),
      'type'          => $post['type'],
      'phone'          => $post['phone'],
      'address'        => $post['address'],
      'gender'        => $post['gender'],
      'birthdate'      => $birthdate,
      'question_id'    => $post['question'],
      'answer'        => $post['answer'],
      'created_date'  => date("Y-m-d H:i:s")
    ];

    $this->db->trans_begin();

    $this->Auth_m->createUser($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses membuat akun');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal membuat akun');
    }

    redirect('auth');
  }

  public function forgot_pass()
  {
    $data['title'] = "Online Learning - Forgot Password";
    $this->load->view("components/header", $data);
    $this->load->view("v_forgot_password");
    $this->load->view("components/footer");
  }

  public function security_question()
  {
    $id = $this->session->userdata('question_id');
    if (empty($id)) {
      redirect('auth/forgot_pass');
    }
    $getQuestion = $this->Auth_m->getQuestion($id)->row_array();
    $data['title'] = "Online Learning - Forgot Password";
    $data['question'] = $getQuestion['question'];
    $this->load->view("components/header", $data);
    $this->load->view("v_security_question");
    $this->load->view("components/footer");
  }

  public function new_pass()
  {
    $question_id = $this->session->userdata('question_id');
    $right_answer = $this->session->userdata('right_answer');
    if (empty($question_id)) {
      redirect('auth/forgot_pass');
    }
    if (!empty($question_id) && empty($right_answer)) {
      redirect('auth/security_question');
    }
    $data['title'] = "Online Learning - New Password";
    $this->load->view("components/header", $data);
    $this->load->view("v_new_password");
    $this->load->view("components/footer");
  }

  public function checkAccount($type)
  {
    if ($type == 1) {
      $email = $this->input->post('email');
      $checkAccount = $this->Auth_m->getUserByEmail($email)->row_array();
      // print_r($checkAccount);
      // die();

      if (!empty($checkAccount)) {
        $question_id = $checkAccount['question_id'];
        $user_id = $checkAccount['id'];
        $this->session->set_userdata('question_id', $question_id);
        $this->session->set_userdata('user_id', $user_id);
        redirect('auth/security_question');
      }
    } elseif ($type == 2) {
      $id = $this->session->userdata('user_id');
      $getAnswer = $this->Auth_m->getUserById($id)->row_array();
      $answer = $this->input->post('answer');

      // echo $answer . " -- " . $getAnswer['answer'];
      // die();

      if ($getAnswer['answer'] == $answer) {
        $this->session->set_userdata('right_answer', 'true');
        redirect('auth/new_pass');
      }
    }
  }

  public function changePassword()
  {
    $user_id = $this->session->userdata('user_id');

    $post = $this->input->post();

    $password = md5($post['new_pass']);

    $this->db->trans_begin();

    $this->Auth_m->changePassword($user_id, $password);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      redirect('auth');
      // $this->session->set_userdata('result', 'Sukses mengubah materi');
    } else {
      $this->db->trans_rollback();
      // $this->session->set_userdata('result', 'Gagal mengubah materi');
    }
  }
}
