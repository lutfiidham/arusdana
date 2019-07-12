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

	function get_data_tender()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$id = $this->input->post('id');
		
		$data = $this->model->get_data_tender($id)->row();

		echo json_encode($data);
	}

	function get_data_tender_vendor()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$id = $this->input->post('id');

		$data = [
		    'project' => $this->model->get_data_tender($id)->row(),
		    'vendor'  => $this->model->get_data_project_vendor($id)->result_array(),
		];

		echo json_encode($data);
	}


	function load_tender_vendor()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$data_kueri = [
			'id_project' => $this->input->post('id_project'),
			'id_vendor' => $this->input->post('id_vendor'),
			'tipe_pembelian' => $this->input->post('tipe_pembelian'),
		];

		$result = $this->model->get_data_tender_vendor($data_kueri)->row();

		echo json_encode($result);
	}

	function save()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = false;
		$error = [];
		
		$data_project = (array) json_decode($this->input->post('data_project'));
		$data_vendor = [];
		if ($this->input->post('data_vendor')) {
			foreach ($this->input->post('data_vendor') as $index => $value) {
				array_push($data_vendor, (array) json_decode($value));
			}
		}

		$this->db->trans_begin();

		$project = [
		    'id_project' => $data_project['id_project']? $data_project['id_project'] : null,
		    'nama_project' => $data_project['nama_project'],
		    'project_year' => $data_project['project_year'],
		    'id_product' => $data_project['id_product'],
		    'project_type' => $data_project['project_type'],
		    'project_start_date' => $data_project['project_start_date'],
		    'project_end_date' => $data_project['project_end_date'],
		    'tgl_fs_approved' => $data_project['tgl_fs_approved'],
		    'tgl_project_final' => $data_project['tgl_project_final'],
		    'no_fs_barang' => $data_project['no_fs_barang'],
		    'nilai_fs_barang' => $data_project['nilai_fs_barang'],
		    'no_fs_jasa' => $data_project['no_fs_jasa'],
		    'nilai_fs_jasa' => $data_project['nilai_fs_jasa'],
		    'tipe_pembelian' => $data_project['tipe_pembelian'],
		    'id_customer' => $data_project['id_customer'],
		    'nama_pic_project' => $data_project['nama_pic_project'],
		    'no_hp_pic_project' => $data_project['no_hp_pic_project'],
		    'email_pic_project' => $data_project['email_pic_project'],
		    'id_sales' => $data_project['id_sales'],
		];

		if ($data_project['id_project']) {

			$upload_lampiran_vendor = [];
			$lampiran_vendor = null;
			if ($this->input->post('id_vendor_upload')) {
				$lampiran_vendor = $_FILES['lampiran_vendor'];
				
				foreach ($this->input->post('id_vendor_upload') as $index => $value) {
					array_push($upload_lampiran_vendor, $value);
				}
			}

			//update
			$project['modified_by'] = $this->session->username;
			$id_project = $project['id_project'];
			$update_project = $this->model->update(['id_project' => $id_project],$project);

			$path = $this->path_upload . $id_project;
			if (!file_exists($path))
				mkdir($path, 0777, true);

			$delete_vendor = $this->model->delete_vendor(['id_project' => $id_project]);
			if (sizeof($data_vendor) > 0) {
				foreach ($data_vendor as $index => $value) {
					$vendor = [
					    'id_project' => $id_project,
					    'id_vendor' => $value['id_vendor'],
					    'tipe_pembelian' => $value['tipe_pembelian'],
					    'no_quotation' => $value['no_quotation'],
					    'nilai_quotation_awal' => $value['nilai_quotation_awal'],
					    'nilai_quotation_akhir' => $value['nilai_quotation_akhir'],
					    'expired_quotation' => $value['expired_quotation'],
					    'status' => $value['status'],
					    'keterangan' => $value['keterangan'],
					    'lampiran' => $value['lampiran']
					];
					if ($value['lampiran'] == 'upload') {

						$index_lampiran = array_search($value['id_vendor'], $upload_lampiran_vendor);

						$upload = $this->upload_lampiran_vendor($lampiran_vendor,$index_lampiran,$id_project,$vendor,$value['nama_vendor']);
						
						if($upload['status']){
	                    	$vendor['lampiran'] = $upload['pesan'];
						} else{
							array_push($error, $upload['pesan']);
						}
					}

					$insert_vendor = $this->model->insert_vendor($vendor);

					$tender_vendor = [
					    'id_project' => $id_project,
					    'id_vendor' => $value['id_vendor'],
					    'tipe_pembelian' => $value['tipe_pembelian'],
					];
                    $insert_tender_vendor = $this->model->insert_tender_vendor($tender_vendor);

					$kondisi_sinkron = [
					    'id_project' => $id_project,
					];
                    $sinkron = $this->model->sinkron_tender_project_vendor($kondisi_sinkron);
				}
			}

		} else{
			$upload_lampiran_vendor = [];
			$lampiran_vendor = null;
			if ($this->input->post('id_vendor_upload')) {
				$lampiran_vendor = $_FILES['lampiran_vendor'];
				
				foreach ($this->input->post('id_vendor_upload') as $index => $value) {
					array_push($upload_lampiran_vendor, $value);
				}
			}
			//insert

			$project['created_by'] = $this->session->username;

			$save_project = $this->model->save($project);
			$id_project = $this->db->insert_id();

			$path = $this->path_upload . $id_project;
			if (!file_exists($path))
				mkdir($path, 0777, true);

			if (sizeof($data_vendor) > 0) {
				foreach ($data_vendor as $index => $value) {
					$vendor = [
					    'id_project' => $id_project,
					    'id_vendor' => $value['id_vendor'],
					    'tipe_pembelian' => $value['tipe_pembelian'],
					    'no_quotation' => $value['no_quotation'],
					    'nilai_quotation_awal' => $value['nilai_quotation_awal'],
					    'nilai_quotation_akhir' => $value['nilai_quotation_akhir'],
					    'expired_quotation' => $value['expired_quotation'],
					    'status' => $value['status'],
					    'keterangan' => $value['keterangan'],
					    'lampiran' => null
					];
					if ($value['lampiran'] == 'upload') {
						$upload = $this->upload_lampiran_vendor($lampiran_vendor,$index,$id_project,$vendor,$value['nama_vendor']);

						if($upload['status']){
	                    	$vendor['lampiran'] = $upload['pesan'];
						} else{
							array_push($error, $upload['pesan']);
						}
					}
                    $insert_vendor	= $this->model->insert_vendor($vendor);

					$tender_vendor = [
					    'id_project' => $id_project,
					    'id_vendor' => $value['id_vendor'],
					    'tipe_pembelian' => $value['tipe_pembelian'],
					];
                    $insert_tender_vendor = $this->model->insert_tender_vendor($tender_vendor);
				}
			}

		}

		$exec = $this->db->trans_status();

		if ($exec === FALSE && sizeof($error) > 0)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		}

		echo json_encode(
			[
				'status' => $exec,
				'error' => $error
			]
		);
	}

	function save_tender()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$exec = false;
		
		$data_array = array(
			'id_project' => $this->input->post('id_project'),
			'spk_fs_barang' => $this->input->post('spk_fs_barang'),
			'tgl_fs_barang' => $this->input->post('tgl_fs_barang'),
			'spk_fs_jasa' => $this->input->post('spk_fs_jasa'),
			'tgl_fs_jasa' => $this->input->post('tgl_fs_jasa'),
			'nilai_project' => $this->input->post('nilai_project'),
			'status_project' => $this->input->post('status_project'),
		);
		if (!$this->input->post('tgl_pengisian_tender')) {
			$data_array['tgl_pengisian_tender'] = date('Y-m-d H:i:s');
		}

		if ($data_array['id_project']) {
			$exec = $this->model->update(['id_project' => $data_array['id_project']],$data_array);
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


		$this->db->trans_begin();

		$del1 = $this->model->delete_vendor(['id_project' => $this->input->post('id')]);
		$del2 = $this->model->delete(['id_project' => $this->input->post('id')]);

		$exec = $this->db->trans_status();

		if ($exec === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
	        $this->db->trans_commit();
    		$folder = $this->path_upload.$this->input->post('id');
    		$this->delete_all_files($folder);
    		rmdir($folder);
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

	function get_vendor()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_data_vendor();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_vendor'];
				$data[$key]['name'] = $value['nama_vendor'];
			}
		}

		echo json_encode($data);
	}

	function get_customer()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_data_customer();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_customer'];
				$data[$key]['name'] = $value['nama_customer'];
				$data[$key]['group'] = $value['nama_tipe_customer'];
			}
		}

		echo json_encode($data);
	}

	function get_sales()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$list = $this->model->get_data_sales();

		$data = [];

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data[$key]['id']   = $value['id_sales'];
				$data[$key]['name'] = $value['nik_sales'] . ' - ' . $value['nama_sales'];
			}
		}

		echo json_encode($data);
	}

	function get_detil_customer()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$id_customer = $this->input->post('id');

		$data = $this->model->get_detil_customer($id_customer)->row();

		echo json_encode($data);
	}

	function get_detil_sales()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$id_sales = $this->input->post('id');

		$data = $this->model->get_detil_sales($id_sales)->row();

		echo json_encode($data);
	}

	function upload_lampiran_vendor($lampiran_vendor,$index,$id_project,$vendor,$nama_vendor)
	{
		$return = [
			'status' => false,
			'pesan' => 'file empty',
		];

		$path = $this->path_upload . $id_project;

		if( !empty($lampiran_vendor['tmp_name'][ $index ]) && is_uploaded_file($lampiran_vendor['tmp_name'][ $index ]) )
        {
			
			$nama_file = 'attach-'.$id_project.'-'.$vendor['id_vendor'].'-'.$nama_vendor;
            $this->load->library('upload');
			$config['upload_path']          = $path;
			$config['allowed_types']        = $this->jenis_file;
			$config['max_size']             = 10240; //set max size allowed in Kilobyte
			$config['max_width']            = 10000; // set max width image allowed
			$config['max_height']           = 10000; // set max height allowed
			$config['overwrite']           	= true; // set max height allowed
			$config['file_name']            = str_replace(' ', '_', $nama_file); //just milisecond timestamp fot unique name

            $this->upload->initialize($config);

            $_FILES['upload_lampiran_vendor']['name']=$lampiran_vendor['name'][ $index ];
            $_FILES['upload_lampiran_vendor']['type']= $lampiran_vendor['type'][ $index ];
            $_FILES['upload_lampiran_vendor']['tmp_name']= $lampiran_vendor['tmp_name'][ $index ];
            $_FILES['upload_lampiran_vendor']['error']= $lampiran_vendor['error'][ $index ];
            $_FILES['upload_lampiran_vendor']['size']= $lampiran_vendor['size'][ $index ];

            if ( ! $this->upload->do_upload('upload_lampiran_vendor') ){
            	$return['pesan'] = '<b>File: '. $_FILES['upload_lampiran_vendor']['name'].'</b> - '.$this->upload->display_errors('', '');
            }else{
            	$return['status'] = true;
            	$return['pesan'] = $this->upload->data('file_name');
            }
        }

        return $return;
	}

	function download_lampiran()
	{
		$id_vendor = $this->input->get('project');
		$nama_file = $this->input->get('file');
		$path = $this->path_upload . $id_vendor;
		force_download($path . '/' . $nama_file, NULL);
	}

	private function delete_all_files($folder)
	{
		//Get a list of all of the file names in the folder.
		$files = glob($folder . '/*');
		 
		//Loop through the file list.
		foreach($files as $file){
		    //Make sure that this is a file and not a directory.
		    if(is_file($file)){
		        //Use the unlink function to delete the file.
		        unlink($file);
		    }
		}
	}

}

/* End of file Project.php */
/* Location: ./application/controllers/Project.php */