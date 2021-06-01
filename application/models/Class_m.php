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


  public function getClassByStudent($user)
  {

    $this->db->where(['student_id' => $user]);
    $this->db->join("cls_main m", "p.cls_id=m.id", "left");

    return $this->db->get("cls_participant p");
  }


  public function getClassByTeacher($user)
  {

    $this->db->where(['owner_id' => $user]);

    return $this->db->get("cls_main");
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
}
