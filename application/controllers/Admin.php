<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('admin_model','model');
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
				$data['data'][$key][] = $value['username'];
				$data['data'][$key][] = $value['nama_admin'];
				$data['data'][$key][] = $value['level_admin'];
				$data['data'][$key][] = $value['status_admin'];
				$data['data'][$key][] = $value['id_admin'];
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
			'id_admin' => $this->input->post('id_admin') ? $this->input->post('id_admin') : null,
			'nama_admin' => $this->input->post('nama_admin'),
			'level_admin' => $this->input->post('level_admin'),
			'status_admin' => $this->input->post('status_admin'),
		);

		if ($data_array['id_admin']) {
			if($this->input->post('ubah_password')) 
				$data_array['password_admin'] = password_hash($this->input->post('password_admin'),PASSWORD_DEFAULT);
			$exec = $this->model->update(['id_admin' => $data_array['id_admin']],$data_array);
		} else{
			$data_array['username'] = $this->input->post('username');
			$data_array['password_admin'] = password_hash($this->input->post('password_admin'),PASSWORD_DEFAULT);
			$exec = $this->model->save($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_admin' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */