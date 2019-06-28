<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('jabatan_model','model');
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
				$data['data'][$key][] = $value['nama_jabatan'];
				$data['data'][$key][] = $value['status_jabatan'];
				$data['data'][$key][] = $value['id_jabatan'];
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
			'id_jabatan' => $this->input->post('id_jabatan') ? $this->input->post('id_jabatan') : null,
			'nama_jabatan' => $this->input->post('nama_jabatan'),
			'status_jabatan' => $this->input->post('status_jabatan'),
		);

		if ($data_array['id_jabatan']) {
			$exec = $this->model->update(['id_jabatan' => $data_array['id_jabatan']],$data_array);
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

		$exec = $this->model->delete(['id_jabatan' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */