<?php

class Transaksi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function tambah_transaksi($data)
	{

		$this->db->insert('transaksi', $data);
		return $this->db->affected_rows();
	}

	public function lihat_transaksi()
	{

		$this->db->select('*');
		$this->db->from('transaksi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satutransaksi($code)
	{

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $code);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_transaksi_tahun($tahun)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->like('tgl_transaksi', $tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_transaksi($data, $id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}

	public function delete_transaksi($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete('transaksi');
	}

	public function transaksi_tahun($tahun){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->like('tgl_transaksi',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function transaksi_kategori($kategori,$tahun){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('kategori',$kategori);
		$this->db->like('tgl_transaksi',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function upload_excel($file){
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = FCPATH.'/excel/import/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload($file)){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_multiple($data){
		$this->db->insert_batch('transaksi', $data);
	}
}
