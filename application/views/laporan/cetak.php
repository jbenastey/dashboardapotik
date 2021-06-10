<?php
function toBulan($tanggal){
	$tanggal = explode('-',$tanggal);
	$bulan = $tanggal[0];
	$tahun = $tanggal[1];

	$namaBulan = array(
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
	);

	return $namaBulan[$bulan].' '.$tahun;
}
?>
<style type="text/css" media="print">
	@page { size: landscape; }
	.cetak-laporan-bulan {
		font-size: 8px;
	}
</style>

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Laporan Perbulan</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-print-none">
						<button type="button" class="btn btn-outline-primary btn-sm"
						   style="float: left;" onclick="window.print()"> <i class="fa fa-file-excel-o"></i> Cetak</button>
					</div><!-- /.card-header -->
					<div class="card-body">
						<<div class="row">
							<div class="col-2 float-left ml-5 mt-1">
								<img src="http://localhost/dashboardapotik/assets/img/logocetak.jpg" class="logo" width="205px">
							</div>
							<div class="col-9 text-center p-0 ">
								<h4 style="margin-left: -150px">Pemerintah Daerah Provinsi Riau</h4>
								<h4 style="margin-left: -150px">Dinas Kesehatan</h4>
								<h4 style="margin-left: -150px">Rumah Sakit Jiwa Tampan</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-12 ml-3 mr-3 mb-0">
								<p style="margin-top: -5px;margin-bottom: -5px;font-size: 9pt;" class="text-center">Jl. H.R Soebrantas KM. 12,5</p>
								<p style="margin-top: -5px;margin-bottom: -5px;font-size: 9pt;" class="text-center">Website: www.rsjiwatampan.riau.go.id Email: rsjtampan@riau.go.id</p>
								<p style="margin-top: -5px;font-size: 9pt;" class="text-center">Kota Pekanbaru</p></div>
						</div>
						<hr style=" margin-top: -10px;width: 100%;border:2px solid black;background-color: black; ">

						<div class="col-12 text-center pb-2">
							<h5>Laporan Bulan <?= toBulan($bulan) ?></h5>
						</div>

						<table class="table table-bordered table-responsive cetak-laporan-bulan" style="width: 100%;">
							<thead>
							<tr>
								<th>Kode Obat</th>
								<th>Nama Obat</th>
								<th>Golongan</th>
								<th>Bentuk</th>
								<th>Depo Farmasi</th>
								<th>Produsen</th>
								<th>Nama Pasien</th>
								<th>Jenis Kelamin</th>
								<th>Umur</th>
								<th>Poliklinik / Ruang</th>
								<th>Jenis Masuk</th>
								<th>Nama Dokter</th>
								<th>Kelompok</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th>Cara Bayar</th>
								<th>Tanggal</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($laporan as $key => $value):
								?>
								<tr>
									<td><?= $value['obat_kode'] ?></td>
									<td><?= $value['obat_nama'] ?></td>
									<td><?= $value['obat_golongan'] ?></td>
									<td><?= $value['obat_bentuk'] ?></td>
									<td><?= $value['obat_depo'] ?></td>
									<td><?= $value['produsen_nama'] ?></td>
									<td><?= $value['pasien_nama'] ?></td>
									<td><?= $value['pasien_jenis_kelamin'] ?></td>
									<td><?= $value['pasien_umur'] ?></td>
									<td><?= $value['ruang_poliklinik'] ?></td>
									<td><?= $value['ruang_jenis_masuk'] ?></td>
									<td><?= $value['dokter_nama'] ?></td>
									<td><?= $value['transaksi_kelompok'] ?></td>
									<td><?= $value['transaksi_harga'] ?></td>
									<td><?= $value['transaksi_jumlah'] ?></td>
									<td><?= $value['transaksi_total'] ?></td>
									<td><?= $value['transaksi_cara_bayar'] ?></td>
									<td><?= $value['transaksi_tanggal'] ?></td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
