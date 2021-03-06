<?php

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader;
use Dompdf\Dompdf;


class ProsesController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProsesModel', 'proses');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function upload()
	{
		if (isset($_POST['upload'])) {
			$upload = $this->proses->upload_excel('excel');
			if ($upload['result'] == 'success') {
				$reader = new Reader\Xlsx();
				$reader->setLoadSheetsOnly('pasien');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						if ($row['A'] != ''){
							array_push($data, array(
								'pasien_nama' => $row['A'],
								'pasien_jenis_kelamin' => $row['B'],
								'pasien_umur' => $row['C'],
							));
						}
					}

					$numrow++; // Tambah 1 setiap kali looping
				}
				$this->proses->insert_excel('excel_pasien',$data);
//				var_dump($data);

				$reader->setLoadSheetsOnly('ruangan');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						if ($row['A'] != ''){
							array_push($data, array(
								'ruang_poliklinik' => $row['A'],
								'ruang_jenis_masuk' => $row['B'],
							));
						}
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_ruang',$data);

				$reader->setLoadSheetsOnly('dokter');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						if ($row['A'] != ''){
							array_push($data, array(
								'dokter_nama' => $row['A'],
							));
						}
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_dokter',$data);

				$reader->setLoadSheetsOnly('produsen');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						if ($row['A'] != ''){
							array_push($data, array(
								'produsen_nama' => $row['A'],
							));
						}
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_produsen',$data);

				$reader->setLoadSheetsOnly('obat');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						if ($row['A'] != ''){
							array_push($data, array(
								'obat_kode' => $row['A'],
								'obat_nama' => $row['B'],
								'obat_golongan' => $row['C'],
								'obat_bentuk' => $row['D'],
								'obat_depo' => $row['E'],
							));
						}
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_obat',$data);


				$reader->setLoadSheetsOnly('transaksi');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						$waktu = $row['E'];
						$tanggal = explode(' ',$waktu);
						$bulan = explode('/',$tanggal[0]);
						$tgl = $bulan[1].'/'.$bulan[0].'/'.$bulan[2];
//						var_dump($tgl);
						if ($row['A'] != ''){
							array_push($data, array(
								'transaksi_kelompok' => $row['A'],
								'transaksi_harga' => $row['B'],
								'transaksi_jumlah' => $row['C'],
								'transaksi_cara_bayar' => $row['D'],
								'transaksi_tanggal' => $tgl,
							));
						}
					}

					$numrow++; // Tambah 1 setiap kali looping
				}


				$this->proses->insert_excel('excel_transaksi',$data);

				redirect('mentah');
			}
		}
	}

	public function excel()
	{
		$data = array(
			'dokter' => $this->proses->lihat('excel_dokter'),
			'obat' => $this->proses->lihat('excel_obat'),
			'pasien' => $this->proses->lihat('excel_pasien'),
			'produsen' => $this->proses->lihat('excel_produsen'),
			'ruang' => $this->proses->lihat('excel_ruang'),
			'transaksi' => $this->proses->lihat('excel_transaksi'),
		);
		$data['getHapus'] = $this->proses->getHapus();
		$this->load->view('template/header');
		$this->load->view('excel/index', $data);
		$this->load->view('template/footer');
	}

	public function dimensi()
	{
		$data = array(
			'dokter' => $this->proses->lihat('dim_dokter'),
			'obat' => $this->proses->lihat('dim_obat'),
			'pasien' => $this->proses->lihat('dim_pasien'),
			'produsen' => $this->proses->lihat('dim_produsen'),
			'ruang' => $this->proses->lihat('dim_ruang'),
			'transaksi' => $this->proses->lihat('dim_transaksi'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);
		$this->load->view('template/header');
		$this->load->view('dimensi/index', $data);
		$this->load->view('template/footer');
	}

	public function refresh()
	{
		$data = array(
			'dokter' => $this->proses->lihat('excel_dokter'),
			'obat' => $this->proses->lihat('excel_obat'),
			'pasien' => $this->proses->lihat('excel_pasien'),
			'produsen' => $this->proses->lihat('excel_produsen'),
			'ruang' => $this->proses->lihat('excel_ruang'),
			'transaksi' => $this->proses->lihat('excel_transaksi'),
		);

		$dimensiLama = array(
			'dokter' => $this->proses->lihat('dim_dokter'),
			'obat' => $this->proses->lihat('dim_obat'),
			'pasien' => $this->proses->lihat('dim_pasien'),
			'produsen' => $this->proses->lihat('dim_produsen'),
			'ruang' => $this->proses->lihat('dim_ruang'),
			'transaksi' => $this->proses->lihat('dim_transaksi'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);

		$dataDimensi = array(
			'dokter' => array(),
			'obat' => array(),
			'pasien' => array(),
			'produsen' => array(),
			'ruang' => array(),
			'transaksi' => array(),
			'waktu' => array(),
		);
		//---------------------------------------------------------------------------------
		if (count($data['dokter']) == 0) {
			foreach ($data['dokter'] as $key => $value) {
				array_push($dataDimensi['dokter'], array(
					'dokter_id' => $value['dokter_id'],
					'dokter_nama' => $value['dokter_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_dokter', $dataDimensi['dokter']);
		} elseif (count($data['dokter']) == count($dimensiLama['dokter'])) {
			$dataDimensi['dokter'] = null;
		} else {
			foreach ($dimensiLama['dokter'] as $key => $value) {
				if ($value['dokter_id'] == $data['dokter'][$key]['dokter_id']) {
					unset($data['dokter'][$key]);
				}
			}
			foreach ($data['dokter'] as $key => $value) {
				array_push($dataDimensi['dokter'], array(
					'dokter_id' => $value['dokter_id'],
					'dokter_nama' => $value['dokter_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_dokter', $dataDimensi['dokter']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['obat']) == 0) {
			foreach ($data['obat'] as $key => $value) {
				array_push($dataDimensi['obat'], array(
					'obat_id' => $value['obat_id'],
					'obat_kode' => $value['obat_kode'],
					'obat_nama' => $value['obat_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_obat', $dataDimensi['obat']);
		} elseif (count($data['obat']) == count($dimensiLama['obat'])) {
			$dataDimensi['obat'] = null;
		} else {
			foreach ($dimensiLama['obat'] as $key => $value) {
				if ($value['obat_id'] == $data['obat'][$key]['obat_id']) {
					unset($data['obat'][$key]);
				}
			}
			foreach ($data['obat'] as $key => $value) {
				array_push($dataDimensi['obat'], array(
					'obat_id' => $value['obat_id'],
					'obat_kode' => $value['obat_kode'],
					'obat_nama' => $value['obat_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_obat', $dataDimensi['obat']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['pasien']) == 0) {
			foreach ($data['pasien'] as $key => $value) {
				array_push($dataDimensi['pasien'], array(
					'pasien_id' => $value['pasien_id'],
					'pasien_nama' => $value['pasien_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_pasien', $dataDimensi['pasien']);
		} elseif (count($data['pasien']) == count($dimensiLama['pasien'])) {
			$dataDimensi['pasien'] = null;
		} else {
			foreach ($dimensiLama['pasien'] as $key => $value) {
				if ($value['pasien_id'] == $data['pasien'][$key]['pasien_id']) {
					unset($data['pasien'][$key]);
				}
			}
			foreach ($data['pasien'] as $key => $value) {
				array_push($dataDimensi['pasien'], array(
					'pasien_id' => $value['pasien_id'],
					'pasien_nama' => $value['pasien_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_pasien', $dataDimensi['pasien']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['produsen']) == 0) {
			foreach ($data['produsen'] as $key => $value) {
				array_push($dataDimensi['produsen'], array(
					'produsen_id' => $value['produsen_id'],
					'produsen_nama' => $value['produsen_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_produsen', $dataDimensi['produsen']);
		} elseif (count($data['produsen']) == count($dimensiLama['produsen'])) {
			$dataDimensi['produsen'] = null;
		} else {
			foreach ($dimensiLama['produsen'] as $key => $value) {
				if ($value['produsen_id'] == $data['produsen'][$key]['produsen_id']) {
					unset($data['produsen'][$key]);
				}
			}
			foreach ($data['produsen'] as $key => $value) {
				array_push($dataDimensi['produsen'], array(
					'produsen_id' => $value['produsen_id'],
					'produsen_nama' => $value['produsen_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_produsen', $dataDimensi['produsen']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['ruang']) == 0) {
			foreach ($data['ruang'] as $key => $value) {
				array_push($dataDimensi['ruang'], array(
					'ruang_id' => $value['ruang_id'],
					'ruang_poliklinik' => $value['ruang_poliklinik'],
				));
			}
			$this->proses->insert_dimensi('dim_ruang', $dataDimensi['ruang']);
		} elseif (count($data['ruang']) == count($dimensiLama['ruang'])) {
			$dataDimensi['ruang'] = null;
		} else {
			foreach ($dimensiLama['ruang'] as $key => $value) {
				if ($value['ruang_id'] == $data['ruang'][$key]['ruang_id']) {
					unset($data['ruang'][$key]);
				}
			}
			foreach ($data['ruang'] as $key => $value) {
				array_push($dataDimensi['ruang'], array(
					'ruang_id' => $value['ruang_id'],
					'ruang_poliklinik' => $value['ruang_poliklinik'],
				));
			}
			$this->proses->insert_dimensi('dim_ruang', $dataDimensi['ruang']);
		}
		//---------------------------------------------------------------------------------

		if (count($data['transaksi']) == 0) {
			foreach ($data['transaksi'] as $key => $value) {
				array_push($dataDimensi['transaksi'], array(
					'transaksi_id' => $value['transaksi_id'],
					'transaksi_harga' => $value['transaksi_harga'],
					'transaksi_jumlah' => $value['transaksi_jumlah'],
					'transaksi_total' => $value['transaksi_harga'] * $value['transaksi_jumlah'],
				));
				$waktu = $value['transaksi_tanggal'];
				$pecah = explode('/',$waktu);
				array_push($dataDimensi['waktu'], array(
					'waktu_hari' => $this->hari(date('l')),
					'waktu_tanggal' => $pecah[0],
					'waktu_bulan' => $pecah[1],
					'waktu_tahun' => $pecah[2],
				));
			}
			$this->proses->insert_dimensi('dim_transaksi', $dataDimensi['transaksi']);
			$this->proses->insert_dimensi('dim_waktu', $dataDimensi['waktu']);
		} elseif (count($data['transaksi']) == count($dimensiLama['transaksi'])) {
			$dataDimensi['transaksi'] = null;
		} else {
			foreach ($dimensiLama['transaksi'] as $key => $value) {
				if ($value['transaksi_id'] == $data['transaksi'][$key]['transaksi_id']) {
					unset($data['transaksi'][$key]);
				}
			}
			foreach ($data['transaksi'] as $key => $value) {
				array_push($dataDimensi['transaksi'], array(
					'transaksi_id' => $value['transaksi_id'],
					'transaksi_harga' => $value['transaksi_harga'],
					'transaksi_jumlah' => $value['transaksi_jumlah'],
					'transaksi_total' => $value['transaksi_harga'] * $value['transaksi_jumlah'],
				));
				$waktu = $value['transaksi_tanggal'];
				$pecah = explode('/',$waktu);
				array_push($dataDimensi['waktu'], array(
					'waktu_hari' => $this->hari(date('l')),
					'waktu_tanggal' => $pecah[0],
					'waktu_bulan' => $pecah[1],
					'waktu_tahun' => $pecah[2],
				));
			}
			$this->proses->insert_dimensi('dim_transaksi', $dataDimensi['transaksi']);
			$this->proses->insert_dimensi('dim_waktu', $dataDimensi['waktu']);
		}
		//---------------------------------------------------------------------------------


		redirect('dimensi');
	}

	public function fakta(){
		$data = array(
			'fakta' => $this->proses->lihat('fact_penjualan')
		);
		$this->load->view('template/header');
		$this->load->view('fakta/index', $data);
		$this->load->view('template/footer');
	}

	public function refreshFakta(){
		$data = $this->proses->lihat('fact_penjualan');

		$dataDimensi = array(
			'dokter' => $this->proses->lihat('dim_dokter'),
			'obat' => $this->proses->lihat('dim_obat'),
			'pasien' => $this->proses->lihat('dim_pasien'),
			'produsen' => $this->proses->lihat('dim_produsen'),
			'ruang' => $this->proses->lihat('dim_ruang'),
			'transaksi' => $this->proses->lihat('dim_transaksi'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);

		$dataFakta = array();

		if (count($data) == 0){
			foreach ($dataDimensi['dokter'] as $key=>$value) {
				array_push($dataFakta, array(
					'id_dokter' => $value['dokter_id'],
					'id_obat' => $dataDimensi['obat'][$key]['obat_id'],
					'id_pasien' => $dataDimensi['pasien'][$key]['pasien_id'],
					'id_produsen' => $dataDimensi['produsen'][$key]['produsen_id'],
					'id_ruang' => $dataDimensi['ruang'][$key]['ruang_id'],
					'id_transaksi' => $dataDimensi['transaksi'][$key]['transaksi_id'],
					'id_waktu' => $dataDimensi['waktu'][$key]['waktu_id'],
				));
			}
			$this->proses->insert_dimensi('fact_penjualan', $dataFakta);
		} elseif (count($data) == count($dataDimensi['dokter'])) {
			$dataFakta = null;
		} else {
			foreach ($data as $key => $value) {
				if ($value['id_dokter'] == $dataDimensi['dokter'][$key]['dokter_id']) {
					unset($dataDimensi['dokter'][$key]);
					unset($dataDimensi['obat'][$key]);
					unset($dataDimensi['pasien'][$key]);
					unset($dataDimensi['produsen'][$key]);
					unset($dataDimensi['ruang'][$key]);
					unset($dataDimensi['transaksi'][$key]);
					unset($dataDimensi['waktu'][$key]);
				}
			}
			foreach ($dataDimensi['dokter'] as $key=>$value) {
				array_push($dataFakta, array(
					'id_dokter' => $value['dokter_id'],
					'id_obat' => $dataDimensi['obat'][$key]['obat_id'],
					'id_pasien' => $dataDimensi['pasien'][$key]['pasien_id'],
					'id_produsen' => $dataDimensi['produsen'][$key]['produsen_id'],
					'id_ruang' => $dataDimensi['ruang'][$key]['ruang_id'],
					'id_transaksi' => $dataDimensi['transaksi'][$key]['transaksi_id'],
					'id_waktu' => $dataDimensi['waktu'][$key]['waktu_id'],
				));
			}
			$this->proses->insert_dimensi('fact_penjualan', $dataFakta);
		}
//		echo "<pre>";
//		print_r ($dataFakta);
//		echo "</pre>";
		redirect('fakta');
	}

	//-----------------------------------------------------------------------------------------
	function hari($days){
		$hari = array(
			'Monday' => 'Senin',
			'Tuesday' => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jumat',
			'Saturday' => 'Sabtu',
			'Sunday' => 'Minggu',
		);
		return $hari[$days];
	}
	//-----------------------------------------------------------------------------------------

	public function grafik_anggota(){
		$anggota = $this->proses->lihat('excel_anggota');
		$data = array(
			'umum' => 0,
			'mahasiswa' => 0,
			'pelajar' => 0,
			'pria' => 0,
			'wanita' => 0,
		);
		foreach ($anggota as $key=>$value) {
			if ($value['anggota_umum_l'] != null){
				$data['umum'] += 1;
				$data['pria'] += 1;
			}elseif ($value['anggota_umum_p'] != null){
				$data['umum'] += 1;
				$data['wanita'] += 1;
			}elseif ($value['anggota_mahasiswa_l'] != null){
				$data['mahasiswa'] += 1;
				$data['pria'] += 1;
			}elseif ($value['anggota_mahasiswa_p'] != null){
				$data['mahasiswa'] += 1;
				$data['wanita'] += 1;
			}elseif ($value['anggota_pelajar_l'] != null){
				$data['pelajar'] += 1;
				$data['pria'] += 1;
			}elseif ($value['anggota_pelajar_p'] != null){
				$data['pelajar'] += 1;
				$data['wanita'] += 1;
			}
		}
		echo json_encode($data);
	}

	public function grafik_waktu($tahun){
		$waktu = $this->proses->lihat('dim_waktu');
		$data = array(
			'jan' => 0,
			'feb' => 0,
			'mar' => 0,
			'apr' => 0,
			'mei' => 0,
			'jun' => 0,
			'jul' => 0,
			'agu' => 0,
			'sep' => 0,
			'okt' => 0,
			'nov' => 0,
			'des' => 0,
		);
		foreach ($waktu as $key=>$value) {
			if ($value['tahun_waktu'] == $tahun){
				if ($value['bulan_waktu'] == '01'){
					$data['jan']++;
				}elseif ($value['bulan_waktu'] == '02'){
					$data['feb']++;
				}elseif ($value['bulan_waktu'] == '03'){
					$data['mar']++;
				}elseif ($value['bulan_waktu'] == '04'){
					$data['apr']++;
				}elseif ($value['bulan_waktu'] == '05'){
					$data['mei']++;
				}elseif ($value['bulan_waktu'] == '06'){
					$data['jun']++;
				}elseif ($value['bulan_waktu'] == '07'){
					$data['jul']++;
				}elseif ($value['bulan_waktu'] == '08'){
					$data['agu']++;
				}elseif ($value['bulan_waktu'] == '09'){
					$data['sep']++;
				}elseif ($value['bulan_waktu'] == '10'){
					$data['okt']++;
				}elseif ($value['bulan_waktu'] == '11'){
					$data['nov']++;
				}elseif ($value['bulan_waktu'] == '12'){
					$data['des']++;
				}
			}
		}
		echo json_encode($data);
	}

//	public function terbanyak(){
//		$data = array(
//			'buku' => $this->proses->buku_terbanyak(),
//			'pinjam' => $this->proses->pinjam_terbanyak(),
//		);
//		echo json_encode($data);
//	}

	public function laporan(){
		$data = array(
			'laporan' => $this->proses->laporan()
		);
		$this->load->view('template/header');
		$this->load->view('laporan/index', $data);
		$this->load->view('template/footer');
	}

	public function grafik_tahun()
	{
		$obat = array(
			'data2015' => count($this->proses->transaksi_tahun('2015')),
			'data2016' => count($this->proses->transaksi_tahun('2016')),
			'data2017' => count($this->proses->transaksi_tahun('2017')),
			'data2018' => count($this->proses->transaksi_tahun('2018')),
			'data2019' => count($this->proses->transaksi_tahun('2019')),
			'data2020' => count($this->proses->transaksi_tahun('2020')),
		);
		echo json_encode($obat);
	}

	public function datagrafik($tahun,$bulan)
	{
		$transaksi = $this->proses->transaksi_bulan($tahun,$bulan);

		$lain_total = 0;

		$askes_total = 0;

		$non_total = 0;

		$balita = 0;
		$kanak = 0;
		$remaja = 0;
		$dewasa = 0;
		$dewasa2 = 0;
		$lansia = 0;
		$lansia2 = 0;

		$laki = 0;
		$perempuan = 0;

		$bpjspbi = 0;
		$bpjsnonpbi = 0;
		$jamkesda = 0;
		$sendiri = 0;
		$kemenkes = 0;

		foreach ($transaksi as $value) {
			if ($value['transaksi_kelompok'] == 'LAINNYA') {
				$lain_total++;
			}
			if ($value['transaksi_kelompok'] == 'ASKES') {
				$askes_total++;
			}
			if ($value['transaksi_kelompok'] == 'NON ASKES') {
				$non_total++;
			}

			//umur
			$umur = $value['pasien_umur'];
			$umur = explode(' ',$umur);
			$umur = $umur[0];

			if ($umur > 0 && $umur <= 5){
				$balita++;
			}
			if ($umur > 5 && $umur <= 11){
				$kanak++;
			}
			if ($umur > 11 && $umur <= 20){
				$remaja++;
			}
			if ($umur > 20 && $umur <= 35){
				$dewasa++;
			}
			if ($umur > 35 && $umur <= 50){
				$dewasa2++;
			}
			if ($umur > 50 && $umur <= 65){
				$lansia++;
			}
			if ($umur > 65){
				$lansia2++;
			}

			//jenis kelamin
//			var_dump(trim($value['pasien_jenis_kelamin']));
			if (trim($value['pasien_jenis_kelamin']) == 'LAKI-LAKI'){
				$laki++;
			}
			if (trim($value['pasien_jenis_kelamin']) == 'PEREMPUAN'){
				$perempuan++;
			}

			//cara bayar
			if(strpos($value['transaksi_cara_bayar'], 'JAMKESDA') !== false){
				$jamkesda++;
			}
			if($value['transaksi_cara_bayar'] == 'BPJS PBI'){
				$bpjspbi++;
			}
			if($value['transaksi_cara_bayar'] == 'BPJS NON PBI'){
				$bpjsnonpbi++;
			}
			if($value['transaksi_cara_bayar'] == 'BAYAR SENDIRI'){
				$sendiri++;
			}
			if($value['transaksi_cara_bayar'] == 'KEMENKES RI'){
				$kemenkes++;
			}
		}

		$data = array(
			'lain_total' => $lain_total,
			'askes_total' => $askes_total,
			'non_total' => $non_total,

			'kanak' => $kanak,
			'balita' => $balita,
			'remaja' => $remaja,
			'dewasa' => $dewasa,
			'dewasa2' => $dewasa2,
			'lansia' => $lansia,
			'lansia2' => $lansia2,

			'laki' => $laki,
			'perempuan' => $perempuan,

			'bpjspbi' => $bpjspbi,
			'bpjsnonpbi' => $bpjsnonpbi,
			'jamkesda' => $jamkesda,
			'sendiri' => $sendiri,
			'kemenkes' => $kemenkes,
		);
		echo json_encode($data);
	}

	public function grafik_kategori($kategori,$tahun,$bulan){

		$transaksi = $this->proses->transaksi_kategori(str_replace('-',' ',$kategori),$tahun,$bulan);
		echo json_encode($transaksi);
	}


	public function grafik_bulan($tahun){
		$obat = $this->proses->transaksi_tahun($tahun);
		$data = array(
			'jan' => array(),
			'feb' => array(),
			'mar' => array(),
			'apr' => array(),
			'mei' => array(),
			'jun' => array(),
			'jul' => array(),
			'agu' => array(),
			'sep' => array(),
			'okt' => array(),
			'nov' => array(),
			'des' => array(),
		);
		foreach ($obat as $key=>$value) {
			if ($value['waktu_bulan'] == '01'){
				array_push($data['jan'],$value);
			}elseif ($value['waktu_bulan'] == '02'){
				array_push($data['feb'],$value);
			}elseif ($value['waktu_bulan'] == '03'){
				array_push($data['mar'],$value);
			}elseif ($value['waktu_bulan'] == '04'){
				array_push($data['apr'],$value);
			}elseif ($value['waktu_bulan'] == '05'){
				array_push($data['mei'],$value);
			}elseif ($value['waktu_bulan'] == '06'){
				array_push($data['jun'],$value);
			}elseif ($value['waktu_bulan'] == '07'){
				array_push($data['jul'],$value);
			}elseif ($value['waktu_bulan'] == '08'){
				array_push($data['agu'],$value);
			}elseif ($value['waktu_bulan'] == '09'){
				array_push($data['sep'],$value);
			}elseif ($value['waktu_bulan'] == '10'){
				array_push($data['okt'],$value);
			}elseif ($value['waktu_bulan'] == '11'){
				array_push($data['nov'],$value);
			}elseif ($value['waktu_bulan'] == '12'){
				array_push($data['des'],$value);
			}
		}
		echo json_encode($data);
	}

	public function terbanyak(){
		$obat = $this->proses->obat_termahal();
		$harga = array();
		foreach ($obat as $item) {
			array_push($harga,array(
				'transaksi_harga' => $item['transaksi_harga'],
				'obat_nama' => $item['obat_nama'],
			));
		}
		rsort($harga);
		$data = array(
			'obat' => $this->proses->obat_terbanyak(),
			'produsen' => $this->proses->produsen_terbanyak(),
			'dokter' => $this->proses->dokter_terbanyak(),
			'pasien' => $this->proses->pasien_terbanyak(),
			'poliklinik' => $this->proses->poliklinik_terbanyak(),
			'mahal' => $harga,
		);
		echo json_encode($data);
	}

	public function hapus($bulan,$id){

		$excel = $this->proses->lihat('excel_obat');
		$dimensi = $this->proses->lihat('dim_obat');

		if (count($excel) == count($dimensi)){
			$this->proses->hapus('excel_obat',$id,'obat_id');
			$this->proses->hapus('excel_dokter',$id,'dokter_id');
			$this->proses->hapus('excel_pasien',$id,'pasien_id');
			$this->proses->hapus('excel_produsen',$id,'produsen_id');
			$this->proses->hapus('excel_ruang',$id,'ruang_id');
			$this->proses->hapus('excel_transaksi',$id,'transaksi_id');
			$this->proses->hapus('dim_obat',$id,'obat_id');
			$this->proses->hapus('dim_dokter',$id,'dokter_id');
			$this->proses->hapus('dim_pasien',$id,'pasien_id');
			$this->proses->hapus('dim_produsen',$id,'produsen_id');
			$this->proses->hapus('dim_ruang',$id,'ruang_id');
			$this->proses->hapus('dim_transaksi',$id,'transaksi_id');
			$this->proses->hapus('dim_waktu',$id,'waktu_id');
			$this->proses->hapus('fact_penjualan',$id,'id_obat');
			redirect('excel-bulan/'.$bulan);
		} else {
			redirect('excel-bulan/'.$bulan);
		}
	}

	public function hapusSemua(){
		$this->proses->hapus_semua('excel_obat');
		$this->proses->hapus_semua('excel_dokter');
		$this->proses->hapus_semua('excel_pasien');
		$this->proses->hapus_semua('excel_produsen');
		$this->proses->hapus_semua('excel_ruang');
		$this->proses->hapus_semua('excel_transaksi');
		$this->proses->hapus_semua('dim_obat');
		$this->proses->hapus_semua('dim_dokter');
		$this->proses->hapus_semua('dim_pasien');
		$this->proses->hapus_semua('dim_produsen');
		$this->proses->hapus_semua('dim_ruang');
		$this->proses->hapus_semua('dim_transaksi');
		$this->proses->hapus_semua('dim_waktu');
		$this->proses->hapus_semua('fact_penjualan');
		redirect('mentah');
	}

	public function hapusBulan(){
		$input = $this->input->post('bulan');
		$input = explode('-',$input);
		$bulan = $input[0];
		$tahun = $input[1];

		$transaksi = $this->proses->transaksi_bulan_hapus($tahun,$bulan);
//		echo "<pre>";

		foreach ($transaksi as $key=>$value) {
			$this->proses->hapus('excel_obat',$value['obat_id'],'obat_id');
			$this->proses->hapus('excel_dokter',$value['dokter_id'],'dokter_id');
			$this->proses->hapus('excel_pasien',$value['pasien_id'],'pasien_id');
			$this->proses->hapus('excel_produsen',$value['produsen_id'],'produsen_id');
			$this->proses->hapus('excel_ruang',$value['ruang_id'],'ruang_id');
			$this->proses->hapus('excel_transaksi',$value['transaksi_id'],'transaksi_id');
			$this->proses->hapus('dim_obat',$value['obat_id'],'obat_id');
			$this->proses->hapus('dim_dokter',$value['dokter_id'],'dokter_id');
			$this->proses->hapus('dim_pasien',$value['pasien_id'],'pasien_id');
			$this->proses->hapus('dim_produsen',$value['produsen_id'],'produsen_id');
			$this->proses->hapus('dim_ruang',$value['ruang_id'],'ruang_id');
			$this->proses->hapus('dim_transaksi',$value['transaksi_id'],'transaksi_id');
			$this->proses->hapus('dim_waktu',$value['waktu_id'],'waktu_id');
			$this->proses->hapus('fact_penjualan',$value['id_obat'],'id_obat');
//			var_dump($value);
		}
//		var_dump(count($transaksi));die();
//		echo "</pre>";

		redirect('mentah');
	}

	function pilihLaporanBulan(){
		$data['getHapus'] = $this->proses->getHapus();
		$this->load->view('template/header');
		$this->load->view('laporan/pilih_bulan',$data);
		$this->load->view('template/footer');
	}

	function laporanBulan($tanggal){
		$data['bulan'] = $tanggal;
		$tgl = explode('-',$tanggal);
//		var_dump($tgl);die();
		$data['laporan'] = $this->proses->laporan_bulan($tgl[1],$tgl[0]);
//		echo "<pre>";
//		print_r ($data['laporan']);
//		echo "</pre>";die();

//		ini_set('memory_limit','128M');
//
//		$this->load->library('pdf');
//
//		$this->pdf->setPaper('A4', 'landscape');
//		$this->pdf->filename = "laporan.pdf";
//		$this->pdf->load_view('laporan/cetak', $data);
		$this->load->view('template/header');
		$this->load->view('laporan/cetak', $data);
		$this->load->view('template/footer');
	}

	function cetakLaporan(){
	}
}
