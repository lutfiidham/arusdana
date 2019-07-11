<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_kerja_model extends CI_Model {

	private $table= 'unit_kerja';
	private $primary_key= 'id_unit_kerja';

	function get_data()
	{
		$this->db->order_by('nama_unit_kerja', 'asc');
		return $this->db->get($this->table);
	}

	function get_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
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

	function generate_id()
	{
		$this->db->select_max($this->primary_key);
	    $result= $this->db->get($this->table)->row_array();
	    return $result[$this->primary_key];
	}

}

/* End of file Jenis_lampiran_model.php */
/* Location: ./application/models/Jenis_lampiran_model.php */