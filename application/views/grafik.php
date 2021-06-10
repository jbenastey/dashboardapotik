<style type="text/css" media="print">
	@page { size: landscape; }
	.cetak-grafik{
		display: block;
	}
</style>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6 col-lg-12">
				<h1 class="m-0 text-dark">Grafik</h1>
				<button type="button" onclick="window.print()" class="btn btn-sm btn-outline-primary float-right"><i class="fa fa-print"></i> Cetak</button>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="cetak-grafik d-print-block" style="display: none">

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-2 float-left ml-5 mt-1">
									<img src="http://localhost/dashboardapotik/assets/img/logocetak.jpg" class="logo" width="205px">
								</div>
								<div class="col-9 text-center p-0 ">
									<h4 style="margin-left: -150px">Pemerintah Daerah Provinsi Riau</h4>
									<h4 style="margin-left: -150px">Dinas Kesehatan</h4>
									<h4 style="margin-left: -150px">Rumah Sakit Jiwa Tampan</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-12 ml-3 mr-3 mb-0">
									<p style="margin-top: -5px;margin-bottom: -5px;font-size: 9pt;" class="text-center">Jl. H.R Soebrantas KM. 12,5</p>
									<p style="margin-top: -5px;margin-bottom: -5px;font-size: 9pt;" class="text-center">Website: www.rsjiwatampan.riau.go.id Email: rsjtampan@riau.go.id</p>
									<p style="margin-top: -5px;font-size: 9pt;" class="text-center">Kota Pekanbaru</p>
								</div>
							</div>
							<hr style=" margin-top: -10px;width: 100%;border:2px solid black;background-color: black; ">
							<div class="col-12 text-center pb-2">
								<h5>Grafik</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-6">
				<div class="small-box bg-warning-gradient">
					<div class="inner">
						<h5>&nbsp;<span id="obat-banyak"></span></h5>
						<br>
						<p>Obat Terbanyak </p>
					</div>
					<div class="icon">
						<i class="fa fa-plus-circle"></i>
					</div>
					<a href="#banyak" class="small-box-footer d-print-none">Lihat Data <i
							class="fa fa-arrow-circle-down"></i></a>
				</div>
			</div>
			<div class="col-lg-6 col-6">
				<div class="small-box bg-danger-gradient">
					<div class="inner">
						<h5>&nbsp;<span id="produsen-banyak"></span></h5>
						<br>
						<p>Produsen Terbanyak </p>
					</div>
					<div class="icon">
						<i class="fa fa-car"></i>
					</div>
					<a href="#banyak2" class="small-box-footer d-print-none">Lihat Data <i
							class="fa fa-arrow-circle-down"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-6">
				<div class="small-box bg-secondary-gradient">
					<div class="inner">
						<h5>&nbsp;<span id="dokter-banyak"></span></h5>
						<br>
						<p>Dokter Terbanyak </p>
					</div>
					<div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<a href="#banyak3" class="small-box-footer d-print-none">Lihat Data <i
							class="fa fa-arrow-circle-down"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-6">
				<div class="small-box bg-success-gradient">
					<div class="inner">
						<h5>&nbsp;<span id="pasien-banyak"></span></h5>
						<br>
						<p>Pasien Terbanyak </p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="#banyak3" class="small-box-footer d-print-none">Lihat Data <i
							class="fa fa-arrow-circle-down"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-6">
				<div class="small-box bg-primary-gradient">
					<div class="inner">
						<h5>&nbsp;<span id="poliklinik-banyak"></span></h5>
						<br>
						<p>Poliklinik Terbanyak </p>
					</div>
					<div class="icon">
						<i class="fa fa-hospital-o"></i>
					</div>
					<a href="#banyak2" class="small-box-footer d-print-none">Lihat Data <i
							class="fa fa-arrow-circle-down"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="transaksi-chart" width="1000" height="280"></canvas>
						</div>
						<hr>
						<div class="chart">
							<canvas id="transaksi-chart1" width="1000" height="280"></canvas>
						</div>
						<hr>
						<div id="detail3">

						</div>
						<hr>
						<div id="transaksi-detail">

						</div>
						<hr>
						<div id="transaksi-detail2">

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="banyak">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="obat-banyak-chart" height="1000"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="obat-mahal-chart" height="1000"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="banyak2">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="produsen-banyak-chart" height="1000"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="poliklinik-banyak-chart" height="1000"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="banyak3">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="dokter-banyak-chart" height="1000"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="chart">
							<canvas id="pasien-banyak-chart" height="1000"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


