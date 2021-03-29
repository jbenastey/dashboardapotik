<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Excel</h1>
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
						<h3 class="card-title p-3">Data Excel</h3>
						<ul class="nav nav-pills ml-auto p-2">
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Obat</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Produsen</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Ruangan</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Pasien</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Dokter</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Transaksi</a></li>
							<li class="nav-item"><a class="nav-link btn-danger text-white btn-sm" href="<?= base_url('hapus-semua') ?>" onclick="return confirm('Hapus semua data?')">Hapus Semua Data</a></li>
							<li class="nav-item">
								<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								</button>
								<div class="dropdown-menu">
									<button type="button" class="dropdown-item btn btn-sm" data-toggle="modal" data-target="#hapus-bulan">Hapus Data Perbulan</button>
								</div>
							</li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-obat">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Kode Obat</th>
										<th>Nama Obat</th>
										<th>Golongan Obat</th>
										<th>Bentuk Obat</th>
										<th>Depo Farmasi</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-produsen">
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
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-ruang">
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
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-pasien">
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
								<table class="table table-bordered table-striped" style="width: 100%"  id="dt-excel-dokter">
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
								<table class="table table-bordered table-striped" style="width: 100%" id="dt-excel-transaksi">
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

<div class="modal fade text-left" id="hapus-bulan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel1">Hapus Data Perbulan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
				</button>
			</div>
			<form action="<?= base_url('hapus-bulan') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<fieldset class="form-group">
						<label for="basicInput">Pilih Bulan</label><br>
						<select name="bulan" class="form-control">
							<?php
							foreach($getHapus as $key=>$value):
							?>
								<option value="<?= $value['waktu_bulan'] ?>-<?= $value['waktu_tahun'] ?>">Bulan <?= $value['waktu_bulan'] ?>, Tahun <?= $value['waktu_tahun'] ?></option>
							<?php
							endforeach;
							?>
						</select>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn bg-light-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" onclick="return confirm('Hapus Data? ')" class="btn btn-primary">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
