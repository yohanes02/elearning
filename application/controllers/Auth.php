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
		$data['title'] = "Online Learning";
		$this->load->view("components/header", $data);
		$this->load->view("v_login");
		$this->load->view("components/footer");
	}

	public function login()
	{
		$email = $this->input->post('email_login');
		$pass = $this->input->post('password_login');

		$user = $this->Auth_m->getUser($email, $pass)->row_array();
		// print_r($user);
		// echo count($user);
		// die();
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
			// $this->template("murid/v_kelas", "Kelas", $data);
		} elseif ($type == 'teacher') {
			$data['name'] = $user['fullname'];
			redirect('pengajar');
			// $this->template("pengajar/v_kelas", "Kelas", $data);
		}


		// die();
		// redirect('murid');
	}

	public function createNewUser()
	{
		$post = $this->input->post();
		// print_r($post);
		// die();
		$ins = [
			'email'					=> $post['email'],
			'fullname'			=> $post['fullname'],
			'password'			=> $post['password'],
			'type'					=> $post['type'],
			'phone'					=> $post['phone'],
			'address'				=> $post['address'],
			'gender'				=> $post['gender'],
			'birthdate'			=> $post['birthdate'],
			'question_id'		=> $post['question'],
			'answer'				=> $post['answer']
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
		// $this->session->set_userdata('result', 'Akun berhasil dibuat');

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
		$data['title'] = "Online Learning - Forgot Password";
		$this->load->view("components/header", $data);
		$this->load->view("v_security_question");
		$this->load->view("components/footer");
	}

	public function new_pass()
	{
		$data['title'] = "Online Learning - New Password";
		$this->load->view("components/header", $data);
		$this->load->view("v_new_password");
		$this->load->view("components/footer");
	}
}
