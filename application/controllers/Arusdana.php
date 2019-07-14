<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arusdana extends CI_Controller
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
}

/* End of file Arusdana.php */
/* Location: ./application/controllers/Arusdana.php */