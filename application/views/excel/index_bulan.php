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
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Excel Bulan</h1>
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
					<div class="card-header d-flex p-0">
						<h3 class="card-title p-3">Data Excel Bulan <?= toBulan($bulan) ?> <span id="bulan" style="visibility: hidden"><?= $bulan ?></span> </h3>
						<ul class="nav nav-pills ml-auto p-2">
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Obat</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Produsen</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Ruangan</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Pasien</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Dokter</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Transaksi</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-bulan-obat">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Kode Obat</th>
										<th>Nama Obat</th>
										<th>Golongan Obat</th>
										<th>Bentuk Obat</th>
										<th>Depo Farmasi</th>
										<th>Aksi</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-bulan-produsen">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Produsen</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_3">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-bulan-ruang">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Poliklinik / Ruangan</th>
										<th>Jenis Masuk</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_4">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-bulan-pasien">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Pasien</th>
										<th>Jenis Kelamin</th>
										<th>Umur</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_5">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-bulan-dokter">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Dokter</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_6">
								<table class="table table-bordered table-striped" style="width: 100%" id="dt-excel-bulan-transaksi">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Kelompok</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Cara Bayar</th>
										<th>Tanggal</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
			</div>
		</div>
</section>
