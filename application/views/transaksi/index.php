<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3>Data Transaksi
						<div class="float-right">
							<a href="<?php echo base_url('transaksi/create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
								Transaksi</a>
							<a href="<?php echo base_url('transaksi/import') ?>" class="btn btn-sm btn-success"><i class="fa fa-file-excel-o"></i> Import Data
								Transaksi</a>
							<a href="<?php echo base_url('transaksi/grafik') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-bar-chart"></i> Lihat Grafik</a>
						</div>
					</div>
					<div class="card-body">

						<table class="table table-bordered table-striped table-responsive" id="example1">
							<thead>
							<tr>
								<th>No</th>
								<th>tgl_transaksi</th>
								<th>jenis_transaksi</th>
								<th>nama_obat</th>
								<th>tempat_obat</th>
								<th>debet</th>
								<th>kredit</th>
								<th>biaya</th>
								<th>kategori</th>
								<th>Aksi</th>

							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($transaksi as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<?php echo $value['tgl_transaksi'] ?>
									</td>
									<td>
										<?php echo $value['jenis_transaksi'] ?>
									</td>
									<td>
										<?php echo $value['nama_obat'] ?>
									</td>
									<td>
										<?php echo $value['tempat_obat'] ?>
									</td>
									<td>
										<?php echo $value['debet'] ?>
									</td>
									<td>
										<?php echo $value['kredit'] ?>
									</td>
									<td>
										<?php echo $value['biaya'] ?>
									</td>
									<td>
										<?php echo $value['kategori'] ?>
									</td>
									<td>
										<a href="<?php echo base_url('transaksi/lihat/') . $value ['id_transaksi'] ?>"
										   class="btn btn-primary"><i class="fa fa-eye"></i></a><br>
										<a href="<?php echo base_url('transaksi/edit/') . $value ['id_transaksi'] ?>"
										   class="btn btn-success"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url('transaksi/delete/') . $value ['id_transaksi'] ?>"
										   class="btn btn-danger"
										   onclick="return confirm('apakah yakin menghapus data ini')"><i
												class="fa fa-trash"></i></a>
									</td>

								</tr>
							<?php
							$no++;
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
