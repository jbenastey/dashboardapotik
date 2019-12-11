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
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">dim_kategori</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">dim_golongan</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">dim_obat</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">dim_penjual</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">dim_produsen</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">dim_waktu</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped example1">
									<thead class="text-center">
									<tr>
										<th>kategori_id</th>
										<th>kategori_nama</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($kategori as $key=>$value):
									?>
									<tr>
										<td><?= $value['kategori_id'] ?></td>
										<td><?= $value['kategori_nama'] ?></td>
									</tr>
									<?php
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
										<th>golongan_id</th>
										<th>golongan_nama</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($golongan as $key=>$value):
										?>
										<tr>
											<td><?= $value['golongan_id'] ?></td>
											<td><?= $value['golongan_nama'] ?></td>
										</tr>
									<?php
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
										<th>obat_id</th>
										<th>obat_kode</th>
										<th>obat_nama</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($obat as $key=>$value):
										?>
										<tr>
											<td><?= $value['obat_id'] ?></td>
											<td><?= $value['obat_kode'] ?></td>
											<td><?= $value['obat_nama'] ?></td>
										</tr>
									<?php
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
										<th>penjual_id</th>
										<th>penjual_tempat</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($penjual as $key=>$value):
										?>
										<tr>
											<td><?= $value['penjual_id'] ?></td>
											<td><?= $value['penjual_tempat'] ?></td>
										</tr>
									<?php
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
										<th>produsen_id</th>
										<th>produsen_nama</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($produsen as $key=>$value):
										?>
										<tr>
											<td><?= $value['produsen_id'] ?></td>
											<td><?= $value['produsen_nama'] ?></td>
										</tr>
									<?php
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
										<th>waktu_id</th>
										<th>waktu</th>
										<th>waktu_hari</th>
										<th>waktu_bulan</th>
										<th>waktu_tahun</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($waktu as $key=>$value):
										?>
										<tr>
											<td><?= $value['waktu_id'] ?></td>
											<td><?= $value['waktu'] ?></td>
											<td><?= $value['waktu_hari'] ?></td>
											<td><?= $value['waktu_bulan'] ?></td>
											<td><?= $value['waktu_tahun'] ?></td>
										</tr>
									<?php
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
