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
}
