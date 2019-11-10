<?php

class ObatController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'obat' => $this->Obat_model->lihat_obat(),
		);

		$this->load->view('template/header');
		$this->load->view('obat/index', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		if (isset($_POST['simpan'])) {
			$kode_obat = $this->input->post('kode_obat');
			$jenis_obat = $this->input->post('jenis_obat');
			$nama_obat = $this->input->post('nama_obat');
			$bentuk_obat = $this->input->post('bentuk_obat');
			$golongan_obat = $this->input->post('golongan_obat');
			$kelompok_obat = $this->input->post('kelompok_obat');
			$harga_pembelian = $this->input->post('harga_pembelian');
			$persediaan_obat = $this->input->post('persediaan_obat');
			$produsen_obat = $this->input->post('produsen_obat');
			$tgl = date('Y-m-d H:i:s');
			$tgl_expired = $this->input->post('tgl_expired');
			$data = array(
				'kode_obat' => $kode_obat,
				'jenis_obat' => $jenis_obat,
				'nama_obat' => $nama_obat,
				'bentuk_obat' => $bentuk_obat,
				'golongan_obat' => $golongan_obat,
				'kelompok_obat' => $kelompok_obat,
				'harga_pembelian' => $harga_pembelian,
				'persediaan_obat' => $persediaan_obat,
				'produsen_obat' => $produsen_obat,
				'tgl_update' => $tgl,
				'tgl_expired' => $tgl_expired,
			);
			$save = $this->Obat_model->tambah_obat($data);
			if ($save > 0) {
				// $this->session->set_flashdata('alert','tambah_transaksi');
				redirect('obat');
			} else {
				redirect('obat');
			}

			# code...
		}
		$this->load->view('template/header');
		$this->load->view('obat/create');
		$this->load->view('template/footer');
	}

	public function edit($code)
	{
		if (isset($_POST['simpan'])) {

			$jenis_obat = $this->input->post('jenis_obat');
			$nama_obat = $this->input->post('nama_obat');
			$bentuk_obat = $this->input->post('bentuk_obat');
			$golongan_obat = $this->input->post('golongan_obat');
			$kelompok_obat = $this->input->post('kelompok_obat');
			$harga_pembelian = $this->input->post('harga_pembelian');
			$persediaan_obat = $this->input->post('persediaan_obat');
			$produsen_obat = $this->input->post('produsen_obat');


			$data = array(

				'jenis_obat' => $jenis_obat,
				'nama_obat' => $nama_obat,
				'bentuk_obat' => $bentuk_obat,
				'golongan_obat' => $golongan_obat,
				'kelompok_obat' => $kelompok_obat,
				'harga_pembelian' => $harga_pembelian,
				'persediaan_obat' => $persediaan_obat,
				'produsen_obat' => $produsen_obat,

			);
			$save = $this->Obat_model->edit_obat($data, $code);
			if ($save > 0) {
				// $this->session->set_flashdata('alert','tambah_transaksi');
				redirect('obat');
			} else {
				redirect('obat');
			}

			# code...
		}
		$data = array(
			'obat' => $this->Obat_model->lihat_satuobat($code)
		);
		$this->load->view('template/header');
		$this->load->view('obat/edit', $data);
		$this->load->view('template/footer');
	}

	public function delete($code)
	{
		$this->Obat_model->delete_obat($code);
		redirect('obat');
	}

	public function grafik()
	{
		$this->load->view('template/header');
		$this->load->view('obat/grafik');
		$this->load->view('template/footer');
	}

	public function datagrafik($tahun)
	{
		$obat = $this->Obat_model->lihat_obat_tahun($tahun);
		$alkes = 0;
		$alkes_sedia = 0;
		$alkes_produsen = 0;

		$tablet = 0;
		$tablet_sedia = 0;
		$tablet_produsen = 0;

		$salep = 0;
		$salep_sedia = 0;
		$salep_produsen = 0;

		$cairan = 0;
		$cairan_sedia = 0;
		$cairan_produsen = 0;

		$sirup = 0;
		$sirup_sedia = 0;
		$sirup_produsen = 0;

		$injeksi = 0;
		$injeksi_sedia = 0;
		$injeksi_produsen = 0;
		foreach ($obat as $value) {
			$Kategori[] = $value['jenis_obat'];
			$Nama[] = $value['nama_obat'];
			$Harga[] = (float)$value['harga_pembelian'];
			$Jumlah[] = (float)$value['persediaan_obat'];
			$produsen[] = (float)$value['produsen_obat'];
			# code...
			if ($value ['bentuk_obat'] == 'ALKES') {
				$alkes = $alkes + 1;
				$alkes_sedia = $alkes_sedia + $value['persediaan_obat'];
				$alkes_produsen = $alkes_produsen + $value['produsen_obat'];
			} elseif ($value ['bentuk_obat'] == 'TABLET') {
				$tablet = $tablet + 1;
				$tablet_sedia = $tablet_sedia + $value['persediaan_obat'];
				$tablet_produsen = $tablet_produsen + $value['produsen_obat'];
			} elseif ($value ['bentuk_obat'] == 'SALEP') {
				$salep = $salep + 1;
				$salep_sedia = $salep_sedia + $value['persediaan_obat'];
				$salep_produsen = $salep_produsen + $value['produsen_obat'];
			} elseif ($value ['bentuk_obat'] == 'CAIRAN') {
				$cairan = $cairan + 1;
				$cairan_sedia = $cairan_sedia + $value['persediaan_obat'];
				$cairan_produsen = $cairan_produsen + $value['produsen_obat'];
			} elseif ($value ['bentuk_obat'] == 'SIRUP') {
				$sirup = $sirup + 1;
				$sirup_sedia = $sirup_sedia + $value['persediaan_obat'];
				$sirup_produsen = $sirup_produsen + $value['produsen_obat'];
			} elseif ($value ['bentuk_obat'] == 'INJEKSI') {
				$injeksi = $injeksi + 1;
				$injeksi_sedia = $injeksi_sedia + $value['persediaan_obat'];
				$injeksi_produsen = $injeksi_produsen + $value['produsen_obat'];
			}
		}


		$data = array(
			'kategori' => $Kategori,
			'Nama' => $Nama,
			'Harga' => $Harga,
			'Jumlah' => $Jumlah,
			'produsen' => $produsen,
			'alkes' => $alkes,
			'alkes_sedia' => $alkes_sedia,
			'alkes_produsen' => $alkes_produsen,
			'tablet' => $tablet,
			'tablet_sedia' => $tablet_sedia,
			'tablet_produsen' => $tablet_produsen,
			'salep' => $salep,
			'salep_sedia' => $salep_sedia,
			'salep_produsen' => $salep_produsen,
			'cairan' => $cairan,
			'cairan_sedia' => $cairan_sedia,
			'cairan_produsen' => $cairan_produsen,
			'sirup' => $sirup,
			'sirup_sedia' => $sirup_sedia,
			'sirup_produsen' => $sirup_produsen,
			'injeksi' => $injeksi,
			'injeksi_sedia' => $injeksi_sedia,
			'injeksi_produsen' => $injeksi_produsen,
		);
		echo json_encode($data);

	}

	public function grafik_tahun(){
		$obat = array(
			'data2015' => count($this->Obat_model->obat_tahun('2015')),
			'data2016' => count($this->Obat_model->obat_tahun('2016')),
			'data2017' => count($this->Obat_model->obat_tahun('2017')),
			'data2018' => count($this->Obat_model->obat_tahun('2018')),
			'data2019' => count($this->Obat_model->obat_tahun('2019')),
			'data2020' => count($this->Obat_model->obat_tahun('2020')),
		);
		echo json_encode($obat);
	}
}
