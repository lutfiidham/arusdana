<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tandatangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Tandatangan_model', 'ttm');
	}

	public function index()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$res = $this->ttm->get($this->session->id_bagian);

		$data = [];

		if ($res->num_rows() > 0) {
			$tempData = $res->result_array();
			foreach ($res->result_array() as $i => $v) {
				$data[$v['dokumen']] = $v;
			}
		}

		echo json_encode(['data' => $data]);
	}

	public function save()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$inputs = $this->input->post();
		$data = [];
		$affected = 0;

		foreach ($inputs as $key => $v) {
			$inputKey = explode('-', $key);
			$data[$inputKey[0]][$inputKey[1]] = $v;
		}

		foreach ($data as $key => $d) {
			$affected += $this->ttm->store($this->session->id_bagian, $key, $d);
		}

		echo json_encode(['status' => $affected]);
	}
}

/* End of file Tandatangan.php */
/* Location: ./application/controllers/Tandatangan.php */