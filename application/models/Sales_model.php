<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

	private $table= 'sales';

	function get_data_jabatan()
	{
		$this->db->where('status_jabatan', 'A');
		$this->db->order_by('nama_jabatan', 'asc');
		return $this->db->get('jabatan');
	}

	function get_data()
	{
		$this->db->join('jabatan', 'sales.id_jabatan = jabatan.id_jabatan');
		$this->db->order_by('nik_sales', 'asc');
		return $this->db->get($this->table);
	}

	function nik_exist($nik,$for="insert",$id_sales_sekarang=null)
	{
		if ($for=='update') {
			$this->db->where('id_sales !=', $id_sales_sekarang);
		}
		$this->db->where('nik_sales', $nik);
		$ada =  $this->db->get($this->table)->num_rows() > 0 ? true:false;
		return $ada;
	}

	function get_by_id($id)
	{
		$this->db->where('id_sales', $id);
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

/* End of file Sales_model.php */
/* Location: ./application/models/Sales_model.php */