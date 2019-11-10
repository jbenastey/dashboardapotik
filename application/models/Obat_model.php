<?php

class Obat_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function tambah_obat($data)
	{

		$this->db->insert('obat', $data);
		return $this->db->affected_rows();
	}

	public function lihat_obat()
	{
		$this->db->select('*');
		$this->db->from('obat');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_obat_tahun($tahun)
	{
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->like('tgl_update',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satuobat($code)
	{

		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('kode_obat', $code);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function edit_obat($data, $id)
	{
		$this->db->where('kode_obat', $id);
		$this->db->update('obat', $data);
	}

	public function delete_obat($id)
	{
		$this->db->where('kode_obat', $id);
		$this->db->delete('obat');
	}

	public function obat_tahun($tahun){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->like('tgl_update',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function upload_excel($file){
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = FCPATH.'/excel/import/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = false;

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
		$this->db->insert_batch('obat', $data);
	}
}
