<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','model');
	}

	public function index()
	{
		if($this->session->userdata('id')) redirect();
		
		$this->load->view('login_view');
	}

	function validate()
	{
		$username = $this->input->post('val_username');
		$password = $this->input->post('val_password');

		$data_user = $this->model->get_data_admin_by_username($username);

		if ($data_user->num_rows()>0) {
			$dt = $data_user->row();
			if ($dt->status_admin == 'A') {
				if (password_verify($password, $dt->password_admin)) {
					$array = array(
						'id' => $dt->user_id,
						'username' => $dt->username,
						'nama' => $dt->nama_admin,
						'level' => $dt->level_admin,
						'id_bagian' => $dt->id_bagian,
						'kode_bagian' => $dt->kode_bagian,
					);
									
					$this->session->set_userdata( $array );				
					redirect();
				} else{
					$this->session->set_flashdata('pesan', 'Password Salah');
					redirect('login');
					return;
				}				
			} else{
				$this->session->set_flashdata('pesan', 'User sudah dinonaktifkan');
				redirect('login');
				return;
			}
		} else{
			$this->session->set_flashdata('pesan', 'User tidak ditemukan');
			redirect('login');
			return;
		}
		
	}



}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */