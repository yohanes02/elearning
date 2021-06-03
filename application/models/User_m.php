<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


	public function getUser($id)
	{
	}

	public function getProfile($id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->get("adm_user");
	}

  public function checkOldPassword($id, $pass) {
    $this->db->where(['id'=> $id, 'password'=> $pass]);
    return $this->db->get('adm_user');
  }

  public function changePassword($id, $data) {
    $this->db->where(['id' => $id])->update("adm_user", $data);
    return $this->db->affected_rows();
  }
}
