<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian_model extends CI_Model {

	private $table= 'bagian';
	private $primary_key= 'id_bagian';

	function get_data()
	{
		$this->db->order_by('nama_bagian', 'asc');
		return $this->db->get($this->table);
	}

	function get_by_id($id)
	{
		$this->db->where('id_bagian', $id);
		return $this->db->get($this->table);
	}

	function save($data){
		$insert = $this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		$this->db->insert('tanda_tangan', ['id_bagian' => $id,'dokumen' => 'permintaan']);
		$this->db->insert('tanda_tangan', ['id_bagian' => $id,'dokumen' => 'realisasi']);
		$this->db->insert('tanda_tangan', ['id_bagian' => $id,'dokumen' => 'reimburse']);
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

	function cek_kode_bagian($kode_bagian)
	{		
		$this->db->where('kode_bagian', $kode_bagian);
		$cek = $this->db->get($this->table)->num_rows();
		// echo $this->db->last_query();
		if ($cek>0) {
			return "Kode sudah dipakai data lain";
		}
		return "true";
	}

}

/* End of file Jenis_lampiran_model.php */
/* Location: ./application/models/Jenis_lampiran_model.php */