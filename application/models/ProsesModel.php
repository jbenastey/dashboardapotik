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
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->join('dim_transaksi','dim_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function transaksi_tahun($tahun){
		$this->db->select('*');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->like('waktu_tahun',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function transaksi_kategori($kategori,$tahun,$bulan){
		$this->db->select('obat_nama, count(obat_nama) as total');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->where('transaksi_kelompok',$kategori);
		$this->db->like('waktu_tahun',$tahun);
		$this->db->like('waktu_bulan',$bulan);
		$this->db->group_by('obat_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function transaksi_bulan($tahun,$bulan){
		$this->db->select('*');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->like('waktu_tahun',$tahun);
		$this->db->like('waktu_bulan',$bulan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function obat_terbanyak()
	{
		$this->db->select('*, count(obat_nama) as total');
		$this->db->group_by('obat_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_obat');
		return $query->result_array();
	}
	public function produsen_terbanyak()
	{
		$this->db->select('*, count(produsen_nama) as total');
		$this->db->group_by('produsen_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_produsen');
		return $query->result_array();
	}
	public function dokter_terbanyak()
	{
		$this->db->select('*, count(dokter_nama) as total');
		$this->db->group_by('dokter_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_dokter');
		return $query->result_array();
	}
	public function pasien_terbanyak()
	{
		$this->db->select('*, count(pasien_nama) as total');
		$this->db->group_by('pasien_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_pasien');
		return $query->result_array();
	}
	public function poliklinik_terbanyak()
	{
		$this->db->select('*, count(ruang_poliklinik) as total');
		$this->db->group_by('ruang_poliklinik');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_ruang');
		return $query->result_array();
	}
	public function obat_termahal()
	{
		$this->db->select('*, count(obat_nama) as total');
		$this->db->group_by('obat_nama');
		$this->db->order_by('total','desc');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$query = $this->db->get('fact_penjualan');
		return $query->result_array();
	}

	public function hapus($table,$id,$key){
		$this->db->where($key,$id);
		$this->db->delete($table);
	}

	public function hapus_semua($table){
		$this->db->empty_table($table);
	}

}
