<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	function get_data_grafik($tahun)
	{
		$query = "
				select a.id_anggaran, a.nama_anggaran, a.nominal as anggaran, 
				ifnull((select sum(penerimaan) as total from detail_arus_dana sad join arus_dana sa on sad.id_arus_dana = sa.id_arus_dana where sa.id_anggaran = a.id_anggaran and sa.bbm = 0),0) as pendapatan,
				ifnull((select sum(pengeluaran) as total from detail_arus_dana sad join arus_dana sa on sad.id_arus_dana = sa.id_arus_dana where sa.id_anggaran = a.id_anggaran and sa.bbm = 0),0) as biaya
				from anggaran a
				where a.id_bagian = ? and a.tahun = ?";
		return $this->db->query($query,[$this->session->userdata('id_bagian'),$tahun]);
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */