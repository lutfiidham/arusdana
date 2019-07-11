<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $table= 'user';
	private $primary_key= 'user_id';

	function get_data()
	{
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
		$this->db->order_by('nama_bagian', 'asc');
		return $this->db->get('bagian');
	}

	function generate_id()
	{
		$this->db->select_max($this->primary_key);
	    $result= $this->db->get($this->table)->row_array();
	    return $result[$this->primary_key];
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */