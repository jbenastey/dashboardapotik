<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('obat/create') ?>" class="btn btn-primary">tambah obat</a>
						<a href="<?php echo base_url('obat/grafik') ?>" class="btn btn-primary">Lihat Grafik</a>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-striped table-responsive" id="example1">
							<thead>
							<tr>
								<th>No</th>
								<th>kode_obat</th>
								<th>jenis_obat</th>
								<th>nama_obat</th>
								<th>bentuk_obat</th>
								<th>golongan_obat</th>
								<th>kelompok_obat</th>
								<th>harga_pembelian</th>
								<th>persediaan_obat</th>
								<th>produsen_obat</th>
								<th>tgl_update</th>
								<th>tgl_expired</th>
								<th>Aksi</th>


							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($obat as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<?php echo $value['kode_obat'] ?>
									</td>
									<td>
										<?php echo $value['jenis_obat'] ?>
									</td>
									<td>
										<?php echo $value['nama_obat'] ?>
									</td>
									<td>
										<?php echo $value['bentuk_obat'] ?>
									</td>
									<td>
										<?php echo $value['golongan_obat'] ?>
									</td>
									<td>
										<?php echo $value['kelompok_obat'] ?>
									</td>
									<td>
										<?php echo $value['harga_pembelian'] ?>
									</td>
									<td>
										<?php echo $value['persediaan_obat'] ?>
									</td>
									<td>
										<?php echo $value['produsen_obat'] ?>
									</td>
									<td>
										<?php echo $value['tgl_update'] ?>
									</td>
									<td>
										<?php echo $value['tgl_expired'] ?>
									</td>
									<td>
										<a href="<?php echo base_url('obat/edit/') . $value ['kode_obat'] ?>"
										   class="btn btn-success"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url('obat/delete/') . $value ['kode_obat'] ?>"
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
