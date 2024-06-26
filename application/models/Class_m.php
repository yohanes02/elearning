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
      $rawGetOwner = "SELECT owner_id from cls_main where id = $id";
      $execQuery = $this->db->query($rawGetOwner);
      // print_r($execQuery->row_array());
      // die();
      $result = $execQuery->row_array();
      $ownerId = $result['owner_id'];
      
      $rawQuery = "SELECT a.*, b.picture FROM `cls_main` a, `adm_user` b where a.id =  $id and a.owner_id = $ownerId and a.owner_id = b.id";
      // $this->db->where(['id' => $id]);
      $execQuery1 = $this->db->query($rawQuery);
      // $this->db->where(['id' => $id]);
      return $execQuery1;
    }
    if (!empty($code)) {
      $this->db->where(['code' => $code]);
      return $this->db->get("cls_main");
    }
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


  public function getTopic($cls = "", $type = "", $id = "")
  {
    if (!empty($type)) {
      $this->db->where(['type' => $type]);
    }
    if (!empty($cls)) {
      $this->db->where(['cls_id' => $cls]);
    }
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    return $this->db->get("vw_cls_topic");
  }


  public function getParticipant($std, $cls)
  {
    if (!empty($std)) {
      $this->db->where(['student_id' => $std]);
    }
    if (!empty($cls)) {
      $this->db->where(['cls_id' => $cls]);
    }

    $this->db->join("adm_user u",  "u.id=p.student_id", "left");
    return $this->db->get("cls_participant p");
  }


  public function createClass($inp)
  {
    $this->db->insert("cls_main", $inp);
    return $this->db->affected_rows();
  }


  public function getAnswer($cls = "", $asg = "", $awr = "")
  {
    $this->db->select("*, 
      a.id as awr_id,
      a.attachment as awr_file,
      g.attachment as asg_file,
      CASE
        WHEN grade IS NOT NULL THEN
          'graded' 
        ELSE 'turned in' 
      END AS status ");

    if (!empty($asg)) {
      $this->db->where(['assignment_id' => $asg]);
    }
    if (!empty($cls)) {
      $this->db->where(['a.cls_id' => $cls]);
    }
    if (!empty($awr)) {
      $this->db->where(['a.id' => $awr]);
    }

    $this->db->join("cls_assignment g",  "g.id=a.assignment_id", "left");
    return $this->db->get("cls_answer a");
  }


  public function getComment($id, $type)
  {
    if ($type == "Tugas") {
      $this->db->where(['tgs_id' => $id]);
    } else {
      $this->db->where(['mtr_id' => $id]);
    }
    return $this->db->get('komentar');
  }
}
