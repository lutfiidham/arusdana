<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model','model');
	}

	public function load_data_grafik()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$tahun = $this->input->post('tahun');
		$data = $this->model->get_data_grafik($tahun)->result_array();
		log_message('error',$this->db->last_query());

		echo json_encode($data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */