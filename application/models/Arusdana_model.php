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
		$query = "
			select 'arus_dana' as jenis, id_arus_dana as id, tanggal, no_arus_dana as nomor, uk.nama_unit_kerja, kt.nama_kategori,an.kode_anggaran, an.nama_anggaran, periode_pelaksanaan, 'W' as status_realisasi
			from arus_dana a
			left join unit_kerja uk on a.id_unit_kerja = uk.id_unit_kerja
			left join anggaran an on a.id_anggaran = an.id_anggaran
			left join kategori kt on a.id_kategori = kt.id_kategori
			where a.id_bagian = ? and id_permintaan is null
			UNION
			select 'permintaan' as jenis, id_permintaan as id, tanggal, no_anggaran as nomor,  uk.nama_unit_kerja, kt.nama_kategori,an.kode_anggaran, an.nama_anggaran, NULL as periode_pelaksanaan, status_realisasi
			from permintaan_anggaran pa
			left join unit_kerja uk on pa.id_unit_kerja = uk.id_unit_kerja
			join anggaran an on pa.id_anggaran = an.id_anggaran
			left join kategori kt on pa.id_kategori = kt.id_kategori
			where pa.id_bagian = ?
			order by 2
		";
		return $this->db->query($query,[$idBagian,$idBagian]);
		// $this->db->select('pa.*,uk.nama_unit_kerja,an.kode_anggaran, an.nama_anggaran,kt.nama_kategori');
		// $this->db->join('unit_kerja uk', 'pa.id_unit_kerja = uk.id_unit_kerja');
		// $this->db->join('anggaran an', 'pa.id_anggaran = an.id_anggaran');
		// $this->db->join('kategori kt', 'kt.id_kategori = pa.id_kategori');
		// $this->db->where('pa.id_bagian', $idBagian);
		// return $this->db->get('permintaan_anggaran pa');
	}

	public function getAnggaran($idPermintaan)
	{
		return $this->db->where('id_permintaan', $idPermintaan)->get('permintaan_anggaran');
	}

	function get_by_id($id,$jenis)
	{
		if ($jenis=='arus_dana') {
			$this->db->select('*');
			$this->db->where('id_arus_dana', $id);
			return $this->db->get('arus_dana');
		}
		$this->db->select('permintaan_anggaran.*');
		// $this->db->join('arus_dana', 'permintaan_anggaran.id_permintaan = arus_dana.id_permintaan', 'left');
		$this->db->where('id_permintaan', $id);
		return $this->db->get('permintaan_anggaran');
		// var_dump($this->db->last_query());
	}

	function get_by_permintaan($id)
	{
		$this->db->select('*');
		$this->db->where('id_permintaan', $id);
		return $this->db->get('arus_dana');
	}

	function get_detail_permintaan($id,$jenis)
	{
		if ($jenis=='permintaan') {
			$this->db->select('id_arus_dana');
			$this->db->where('id_permintaan', $id);
			$id_arus_dana = $this->db->get('arus_dana')->row();
			if (isset($id_arus_dana)) {
				$this->db->where('id_arus_dana', $id_arus_dana->id_arus_dana);
				return $this->db->get('detail_arus_dana');
			}
			return $this->db->query('select uraian, NULL as penerimaan, NULL as pengeluaran, NULL as keterangan from detail_permintaan_anggaran where id_permintaan = ?',[$id]);
		}
		$this->db->where('id_arus_dana', $id);
		return $this->db->get('detail_arus_dana');
	}

	function get_detail_arus_dana($id_arus_dana)
	{
		$this->db->where('id_arus_dana', $id_arus_dana);
		return $this->db->get('detail_arus_dana');
	}

	function get_pembuat($id_pj)
	{
		$this->db->where('id_pj', $id_pj);
		return $this->db->get('pemegang_jabatan');
	}

	function get_detil_anggaran($id_anggaran)
	{
		$this->db->select('*');
		$this->db->from('anggaran');
		$this->db->where('id_anggaran', $id_anggaran);
		return $this->db->get()->row();
	}

	function get_list_ttd($bbm)
	{
		if ($bbm == 1) {
			$this->db->where('dokumen', 'reimburse');
		}else{
			$this->db->where('dokumen', 'realisasi');
		}
		return $this->db->get('tanda_tangan')->row();
	}

	function get_arusdana_by_id($id_arus_dana)
	{
		$this->db->where('id_arus_dana', $id_arus_dana);
		return $this->db->get('arus_dana')->row();
	}

	function get_id_arusdana($id_permintaan)
	{
		$this->db->select('id_arus_dana');
		$this->db->where('id_permintaan', $id_permintaan);
		return $this->db->get('arus_dana')->row();
	}

	public function storeArusDana($arusDana)
	{
		$this->db->insert($this->table, $arusDana);
		return $this->db->insert_id();
	}

	function updatePermintaanStatus($idPermintaan, $status = 'W')
	{
		return $this->db->update('permintaan_anggaran', ['status_realisasi' => $status], ['id_permintaan' => $idPermintaan]);
	}

	public function storeChildArusDana($items)
	{
		return $this->db->insert('detail_arus_dana', $items);
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
		$delete = $this->db->delete('detail_arus_dana');
		return $delete;
	}

	function insert_detil($data)
	{
		$insert = $this->db->insert('detail_arus_dana', $data);
		return $insert;
	}

	function update($where,$data){
		$this->db->where($where);
		$update = $this->db->update($this->table, $data);
		return $update;
	}


}

/* End of file Arusdana_model.php */
/* Location: ./application/models/Arusdana_model.php */