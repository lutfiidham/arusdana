<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_anggaran_model extends CI_Model {

	private $table= 'permintaan_anggaran';

	function get_data()
	{
		$this->db->select('format_kode_project(id_project) as kode_project,nama_project,nama_customer, project_start_date,project_end_date,status_project, (select count(id_detil) from project_detil where id_project = project.id_project) as jumlah_detil, id_project,tgl_pengisian_tender');
		$this->db->join('customer', 'customer.id_customer = project.id_customer');
		$this->db->where('project_deleted', 0);
		return $this->db->get('project');
	}

	function get_detail_permintaan($id_permintaan)
	{
		$this->db->select('id_detail_permintaan,uraian,nominal,keterangan');
		$this->db->where('id_permintaan', $id_permintaan);
		return $this->db->get('detail_permintaan_anggaran');
	}


	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id_permintaan', $id);
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

	function insert_detil($data)
	{
		$insert = $this->db->insert('detail_permintaan_anggaran', $data);
		return $insert;
	}

	function delete_detil($where)
	{
		$this->db->where($where);
		$delete = $this->db->delete('detail_permintaan_anggaran');
		return $delete;
	}

	function get_unit_kerja()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('status', 'A');
		$this->db->order_by('nama_unit_kerja');
		return $this->db->get('unit_kerja');
	}

	function get_kategori()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('status', 'A');
		$this->db->order_by('nama_kategori');
		return $this->db->get('kategori');
	}

	function get_anggaran()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('status', 'A');
		$this->db->order_by('kode_anggaran');
		return $this->db->get('anggaran');
	}

	function get_nomor_anggaran_baru($tanggal,$id_unit_kerja,$id_kategori)
	{
		$q = 'select generate_no_anggaran(?,?,?) as res';

		$result = $this->db->query($q,[$tanggal,$id_unit_kerja,$id_kategori]);

		return $result->row()->res;
	}




}

/* End of file Project_model.php */
/* Location: ./application/models/Project_model.php */