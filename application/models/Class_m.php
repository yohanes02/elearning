<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Class_m extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }


  public function getClass($id = "", $code = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($code)) {
      $this->db->where(['code' => $code]);
    }
    return $this->db->get("cls_main");
  }

  public function getClassByUser($user)
  {

    $this->db->where(['id' => $user]);

    return $this->db->get("cls_participant");
  }

  public function getClassByTeacher($user)
  {

    $this->db->where(['owner_id' => $user]);

    return $this->db->get("cls_main");
  }

  public function insertSubject($input)
  {
    $this->db->insert("cls_subject", $input);
    return $this->db->affected_rows();
  }

  public function insertAssignment($input)
  {
    $this->db->insert("cls_assignment", $input);
    return $this->db->affected_rows();
  }

  public function getAssignment($id = "", $cls = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($cls)) {
      $this->db->where(['cls' => $cls]);
    }
    return $this->db->get("cls_assignment");
  }

  public function getSubject($id = "", $cls = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($cls)) {
      $this->db->where(['cls' => $cls]);
    }
    return $this->db->get("cls_subject");
  }

  public function getTopic($cls = "", $type = "")
  {
    if (!empty($type)) {
      $this->db->where(['type' => $type]);
    }
    if (!empty($cls)) {
      $this->db->where(['cls_id' => $cls]);
    }
    return $this->db->get("vw_cls_topic");
  }

  public function updateSubject($id, $data)
  {
    $this->db->where(['id' => $id])->update("cls_subject", $data);
    return $this->db->affected_rows();
  }
}
