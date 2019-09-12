<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function get_data_admin_by_username($username)
	{
		$this->db->select('user.*, kode_bagian, nama_bagian');
		$this->db->where('username', $username);
		$this->db->join('bagian', 'user.id_bagian = bagian.id_bagian', 'left');
		return $this->db->get('user');
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */