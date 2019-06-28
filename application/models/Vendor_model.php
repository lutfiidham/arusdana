<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends CI_Model {

		private $table= 'vendor';

	function get_data()
	{
		$this->db->select('c.id_vendor,nama_vendor,alamat_vendor,city_name,province_name,status_vendor,(select count(*) from lampiran_vendor where lampiran_vendor.id_vendor = c.id_vendor) as lampiran');
		$this->db->join('city cy', 'c.city_id = cy.city_id');
		$this->db->join('province pr', 'cy.province_id = pr.province_id');
		return $this->db->get($this->table.' c');
	}

	function get_data_lampiran($id_vendor=null)
	{
		$this->db->select('*');
		$this->db->from('lampiran_vendor');
		$this->db->where('id_vendor', $id_vendor);
		$this->db->order_by('file_lampiran', 'asc');
		return $this->db->get();
	}

	function get_data_tipe_vendor()
	{
		$this->db->where('status_tipe_vendor', 'A');
		$this->db->order_by('nama_tipe_vendor', 'asc');
		return $this->db->get('tipe_vendor');
	}

	function get_data_province()
	{
		$this->db->order_by('province_name', 'asc');
		return $this->db->get('province');
	}

	function get_data_city($province_id)
	{
		$this->db->select('city_id,city_name');
		$this->db->where('province_id', $province_id);
		$this->db->order_by('city_name', 'asc');
		return $this->db->get('city');
	}

	function get_data_jenis_lampiran()
	{
		$this->db->where('status_jenis_lampiran', 'A');
		$this->db->where('jenis_lampiran_untuk', 'V');
		$this->db->order_by('nama_jenis_lampiran', 'asc');
		return $this->db->get('jenis_lampiran');
	}

	function get_data_sales()
	{
		$this->db->where('status_sales', 'A');
		$this->db->order_by('nik_sales', 'asc');
		return $this->db->get('sales');
	}

	function get_nama_jenis_lampiran($id_jenis_lampiran)
	{
		$this->db->select('nama_jenis_lampiran');
		$this->db->where('id_jenis_lampiran', $id_jenis_lampiran);
		return $this->db->get('jenis_lampiran')->row()->nama_jenis_lampiran;
	}

	function get_by_id($id)
	{
		$this->db->join('city cy', 'c.city_id = cy.city_id');
		$this->db->join('province pr', 'cy.province_id = pr.province_id');
		$this->db->where('id_vendor', $id);
		return $this->db->get($this->table.' c');
	}

	function save($data){
		$insert = $this->db->insert($this->table, $data);
		return $insert;
	}

	function save_lampiran($data){
		$insert = $this->db->insert('lampiran_vendor', $data);
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

	function delete_lampiran($where)
	{
		$this->db->where($where);
		$delete = $this->db->delete('lampiran_vendor');
		return $delete;
	}

}

/* End of file Vendor_model.php */
/* Location: ./application/models/Vendor_model.php */