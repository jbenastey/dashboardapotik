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
$this->load->view('transaksi/index',$data);
$this->load->view('template/footer');
 }
 public function create ()
 {
 if (isset($_POST['simpan'])) {
 	$tgl=date ('Y-m-d H:i:s');
 	$jenis_transaksi=$this->input->post('jenis_transaksi');
 	$nama_obat=$this->input->post('nama_obat');
 	$tempat_obat=$this->input->post('tempat_obat');
 	$debet=$this->input->post('debet');
 	$kredit=$this->input->post('kredit');
 	$biaya=$this->input->post('biaya');
 	$data = array(
 		'tgl_transaksi'=> $tgl,
 		'jenis_transaksi'=> $jenis_transaksi,
 		'nama_obat'=> $nama_obat,
 		'tempat_obat'=> $tempat_obat,
 		'debet'=> $debet,
 		'kredit'=> $kredit,
 		'biaya'=> $biaya,
 		);
 	$save = $this->Transaksi_model->tambah_transaksi($data);
 	if ($save>0){
 		// $this->session->set_flashdata('alert','tambah_transaksi');
 		redirect('transaksi');
 	}
 	else{
 		redirect('transaksi');
 	}

 		# code...
 	}	
 $this->load->view('template/header');
$this->load->view('transaksi/create');
$this->load->view('template/footer');	
 }
public function edit ($code){
 if (isset($_POST['simpan'])) {
 	
 	$jenis_transaksi=$this->input->post('jenis_transaksi');
 	$nama_obat=$this->input->post('nama_obat');
 	$tempat_obat=$this->input->post('tempat_obat');
 	$debet=$this->input->post('debet');
 	$kredit=$this->input->post('kredit');
 	$biaya=$this->input->post('biaya');

 	$data = array(
 		
 		'jenis_transaksi'=> $jenis_transaksi,
 		'nama_obat'=> $nama_obat,
 		'tempat_obat'=> $tempat_obat,
 		'debet'=> $debet,
 		'kredit'=> $kredit,
 		'biaya'=> $biaya,

 		);
 	$save = $this->Transaksi_model->edit_transaksi($data,$code);
 	if ($save>0){
 		// $this->session->set_flashdata('alert','tambah_transaksi');
 		redirect('transaksi');
 	}
 	else{
 		redirect('transaksi');
 	}

 		# code...
 	}	
 	$data= array(
'transaksi'=> $this ->Transaksi_model->lihat_satutransaksi($code) 
	);
 $this->load->view('template/header');
$this->load->view('transaksi/edit',$data);
$this->load->view('template/footer');	
 }

public function delete ($code){
	$this->Transaksi_model->delete_transaksi($code);
	redirect('transaksi'); 
}
	public function grafik (){
$this->load->view('template/header');
$this->load->view('transaksi/grafik');
$this->load->view('template/footer');
}

public function datagrafik (){
		$transaksi = $this->Transaksi_model->lihat_transaksi();

		$_2015 = 0;
		$penjualan_2015 = 0;
		$koreksi_penjualan_2015 = 0;
		$pembelian_2015 = 0;
		$koreksi_persediaan_2015 = 0;
		$mutasi_2015 = 0;

		$_2016 = 0;
		$penjualan_2016 = 0;
		$koreksi_penjualan_2016 = 0;
		$pembelian_2016 = 0;
		$koreksi_persediaan_2016 = 0;
		$mutasi_2016 = 0;
		
		$_2017 = 0;
		$penjualan_2017 = 0;
		$koreksi_penjualan_2017 = 0;
		$pembelian_2017 = 0;
		$koreksi_persediaan_2017 = 0;
		$mutasi_2017 = 0;
		
		$_2018 = 0;
		$penjualan_2018 = 0;
		$koreksi_penjualan_2018 = 0;
		$pembelian_2018 = 0;
		$koreksi_persediaan_2018 = 0;
		$mutasi_2018 = 0;
		
		$_2019 = 0;
		$penjualan_2019 = 0;
		$koreksi_penjualan_2019 = 0;
		$pembelian_2019 = 0;
		$koreksi_persediaan_2019 = 0;
		$mutasi_2019 = 0;

		foreach ($transaksi as $value){
		$tgl = explode(' ', $value['tgl_transaksi']);
		$tahun = explode('-', $tgl[0]);
		if ($tahun[0] == '2015') {
			$_2015 = $_2015 + 1;
			if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$penjualan_2015 = $penjualan_2015 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$koreksi_penjualan_2015 = $koreksi_penjualan_2015 +1;
			}elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$pembelian_2015 = $pembelian_2015 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$koreksi_persediaan_2015 = $koreksi_persediaan_2015 +1;
			}elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$mutasi_2015 = $mutasi_2015 +1;
				}
		} elseif ($tahun[0] == '2016') {
			$_2016 = $_2016 + 1;
			if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$penjualan_2016 = $penjualan_2016 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$koreksi_penjualan_2016 = $koreksi_penjualan_2016 +1;
			}elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$pembelian_2016 = $pembelian_2016 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$koreksi_persediaan_2016 = $koreksi_persediaan_2016 +1;
			}elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$mutasi_2016 = $mutasi_2016 +1;
				}
		}elseif ($tahun[0] == '2017') {
			$_2017 = $_2017 + 1;	
			if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$penjualan_2017 = $penjualan_2017 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$koreksi_penjualan_2017 = $koreksi_penjualan_2017 +1;
			}elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$pembelian_2017 = $pembelian_2017 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$koreksi_persediaan_2017 = $koreksi_persediaan_2017 +1;
			}elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$mutasi_2017 = $mutasi_2017 +1;
				}
		}elseif ($tahun[0] == '2018') {
			$_2018 = $_2018 + 1;
			if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$penjualan_2018 = $penjualan_2018 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$koreksi_penjualan_2018 = $koreksi_penjualan_2018 +1;
			}elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$pembelian_2018 = $pembelian_2018 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$koreksi_persediaan_2018 = $koreksi_persediaan_2018 +1;
			}elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$mutasi_2018 = $mutasi_2018 +1;
				}
		}elseif ($tahun[0] == '2019') {
			$_2019 = $_2019 + 1;
			if ($value['jenis_transaksi'] == 'PENJUALAN') {
					$penjualan_2019 = $penjualan_2019 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PENJUALAN') {
					$koreksi_penjualan_2019 = $koreksi_penjualan_2019 +1;
			}elseif ($value['jenis_transaksi'] == 'PEMBELIAN') {
					$pembelian_2019 = $pembelian_2019 +1;
			}elseif ($value['jenis_transaksi'] == 'KOREKSI PERSEDIAAN') {
					$koreksi_persediaan_2019 = $koreksi_persediaan_2019 +1;
			}elseif ($value['jenis_transaksi'] == 'MUTASI') {
					$mutasi_2019 = $mutasi_2019 +1;	
		}
		}
	}
		$data = array(
			'tahun2015' => $_2015,
			'penjualan_2015' => $penjualan_2015,
			'koreksi_penjualan_2015' => $koreksi_penjualan_2015,
			'pembelian_2015' => $pembelian_2015,
			'koreksi_persediaan_2015' => $koreksi_persediaan_2015,
			'mutasi_2015' => $mutasi_2015,

			'tahun2016' => $_2016,
			'penjualan_2016' => $penjualan_2016,
			'koreksi_penjualan_2016' => $koreksi_penjualan_2016,
			'pembelian_2016' => $pembelian_2016,
			'koreksi_persediaan_2016' => $koreksi_persediaan_2016,
			'mutasi_2016' => $mutasi_2016,

			'tahun2017' => $_2017,
			'penjualan_2017' => $penjualan_2017,
			'koreksi_penjualan_2017' => $koreksi_penjualan_2017,
			'pembelian_2017' => $pembelian_2017,
			'koreksi_persediaan_2017' => $koreksi_persediaan_2017,
			'mutasi_2017' => $mutasi_2017,

			'tahun2018' => $_2018,
			'penjualan_2018' => $penjualan_2018,
			'koreksi_penjualan_2018' => $koreksi_penjualan_2018,
			'pembelian_2018' => $pembelian_2018,
			'koreksi_persediaan_2018' => $koreksi_persediaan_2018,
			'mutasi_2018' => $mutasi_2018,

			'tahun2019' => $_2019,
			'penjualan_2019' => $penjualan_2019,
			'koreksi_penjualan_2019' => $koreksi_penjualan_2019,
			'pembelian_2019' => $pembelian_2019,
			'koreksi_persediaan_2019' => $koreksi_persediaan_2019,
			'mutasi_2019' => $mutasi_2019
			);
		echo json_encode($data);
	}
}