<?php

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader;


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
				$reader->setLoadSheetsOnly('kategori');
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
						array_push($data, array(
							'kategori_nama' => $row['A'],
							'kategori_keterangan' => $row['B'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}
				$this->proses->insert_excel('excel_kategori',$data);
//				var_dump($data);

				$reader->setLoadSheetsOnly('golongan');
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
						array_push($data, array(
							'golongan_nama' => $row['A'],
							'golongan_keterangan' => $row['B'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_golongan',$data);

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
						array_push($data, array(
							'obat_kode' => $row['A'],
							'obat_nama' => $row['B'],
							'obat_harga' => $row['C'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_obat',$data);

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
						array_push($data, array(
							'produsen_nama' => $row['A'],
							'produsen_tempat' => $row['B'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_produsen',$data);

				$reader->setLoadSheetsOnly('penjual');
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
						array_push($data, array(
							'penjual_tempat' => $row['A'],
							'penjual_jenis_bayar' => $row['B'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_excel('excel_penjual',$data);

				redirect('mentah');
			}
		}
	}

	public function excel()
	{
		$data = array(
			'golongan' => $this->proses->lihat('excel_golongan'),
			'kategori' => $this->proses->lihat('excel_kategori'),
			'obat' => $this->proses->lihat('excel_obat'),
			'penjual' => $this->proses->lihat('excel_penjual'),
			'produsen' => $this->proses->lihat('excel_produsen'),
		);
		$this->load->view('template/header');
		$this->load->view('excel/index', $data);
		$this->load->view('template/footer');
	}

	public function dimensi()
	{
		$data = array(
			'golongan' => $this->proses->lihat('dim_golongan'),
			'kategori' => $this->proses->lihat('dim_kategori'),
			'obat' => $this->proses->lihat('dim_obat'),
			'penjual' => $this->proses->lihat('dim_penjual'),
			'produsen' => $this->proses->lihat('dim_produsen'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);
		$this->load->view('template/header');
		$this->load->view('dimensi/index', $data);
		$this->load->view('template/footer');
	}

	public function refresh()
	{
		$data = array(
			'golongan' => $this->proses->lihat('excel_golongan'),
			'kategori' => $this->proses->lihat('excel_kategori'),
			'obat' => $this->proses->lihat('excel_obat'),
			'penjual' => $this->proses->lihat('excel_penjual'),
			'produsen' => $this->proses->lihat('excel_produsen'),
		);

		$dimensiLama = array(
			'golongan' => $this->proses->lihat('dim_golongan'),
			'kategori' => $this->proses->lihat('dim_kategori'),
			'obat' => $this->proses->lihat('dim_obat'),
			'penjual' => $this->proses->lihat('dim_penjual'),
			'produsen' => $this->proses->lihat('dim_produsen'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);

		$dataDimensi = array(
			'golongan' => array(),
			'kategori' => array(),
			'obat' => array(),
			'penjual' => array(),
			'produsen' => array(),
			'waktu' => array(),
		);
		//---------------------------------------------------------------------------------
		if (count($data['golongan']) == 0) {
			foreach ($data['golongan'] as $key => $value) {
				array_push($dataDimensi['golongan'], array(
					'golongan_id' => $value['golongan_id'],
					'golongan_nama' => $value['golongan_nama'],
				));
				array_push($dataDimensi['waktu'], array(
					'waktu' => date('H:i:s'),
					'waktu_hari' => $this->hari(date('l')),
					'waktu_bulan' => date('m'),
					'waktu_tahun' => date('Y'),
				));
			}
			$this->proses->insert_dimensi('dim_golongan', $dataDimensi['golongan']);
			$this->proses->insert_dimensi('dim_waktu', $dataDimensi['waktu']);
		} elseif (count($data['golongan']) == count($dimensiLama['golongan'])) {
			$dataDimensi['golongan'] = null;
		} else {
			foreach ($dimensiLama['golongan'] as $key => $value) {
				if ($value['golongan_id'] == $data['anggota'][$key]['golongan_id']) {
					unset($data['golongan'][$key]);
				}
			}
			foreach ($data['golongan'] as $key => $value) {
				array_push($dataDimensi['golongan'], array(
					'golongan_id' => $value['golongan_id'],
					'golongan_nama' => $value['golongan_nama'],
				));
				array_push($dataDimensi['waktu'], array(
					'waktu' => date('H:i:s'),
					'waktu_hari' => $this->hari(date('l')),
					'waktu_bulan' => date('m'),
					'waktu_tahun' => date('Y'),
				));
			}
			$this->proses->insert_dimensi('dim_golongan', $dataDimensi['golongan']);
			$this->proses->insert_dimensi('dim_waktu', $dataDimensi['waktu']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['kategori']) == 0) {
			foreach ($data['kategori'] as $key => $value) {
				array_push($dataDimensi['kategori'], array(
					'kategori_id' => $value['kategori_id'],
					'kategori_nama' => $value['kategori_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_kategori', $dataDimensi['kategori']);
		} elseif (count($data['kategori']) == count($dimensiLama['kategori'])) {
			$dataDimensi['kategori'] = null;
		} else {
			foreach ($dimensiLama['kategori'] as $key => $value) {
				if ($value['kategori_id'] == $data['kategori'][$key]['kategori_id']) {
					unset($data['kategori'][$key]);
				}
			}
			foreach ($data['kategori'] as $key => $value) {
				array_push($dataDimensi['kategori'], array(
					'kategori_id' => $value['kategori_id'],
					'kategori_nama' => $value['kategori_nama'],
				));
			}
			$this->proses->insert_dimensi('dim_kategori', $dataDimensi['kategori']);
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

		if (count($data['penjual']) == 0) {
			foreach ($data['penjual'] as $key => $value) {
				array_push($dataDimensi['penjual'], array(
					'penjual_id' => $value['penjual_id'],
					'penjual_tempat' => $value['penjual_tempat'],
				));
			}
			$this->proses->insert_dimensi('dim_penjual', $dataDimensi['penjual']);
		} elseif (count($data['penjual']) == count($dimensiLama['penjual'])) {
			$dataDimensi['penjual'] = null;
		} else {
			foreach ($dimensiLama['penjual'] as $key => $value) {
				if ($value['penjual_id'] == $data['penjual'][$key]['penjual_id']) {
					unset($data['penjual'][$key]);
				}
			}
			foreach ($data['penjual'] as $key => $value) {
				array_push($dataDimensi['penjual'], array(
					'penjual_id' => $value['penjual_id'],
					'penjual_tempat' => $value['penjual_tempat'],
				));
			}
			$this->proses->insert_dimensi('dim_penjual', $dataDimensi['penjual']);
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


		redirect('dimensi');
	}

	public function fakta(){
		$data = array(
			'fakta' => $this->proses->lihat('fact_peminjaman')
		);
		$this->load->view('templates/header');
		$this->load->view('fakta/index', $data);
		$this->load->view('templates/footer');
	}

	public function refreshFakta(){
		$data = $this->proses->lihat('fact_peminjaman');

		$dataDimensi = array(
			'anggota' => $this->proses->lihat('dim_anggota'),
			'buku' => $this->proses->lihat('dim_buku'),
			'peminjam' => $this->proses->lihat('dim_peminjam'),
			'pengunjung' => $this->proses->lihat('dim_pengunjung'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);

		$dataFakta = array();

		if (count($data) == 0){
			foreach ($dataDimensi['anggota'] as $key=>$value) {
				array_push($dataFakta, array(
					'id_anggota' => $value['id_anggota'],
					'id_peminjam' => $dataDimensi['peminjam'][$key]['id_peminjam'],
					'id_pengunjung' => $dataDimensi['pengunjung'][$key]['id_pengunjung'],
					'id_buku' => $dataDimensi['buku'][$key]['id_buku'],
					'id_waktu' => $dataDimensi['waktu'][$key]['id_waktu'],
				));
			}
			$this->proses->insert_dimensi('fact_peminjaman', $dataFakta);
		} elseif (count($data) == count($dataDimensi['anggota'])) {
			$dataFakta = null;
		} else {
			foreach ($data as $key => $value) {
				if ($value['id_anggota'] == $dataDimensi['anggota'][$key]['id_anggota']) {
					unset($data[$key]);
				}
			}
			foreach ($dataDimensi['anggota'] as $key=>$value) {
				array_push($dataFakta, array(
					'id_anggota' => $value['id_anggota'],
					'id_peminjam' => $dataDimensi['peminjam'][$key]['id_peminjam'],
					'id_pengunjung' => $dataDimensi['pengunjung'][$key]['id_pengunjung'],
					'id_buku' => $dataDimensi['buku'][$key]['id_buku'],
					'id_waktu' => $dataDimensi['waktu'][$key]['id_waktu'],
				));
			}
			$this->proses->insert_dimensi('fact_peminjaman', $dataFakta);
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

	public function terbanyak(){
		$data = array(
			'buku' => $this->proses->buku_terbanyak(),
			'pinjam' => $this->proses->pinjam_terbanyak(),
		);
		echo json_encode($data);
	}
}
