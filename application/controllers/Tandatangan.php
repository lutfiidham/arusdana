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

	function save_pj()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = false;
		
		$data_array = array(
			'id_pj' => $this->input->post('id_pj') ? $this->input->post('id_pj') : null,
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
		);

		if ($data_array['id_pj']) {
			$exec = $this->ttm->update_pj(['id_pj' => $data_array['id_pj']],$data_array);
		} else{
			$data_array['id_bagian'] = $this->session->userdata('id_bagian');
			$exec = $this->ttm->save_pj($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function get_data()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$list = $this->ttm->get_data();

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['nama'];
				$data['data'][$key][] = $value['jabatan'];
				$data['data'][$key][] = $value['id_pj'];
				$data['total'] = $key + 1;
			}

			$data['success'] = true;
		}
		echo json_encode($data);
	}

	function get_data_by_id()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$id = $this->input->post('id');
		$data = $this->ttm->get_by_id($id)->row();

		echo json_encode($data);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->ttm->delete(['id_pj' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}
}

/* End of file Tandatangan.php */
/* Location: ./application/controllers/Tandatangan.php */