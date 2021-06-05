<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Murid_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getTeacherData($id)
  {
    $this->db->where(['id' => $id]);
    return $this->db->get('cls_main');
  }

  public function getClassByStudent()
  {
    $student_id = $this->session->userdata('user_id');
    $queryRaw = "SELECT b.* FROM cls_participant a, cls_main b WHERE a.student_id = $student_id and a.cls_id = b.id";
    // echo $queryRaw;
    return $this->db->query($queryRaw);
  }

  public function getClassParticipant($cls_id)
  {
    // $student_id = $this->session->userdata('user_id');
    $queryRaw = "SELECT * FROM `cls_participant`a, `cls_main` b, `adm_user` c WHERE a.cls_id = $cls_id and a.student_id = c.id and  a.cls_id = b.id";
    return $this->db->query($queryRaw);
  }

  public function getClassByCode($class_code) 
  {
    $this->db->where(['code' => $class_code]);
    return $this->db->get('cls_main');
  }

  public function joiningClass($input) {
    $this->db->insert("cls_participant", $input);
    return $this->db->affected_rows();
  }

  public function updateProfile($id, $data) {
    $this->db->where(['id' => $id])->update("adm_user", $data);
    return $this->db->affected_rows();
  }

  public function insertAnswer($input) {
    $this->db->insert("cls_answer", $input);
    return $this->db->affected_rows();
  }

  public function getAnswer($tgs_id, $std_id) {
    $this->db->where(['student_id' => $std_id, 'assignment_id' => $tgs_id]);
    return $this->db->get('cls_answer');
  }

  public function updateAnswer($id, $data) {
    $this->db->where(['id' => $id])->update("cls_answer", $data);
    return $this->db->affected_rows();
  }

  public function submitAnswer($id, $data) {
    $this->db->where(['id' => $id])->update("cls_answer", $data);
    return $this->db->affected_rows();
  }

  public function getAllAnswer($id, $cls_id) {
    $this->db->where(['student_id' => $id, 'cls_id' => $cls_id]);
    return $this->db->get('cls_answer');
  }

  public function insertKomentar($input) {
    $this->db->insert("komentar", $input);
    return $this->db->affected_rows();
  }

  public function getKomentar($id, $type) {
    if($type == 1) {
      $this->db->where(['tgs_id' => $id]);
    } else {
      $this->db->where(['mtr_id' => $id]);
    }
    return $this->db->get('komentar');
  }
}
