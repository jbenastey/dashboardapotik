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
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Kategori</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Golongan</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Obat</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Penjual</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Produsen</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped example1">
									<thead class="text-center">
									<tr>
										<th>No</th>
										<th>Nama Kategori</th>
										<th>Keterangan</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($kategori as $key=>$value):
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value['kategori_nama'] ?></td>
										<td><?= $value['kategori_keterangan'] ?></td>
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
										<th>Nama Golongan</th>
										<th>Keterangan</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($golongan as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['golongan_nama'] ?></td>
											<td><?= $value['golongan_keterangan'] ?></td>
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
										<th>Kode Obat</th>
										<th>Nama Obat</th>
										<th>Harga Obat</th>
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
											<td><?= $value['obat_harga'] ?></td>
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
										<th>Tempat Penjual</th>
										<th>Jenis Bayar</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach($penjual as $key=>$value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['penjual_tempat'] ?></td>
											<td><?= $value['penjual_jenis_bayar'] ?></td>
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
										<th>Nama Produsen</th>
										<th>Tempat Produsen</th>
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
											<td><?= $value['produsen_tempat'] ?></td>
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
