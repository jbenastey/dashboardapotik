<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Dimensi</h1>
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
					<div class="card-header">
						<a href="<?= base_url('refresh') ?>" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-refresh"></i> Refresh</a>
						<ul class="nav nav-pills ml-auto">
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">dim_obat</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">dim_produsen</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">dim_ruangan</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">dim_pasien</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">dim_dokter</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">dim_transaksi</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">dim_waktu</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped" style="width: 100%" id="dt-dimensi-obat">
									<thead class="text-center">
									<tr>
										<th>obat_id</th>
										<th>obat_nama</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<table class="table table-bordered table-striped" style="width: 100%" id="dt-dimensi-produsen">
									<thead class="text-center">
									<tr>
										<th>produsen_id</th>
										<th>produsen_nama</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_3">
								<table class="table table-bordered table-striped"  style="width: 100%" id="dt-dimensi-ruang">
									<thead class="text-center">
									<tr>
										<th>ruang_id</th>
										<th>ruang_poliklinik</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_4">
								<table class="table table-bordered table-striped" style="width: 100%" id="dt-dimensi-pasien">
									<thead class="text-center">
									<tr>
										<th>pasien_id</th>
										<th>pasien_nama</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_5">
								<table class="table table-bordered table-striped"  style="width: 100%" id="dt-dimensi-dokter">
									<thead class="text-center">
									<tr>
										<th>dokter_id</th>
										<th>dokter_nama</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_6">
								<table class="table table-bordered table-striped"  style="width: 100%" id="dt-dimensi-transaksi">
									<thead class="text-center">
									<tr>
										<th>transaksi_id</th>
										<th>transaksi_harga</th>
										<th>transaksi_jumlah</th>
										<th>transaksi_total</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_7">
								<table class="table table-bordered table-striped"  style="width: 100%" id="dt-dimensi-waktu">
									<thead class="text-center">
									<tr>
										<th>waktu_id</th>
										<th>waktu_hari</th>
										<th>waktu_tanggal</th>
										<th>waktu_bulan</th>
										<th>waktu_tahun</th>
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
