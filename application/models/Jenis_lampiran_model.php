<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_lampiran_model extends CI_Model {

	private $table= 'jenis_lampiran';

	function get_data($jenis_lampiran_untuk = null)
	{
		$this->db->where('jenis_lampiran_untuk', $jenis_lampiran_untuk);
		$this->db->order_by('nama_jenis_lampiran', 'asc');
		return $this->db->get($this->table);
	}

	function get_by_id($id)
	{
		$this->db->where('id_jenis_lampiran', $id);
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

/* End of file Jenis_lampiran_model.php */
/* Location: ./application/models/Jenis_lampiran_model.php */