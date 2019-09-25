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
			SELECT 'permintaan' AS jenis, id_permintaan AS id, tanggal, no_anggaran AS nomor,  uk.nama_unit_kerja, kt.nama_kategori,an.kode_anggaran, an.nama_anggaran, NULL AS periode_pelaksanaan, status_realisasi
			FROM permintaan_anggaran pa
			LEFT JOIN unit_kerja uk ON pa.id_unit_kerja = uk.id_unit_kerja
			JOIN anggaran an ON pa.id_anggaran = an.id_anggaran
			LEFT JOIN kategori kt ON pa.id_kategori = kt.id_kategori
			WHERE pa.id_bagian = ? and status_realisasi = 'D'
			ORDER BY id DESC
		";
		return $this->db->query($query,[$idBagian]);
		// $this->db->select('pa.*,uk.nama_unit_kerja,an.kode_anggaran, an.nama_anggaran,kt.nama_kategori');
		// $this->db->join('unit_kerja uk', 'pa.id_unit_kerja = uk.id_unit_kerja');
		// $this->db->join('anggaran an', 'pa.id_anggaran = an.id_anggaran');
		// $this->db->join('kategori kt', 'kt.id_kategori = pa.id_kategori');
		// $this->db->where('pa.id_bagian', $idBagian);
		// return $this->db->get('permintaan_anggaran pa');
	}

	public function getDataRekap($idBagian, $start, $end, $id_unit_kerja)
	{
		if (is_null($start)) $start = date_create(date('Y/m/d'))->modify('-30 days')->format('Y-m-d');
		if (is_null($end)) $end = date('Y/m/d');
		$query = "
			SELECT 'arus_dana' AS jenis, id_arus_dana AS id, tanggal, no_arus_dana AS nomor, uk.nama_unit_kerja, kt.nama_kategori,an.kode_anggaran, an.nama_anggaran, periode_pelaksanaan, 'W' AS status_realisasi
			FROM arus_dana a
			LEFT JOIN unit_kerja uk ON a.id_unit_kerja = uk.id_unit_kerja
			LEFT JOIN anggaran an ON a.id_anggaran = an.id_anggaran
			LEFT JOIN kategori kt ON a.id_kategori = kt.id_kategori
			WHERE a.id_bagian = ?
			AND tanggal >='$start'
			AND tanggal <= '$end'
			
		";
		if ($id_unit_kerja != 'semua') {
			if ($id_unit_kerja != '') {
				$query .= "AND a.id_unit_kerja = '$id_unit_kerja'";
			}
		}
		$query .= " ORDER BY id DESC";
		return $this->db->query($query,[$idBagian]);
	}

	public function getLaporanPerAnggaran($start, $end)
	{
		if (is_null($start)) $start = date_create(date('Y/m/d'))->modify('-30 days')->format('Y-m-d');
		if (is_null($end)) $end = date('Y/m/d');
		$query = "
			SELECT id_arus_dana, tanggal, no_arus_dana, nama_unit_kerja, nama_kategori, kode_anggaran, nama_anggaran, periode_pelaksanaan, ad.id_anggaran,
			(SELECT SUM(penerimaan) FROM detail_arus_dana WHERE id_arus_dana = ad.id_arus_dana) AS penerimaan, (SELECT SUM(pengeluaran) FROM detail_arus_dana WHERE id_arus_dana = ad.id_arus_dana) pengeluaran,
			bbm, catatan, SUM(SELECT SUM(penerimaan) FROM detail_arus_dana WHERE id_arus_dana = ad.`id_arus_dana`) AS total_penerimaan, SUM(total) AS total
			FROM arus_dana ad
			LEFT JOIN anggaran an ON ad.`id_anggaran`=an.`id_anggaran`
			LEFT JOIN unit_kerja uk ON ad.`id_unit_kerja`=uk.`id_unit_kerja`
			LEFT JOIN kategori ka ON ad.`id_kategori`=ka.`id_kategori`
			WHERE ad.id_bagian = 1 AND
			tanggal >= '2019-01-03' AND
			tanggal <= '2019-04-03'
			GROUP BY ad.id_anggaran, id_arus_dana
			WITH ROLLUP;
		";
		return $this->db->query($query);
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

	function cek_no($no)
	{
		$this->db->select('*');
		$this->db->where('no_arus_dana', $no);
		$res =  $this->db->get('arus_dana')->row();
		if ($res) {
			$res->jenis = 'arus_dana';
			$res->id = $res->id_arus_dana;
			return $res;
		}
		$this->db->select('*');
		$this->db->where('no_anggaran', $no);
		$res = $this->db->get('permintaan_anggaran')->row();
		if ($res) {
			$res->jenis = 'permintaan';
			$res->id = $res->id_permintaan;
			return $res; 
		}else {
			$res = new stdClass();
			return $res->id = null;
		}
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
			return $this->db->query('select uraian, nominal as penerimaan, NULL as pengeluaran, NULL as keterangan from detail_permintaan_anggaran where id_permintaan = ?',[$id]);
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

	function get_list_arus_dana($tanggal="")
	{
		$this->db->select('ad.*,uk.nama_unit_kerja,an.nama_anggaran,an.kode_anggaran,kt.nama_kategori');
		$this->db->from('arus_dana ad');
		$this->db->join('unit_kerja uk', 'ad.id_unit_kerja = uk.id_unit_kerja', 'left');
		$this->db->join('anggaran an', 'ad.id_anggaran = an.id_anggaran', 'left');
		$this->db->join('kategori kt', 'kt.id_kategori = ad.id_kategori', 'left');
		$this->db->where('ad.id_bagian', $this->session->userdata('id_bagian'));
		if ($tanggal!="") {
			$date_arr = $this->pecah_daterange($tanggal);
			$this->db->where('tanggal >=', $date_arr[0]);
			$this->db->where('tanggal <=', $date_arr[1]);
		}
		$this->db->order_by('id_arus_dana', 'asc');
		return $this->db->get();
	}

	function get_data_tbl1($tanggal = "")
	{
		$date_arr = $this->pecah_daterange($tanggal);
		$query = "SELECT ifnull(nama_unit_kerja, '".$this->session->userdata('nama_bagian')."') as nama_unit_kerja, id_arus_dana, ad.tanggal, no_arus_dana, ifnull(no_anggaran,'-') no_anggaran, ifnull(nama_kategori, '-') nama_kategori, ifnull(kode_anggaran, '-') as kode_anggaran, ifnull(nama_anggaran, '-') as nama_anggaran, periode_pelaksanaan, ifnull(ad.id_anggaran, '10') as id_anggaran, ad.catatan, bbm, ad.total, CONCAT('[', json_detail, ']') json_detail,
			(SELECT COUNT(id_arus_dana) FROM arus_dana WHERE id_unit_kerja = ad.id_unit_kerja) AS jm
			FROM arus_dana ad
			JOIN (SELECT id_arus_dana AS idjson, GROUP_CONCAT('{', my_json, '}' SEPARATOR ',') AS json_detail FROM
			(
			 SELECT
			   id_arus_dana, CONCAT
			   (
			     '\"penerimaan\":', penerimaan,','
			     '\"pengeluaran\":', pengeluaran,','
			     '\"uraian\":'   , '\"', uraian   , '\"', ','
			     '\"keterangan\":', '\"', keterangan, '\"'
			   ) AS my_json
			 FROM detail_arus_dana
			) AS json_dpa
			GROUP BY 1) AS dpj ON ad.id_arus_dana = dpj.idjson
			left JOIN unit_kerja uk ON ad.id_unit_kerja = uk.id_unit_kerja
			left JOIN `anggaran` `an` ON `ad`.`id_anggaran` = `an`.`id_anggaran`
			left JOIN `kategori` `kt` ON `kt`.`id_kategori` = `ad`.`id_kategori`
			left JOIN `permintaan_anggaran` `pa` ON `ad`.`id_permintaan` = `pa`.`id_permintaan`
			where ad.id_bagian = ? and ad.tanggal >= ? and ad.tanggal <= ?
			;";
		return $this->db->query($query,[$this->session->userdata('id_bagian'),$date_arr[0],$date_arr[1]]);
	}

	function get_data_group_by_uk($tanggal = "")
	{
		$date_arr = $this->pecah_daterange($tanggal);
		$query = "SELECT ifnull(nama_unit_kerja, '".$this->session->userdata('nama_bagian')."') as nama_unit_kerja, id_arus_dana, ad.tanggal, no_arus_dana, ifnull(nama_kategori, '-') nama_kategori, ifnull(no_anggaran,'-') no_anggaran, ifnull(kode_anggaran, '-') as kode_anggaran, ifnull(nama_anggaran, '-') as nama_anggaran, periode_pelaksanaan, ifnull(ad.id_anggaran, '10') as id_anggaran, ad.catatan, bbm, ad.total, CONCAT('[', json_detail, ']') json_detail,
			(SELECT COUNT(id_arus_dana) FROM arus_dana WHERE id_unit_kerja = ad.id_unit_kerja) AS jm
			FROM arus_dana ad
			JOIN (SELECT id_arus_dana AS idjson, GROUP_CONCAT('{', my_json, '}' SEPARATOR ',') AS json_detail FROM
			(
			 SELECT
			   id_arus_dana, CONCAT
			   (
			     '\"penerimaan\":', penerimaan,','
			     '\"pengeluaran\":', pengeluaran,','
			     '\"uraian\":'   , '\"', uraian   , '\"', ','
			     '\"keterangan\":', '\"', keterangan, '\"'
			   ) AS my_json
			 FROM detail_arus_dana
			) AS json_dpa
			GROUP BY 1) AS dpj ON ad.id_arus_dana = dpj.idjson
			left JOIN unit_kerja uk ON ad.id_unit_kerja = uk.id_unit_kerja
			left JOIN `anggaran` `an` ON `ad`.`id_anggaran` = `an`.`id_anggaran`
			left JOIN `kategori` `kt` ON `kt`.`id_kategori` = `ad`.`id_kategori`
			left JOIN `permintaan_anggaran` `pa` ON `ad`.`id_permintaan` = `pa`.`id_permintaan`
			where ad.id_bagian = ? and ad.tanggal >= ? and ad.tanggal <= ?
			ORDER BY 1, 3;";
		return $this->db->query($query,[$this->session->userdata('id_bagian'),$date_arr[0],$date_arr[1]]);
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

/* End of file Arusdana_model.php */
/* Location: ./application/models/Arusdana_model.php */