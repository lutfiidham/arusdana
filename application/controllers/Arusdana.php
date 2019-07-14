<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arusdana extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Arusdana_model', 'adm');
	}

	public function index()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->adm->getData($this->session->id_bagian);

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['no_anggaran'];
				$data['data'][$key][] = $value['nama_unit_kerja'];
				$data['data'][$key][] = $value['nama_kategori'];
				$data['data'][$key][] = $value['nama_anggaran'];
				$data['data'][$key][] = $value['tanggal'];
				$data['data'][$key][] = $value['status_realisasi'];
				$data['data'][$key][] = $value['id_permintaan'];
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
		    'permintaan' => $this->adm->get_by_id($id)->row(),
		    'detail_permintaan'  => $this->adm->get_detail_permintaan($id)->result_array(),
		];

		echo json_encode($data);
	}

	public function save()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$realisasi = json_decode($this->input->post('realisasi'));
		$detail = (array) json_decode($this->input->post('detail'));
		
		$permintaan = $this->adm->getAnggaran($realisasi->id_permintaan)->row();

		if (isset($permintaan)) {
			$realisasi->no_arus_dana = $permintaan->no_anggaran;
			$realisasi->tanggal = date('Y-m-d');
			$realisasi->id_unit_kerja = $permintaan->id_unit_kerja;
			$realisasi->id_kategori = $permintaan->id_kategori;
			$realisasi->id_anggaran = $permintaan->id_anggaran;

			$idArusDana = $this->adm->storeArusDana($realisasi);
			if ($idArusDana > 0) {
				foreach ($detail as $key => $d) {
					$da = (array) $d;
					$da['id_arus_dana'] = $idArusDana;
					$this->adm->storeChildArusDana($da);
				}
			}

			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}
}

/* End of file Arusdana.php */
/* Location: ./application/controllers/Arusdana.php */