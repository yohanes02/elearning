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
}
