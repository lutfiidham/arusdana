<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect('login');
	}

	function index()
	{
		$this->create_page();
	}

	function lost()
	{
		$this->load->view('404_view');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	function create_page($page = "site/beranda",$konten="konten/home_view")
	{
		$ha = $this->hak_akses($page);
		
		if(!$ha['open']){
			echo '<script>alert("Anda tidak mempunyai akses ke halaman ini")</script>';
			echo '<script>location.href="'.base_url().'"</script>';
			die;
		}

		$data_halaman = [
			'page' => $konten,
			'ha' => $ha,
		];
		if(!file_exists(APPPATH.'views/'.$konten.'.php')) {
			$this->lost();
		} else{
			$this->load->view('base', $data_halaman);
		}
	}

	//routes halaman
	
	function beranda($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/home_view"); }
	function dashboard($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/dashboard_view"); }
	function data_admin($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/data_admin_view"); }
	function bagian($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/bagian_view"); }
	function unit_kerja($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/unit_kerja_view"); }
	
	function data_customer($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/data_customer_view"); }
	function data_sales($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/data_sales_view"); }
	function data_vendor($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/data_vendor_view"); }
	function data_project($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/data_project_view"); }
	function jabatan($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/jabatan_view"); }
	function jenis_lampiran($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/jenis_lampiran_view"); }
	function tipe_customer($value='') { $this->create_page(__CLASS__.'/'.__FUNCTION__,"konten/tipe_customer_view"); }

	private function hak_akses($site_url)
	{
		$url_arr = explode('/', $site_url);
		$page = $url_arr[1];

		// NOTE
		// ADR : Administrator
		// ADM : Admin
		// MNG : Manager
		// 
		// Open : hak akses membuka halaman (untuk mencegah apabila user membuka halaman lewat url langsung tanpa klik menu)
		// Insert : hak akses nambah
		// Update : hak akses untuk mengubah (harus ada hak akses view) jika false, maka form akan disable
		// Delete : hak akses untuk hapus
		// View  : hak akses untuk menampilkan tombol ubah

		switch ($this->session->level) {
			case 'ADR':
				$ha = [];
				$ha['beranda'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];				
				$ha['dashboard'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];				
				$ha['bagian'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_customer'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_sales'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_vendor'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_project'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['jabatan'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['jenis_lampiran'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['tipe_customer'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_admin'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				return $ha[$page];
				break;

			case 'ADM':
				$ha = [];
				$ha['beranda'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];				
				$ha['dashboard'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];				
				$ha['unit_kerja'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_customer'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_sales'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_vendor'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_project'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['jabatan'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['jenis_lampiran'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['tipe_customer'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				return $ha[$page];
				break;

			case 'MNG':
				$ha = [];
				$ha['beranda'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];				
				$ha['dashboard'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];				
				$ha['data_admin'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_customer'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_sales'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_vendor'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['data_project'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['jabatan'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['jenis_lampiran'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				$ha['tipe_customer'] = [
					'open' => true,
					'insert' => true,
					'update' => true,
					'delete' => true,
					'view' 	=> true,
				];
				return $ha[$page];
				break;
			
			default:
				$ha = [
					'insert' => false,
					'update' => false,
					'delete' => false,
					'view' 	=> false,
				];
				return $ha;
				break;
		}
	}

}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */