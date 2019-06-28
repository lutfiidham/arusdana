<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_customer_model extends CI_Model {

	private $table= 'tipe_customer';

	function get_data()
	{
		$this->db->order_by('nama_tipe_customer', 'asc');
		return $this->db->get('tipe_customer');
	}

	function get_by_id($id)
	{
		$this->db->where('id_tipe_customer', $id);
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

}

/* End of file Tipe_customer_model.php */
/* Location: ./application/models/Tipe_customer_model.php */