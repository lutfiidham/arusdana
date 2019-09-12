<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $table= 'user';
	private $primary_key= 'user_id';

	function get_data()
	{
		$this->db->join('bagian', $this->table.'.id_bagian = bagian.id_bagian');
		$this->db->order_by('nama_admin', 'asc');
		return $this->db->get($this->table);
	}

	function get_by_id($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get($this->table);
	}

	function save($data){
		$insert = $this->db->insert($this->table, $data);
		return $insert;
	}

	function update($where,$data){
		$this->db->where($where);
		$update = $this->db->update($this->table, $data);
		return $update;
	}

	function delete($where)
	{
		$this->db->where($where);
		$delete = $this->db->delete($this->table);
		return $delete;
	}

	function get_bagian()
	{
		$this->db->where('status_bagian', 'A');
		$this->db->order_by('nama_bagian', 'asc');
		return $this->db->get('bagian');
	}

	function generate_id()
	{
		$this->db->select_max($this->primary_key);
	    $result= $this->db->get($this->table)->row_array();
	    return $result[$this->primary_key];
	}

	function cek_username($username,$user_id)
	{	
		if ($user_id=="") {
			$cek = $this->db->where('username', $username)->get($this->table)->num_rows();
			if ($cek>0) {
				return "Kode sudah dipakai";
			} else{
				return "true";
			}
		}

		$this->db->where('user_id !=', $user_id);
		$this->db->where('username', $username);
		$cek = $this->db->get($this->table)->num_rows();
		// echo $this->db->last_query();
		if ($cek>0) {
			return "Kode sudah dipakai data lain";
		}
		return "true";
	}

	function cek_username_profil($username)
	{	
		if ($username == $this->session->userdata('username')) {
			return true;
		}
		$cek = $this->db->where('username', $username)->get($this->table)->num_rows();
		if ($cek>0) {
			return "Username sudah dipakai";
		} else{
			return "true";
		}

	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */