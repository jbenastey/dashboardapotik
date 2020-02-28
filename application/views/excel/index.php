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
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped example1">
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
									<tbody>
									<?php
									$no = 1;
									foreach($obat as $key=>$value):
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value['obat_kode'] ?></td>
										<td><?= $value['obat_nama'] ?></td>
										<td><?= $value['obat_golongan'] ?></td>
										<td><?= $value['obat_bentuk'] ?></td>
										<td><?= $value['obat_depo'] ?></td>
									</tr>
									<?php
									$no++;
									endforeach;
									?>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<table class="table table-bordered table-striped example1">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Produsen</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($produsen as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['produsen_nama'] ?></td>
										</tr>
										<?php
										$no++;
									endforeach;
									?>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_3">
								<table class="table table-bordered table-striped example1">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Poliklinik / Ruangan</th>
										<th>Jenis Masuk</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($ruang as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['ruang_poliklinik'] ?></td>
											<td><?= $value['ruang_jenis_masuk'] ?></td>
										</tr>
										<?php
										$no++;
									endforeach;
									?>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_4">
								<table class="table table-bordered table-striped example1">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Pasien</th>
										<th>Jenis Kelamin</th>
										<th>Umur</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($pasien as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['pasien_nama'] ?></td>
											<td><?= $value['pasien_jenis_kelamin'] ?></td>
											<td><?= $value['pasien_umur'] ?></td>
										</tr>
										<?php
										$no++;
									endforeach;
									?>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_5">
								<table class="table table-bordered table-striped example1">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Dokter</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($dokter as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['dokter_nama'] ?></td>
											</tr>
										<?php
										$no++;
									endforeach;
									?>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_6">
								<table class="table table-bordered table-striped example1">
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
									<tbody>
									<?php
									$no = 1;
									foreach($transaksi as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['transaksi_kelompok'] ?></td>
											<td><?= $value['transaksi_harga'] ?></td>
											<td><?= $value['transaksi_jumlah'] ?></td>
											<td><?= $value['transaksi_cara_bayar'] ?></td>
											<td><?= $value['transaksi_tanggal'] ?></td>
											</tr>
										<?php
										$no++;
									endforeach;
									?>
									</tbody>
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
