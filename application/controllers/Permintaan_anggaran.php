<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_anggaran extends CI_Controller {

	private $jenis_file = 'jpg|png|jpeg|pdf';
	private $path_upload = 'assets/upload/project/';


	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
		$this->load->model('permintaan_anggaran_model','model');
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
				$data['data'][$key][] = $value['kode_project'];
				$data['data'][$key][] = $value['nama_project'];
				$data['data'][$key][] = $value['nama_customer'];
				$data['data'][$key][] = $value['project_start_date'];
				$data['data'][$key][] = $value['project_end_date'];
				$data['data'][$key][] = $value['status_project'];
				$data['data'][$key][] = $value['jumlah_vendor'];
				$data['data'][$key][] = $value['id_project'];
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
		
		$data = [
		    'project' => $this->model->get_by_id($id)->row(),
		    'vendor'  => $this->model->get_data_project_vendor($id)->result_array(),
		];

		echo json_encode($data);
	}

	function save()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = false;

		$this->db->trans_begin();

		$permintaan_anggaran = (array) json_decode($this->input->post('permintaan_anggaran'));
		$detail_permintaan = json_decode($this->input->post('detail_permintaan'));

		var_dump($detail_permintaan);

		if ($permintaan_anggaran['id_permintaan']) {
			//update
			$update_permintaan = $this->model->update(['id_permintaan'=>$permintaan_anggaran['id_permintaan']],$permintaan_anggaran);

			$delete_detil = $this->model->delete_detil(['id_permintaan'=>$permintaan_anggaran['id_permintaan']]);
			
			foreach ($detail_permintaan as $key => $value) {
				$data_detil = [
					'id_permintaan' => $permintaan_anggaran['id_permintaan'],
					'uraian' => $value->uraian,
					'nominal' => $value->nominal,
					'keterangan' => $value->keterangan,
				];
				$insert_detil = $this->model->insert_detil($data_detil);
			}
		} else{
			//insert
			$insert_permintaan = $this->model->save($permintaan_anggaran);
			$id_permintaan = $this->db->insert_id();
			foreach ($detail_permintaan as $key => $value) {
				$data_detil = [
					'id_permintaan' => $id_permintaan,
					'uraian' => $value->uraian,
					'nominal' => $value->nominal,
					'keterangan' => $value->keterangan,
				];
				$insert_detil = $this->model->insert_detil($data_detil);
			}
		}

		$exec = $this->db->trans_status();

		if ($exec === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        // $this->db->trans_rollback();
		        $this->db->trans_commit();
		}

		echo json_encode(
			[
				'status' => $exec,
			]
		);
	}


	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();



		$this->db->trans_begin();


		$exec = $this->db->trans_status();

		if ($exec === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
	        $this->db->trans_commit();
		}


		echo json_encode(
			['status' => $exec]
		);
		
	}

	function get_unit_kerja()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_unit_kerja();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_unit_kerja'];
				$data[$key]['name'] = $value['kode_unit_kerja'].' - '.$value['nama_unit_kerja'];
			}
		}

		echo json_encode($data);
	}

	function get_anggaran()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_anggaran();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_anggaran'];
				$data[$key]['name'] = $value['kode_anggaran'].' - '.$value['nama_anggaran'];
			}
		}

		echo json_encode($data);
	}

	function get_kategori()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_kategori();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_kategori'];
				$data[$key]['name'] = $value['kode_kategori'].' - '.$value['nama_kategori'];
			}
		}

		echo json_encode($data);
	}

	function get_no_anggaran()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$tanggal = $this->input->post('tanggal');
		$id_unit_kerja = $this->input->post('id_unit_kerja');
		$id_kategori = $this->input->post('id_kategori');

		$data = [
			'no_anggaran' => $this->model->get_nomor_anggaran_baru($tanggal,$id_unit_kerja,$id_kategori)
		];

		echo json_encode($data);
	}

	
}

/* End of file Project.php */
/* Location: ./application/controllers/Project.php */