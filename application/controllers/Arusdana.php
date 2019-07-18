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
				$data['data'][$key][] = $value['kode_anggaran'].' - '.$value['nama_anggaran'];
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
		$detail = (array) json_decode($this->input->post('detail'));
		
		$permintaan = $this->adm->getAnggaran($realisasi->id_permintaan)->row();

		if (isset($permintaan)) {
			$realisasi->no_arus_dana = $permintaan->no_anggaran;
			$realisasi->tanggal = date('Y-m-d');
			$realisasi->id_unit_kerja = $permintaan->id_unit_kerja;
			$realisasi->id_kategori = $permintaan->id_kategori;
			$realisasi->id_anggaran = $permintaan->id_anggaran;

			$idArusDana = $this->adm->storeArusDana($realisasi);
			$this->adm->updatePermintaanStatus($realisasi->id_permintaan, 'W');
			if ($idArusDana > 0) {
				foreach ($detail as $key => $d) {
					$da = (array) $d;
					$da['id_arus_dana'] = $idArusDana;
					$this->adm->storeChildArusDana($da);
				}
			}

			echo json_encode(['status' => true]);
		} else {
			// isien nang kene
			echo json_encode(['status' => false]);
		}
	}

	function cetak_laporan()
	{
		$id_arus_dana = $this->input->post('id_arus_dana');
	    $arus_dana = $this->adm->get_arusdana_by_id($id_arus_dana);
	    $detail_arus_dana = $this->adm->get_detail_arus_dana($arus_dana->id_arus_dana)->result_array();
		$this->load->library('Pdfgenerator');
		$this->load->helper('my_helper');

		$html = '';

		$html .= '';

		$html .= '<table width="100%" style="margin: 0px;">
					<tr style="padding-top:1px;
  padding-bottom:1px;
  padding-right:1px;">
					  <td width="50%" style="padding-top:1px;
  padding-bottom:1px;
  padding-right:1px;">
						<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">Laporan Arus Dana  </span>
					  </td>
					  <td width="20%">Bagian</td>
					  <td  width="30%">
						<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">: '.$this->session->userdata('kode_bagian').'</span></td>
					  
					</tr>
					<tr style="padding-top:1px;
  padding-bottom:1px;
  padding-right:1px;">
					  <td width="50%">
						
					  </td>
					  <td width="25%" style="text-decoration:underline">Realisasi Anggaran No.</td>
					  <td  width="25%">
						<p style="text-align:left;"><span style="font-size:12px;text-decoration:underline">: '.$arus_dana->no_arus_dana.'</span></td>
					  
					</tr>
					
					</table>';

		$html .= '<p style="text-align:center;"><span style="font-weight:bold; font-size:20px;text-decoration:underline">LAPORAN ARUS DANA</span>
		<br>
		';

		$detil_anggaran = $this->adm->get_detil_anggaran($arus_dana->id_anggaran);
		$html.= '<p style="text-align:center;"">Kegiatan: ('.$detil_anggaran->kode_anggaran.') '.$detil_anggaran->nama_anggaran.' </p><br>';
		$html .= '<p style="text-align:center;text-decoration:underline">Tanggal Kebutuhan: '.tanggal_full($arus_dana->tanggal).'</p><br>';

		$html.= '<table style="border-collapse: collapse; table-layout:fixed;" border="1px solid" width="100%">';
		$html.=		'<thead>
						<tr">
							<th class="data-center" style="width:5%">No.</th>
							<th class="data-center" style="width:35%">Uraian</th>
							<th class="data-center" style="width:25%">Penerimaan Anggaran (Rp)</th>
							<th class="data-center" style="width:25%">Pengeluaran Realisasi (Rp)</th>
							<th class="data-center" style="width:25%">Anggaran-Realisasi<br>Retur/(Kurang) (Rp)</th>
							<th class="data-center" style="width:35%">Keterangan</th>
						</tr>
					</thead>';
		$html.= 	'<tbody>';
		$sum = 0;
		$sumterima = 0;
		$sumkeluar = 0;
		foreach ($detail_arus_dana as $key => $value) {
			$html .= '<tr>
				<td class="data-center">'.($key+1).'</td>
				<td class="data-left">'.$value['uraian'].'</td>
				<td class="data-right">'.format_ribuan_indo($value['penerimaan'],0).'</td>
				<td class="data-right">'.format_ribuan_indo($value['pengeluaran'],0).'</td>
				<td class="data-right">'.format_ribuan_indo($value['penerimaan'] - $value['pengeluaran'],0).'</td>
				<td class="data-left">'.$value['keterangan'].'</td>
			</tr>';
			$sumterima += $value['penerimaan'];
			$sumkeluar += $value['pengeluaran'];
			$sum += $value['penerimaan'] - $value['pengeluaran'];
		}
		$html .= '<tfoot>
				<tr>
					<th colspan="2" class="data-center">TOTAL:</th>
					<th class="data-right">'.format_ribuan_indo($sumterima,0).'</th>
					<th class="data-right">'.format_ribuan_indo($sumkeluar,0).'</th>
					<th class="data-right">'.format_ribuan_indo($arus_dana->total,0).'</th>
					<th></th>
				</tr>
		</tfoot>';
		$html.='</tbody></table>';
		$html.= '<p>Catatan: '.$arus_dana->catatan.' </p><br>';
		$ttd = $this->adm->get_list_ttd();
		$html.= '<table style="table-layout:fixed;" width="100%">
			<tr>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">&nbsp;</td>
				<td style="width:33%" class="data-center">Surabaya, '.tanggal_full($arus_dana->tanggal).'</td>
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
}

/* End of file Arusdana.php */
/* Location: ./application/controllers/Arusdana.php */