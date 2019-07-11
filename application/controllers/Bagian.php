<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('bagian_model','model');
	}

	function get_data()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_data();

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['kode_bagian'];
				$data['data'][$key][] = $value['nama_bagian'];
				$data['data'][$key][] = $value['status_bagian'];
				$data['data'][$key][] = $value['id_bagian'];
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
			'id_bagian' => $this->input->post('id_bagian') ? $this->input->post('id_bagian') : null,
			'kode_bagian' => $this->input->post('kode_bagian'),
			'nama_bagian' => $this->input->post('nama_bagian'),
			'status_bagian' => $this->input->post('status_bagian'),
		);

		if ($data_array['id_bagian']) {
			$exec = $this->model->update(['id_bagian' => $data_array['id_bagian']],$data_array);
		} else{
			$data_array['id_bagian'] = $this->model->generate_id()+1;
			$exec = $this->model->save($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_bagian' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}
}

/* End of file Jenis_lampiran.php */
/* Location: ./application/controllers/Jenis_lampiran.php */