<?php


class ProsesModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function upload_excel($file)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = FCPATH . '/excel/import/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '2048';
		$config['overwrite'] = true;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload($file)) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_excel($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}

	public function lihat($table)
	{
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_dimensi($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}

	public function buku_terbanyak()
	{
		$this->db->select('buku_judul, count(buku_judul) as total');
		$this->db->group_by('buku_judul');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_buku');
		return $query->result_array();
	}
	public function pinjam_terbanyak()
	{
		$this->db->select('peminjam_nama, count(peminjam_nama) as total');
		$this->db->group_by('peminjam_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_peminjam');
		return $query->result_array();
	}
	public function laporan()
	{
		$this->db->select('*');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_golongan','excel_golongan.golongan_id = fact_penjualan.id_golongan');
		$this->db->join('excel_kategori','excel_kategori.kategori_id = fact_penjualan.id_kategori');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_penjual','excel_penjual.penjual_id = fact_penjualan.id_penjual');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$query = $this->db->get();
		return $query->result_array();
	}
}
