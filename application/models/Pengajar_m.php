<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pengajar_m extends CI_Model
{

  function __construct()
  {
    parent::__construct();
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
      $this->db->where(['cls_id' => $cls]);
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


  public function updateSubject($id, $data)
  {
    $this->db->where(['id' => $id])->update("cls_subject", $data);
    return $this->db->affected_rows();
  }


  public function deleteSubject($id)
  {
    $this->db->where(['id' => $id])->delete("cls_subject");
    return $this->db->affected_rows();
  }


  public function deleteAssignment($id)
  {
    $this->db->where(['id' => $id])->delete("cls_assignment");
    return $this->db->affected_rows();
  }


  public function updateAssignment($id, $data)
  {
    $this->db->where(['id' => $id])->update("cls_assignment", $data);
    return $this->db->affected_rows();
  }

  public function updateProfile($id, $data) {
    $this->db->where(['id' => $id])->update("adm_user", $data);
    return $this->db->affected_rows();
  }
}
