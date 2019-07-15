<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arusdana_model extends CI_Model {

	protected $table = 'arus_dana';

	public function __construct()
	{
		parent::__construct();
	}

	public function getData($idBagian)
	{
		$this->db->select('pa.*,uk.nama_unit_kerja,an.kode_anggaran, an.nama_anggaran,kt.nama_kategori');
		$this->db->join('unit_kerja uk', 'pa.id_unit_kerja = uk.id_unit_kerja');
		$this->db->join('anggaran an', 'pa.id_anggaran = an.id_anggaran');
		$this->db->join('kategori kt', 'kt.id_kategori = pa.id_kategori');
		$this->db->where('pa.id_bagian', $idBagian);
		return $this->db->get('permintaan_anggaran pa');
	}

	public function getAnggaran($idPermintaan)
	{
		return $this->db->where('id_permintaan', $idPermintaan)->get('permintaan_anggaran');
	}

	function get_by_permintaan($id)
	{
		$this->db->select('*');
		$this->db->where('id_permintaan', $id);
		return $this->db->get('arus_dana');
	}

	function get_detail_permintaan($id_permintaan)
	{
		$this->db->select('id_detail_permintaan,uraian,nominal,keterangan');
		$this->db->where('id_permintaan', $id_permintaan);
		return $this->db->get('detail_permintaan_anggaran');
	}

	function get_detail_arus_dana($id_arus_dana)
	{
		$this->db->where('id_arus_dana', $id_arus_dana);
		return $this->db->get('detail_arus_dana');
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
		$this->db->where('dokumen', 'realisasi');
		return $this->db->get('tanda_tangan')->row();
	}

	public function storeArusDana($arusDana)
	{
		$this->db->insert($this->table, $arusDana);
		$this->db->update('permintaan_anggaran', ['status_realisasi' => 'W'], ['id_permintaan' => $arusDana->id_permintaan]);
		return $this->db->insert_id();
	}

	public function storeChildArusDana($items)
	{
		return $this->db->insert('detail_arus_dana', $items);
	}


}

/* End of file Arusdana_model.php */
/* Location: ./application/models/Arusdana_model.php */