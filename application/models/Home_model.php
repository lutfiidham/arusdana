<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	function get_data_grafik($tahun)
	{
		$query = "SELECT `id_anggaran`, a.`nama_anggaran`, nominal AS anggaran, 
					(SELECT IFNULL(SUM(total),0) AS total FROM arus_dana WHERE `total` > 0 AND id_anggaran = a.`id_anggaran` AND bbm = 0) AS pendapatan,
					(SELECT IFNULL(SUM(total),0)*-1 AS total FROM arus_dana WHERE `total` < 0 AND id_anggaran = a.`id_anggaran` AND bbm = 0) AS biaya
					FROM `anggaran` a
					WHERE id_bagian = ? 
					AND tahun = ?";
		return $this->db->query($query,[$this->session->userdata('id_bagian'),$tahun]);
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */