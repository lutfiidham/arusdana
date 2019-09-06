<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran_model extends CI_Model {

	private $table= 'anggaran';
	private $primary_key= 'id_anggaran';

	function get_data($tahun)
	{
		if ($tahun == '') {
			$tahun = date('Y');
		}
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'), FALSE);
		$this->db->where('tahun', $tahun, FALSE);
		$this->db->order_by('kode_anggaran', 'asc');
		return $this->db->get($this->table);
	}

	function get_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table);
	}

	function save($data){
		$ada = $this->check_kode_anggaran($data)->num_rows();
		if ($ada) {
			return 0;
		}else {
			return $this->db->insert($this->table, $data);
		}
	}

	function check_kode_anggaran($data)
	{
		$this->db->where('kode_anggaran', $data['kode_anggaran']);
		$this->db->where('id_bagian', $data['id_bagian']);
		$this->db->where('tahun', $data['tahun']);
		return $this->db->get($this->table);
	}

	function cek_kode_anggaran($kode_anggaran,$tahun)
	{		
		$this->db->where('kode_anggaran', $kode_anggaran);
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('tahun', $tahun);
		$cek = $this->db->get($this->table)->num_rows();
		// echo $this->db->last_query();
		if ($cek>0) {
			return "Kode sudah dipakai data lain di tahun yang sama";
		}
		return "true";
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