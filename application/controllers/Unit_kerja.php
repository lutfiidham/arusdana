<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_kerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('unit_kerja_model','model');
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
				$data['data'][$key][] = $value['kode_unit_kerja'];
				$data['data'][$key][] = $value['nama_unit_kerja'];
				$data['data'][$key][] = $value['status'];
				$data['data'][$key][] = $value['id_unit_kerja'];
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
			'id_unit_kerja' => $this->input->post('id_unit_kerja') ? $this->input->post('id_unit_kerja') : null,
			'kode_unit_kerja' => $this->input->post('kode_unit_kerja'),
			'nama_unit_kerja' => $this->input->post('nama_unit_kerja'),
			'status' => $this->input->post('status'),
		);

		if ($data_array['id_unit_kerja']) {
			$exec = $this->model->update(['id_unit_kerja' => $data_array['id_unit_kerja']],$data_array);
		} else{
			$data_array['id_bagian'] = $this->session->userdata('id_bagian');
			$data_array['id_unit_kerja'] = $this->model->generate_id()+1;
			$exec = $this->model->save($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_unit_kerja' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}
}

/* End of file Jenis_lampiran.php */
/* Location: ./application/controllers/Jenis_lampiran.php */