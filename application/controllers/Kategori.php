<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('kategori_model','model');
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
				$data['data'][$key][] = $value['kode_kategori'];
				$data['data'][$key][] = $value['nama_kategori'];
				$data['data'][$key][] = $value['status'];
				$data['data'][$key][] = $value['id_kategori'];
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
			'id_kategori' => $this->input->post('id_kategori') ? $this->input->post('id_kategori') : null,
			'kode_kategori' => $this->input->post('kode_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori'),
			'status' => $this->input->post('status'),
		);

		if ($data_array['id_kategori']) {
			$exec = $this->model->update(['id_kategori' => $data_array['id_kategori']],$data_array);
		} else{
			$data_array['id_bagian'] = $this->session->userdata('id_bagian');
			$data_array['id_kategori'] = $this->model->generate_id()+1;
			$exec = $this->model->save($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_kategori' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}
}

/* End of file Jenis_lampiran.php */
/* Location: ./application/controllers/Jenis_lampiran.php */