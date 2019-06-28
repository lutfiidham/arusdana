<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function get_data_admin_by_username($username)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		return $this->db->get('admin');
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */