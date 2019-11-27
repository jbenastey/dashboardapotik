<style>
	@media print {
		#printable {
			height: 1300px;
		}
	}
</style>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-print-none">
						<h3>Lihat Data Transaksi
							<div class="float-right">
								<button type="button" onclick="window.print()" class="btn btn-outline-primary"><i
										class="fa fa-print"></i></button>
							</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-4"></div>
							<div class="col-4">
								<div id="printable">
									<div class="text-center" style="border: 1px solid gray">
										<p><?= $transaksi['tgl_transaksi'] ?></p>
										<p><?= $transaksi['jenis_transaksi'] ?></p>
										<p><?= $transaksi['nama_obat'] ?></p>
										<p><?= $transaksi['tempat_obat'] ?></p>
										<p><?= $transaksi['kategori'] ?></p>
										<p><?= $transaksi['debet'] ?></p>
										<p><?= $transaksi['kredit'] ?></p>
										<p><?= $transaksi['biaya'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
