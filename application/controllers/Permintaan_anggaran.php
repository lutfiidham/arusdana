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
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$id_unit_kerja = $this->input->get('id_unit_kerja');
		
		$list = $this->model->get_data($start, $end, $id_unit_kerja);

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
				$data['data'][$key][] = $value['tanggal_kebutuhan'];
				$data['data'][$key][] = $value['total'];
				$data['data'][$key][] = $value['id_permintaan'];
				$data['total'] = $key + 1;
			}

			$data['success'] = true;
		}
		echo json_encode($data);
	}

	function get_data_laporan()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$tanggal = $this->input->get('tanggal');

		$list = $this->model->get_data_laporan($tanggal);

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['no_anggaran'];
				$data['data'][$key][] = $value['tanggal'];
				$data['data'][$key][] = $value['nama_unit_kerja'];
				$data['data'][$key][] = $value['nama_kategori'];
				$data['data'][$key][] = $value['kode_anggaran'];
				$data['data'][$key][] = '('.$value['nama_anggaran'].')';
				$data['data'][$key][] = $value['tanggal_kebutuhan'];
				$data['data'][$key][] = $value['catatan'];
				$data['data'][$key][] = $value['status_realisasi'] == 'D' ? 0:1;
				$data['data'][$key][] = $value['uraian'];
				$data['data'][$key][] = $value['nominal'];
				$data['data'][$key][] = $value['keterangan'];
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
		    'permintaan' => $this->model->get_by_id($id)->row(),
		    'detail_permintaan'  => $this->model->get_detail_permintaan($id)->result_array(),
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
		$permintaan_anggaran['id_bagian'] = $this->session->userdata('id_bagian');
		$id_for_cetak = null;
		if ($permintaan_anggaran['id_unit_kerja'] == '') {
			$permintaan_anggaran['id_unit_kerja'] = NULL;
		}
		if ($permintaan_anggaran['id_kategori'] == '') {
			$permintaan_anggaran['id_kategori'] = NULL;
		}
		if ($permintaan_anggaran['id_permintaan']) {
			//update
			// $permintaan_update
			$update_permintaan = $this->model->update(['id_permintaan'=>$permintaan_anggaran['id_permintaan']],
				$permintaan_anggaran
			);
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
			$id_for_cetak = $permintaan_anggaran['id_permintaan'];
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
			$id_for_cetak = $id_permintaan;
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
				'id_permintaan'=>$id_for_cetak,
			]
		);
	}


	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();



		$this->db->trans_begin();
		$exec = $this->model->delete_detail(['id_permintaan' => $this->input->post('id')]);
		$exec = $this->model->delete(['id_permintaan' => $this->input->post('id')]);

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
				$data[$key+1]['id']   = $value['id_kategori'];
				$data[$key+1]['name'] = $value['kode_kategori'].' - '.$value['nama_kategori'];
			}
		}
		// $data[0]['id']   = $this->session->userdata('kode_bagian');
		// $data[0]['name'] = $this->session->userdata('kode_bagian');

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
		// var_dump($this->db->last_query());
		echo json_encode($data);
	}


	function cetak_laporan()
	{
		$id_permintaan = $this->input->post('id_permintaan');
	
	    $permintaan = $this->model->get_by_id($id_permintaan)->row();
	    $detail_permintaan  = $this->model->get_detail_permintaan($id_permintaan)->result_array();
		$this->load->library('Pdfgenerator');
		$this->load->helper('my_helper');

		$html = '';

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">FORM PERMINTAAN ANGGARAN</span>
		<br>
		<span>NOMOR: '.$permintaan->no_anggaran.'</span></p><br>';

		$detil_anggaran = $this->model->get_detil_anggaran($permintaan->id_anggaran);
		$html.= '<p>Kegiatan: ('.$detil_anggaran->kode_anggaran.') '.$detil_anggaran->nama_anggaran.' </p><br>';
		$html .= '<p style="text-align:center;text-decoration:underline">Tanggal Kebutuhan: '.tanggal_full($permintaan->tanggal_kebutuhan).'</p><br>';

		$html.= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">';
		$html.=		'<thead>
						<tr">
							<th class="data-center" style="width:5%">No.</th>
							<th class="data-center" style="width:35%">Uraian</th>
							<th class="data-center" style="width:25%">Nominal (Rp)</th>
							<th class="data-center" style="width:35%">Keterangan</th>
						</tr>
					</thead>';
		$html.= 	'<tbody>';
		$sum = 0;
		foreach ($detail_permintaan as $key => $value) {
			$html .= '<tr>
				<td class="data-center">'.($key+1).'</td>
				<td class="data-left">'.$value['uraian'].'</td>
				<td class="data-right">'.format_ribuan_indo($value['nominal'],0).'</td>
				<td class="data-left">'.$value['keterangan'].'</td>
			</tr>';
			$sum += $value['nominal'];
		}
		$html .= '<tfoot>
				<tr>
					<th colspan="2" class="data-center">TOTAL:</th>
					<th class="data-right">'.format_ribuan_indo($sum,0).'</th>
					<th></th>
				</tr>
		</tfoot>';
		$html.='</tbody></table>';
		$html.= '<p>Catatan: '.$permintaan->catatan.' </p><br>';
		$ttd = $this->model->get_list_ttd();
		$html.= '<table style="table-layout:fixed;" width="100%">
			<tr>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">Surabaya, '.tanggal_full($permintaan->tanggal).'</td>
			</tr>
			<tr>
				<td style="width:33%" class="data-center">Diketahui Oleh:</td>
				<td style="width:33%" class="data-center">Diperiksa Oleh:</td>
				<td style="width:33%" class="data-center">Dibuat Oleh:</td>
			</tr>
			<tr>
				<td style="width:33%" class="data-center">
					<br><br><br><br>
					<span style="font-weight:bold;text-decoration:underline">'.$ttd->diketahui.'</span><br>
					<span>'.$ttd->jabatan_yg_mengetahui.'</span>
				</td>
				<td style="width:33%" class="data-center">
					<br><br><br><br>
					<span style="font-weight:bold;text-decoration:underline">'.$ttd->diperiksa.'</span><br>
					<span>'.$ttd->jabatan_pemeriksa.'</span>
				</td>
				<td style="width:33%" class="data-center">
					<br><br><br><br>
					<span style="font-weight:bold;text-decoration:underline">'.$ttd->dibuat.'</span><br>
					<span>'.$ttd->jabatan_pembuat.'</span>
				</td>
			</tr>
			<tr>
				<td style="width:33%" class="data-center"><br></td>
				<td style="width:33%" class="data-center"><br></td>
				<td style="width:33%" class="data-center"><br></td>
			</tr>
			<tr>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">Disetujui Oleh:</td>
				<td style="width:33%" class="data-center">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:33%" class="data-center"></td>
				<td style="width:33%" class="data-center">
					<br><br><br><br>
					<span style="font-weight:bold;text-decoration:underline">'.$ttd->disetujui.'</span><br>
					<span>'.$ttd->jabatan_penyetuju.'</span>
				</td>
				<td style="width:33%" class="data-center"></td>
			</tr>

		</table>';

		$data['html'] = $html;
		$data['no_header'] = true;
		$data['no_footer'] = true;
        $this->pdfgenerator->setPaper('A4', 'portrait');
        $this->pdfgenerator->filename = "Permintaan Anggaran.pdf";
        $this->pdfgenerator->load_view('format_laporan', $data);
	}

	function export_pdf()
	{
		$tanggal = $this->input->post('tanggal');
		$this->load->library('Pdfgenerator');
		$this->load->helper('my_helper');

		$list_permintaan = $this->model->get_list_permintaan($tanggal);
		// log_message('error',$this->db->last_query());
		$html = '';

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">LAPORAN PERMINTAAN ANGGARAN</span><p>';
		$html .= '<p>PERIODE: '.$tanggal.'</p>';

		if ($list_permintaan->num_rows()>0) {
			$html .= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">
                        <thead>
                            <tr>
                                <th class="data-center" style="width:15%">No Anggaran</th>
                                <th class="data-center" style="width:10%">Tanggal</th>
                                <th class="data-center" style="width:15%">Unit Kerja</th>
                                <th class="data-center" style="width:15%">Kategori</th>
                                <th class="data-center" style="width:15%">Anggaran</th>
                                <th class="data-center" style="width:15%">Kegiatan</th>
                                <th class="data-center" style="width:15%">Tgl Butuh</th>
                                <th class="data-center" style="width:15%">Catatan</th>
                                <th class="data-center" style="width:15%">Realisasi</th>
                                <th class="data-center" style="width:15%">Uraian</th>
                                <th class="data-center" style="width:15%">Nominal</th>
                                <th class="data-center" style="width:15%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
			';
			$sum = 0;
			foreach ($list_permintaan->result_array() as $key => $val) {
				$detil_permintaan = $this->model->get_detail_permintaan($val['id_permintaan']);
				$rowspan = $detil_permintaan->num_rows();
				$kiri = '
					<td rowspan="'.$rowspan.'">'.$val['no_anggaran'].'</td>
					<td rowspan="'.$rowspan.'">'.to_date_format_mysql($val['tanggal']).'</td>
					<td rowspan="'.$rowspan.'">'.$val['nama_unit_kerja'].'</td>
					<td rowspan="'.$rowspan.'">'.$val['nama_kategori'].'</td>
					<td rowspan="'.$rowspan.'">'.$val['kode_anggaran'].'</td>
					<td rowspan="'.$rowspan.'">'.$val['nama_anggaran'].'</td>
					<td rowspan="'.$rowspan.'">'.to_date_format_mysql($val['tanggal_kebutuhan']).'</td>
					<td rowspan="'.$rowspan.'">'.$val['catatan'].'</td>
					<td rowspan="'.$rowspan.'">'.($val['status_realisasi']=='D' ? 0:1).'</td>
				';
				foreach ($detil_permintaan->result_array() as $key2 => $val_det) {
					$html.= '<tr>';
					if ($key2==0) {
						$html .= $kiri;
					}
					$html.= '
					<td>'.$val_det['uraian'].'</td>
					<td class="data-right">'.format_ribuan_indo($val_det['nominal'],0).'</td>
					<td>'.$val_det['keterangan'].'</td>
					';
					$html.= '</tr>';
					$sum += $val_det['nominal'];
				}
			}


		}
		$html .= '
				<tfoot>
				<tr>
					<th class="data-center" colspan="10">Total:</th>
					<th class="data-right">'.format_ribuan_indo($sum,0).'</th>
					<th></th>
				</tr>
				</tfoot>
		</tbody></table>';

		$data['html'] = $html;
		$data['no_header'] = true;
		$data['no_footer'] = true;
        $this->pdfgenerator->setPaper('A4', 'landscape');
        $this->pdfgenerator->filename = "Permintaan Anggaran.pdf";
        $this->pdfgenerator->load_view('format_laporan', $data);
	}

	function laporan_group_by_unit_kerja()
	{
		$tanggal = $this->input->get('tanggal');

		$list = $this->model->get_data_group_by_uk($tanggal);

		$html = '';
		if ($list->num_rows()>0) {
			$unit_kerja = '';
			$no_urut = 0;
			foreach ($list->result_array() as $index => $value) {
				$html .= '<tr>';	
				if ($unit_kerja != $value['nama_unit_kerja']) {
					if ($unit_kerja != '') {
						// $html .= $no_urut++;
						// $html .= '<td rowspan="'.$rowspan_uk.'">'.$unit_kerja.'</td>';
						// $html .= $row_anggaran;
						// $html .= '</tr>';
						$html .= '<tr><td colspan="10">Total</td><td>0</td><td></td></tr>';
					}
					$no_urut++;
					$unit_kerja = $value['nama_unit_kerja'];
					// $html .= '<td>'.$no_urut.'</td>';
					$html .= '<td rowspan="'.$value['jm'].'">'.$value['nama_unit_kerja'].'</td>';
				}

				$detil = json_decode($value['json_detail']);
				$rowspan_angg = sizeof($detil);
				$row_detil = '';
				foreach ($detil as $index2 => $value2) {
					if ($index2 == 0) {
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['tanggal'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_kategori'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['tanggal_kebutuhan'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
						$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['status_realisasi'].'</td>';
					}
					// $html .= '<td>'.$value2->uraian.'</td>';
					// $html .= '<td>'.$value2->nominal.'</td>';
					// $html .= '<td>'.$value2->keterangan.'</td>';
				}
				$html .= '<tr>';	

				// $row_anggaran  = '<td rowspan="'.$rowspan_angg.'"></td>';
				// $row_anggaran  = '<td rowspan="'.$rowspan_angg.'"></td>';
				// $row_anggaran .= '<td rowspan="'.$rowspan_angg.'"></td>';
				// $row_anggaran .= '<td rowspan="'.$rowspan_angg.'"></td>';
				// $row_anggaran .= '<td rowspan="'.$rowspan_angg.'"></td>';
				// $row_anggaran .= '<td rowspan="'.$rowspan_angg.'"></td>';
				// $row_anggaran .= $row_detil;
				// $row_anggaran .= '</tr>';
				// $html .=  $row_anggaran;

			}

			if ($unit_kerja !='') {
				$rowspan_uk = 0;
				$nominal_uk = 0;
				$no_urut= 0;
				$row_anggaran = '';
				$html .= '</tr>';
			}
		}

		echo $html;
	}

	// var label = '';
 //                $.each(data, function(index, val) {
 //                    if (label != val.label) {
 //                        if (label !='') {
 //                            html += '</optgroup>';
 //                        }
 //                        label = val.label;
 //                        html += '<optgroup label="'+val.label+'">';
 //                    }
 //                    html += '<option value="'+val.id+'">'+val.name+'</option>';
 //                });
 //                if (html!='') {
 //                    html += '</optgroup>';
 //                }

	
}

/* End of file Project.php */
/* Location: ./application/controllers/Project.php */