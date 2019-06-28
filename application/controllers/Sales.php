<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('sales_model','model');
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
				$data['data'][$key][] = $value['nik_sales'];
				$data['data'][$key][] = $value['nama_sales'];
				$data['data'][$key][] = $value['telp_sales'];
				$data['data'][$key][] = $value['email_sales'];
				$data['data'][$key][] = $value['nama_jabatan'];
				$data['data'][$key][] = $value['status_sales'];
				$data['data'][$key][] = $value['id_sales'];
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

		$response =	[
						'status' => false,
						'pesan' => '',
					];
			
		
		$data_array = array(
			'id_sales' => $this->input->post('id_sales') ? $this->input->post('id_sales') : null,
			'id_jabatan' => $this->input->post('id_jabatan'),
			'nik_sales' => $this->input->post('nik_sales'),
			'nama_sales' => $this->input->post('nama_sales'),
			'telp_sales' => $this->input->post('telp_sales'),
			'email_sales' => $this->input->post('email_sales'),
			'status_sales' => $this->input->post('status_sales'),
		);

		if ($data_array['id_sales']) {
			$nik_exist = $this->model->nik_exist($data_array['nik_sales'],"update",$data_array['id_sales']);

			if (!$nik_exist) {
				$exec = $this->model->update(['id_sales' => $data_array['id_sales']],$data_array);
				$response['status'] = $exec;
				$response['pesan'] = '';
			}
			$response['pesan'] = 'NIK sudah digunakan';
		} else{
			$nik_exist = $this->model->nik_exist($data_array['nik_sales']);
			if (!$nik_exist) {
				$exec = $this->model->save($data_array);
				$response['status'] = $exec;
				$response['pesan'] = '';
			}
			$response['pesan'] = 'NIK sudah terdaftar';
		}


		echo json_encode($response);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_sales' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}


	function get_jabatan()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$list = $this->model->get_data_jabatan();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_jabatan'];
				$data[$key]['name'] = $value['nama_jabatan'];
			}
		}

		echo json_encode($data);
	}

}

/* End of file Sales.php */
/* Location: ./application/controllers/Sales.php */