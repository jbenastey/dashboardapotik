<?php

class TransaksiController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->Transaksi_model->lihat_transaksi(),
		);

		$this->load->view('template/header');
		$this->load->view('transaksi/index', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		if (isset($_POST['simpan'])) {
			$tgl = date('Y-m-d H:i:s');
			$jenis_transaksi = $this->input->post('jenis_transaksi');
			$nama_obat = $this->input->post('nama_obat');
			$tempat_obat = $this->input->post('tempat_obat');
			$debet = $this->input->post('debet');
			$kredit = $this->input->post('kredit');
			$biaya = $this->input->post('biaya');
			$kategori = $this->input->post('kategori');
			$data = array(
				'tgl_transaksi' => $tgl,
				'jenis_transaksi' => $jenis_transaksi,
				'nama_obat' => $nama_obat,
				'tempat_obat' => $tempat_obat,
				'debet' => $debet,
				'kredit' => $kredit,
				'biaya' => $biaya,
				'kategori' => $kategori,
			);
			$save = $this->Transaksi_model->tambah_transaksi($data);
			if ($save > 0) {
				// $this->session->set_flashdata('alert','tambah_transaksi');
				redirect('transaksi');
			} else {
				redirect('transaksi');
			}

			# code...
		}
		$this->load->view('template/header');
		$this->load->view('transaksi/create');
		$this->load->view('template/footer');
	}

	public function edit($code)
	{
		if (isset($_POST['simpan'])) {

			$jenis_transaksi = $this->input->post('jenis_transaksi');
			$nama_obat = $this->input->post('nama_obat');
			$tempat_obat = $this->input->post('tempat_obat');
			$debet = $this->input->post('debet');
			$kredit = $this->input->post('kredit');
			$biaya = $this->input->post('biaya');
			$kategori = $this->input->post('kategori');

			$data = array(
				'kategori' => $kategori,
				'jenis_transaksi' => $jenis_transaksi,
				'nama_obat' => $nama_obat,
				'tempat_obat' => $tempat_obat,
				'debet' => $debet,
				'kredit' => $kredit,
				'biaya' => $biaya,

			);
			$save = $this->Transaksi_model->edit_transaksi($data, $code);
			if ($save > 0) {
				// $this->session->set_flashdata('alert','tambah_transaksi');
				redirect('transaksi');
			} else {
				redirect('transaksi');
			}

			# code...
		}
		$data = array(
			'transaksi' => $this->Transaksi_model->lihat_satutransaksi($code)
		);
		$this->load->view('template/header');
		$this->load->view('transaksi/edit', $data);
		$this->load->view('template/footer');
	}

	public function delete($code)
	{
		$this->Transaksi_model->delete_transaksi($code);
		redirect('transaksi');
	}

	public function grafik()
	{
		$this->load->view('template/header');
		$this->load->view('transaksi/grafik');
		$this->load->view('template/footer');
	}

	public function datagrafik($tahun)
	{
		$transaksi = $this->Transaksi_model->lihat_transaksi_tahun($tahun);

		$lain_total = 0;
		$lain_penjualan = 0;
		$lain_koreksi = 0;
		$lain_pembelian = 0;
		$lain_sedia = 0;
		$lain_mutasi = 0;

		$askes_total = 0;
		$askes_penjualan = 0;
		$askes_koreksi = 0;
		$askes_pembelian = 0;
		$askes_sedia = 0;
		$askes_mutasi = 0;

		$non_total = 0;
		$non_penjualan = 0;
		$non_koreksi = 0;
		$non_pembelian = 0;
		$non_sedia = 0;
		$non_mutasi = 0;

		foreach ($transaksi as $value) {
			if ($value['kategori'] == 'LAINNYA') {
				$lain_total++;
				if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$lain_penjualan++;
				} elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$lain_pembelian++;
				} elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$lain_sedia++;
				} elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$lain_mutasi++;
				} elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$lain_koreksi++;
				}
			}
			if ($value['kategori'] == 'ASKES') {
				$askes_total++;
				if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$askes_penjualan++;
				} elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$askes_pembelian++;
				} elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$askes_sedia++;
				} elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$askes_mutasi++;
				} elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$askes_koreksi++;
				}
			}
			if ($value['kategori'] == 'NONASKES') {
				$non_total++;
				if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$non_penjualan++;
				} elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$non_pembelian++;
				} elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$non_sedia++;
				} elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$non_mutasi++;
				} elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$non_koreksi++;
				}
			}
		}

		$data = array(
			'lain_total' => $lain_total,
			'lain_penjualan' => $lain_penjualan,
			'lain_koreksi' => $lain_koreksi,
			'lain_pembelian' => $lain_pembelian,
			'lain_sedia' => $lain_sedia,
			'lain_mutasi' => $lain_mutasi,

			'askes_total' => $askes_total,
			'askes_penjualan' => $askes_penjualan,
			'askes_koreksi' => $askes_koreksi,
			'askes_pembelian' => $askes_pembelian,
			'askes_sedia' => $askes_sedia,
			'askes_mutasi' => $askes_mutasi,

			'non_total' => $non_total,
			'non_penjualan' => $non_penjualan,
			'non_koreksi' => $non_koreksi,
			'non_pembelian' => $non_pembelian,
			'non_sedia' => $non_sedia,
			'non_mutasi' => $non_mutasi,
		);
		echo json_encode($data);
	}

	public function grafik_tahun()
	{
		$obat = array(
			'data2015' => count($this->Transaksi_model->transaksi_tahun('2015')),
			'data2016' => count($this->Transaksi_model->transaksi_tahun('2016')),
			'data2017' => count($this->Transaksi_model->transaksi_tahun('2017')),
			'data2018' => count($this->Transaksi_model->transaksi_tahun('2018')),
			'data2019' => count($this->Transaksi_model->transaksi_tahun('2019')),
			'data2020' => count($this->Transaksi_model->transaksi_tahun('2020')),
		);
		echo json_encode($obat);
	}

	public function grafik_kategori($kategori,$tahun){
		$transaksi = $this->Transaksi_model->transaksi_kategori($kategori,$tahun);
		echo json_encode($transaksi);
	}
}
