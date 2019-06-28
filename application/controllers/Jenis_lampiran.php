<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_lampiran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('jenis_lampiran_model','model');
	}

	function get_data()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$jenis_lampiran_untuk = $this->input->get('jenis_lampiran_untuk');

		$list = $this->model->get_data($jenis_lampiran_untuk);

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['nama_jenis_lampiran'];
				$data['data'][$key][] = $value['status_jenis_lampiran'];
				$data['data'][$key][] = $value['id_jenis_lampiran'];
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
		$data = $this->model->get_by_id($id)->row();

		echo json_encode($data);
	}

	function save()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = false;
		
		$data_array = array(
			'id_jenis_lampiran' => $this->input->post('id_jenis_lampiran') ? $this->input->post('id_jenis_lampiran') : null,
			'nama_jenis_lampiran' => $this->input->post('nama_jenis_lampiran'),
			'jenis_lampiran_untuk' => $this->input->post('jenis_lampiran_untuk'),
			'status_jenis_lampiran' => $this->input->post('status_jenis_lampiran'),
		);

		if ($data_array['id_jenis_lampiran']) {
			$exec = $this->model->update(['id_jenis_lampiran' => $data_array['id_jenis_lampiran']],$data_array);
		} else{
			$exec = $this->model->save($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_jenis_lampiran' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}

}

/* End of file Jenis_lampiran.php */
/* Location: ./application/controllers/Jenis_lampiran.php */