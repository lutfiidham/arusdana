<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_anggaran_model extends CI_Model {

	private $table= 'permintaan_anggaran';

	function get_data()
	{
		$this->db->select('format_kode_project(id_project) as kode_project,nama_project,nama_customer, project_start_date,project_end_date,status_project, (select count(id_vendor) from project_vendor where id_project = project.id_project) as jumlah_vendor, id_project,tgl_pengisian_tender');
		$this->db->join('customer', 'customer.id_customer = project.id_customer');
		$this->db->where('project_deleted', 0);
		return $this->db->get('project');
	}

	function get_data_project_vendor($id_project)
	{
		$this->db->select("pv.id_project,pv.id_vendor,pv.tipe_pembelian, CONCAT(pv.id_vendor,'',pv.tipe_pembelian) as id, v.nama_vendor, pv.no_quotation, pv.nilai_quotation_awal,pv.nilai_quotation_akhir,expired_quotation,pv.status,pv.keterangan,pv.lampiran");
		$this->db->from('project_vendor pv');
		$this->db->join('vendor v', 'pv.id_vendor = v.id_vendor');
		$this->db->where('id_project', $id_project);
		return $this->db->get();
	}


	function get_by_id($id)
	{
		$this->db->select('project.*,format_kode_project(id_project) as kode_project');
		$this->db->where('id_project', $id);
		return $this->db->get($this->table);
	}


	function save($data){
		$insert = $this->db->insert($this->table, $data);
		return $insert;
	}

	function update($where,$data){
		$this->db->where($where);
		$update = $this->db->update($this->table, $data);
		return $update;
	}

	function delete($where)
	{
		$this->db->where($where);
		$delete = $this->db->delete($this->table);
		return $delete;
	}

	function insert_vendor($data)
	{
		$insert = $this->db->insert('project_vendor', $data);
		return $insert;
	}

	function delete_vendor($where)
	{
		$this->db->where($where);
		$delete = $this->db->delete('project_vendor');
		return $delete;
	}

	// function insert_tender_vendor($data)
	// {
	// 	$insert = $this->db->insert('tender_vendor', $data);
	// 	return $insert;
	// }

	function insert_tender_vendor($data)
	{
		$query = "insert ignore into tender_vendor (id_project,id_vendor,tipe_pembelian) values (?,?,?)";
		return $this->db->query($query,[$data['id_project'],$data['id_vendor'],$data['tipe_pembelian']]);
	}


	function sinkron_tender_project_vendor($where)
	{
		$tender_vendor = $this->db->get_where('tender_vendor', $where);
		foreach ($tender_vendor->result_array() as $key => $value) {
			$kondisi = [
			    'id_project' => $value['id_project'],
			    'id_vendor' => $value['id_vendor'],
			    'tipe_pembelian' => $value['tipe_pembelian']
			];
			$cek = $this->db->get_where('project_vendor', $kondisi)->num_rows();
			if ($cek==0) {
				$this->db->where($kondisi);
				$delete_tender_vendor = $this->db->delete('tender_vendor');
			}
		}
	}

	function get_unit_kerja()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('status', 'A');
		$this->db->order_by('nama_unit_kerja');
		return $this->db->get('unit_kerja');
	}

	function get_kategori()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('status', 'A');
		$this->db->order_by('nama_kategori');
		return $this->db->get('kategori');
	}

	function get_anggaran()
	{
		$this->db->where('id_bagian', $this->session->userdata('id_bagian'));
		$this->db->where('status', 'A');
		$this->db->order_by('kode_anggaran');
		return $this->db->get('anggaran');
	}

	function get_data_vendor()
	{
		$this->db->where('status_vendor', 'A');
		$this->db->order_by('nama_vendor');
		return $this->db->get('vendor');
	}

	function get_data_sales()
	{
		$this->db->where('status_sales', 'A');
		$this->db->order_by('nik_sales', 'asc');
		return $this->db->get('sales');
	}

	function get_data_customer()
	{
		$this->db->select('id_customer,nama_customer,nama_tipe_customer');
		$this->db->join('tipe_customer', 'tipe_customer.id_tipe_customer = customer.id_tipe_customer');
		$this->db->where('status_customer', 'A');
		$this->db->order_by('nama_tipe_customer', 'asc');
		$this->db->order_by('nama_customer', 'asc');
		return $this->db->get('customer');
	}


	function get_detil_customer($id_customer = null)
	{
		$this->db->select('email_customer, telp_customer, path_foto_customer');
		$this->db->where('id_customer', $id_customer);
		return $this->db->get('customer');
	}

	function get_detil_sales($id_sales = null)
	{
		$this->db->where('id_sales', $id_sales);
		return $this->db->get('sales');
	}

	function get_data_tender($id_project)
	{
		$this->db->select('id_project,format_kode_project(id_project) as kode_project,nama_project,nama_customer, project_start_date,project_end_date,status_project,tipe_pembelian,no_fs_barang,spk_fs_barang,tgl_fs_barang,no_fs_jasa,spk_fs_jasa,tgl_fs_jasa,path_foto_customer,tgl_pengisian_tender,nilai_project,tgl_fs_approved,tgl_project_final');
		$this->db->join('customer', 'customer.id_customer = project.id_customer');		
		$this->db->where('id_project', $id_project);
		return $this->db->get('project');
	}

	function get_data_tender_vendor($data)
	{
		$this->db->select('id_project,id_vendor,tipe_pembelian,no_po_spk,v_commitment_start,v_commitment_finish');		
		$this->db->where('id_project', $data['id_project']);
		$this->db->where('id_vendor', $data['id_vendor']);
		$this->db->where('tipe_pembelian', $data['tipe_pembelian']);
		return $this->db->get('tender_vendor');
	}


}

/* End of file Project_model.php */
/* Location: ./application/models/Project_model.php */