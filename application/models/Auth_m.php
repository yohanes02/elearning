<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function createUser($input)
  {
    // print_r($input);
    $this->db->insert("adm_user", $input);
    return $this->db->affected_rows();
  }

  public function getUser($email, $password)
  {
    $this->db->where(['email' => $email, 'password' => $password]);
    return $this->db->get("adm_user");
  }

  public function getSecurityQuestion()
  {
    return $this->db->get("adm_question");
  }

  public function getUserByEmail($email)
  {
    $this->db->where(['email' => $email]);
    return $this->db->get("adm_user");
  }

  public function getUserById($id)
  {
    $this->db->where(['id' => $id]);
    return $this->db->get("adm_user");
  }

  public function getQuestion($id)
  {
    $this->db->where(['id' => $id]);
    return $this->db->get("adm_question");
  }

  public function changePassword($id, $password)
  {
    $this->db->set(['password' => $password]);
    $this->db->where(['id' => $id])->update('adm_user');
  }
}
