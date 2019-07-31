<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tandatangan_model extends CI_Model {

	protected $table = 'tanda_tangan';

	public function __construct()
	{
		parent::__construct();
	}

	public function get($idBagian)
	{
		return $this->db->where('id_bagian', $idBagian)->get($this->table);
	}

	public function store($idBagian, $dokumen, $data)
	{
		$this->db->where('id_bagian', $idBagian);
		$this->db->where('dokumen', $dokumen);
		$exist = $this->db->from($this->table)->count_all_results();

		$affected = 0;

		if ($exist) {
			$this->db->where('id_bagian', $idBagian);
			$this->db->where('dokumen', $dokumen);
			$affected = (int) $this->db->update($this->table, $data);
		} else {
			$data['dokumen'] = $dokumen;
			$data['id_bagian'] = $idBagian;
			$affected = (int) $this->db->insert($this->table, $data);
		}

		return $affected;
	}

	function get_data()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'), FALSE);
		return $this->db->get('pemegang_jabatan');
	}

	function get_by_id($id)
	{
		$this->db->where('id_pj', $id);
		return $this->db->get('pemegang_jabatan');
	}

}

/* End of file Tandatangan_model.php */
/* Location: ./application/models/Tandatangan_model.php */