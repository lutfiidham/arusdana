<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('tipe_customer_model','model');
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
				$data['data'][$key][] = $value['nama_tipe_customer'];
				$data['data'][$key][] = $value['status_tipe_customer'];
				$data['data'][$key][] = $value['id_tipe_customer'];
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
			'id_tipe_customer' => $this->input->post('id_tipe_customer') ? $this->input->post('id_tipe_customer') : null,
			'nama_tipe_customer' => $this->input->post('nama_tipe_customer'),
			'status_tipe_customer' => $this->input->post('status_tipe_customer'),
		);

		if ($data_array['id_tipe_customer']) {
			$exec = $this->model->update(['id_tipe_customer' => $data_array['id_tipe_customer']],$data_array);
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

		$exec = $this->model->delete(['id_tipe_customer' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}

}

/* End of file Tipe_customer.php */
/* Location: ./application/controllers/Tipe_customer.php */