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
				$data['data'][$key][] = $value['nomor'];
				$data['data'][$key][] = $value['nama_unit_kerja'];
				$data['data'][$key][] = $value['nama_kategori'];
				$data['data'][$key][] = $value['kode_anggaran'].' - '.$value['nama_anggaran'];
				$data['data'][$key][] = $value['tanggal'];
				$data['data'][$key][] = $value['status_realisasi'];
				$data['data'][$key][] = $value['id'];
				$data['data'][$key][] = $value['jenis'];
				$data['data'][$key][] = $value['periode_pelaksanaan'];
				$data['total'] = $key + 1;
			}

			$data['success'] = true;
		}
		echo json_encode($data);
	}

	public function getRekap()
	{
		if (!$this->input->is_ajax_request()) redirect();

		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$id_unit_kerja = $this->input->get('id_unit_kerja');
		$list = $this->adm->getDataRekap($this->session->id_bagian, $start, $end, $id_unit_kerja);

		$data['data']    = [];
		$data['total']   = 0;
		$data['success'] = false;

		if ($list->num_rows() > 0) {
			foreach ($list->result_array() as $key => $value) {
				$data['data'][$key][] = ($key + 1) . '.';
				$data['data'][$key][] = $value['nomor'];
				$data['data'][$key][] = $value['nama_unit_kerja'];
				$data['data'][$key][] = $value['nama_kategori'];
				$data['data'][$key][] = $value['kode_anggaran'].' - '.$value['nama_anggaran'];
				$data['data'][$key][] = $value['tanggal'];
				$data['data'][$key][] = $value['status_realisasi'];
				$data['data'][$key][] = $value['id'];
				$data['data'][$key][] = $value['jenis'];
				$data['data'][$key][] = $value['periode_pelaksanaan'];
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

		$list = $this->adm->get_data_laporan($tanggal);

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

	function laporan()
	{
		$tanggal = $this->input->get('tanggal');

		$list = $this->adm->get_data_tbl1($tanggal);
		$html = '';
		$grandtotal = 0;
		$total_penerimaan = 0;
		$total_pengeluaran = 0;
		if ($list->num_rows()>0) {
			$group = '';
			$no_urut = 0;
			$subtotal_group = 0;
			$subtotal_group2 = 0;
			foreach ($list->result_array() as $index => $value) {

				$detil = json_decode($value['json_detail']);

				$rowspan_angg = sizeof($detil);
				$row_detil = '';
				if ($detil) {
					
					foreach ($detil as $index2 => $value2) {
						$html.= '<tr>';
						if ($index2 == 0) {
							$html .= '<td rowspan="'.$rowspan_angg.'">'.($index+1).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_unit_kerja'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_arus_dana'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['tanggal']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_kategori'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['periode_pelaksanaan']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['bbm'].'</td>';
						}
						$html .= '<td>'.$value2->uraian.'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->penerimaan,0).'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->pengeluaran,0).'</td>';
						$html .= '<td>'.$value2->keterangan.'</td>';
						$subtotal_group += $value2->penerimaan;
						$subtotal_group2 += $value2->pengeluaran;
						
						$total_penerimaan += $value2->penerimaan;
						$total_pengeluaran += $value2->pengeluaran;

						$html .= '</tr>';
					}
				}

			}

		}
		$grandtotal += $total_penerimaan - $total_pengeluaran;

		echo json_encode(['tbody'=> $html,'grandtotal' => format_ribuan_indo($grandtotal,0),
			'total_penerimaan' => format_ribuan_indo($total_penerimaan,0),
			'total_pengeluaran' => format_ribuan_indo($total_pengeluaran,0)]);
	}

	function laporan_group_by_unit_kerja()
	{
		$tanggal = $this->input->get('tanggal');

		$list = $this->adm->get_data_group_by_uk($tanggal);

		$html = '';
		$grandtotal = 0;
		$total_penerimaan = 0;
		$total_pengeluaran = 0;
		if ($list->num_rows()>0) {
			$group = '';
			$no_urut = 0;
			$subtotal_group = 0;
			$subtotal_group2 = 0;
			foreach ($list->result_array() as $index => $value) {
				if ($group != $value['nama_unit_kerja']) {
					if ($group != '') {

						$html .= '<tr>
						<td colspan="10"></td>
						<td><b>Total</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
						<td></td>
						</tr>';

						$subtotal_group = 0;
						$subtotal_group2 = 0;
					}
					$group = $value['nama_unit_kerja'];
					$html .= '<tr><td colspan="14"><b>'.$group.'</b></td></tr>';
				}

				$detil = json_decode($value['json_detail']);
				$rowspan_angg = sizeof($detil);
				$row_detil = '';
				if ($detil) {
					
					foreach ($detil as $index2 => $value2) {
						$html.= '<tr>';
						if ($index2 == 0) {
							$html .= '<td rowspan="'.$rowspan_angg.'">'.($index+1).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_arus_dana'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['tanggal']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_kategori'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['periode_pelaksanaan']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['bbm'].'</td>';
						}
						$html .= '<td>'.$value2->uraian.'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->penerimaan,0).'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->pengeluaran,0).'</td>';
						$html .= '<td>'.$value2->keterangan.'</td>';
						$subtotal_group += $value2->penerimaan;
						$subtotal_group2 += $value2->pengeluaran;
						
						$total_penerimaan += $value2->penerimaan;
						$total_pengeluaran += $value2->pengeluaran;

						$html .= '</tr>';
					}
				}

				
				// $grandtotal += $value['total'];
			}

			if ($group !='') {
				$html .= '<tr>
				<td colspan="10"></td>
				<td><b>Total</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
				<td></td>
				</tr>';
			}
		}
				$grandtotal += $total_penerimaan - $total_pengeluaran;

		echo json_encode(['tbody'=> $html,'grandtotal' => format_ribuan_indo($grandtotal,0),
			'total_penerimaan' => format_ribuan_indo($total_penerimaan,0),
			'total_pengeluaran' => format_ribuan_indo($total_pengeluaran,0)]);
	}

	function laporan_group_by_kategori()
	{
		$tanggal = $this->input->get('tanggal');

		$list = $this->adm->get_data_group_by_uk($tanggal);

		$html = '';
		$grandtotal = 0;
		$total_penerimaan = 0;
		$total_pengeluaran = 0;
		if ($list->num_rows()>0) {
			$group = '';
			$no_urut = 0;
			$subtotal_group = 0;
			$subtotal_group2 = 0;
			foreach ($list->result_array() as $index => $value) {
				if ($group != $value['nama_kategori']) {
					if ($group != '') {

						$html .= '<tr>
						<td colspan="10"></td>
						<td><b>Total</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
						<td></td>
						</tr>';

						$subtotal_group = 0;
						$subtotal_group2 = 0;
					}
					$group = $value['nama_kategori'];
					$html .= '<tr><td colspan="14"><b>'.$group.'</b></td></tr>';
				}

				$detil = json_decode($value['json_detail']);
				$rowspan_angg = sizeof($detil);
				$row_detil = '';
				if ($detil) {
					
					foreach ($detil as $index2 => $value2) {
						$html.= '<tr>';
						if ($index2 == 0) {
							$html .= '<td rowspan="'.$rowspan_angg.'">'.($index+1).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_arus_dana'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['tanggal']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_unit_kerja'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['periode_pelaksanaan']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['bbm'].'</td>';
						}
						$html .= '<td>'.$value2->uraian.'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->penerimaan,0).'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->pengeluaran,0).'</td>';
						$html .= '<td>'.$value2->keterangan.'</td>';
						$subtotal_group += $value2->penerimaan;
						$subtotal_group2 += $value2->pengeluaran;
						
						$total_penerimaan += $value2->penerimaan;
						$total_pengeluaran += $value2->pengeluaran;

						$html .= '</tr>';
					}
				}

				
				// $grandtotal += $value['total'];
			}

			if ($group !='') {
				$html .= '<tr>
				<td colspan="10"></td>
				<td><b>Total</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
				<td></td>
				</tr>';
			}
		}
				$grandtotal += $total_penerimaan - $total_pengeluaran;

		echo json_encode(['tbody'=> $html,'grandtotal' => format_ribuan_indo($grandtotal,0),
			'total_penerimaan' => format_ribuan_indo($total_penerimaan,0),
			'total_pengeluaran' => format_ribuan_indo($total_pengeluaran,0)]);
	}

	function export_pdf_by_unit_kerja()
	{
		set_time_limit(0);
		$this->load->library('Pdfgenerator');
		$this->load->helper('my_helper');
		$tanggal = $this->input->post('tanggal');

		$list = $this->adm->get_data_group_by_uk($tanggal);

		$html = '';
		$grandtotal = 0;
		$total_penerimaan = 0;
		$total_pengeluaran = 0;

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">LAPORAN ARUS DANA BERDASAR UNIT KERJA</span><p>';
		$html .= '<p>PERIODE: '.$tanggal.'</p>';
		if ($list->num_rows()>0) {
			$group = '';
			$no_urut = 0;
			$subtotal_group = 0;
			$subtotal_group2 = 0;

			$html .= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">
                        <thead>
                            <tr>
                                <th class="data-center" style="width:5%">No.</th>
                                <th class="data-center" style="width:15%">No Arus Dana</th>
                                <th class="data-center" style="width:10%">Tanggal</th>
                                <th class="data-center" style="width:15%">No Anggaran</th>
                                <th class="data-center" style="width:15%">Kategori</th>
                                <th class="data-center" style="width:15%">Anggaran</th>
                                <th class="data-center" style="width:15%">Kegiatan</th>
                                <th class="data-center" style="width:15%">Periode Pelaksanaan</th>
                                <th class="data-center" style="width:15%">Catatan</th>
                                <th class="data-center" style="width:15%">BBM</th>
                                <th class="data-center" style="width:15%">Uraian</th>
                                <th class="data-center" style="width:15%">Penerimaan</th>
                                <th class="data-center" style="width:15%">Pengeluaran</th>
                                <th class="data-center" style="width:15%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
			';
			foreach ($list->result_array() as $index => $value) {
				if ($group != $value['nama_unit_kerja']) {
					if ($group != '') {

						$html .= '<tr>
						<td colspan="10"></td>
						<td><b>Total</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
						<td></td>
						</tr>';

						$subtotal_group = 0;
						$subtotal_group2 = 0;
					}
					$group = $value['nama_unit_kerja'];
					$html .= '<tr><td colspan="14"><b>'.$group.'</b></td></tr>';
				}

				$detil = json_decode($value['json_detail']);
				$rowspan_angg = sizeof($detil);
				$row_detil = '';
				if ($detil) {
					
					foreach ($detil as $index2 => $value2) {
						$html.= '<tr>';
						if ($index2 == 0) {
							$html .= '<td rowspan="'.$rowspan_angg.'">'.($index+1).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_arus_dana'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['tanggal']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_kategori'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['periode_pelaksanaan']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['bbm'].'</td>';
						}
						$html .= '<td>'.$value2->uraian.'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->penerimaan,0).'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->pengeluaran,0).'</td>';
						$html .= '<td>'.$value2->keterangan.'</td>';
						$subtotal_group += $value2->penerimaan;
						$subtotal_group2 += $value2->pengeluaran;
						
						$total_penerimaan += $value2->penerimaan;
						$total_pengeluaran += $value2->pengeluaran;

						$html .= '</tr>';
					}
				}

				
				// $grandtotal += $value['total'];
			}

			if ($group !='') {
				$html .= '<tr>
				<td colspan="10"></td>
				<td><b>Total</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
				<td></td>
				</tr>';
			}
		}
		$grandtotal += $total_penerimaan - $total_pengeluaran;

		$html .= '
				</tbody>
				<tfoot>
				<tr>
					<th class="data-center" colspan="11">Total Keseluruhan:</th>
					<th class="data-right">'.format_ribuan_indo($total_penerimaan,0).'</th>
					<th class="data-right">'.format_ribuan_indo($total_pengeluaran,0).'</th>
					<th></th>
				</tr>
				<tr>
					<th class="data-center" colspan="11">Hasil (Pemasukan - Pengeluaran):</th>
					<th class="data-right" colspan="2">'.format_ribuan_indo($grandtotal,0).'</th>
					<th></th>
				</tr>
				</tfoot>
		</table>';


		$data['html'] = $html;
		$data['no_header'] = true;
		$data['no_footer'] = true;
        $this->pdfgenerator->setPaper('A4', 'landscape');
        $this->pdfgenerator->filename = "Permintaan Anggaran.pdf";
        $this->pdfgenerator->load_view('format_laporan', $data);
	}

	function get_data_by_id()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		// var_dump($id.$jenis);
		$data = [
		    'data' => $this->adm->get_by_id($id,$jenis)->row(),
		    'detil'  => $this->adm->get_detail_permintaan($id,$jenis)->result_array(),
		];

		echo json_encode($data);
	}
 	
	function cek_no()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$no = $this->input->post('no');
		// $data = [
		//     'data' => $this->adm->get_by_id($id,$jenis)->row(),
		//     'detil'  => $this->adm->get_detail_permintaan($id,$jenis)->result_array(),
		// ];

		$data = $this->adm->cek_no($no);

		echo json_encode($data);
	}

	function get_id_arusdana()
	{
		if(!$this->input->is_ajax_request()) redirect();
		
		$id = $this->input->post('id');
		
		$data = $this->adm->get_id_arusdana($id);

		echo json_encode($data);
	}

	public function save()
	{
		if(!$this->input->is_ajax_request()) redirect();

		$realisasi = json_decode($this->input->post('realisasi'));
		$realisasi->id_bagian = $this->session->userdata('id_bagian');
		$detail = (array) json_decode($this->input->post('detail'));
		
		// var_dump($realisasi);

		$permintaan = $this->adm->getAnggaran($realisasi->id_permintaan)->row();
		if ($realisasi->id_unit_kerja == '') {
			$realisasi->id_unit_kerja = NULL;
		}
		if ($realisasi->id_kategori == '') {
			$realisasi->id_kategori = NULL;
		}

		if ($realisasi->id_arus_dana != '') {
			//edit realisasi
			$update_realisasi = $this->adm->update(['id_arus_dana'=>$realisasi->id_arus_dana],
				$realisasi
			);
			$delete_detail = $this->adm->delete_detail(['id_arus_dana'=>$realisasi->id_arus_dana]);

			foreach ($detail as $key => $value) {
				$data_detil = [
					'id_arus_dana' => $realisasi->id_arus_dana,
					'uraian' => $value->uraian,
					'penerimaan' => $value->penerimaan,
					'pengeluaran' => $value->pengeluaran,
					'keterangan' => $value->keterangan,
				];
				$insert_detil = $this->adm->insert_detil($data_detil);
			}
			$id_realisasi = $realisasi->id_arus_dana;

		} else {
			if (isset($permintaan)) {
				$realisasi->no_arus_dana = $permintaan->no_anggaran;
				$realisasi->tanggal = date('Y-m-d');
				$realisasi->id_kategori = $permintaan->id_kategori;
				$realisasi->id_unit_kerja = $permintaan->id_unit_kerja;
				$realisasi->id_anggaran = $permintaan->id_anggaran;

				$idArusDana = $this->adm->storeArusDana($realisasi);
				$id_realisasi = $this->db->insert_id();
				$this->adm->updatePermintaanStatus($realisasi->id_permintaan, 'W');
				if ($idArusDana > 0) {
					foreach ($detail as $key => $d) {
						$da = (array) $d;
						$da['id_arus_dana'] = $idArusDana;
						$this->adm->storeChildArusDana($da);
					}
				}
				// echo json_encode(['status' => true, 'id_arus_dana' => $id_realisasi]);
			} else {
				$realisasi->tanggal = date('Y-m-d');
				
				$idArusDana = $this->adm->storeArusDana($realisasi);
				$id_realisasi = $this->db->insert_id();
				// $this->adm->updatePermintaanStatus($realisasi->id_permintaan, 'W');
				if ($idArusDana > 0) {
					foreach ($detail as $key => $d) {
						$da = (array) $d;
						$da['id_arus_dana'] = $idArusDana;
						$this->adm->storeChildArusDana($da);
					}
				}

			}
		}
				echo json_encode(['status' => true, 'id_arus_dana' => $id_realisasi]);
		
	}

	function delete()
	{
		if(!$this->input->is_ajax_request()) redirect();



		$this->db->trans_begin();
		$exec = $this->adm->delete_detail(['id_arus_dana' => $this->input->post('id')]);
		$exec = $this->adm->delete(['id_arus_dana' => $this->input->post('id')]);

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

	function cetak_laporan()
	{
		$id_arus_dana = $this->input->post('id_arus_dana');
	    $arus_dana = $this->adm->get_arusdana_by_id($id_arus_dana);
	    $detail_arus_dana = $this->adm->get_detail_arus_dana($arus_dana->id_arus_dana)->result_array();
		$this->load->library('Pdfgenerator');
		$this->load->helper('my_helper');

		$html = '';

		$html .= '<table width="100%">
					<tbody>
					<tr >
					  <td width="50%">';
					  if ($arus_dana->bbm == 1) {
					  	$html .= '<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">Laporan Reimburse BBM</span></p>';
					  }else{
					  	$html .= '<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">Laporan Arus Dana  </span></p>';
					  }
					  $html .='</td>
					  <td width="20%";">Bagian</td>
					  <td  width="30%">
						<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">: '.$this->session->userdata('kode_bagian').'</span></p></td>
					  
					</tr>
					<tr>
					  <td width="50%">
						
					  </td>
					  <td width="25%" style="text-decoration:underline">Realisasi Anggaran No.</td>
					  <td  width="25%">
						<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">: '.$arus_dana->no_arus_dana.'</span></p></td>
					</tr>
					</tbody>
					</table>';

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">LAPORAN ARUS DANA</span>
		';

		$detil_anggaran = $this->adm->get_detil_anggaran($arus_dana->id_anggaran);
		if ($arus_dana->bbm == 1) {
			$html.= '<p style="text-align:center;"">Kegiatan: Reimburse BBM</p>';
		}else{
			if ($detil_anggaran) {
				$html.= '<p style="text-align:center;"">Kegiatan: ('.$detil_anggaran->kode_anggaran.') '.$detil_anggaran->nama_anggaran.' </p>';
			} else {
				$html.= '<p style="text-align:center;"">Kegiatan: - </p>';
			}
		}

		$html .= '<p style="text-align:center;">Periode Pelaksanaan: '.bulan_tahun($arus_dana->periode_pelaksanaan).'</p><br>';

		$html.= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">';
		if ($arus_dana->bbm == 1) {
			$kolom = '<th class="data-center" style="width:5%">No.</th>
						<th class="data-center" style="width:55%">Uraian</th>
						<th class="data-center" style="width:15%">Realisasi (Rp)<br>Pengeluaran</th>
						<th class="data-center" style="width:25%">Keterangan</th>';
		}else{
			$kolom = '<th class="data-center" style="width:5%">No.</th>
						<th class="data-center" style="width:55%">Uraian</th>
						<th class="data-center" style="width:15%">Penerimaan Anggaran (Rp)</th>
						<th class="data-center" style="width:15%">Pengeluaran Realisasi (Rp)</th>
						<th class="data-center" style="width:25%">Anggaran-Realisasi<br>Retur/(Kurang) (Rp)</th>
						<th class="data-center" style="width:15%">Keterangan</th>';
		}
		$html.=		'<thead>
						<tr">
							'.$kolom.'
						</tr>
					</thead>';
		$html.= 	'<tbody>';
		$sum = 0;
		$sumterima = 0;
		$sumkeluar = 0;
		foreach ($detail_arus_dana as $key => $value) {
			if ($arus_dana->bbm == 1) {
				$html .= '<tr>
					<td class="data-center">'.($key+1).'</td>
					<td class="data-left">'.$value['uraian'].'</td>
					<td class="data-right">'.minus_kurung($value['penerimaan'] - $value['pengeluaran']).'</td>
					<td class="data-left">'.$value['keterangan'].'</td>
				</tr>';
			}else{
				$html .= '<tr>
					<td class="data-center">'.($key+1).'</td>
					<td class="data-left">'.$value['uraian'].'</td>
					<td class="data-right">'.minus_kurung($value['penerimaan']).'</td>
					<td class="data-right">'.minus_kurung($value['pengeluaran']).'</td>
					<td class="data-right">'.minus_kurung($value['penerimaan'] - $value['pengeluaran']).'</td>
					<td class="data-left">'.$value['keterangan'].'</td>
				</tr>';
			}
			$sumterima += $value['penerimaan'];
			$sumkeluar += $value['pengeluaran'];
			$sum += $value['penerimaan'] - $value['pengeluaran'];
		}
		if ($arus_dana->bbm == 1) {
			$html .= '<tfoot>
					<tr>
						<th colspan="2" class="data-center">TOTAL:</th>
						<th class="data-right">'.minus_kurung($arus_dana->total).'</th>
						<th class="data-right"></th>
						<th></th>
					</tr>
			</tfoot>';
		}else{
			$html .= '<tfoot>
					<tr>
						<th colspan="2" class="data-center">TOTAL:</th>
						<th class="data-right">'.minus_kurung($sumterima).'</th>
						<th class="data-right">'.minus_kurung($sumkeluar).'</th>
						<th class="data-right">'.minus_kurung($arus_dana->total).'</th>
						<th></th>
					</tr>
			</tfoot>';

		}
		$html.='</tbody></table>';
		$html.= '<p>Catatan: '.$arus_dana->catatan.' </p><br>';
		$ttd = $this->adm->get_list_ttd($arus_dana->bbm);
		if ($arus_dana->bbm == 1) {
			$pembuat = $this->adm->get_pembuat($arus_dana->id_pj)->row();
			// var_dump($pembuat);
			$html.= '<table style="table-layout:fixed;" width="100%">
			<tr>
				<td style="width:50%" class="data-center">&nbsp;</td>
				<td style="width:50%" class="data-center">Surabaya, '.tanggal_full(date("Y/m/d")).'</td>
			</tr>
			<tr>
				<td style="width:50%" class="data-center">Disetujui Oleh:</td>
				<td style="width:50%" class="data-center">Dibuat Oleh:</td>
			</tr>
			<tr><td style="width:50%" class="data-center">
					<br><br><br><br>
					<span style="font-weight:bold;text-decoration:underline">'.$ttd->disetujui.'</span><br>
					<span>'.$ttd->jabatan_penyetuju.'</span>
				</td>';

			if(isset($arus_dana->id_pj) && isset($pembuat)){
				$html .='<td style="width:50%" class="data-center">
					<br><br><br><br>
					<span style="font-weight:bold;text-decoration:underline">'.$pembuat->nama.'</span><br>
					<span>'.$pembuat->jabatan.'</span>
				</td>';

			}
				$html .='</tr>
			</table>';

			
		}else{

		$html.= '<table style="table-layout:fixed;" width="100%">
			<tr>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">Surabaya, '.tanggal_full(date("Y/m/d")).'</td>
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
	}

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

		$list = $this->adm->get_data_tbl1($tanggal);
		// log_message('error',$this->db->last_query());
		$html = '';
		$grandtotal = 0;
		$total_penerimaan = 0;
		$total_pengeluaran = 0;

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">LAPORAN ARUS DANA</span><p>';
		$html .= '<p>PERIODE: '.$tanggal.'</p>';

		if ($list->num_rows()>0) {
			$html .= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">
                        <thead>
                            <tr>
                                <th class="data-center" style="width:5%">No.</th>
                                <th class="data-center" style="width:15%">Unit Kerja</th>
                                <th class="data-center" style="width:15%">No Arus Dana</th>
                                <th class="data-center" style="width:10%">Tanggal</th>
                                <th class="data-center" style="width:15%">No Anggaran</th>
                                <th class="data-center" style="width:15%">Kategori</th>
                                <th class="data-center" style="width:15%">Anggaran</th>
                                <th class="data-center" style="width:15%">Kegiatan</th>
                                <th class="data-center" style="width:15%">Periode Pelaksanaan</th>
                                <th class="data-center" style="width:15%">Catatan</th>
                                <th class="data-center" style="width:15%">BBM</th>
                                <th class="data-center" style="width:15%">Uraian</th>
                                <th class="data-center" style="width:15%">Penerimaan</th>
                                <th class="data-center" style="width:15%">Pengeluaran</th>
                                <th class="data-center" style="width:15%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
			';
			
			if ($list->num_rows()>0) {
				foreach ($list->result_array() as $index => $value) {

					$detil = json_decode($value['json_detail']);
					$rowspan_angg = sizeof($detil);
					if ($detil) {
						
						foreach ($detil as $index2 => $value2) {
							$html.= '<tr>';
							if ($index2 == 0) {
								$html .= '<td rowspan="'.$rowspan_angg.'">'.($index+1).'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_unit_kerja'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_arus_dana'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['tanggal']).'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_kategori'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['periode_pelaksanaan']).'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
								$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['bbm'].'</td>';
							}
							$html .= '<td>'.$value2->uraian.'</td>';
							$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->penerimaan,0).'</td>';
							$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->pengeluaran,0).'</td>';
							$html .= '<td>'.$value2->keterangan.'</td>';
							$html .= '</tr>';
							
							$total_penerimaan += $value2->penerimaan;
							$total_pengeluaran += $value2->pengeluaran;

						}
					}

				}

			}
			$grandtotal += $total_penerimaan - $total_pengeluaran;


		}
		$html .= '
				</tbody>
				<tfoot>
				<tr>
					<th class="data-center" colspan="12">Total Keseluruhan:</th>
					<th class="data-right">'.format_ribuan_indo($total_penerimaan,0).'</th>
					<th class="data-right">'.format_ribuan_indo($total_pengeluaran,0).'</th>
					<th></th>
				</tr>
				<tr>
					<th class="data-center" colspan="12">Hasil (Pemasukan - Pengeluaran):</th>
					<th class="data-right" colspan="2">'.format_ribuan_indo($grandtotal,0).'</th>
					<th></th>
				</tr>
				</tfoot>
		</table>';


		$data['html'] = $html;
		$data['no_header'] = true;
		$data['no_footer'] = true;
        $this->pdfgenerator->setPaper('A4', 'landscape');
        $this->pdfgenerator->filename = "Permintaan Anggaran.pdf";
        $this->pdfgenerator->load_view('format_laporan', $data);
	}

	function export_pdf3()
	{
		$this->load->library('Pdfgenerator');
		$this->load->helper('my_helper');
		$tanggal = $this->input->post('tanggal');

		$list = $this->adm->get_data_group_by_uk($tanggal);

		$html = '';
		$grandtotal = 0;
		$total_penerimaan = 0;
		$total_pengeluaran = 0;

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">LAPORAN ARUS DANA BERDASAR KATEGORI</span><p>';
		$html .= '<p>PERIODE: '.$tanggal.'</p>';
		if ($list->num_rows()>0) {
			$group = '';
			$no_urut = 0;
			$subtotal_group = 0;
			$subtotal_group2 = 0;

			$html .= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">
                        <thead>
                            <tr>
                                <th class="data-center" style="width:5%">No.</th>
                                <th class="data-center" style="width:15%">No Arus Dana</th>
                                <th class="data-center" style="width:10%">Tanggal</th>
                                <th class="data-center" style="width:15%">No Anggaran</th>
                                <th class="data-center" style="width:15%">Unit Kerja</th>
                                <th class="data-center" style="width:15%">Anggaran</th>
                                <th class="data-center" style="width:15%">Kegiatan</th>
                                <th class="data-center" style="width:15%">Periode Pelaksanaan</th>
                                <th class="data-center" style="width:15%">Catatan</th>
                                <th class="data-center" style="width:15%">BBM</th>
                                <th class="data-center" style="width:15%">Uraian</th>
                                <th class="data-center" style="width:15%">Penerimaan</th>
                                <th class="data-center" style="width:15%">Pengeluaran</th>
                                <th class="data-center" style="width:15%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
			';
			foreach ($list->result_array() as $index => $value) {
				if ($group != $value['nama_kategori']) {
					if ($group != '') {

						$html .= '<tr>
						<td colspan="10"></td>
						<td><b>Total</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
						<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
						<td></td>
						</tr>';

						$subtotal_group = 0;
						$subtotal_group2 = 0;
					}
					$group = $value['nama_kategori'];
					$html .= '<tr><td colspan="14"><b>'.$group.'</b></td></tr>';
				}

				$detil = json_decode($value['json_detail']);
				$rowspan_angg = sizeof($detil);
				$row_detil = '';
				if ($detil) {
					
					foreach ($detil as $index2 => $value2) {
						$html.= '<tr>';
						if ($index2 == 0) {
							$html .= '<td rowspan="'.$rowspan_angg.'">'.($index+1).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_arus_dana'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['tanggal']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['no_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_unit_kerja'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['kode_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['nama_anggaran'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.to_date_format_mysql($value['periode_pelaksanaan']).'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['catatan'].'</td>';
							$html .= '<td rowspan="'.$rowspan_angg.'">'.$value['bbm'].'</td>';
						}
						$html .= '<td>'.$value2->uraian.'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->penerimaan,0).'</td>';
						$html .= '<td style="text-align: right;">'.format_ribuan_indo($value2->pengeluaran,0).'</td>';
						$html .= '<td>'.$value2->keterangan.'</td>';
						$subtotal_group += $value2->penerimaan;
						$subtotal_group2 += $value2->pengeluaran;
						
						$total_penerimaan += $value2->penerimaan;
						$total_pengeluaran += $value2->pengeluaran;

						$html .= '</tr>';
					}
				}

				
				// $grandtotal += $value['total'];
			}

			if ($group !='') {
				$html .= '<tr>
				<td colspan="10"></td>
				<td><b>Total</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group,0).'</b></td>
				<td style="text-align: right;"><b>'.format_ribuan_indo($subtotal_group2,0).'</b></td>
				<td></td>
				</tr>';
			}
		}
		$grandtotal += $total_penerimaan - $total_pengeluaran;

		$html .= '
				</tbody>
				<tfoot>
				<tr>
					<th class="data-center" colspan="11">Total Keseluruhan:</th>
					<th class="data-right">'.format_ribuan_indo($total_penerimaan,0).'</th>
					<th class="data-right">'.format_ribuan_indo($total_pengeluaran,0).'</th>
					<th></th>
				</tr>
				<tr>
					<th class="data-center" colspan="11">Hasil (Pemasukan - Pengeluaran):</th>
					<th class="data-right" colspan="2">'.format_ribuan_indo($grandtotal,0).'</th>
					<th></th>
				</tr>
				</tfoot>
		</table>';


		$data['html'] = $html;
		$data['no_header'] = true;
		$data['no_footer'] = true;
        $this->pdfgenerator->setPaper('A4', 'landscape');
        $this->pdfgenerator->filename = "Permintaan Anggaran.pdf";
        $this->pdfgenerator->load_view('format_laporan', $data);
	}
}

/* End of file Arusdana.php */
/* Location: ./application/controllers/Arusdana.php */