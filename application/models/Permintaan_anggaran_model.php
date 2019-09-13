<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_anggaran_model extends CI_Model {

	private $table= 'permintaan_anggaran';

	function get_data($start, $end, $id_unit_kerja)
	{
		
		if (is_null($start)) $start = date_create(date('Y/m/d'))->modify('-30 days')->format('Y-m-d');
		if (is_null($end)) $end = date('Y/m/d');

		$this->db->select('pa.*,uk.nama_unit_kerja,an.nama_anggaran,an.kode_anggaran,kt.nama_kategori');
		$this->db->join('unit_kerja uk', 'pa.id_unit_kerja = uk.id_unit_kerja', 'left');
		$this->db->join('anggaran an', 'pa.id_anggaran = an.id_anggaran');
		$this->db->join('kategori kt', 'kt.id_kategori = pa.id_kategori', 'left');
		$this->db->where('pa.id_bagian', $this->session->userdata('id_bagian'));
		// if ($tanggal!="") {
		// 	$date_arr = $this->pecah_daterange($tanggal);
		// 	$this->db->where('tanggal >=', $date_arr[0]);
		// 	$this->db->where('tanggal <=', $date_arr[1]);
		// }
		if ($id_unit_kerja != 'semua') {
			if ($id_unit_kerja != '') {
				$this->db->where('pa.id_unit_kerja', $id_unit_kerja);
			}
		}
		$this->db->where('tanggal >=', $start);
		$this->db->where('tanggal <=', $end);
		$this->db->order_by('id_permintaan', 'desc');
		return $this->db->get($this->table.' pa');
		// var_dump($this->db->last_query());
	}

	function get_data_laporan($tanggal = "")
	{
		$this->db->select('pa.*,uk.nama_unit_kerja,an.nama_anggaran,an.kode_anggaran,kt.nama_kategori,dpa.uraian,dpa.nominal,dpa.keterangan');
		$this->db->from('detail_permintaan_anggaran dpa');
		$this->db->join('permintaan_anggaran pa', 'dpa.id_permintaan = pa.id_permintaan');
		$this->db->join('unit_kerja uk', 'pa.id_unit_kerja = uk.id_unit_kerja');
		$this->db->join('anggaran an', 'pa.id_anggaran = an.id_anggaran');
		$this->db->join('kategori kt', 'kt.id_kategori = pa.id_kategori');
		$this->db->where('pa.id_bagian', $this->session->userdata('id_bagian'));
		if ($tanggal!="") {
			$date_arr = $this->pecah_daterange($tanggal);
			$this->db->where('tanggal >=', $date_arr[0]);
			$this->db->where('tanggal <=', $date_arr[1]);
		}
		$this->db->order_by('id_permintaan', 'asc');
		return $this->db->get();
	}

	function get_detail_permintaan($id_permintaan)
	{
		$this->db->select('id_detail_permintaan,uraian,nominal,keterangan');
		$this->db->where('id_permintaan', $id_permintaan);
		return $this->db->get('detail_permintaan_anggaran');
	}

	function get_detil_anggaran($id_anggaran)
	{
		$this->db->select('*');
		$this->db->from('anggaran');
		$this->db->where('id_anggaran', $id_anggaran);
		return $this->db->get()->row();
	}

	function get_list_ttd()
	{
		$this->db->where('dokumen', 'permintaan');
		return $this->db->get('tanda_tangan')->row();
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

	function delete_detail($where)
	{
		$this->db->where($where);
		$delete = $this->db->delete('detail_permintaan_anggaran');
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

	function get_nomor_anggaran_baru($tanggal,$id_unit_kerja=null,$id_kategori)
	{
		$q = 'select generate_no_anggaran(?,?,?,?,?) as res';

		$result = $this->db->query($q,[$tanggal,$id_unit_kerja,$id_kategori,$this->session->userdata('kode_bagian'),$this->session->userdata('id_bagian')]);
		var_dump($this->db->last_query());
		return $result->row()->res;
	}

	function pecah_daterange($date)
	{	
		if ($date=="") {
			return null;
		}
		$this->load->helper('my_helper');
		$date_arr = explode(" s.d. ", $date);
		$date_arr[0] = to_date_format_mysql($date_arr[0]);		
		$date_arr[1] = to_date_format_mysql($date_arr[1]);
		return $date_arr;		
	}




}

/* End of file Permintaan_anggaran_model.php */
/* Location: ./application/models/Permintaan_anggaran_model.php */