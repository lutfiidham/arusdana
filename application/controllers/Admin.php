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
				$data['data'][$key][] = $value['nama_bagian'];
				$data['data'][$key][] = $value['status_admin'];
				$data['data'][$key][] = $value['user_id'];
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
			'user_id' => $this->input->post('user_id') ? $this->input->post('user_id') : null,
			'nama_admin' => $this->input->post('nama_admin'),
			'id_bagian' => $this->input->post('id_bagian'),
			'level_admin' => 'ADM',
			'status_admin' => $this->input->post('status_admin'),
		);

		if ($data_array['user_id']) {
			if($this->input->post('ubah_password')) 
				$data_array['password_admin'] = password_hash($this->input->post('password_admin'),PASSWORD_DEFAULT);
			$exec = $this->model->update(['user_id' => $data_array['user_id']],$data_array);
		} else{
			$data_array['user_id'] = $this->model->generate_id()+1;
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

		$exec = $this->model->delete(['user_id' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}

	function get_bagian()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$list = $this->model->get_bagian();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_bagian'];
				$data[$key]['name'] = $value['kode_bagian'].' - '.$value['nama_bagian'];
			}
		}

		echo json_encode($data);
	}

	function cek_username()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$username = $this->input->post('username');
		$user_id = $this->input->post('user_id');
		echo json_encode($this->model->cek_username($username, $user_id));
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */