<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('anggaran_model','model');
	}

	function get_data()
	{
		if(!$this->input->is_ajax_request()) redirect();
		$tahun = $this->input->get('tahun');
		$list = $this->model->get_data($tahun);

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['kode_anggaran'];
				$data['data'][$key][] = $value['nama_anggaran'];
				$data['data'][$key][] = $value['tahun'];
				$data['data'][$key][] = $value['status'];
				$data['data'][$key][] = $value['id_anggaran'];
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
			'id_anggaran' => $this->input->post('id_anggaran') ? $this->input->post('id_anggaran') : null,
			'kode_anggaran' => $this->input->post('kode_anggaran'),
			'nama_anggaran' => $this->input->post('nama_anggaran'),
			'tahun' => $this->input->post('tahun'),
			'status' => $this->input->post('status'),
		);

		if ($data_array['id_anggaran']) {
			$exec = $this->model->update(['id_anggaran' => $data_array['id_anggaran']],$data_array);
		} else{
			$data_array['id_bagian'] = $this->session->userdata('id_bagian');
			$data_array['id_anggaran'] = $this->model->generate_id()+1;
			$exec = $this->model->save($data_array);
		}


		echo json_encode(
			['status' => $exec]
		);
	}

	function cek_kode_anggaran()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$kode_anggaran = $this->input->post('kode_anggaran');
		$tahun = $this->input->post('tahun');
		// var_dump($_POST);
		echo json_encode($this->model->cek_kode_anggaran($kode_anggaran,$tahun));
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = $this->model->delete(['id_anggaran' => $this->input->post('id')]);

		echo json_encode(
			['status' => $exec]
		);
		
	}
}

/* End of file Jenis_lampiran.php */
/* Location: ./application/controllers/Jenis_lampiran.php */