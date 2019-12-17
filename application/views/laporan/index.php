<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Laporan</h1>
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
						<a href="<?= base_url('refresh_fakta') ?>" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-refresh"></i> Refresh</a>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table class="table table-bordered example1">
							<thead>
							<tr>
								<th>Kode</th>
								<th>Nama</th>
								<th>Golongan</th>
								<th>Kategori</th>
								<th>Harga</th>
								<th>Tempat</th>
								<th>Jenis Bayar</th>
								<th>Produsen</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach($laporan as $key=>$value):
								?>
								<tr>
									<td><?= $value['obat_kode'] ?></td>
									<td><?= $value['obat_nama'] ?></td>
									<td><?= $value['golongan_nama'] ?></td>
									<td><?= $value['kategori_nama'] ?></td>
									<td><?= $value['obat_harga'] ?></td>
									<td><?= $value['penjual_tempat'] ?></td>
									<td><?= $value['penjual_jenis_bayar'] ?></td>
									<td><?= $value['produsen_nama'] ?></td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
			</div>
		</div>
</section>
