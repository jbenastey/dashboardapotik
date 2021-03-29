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
						<button type="button" class="btn btn-outline-primary btn-sm" style="float: left;" onclick="fnExcelReport()"> <i class="fa fa-file-excel-o"></i> Excel</button>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table class="table table-bordered table-responsive" style="width: 100%" id="cetak">
							<thead>
							<tr>
								<th>Kode Obat</th>
								<th>Nama Obat</th>
								<th>Golongan</th>
								<th>Bentuk</th>
								<th>Depo Farmasi</th>
								<th>Produsen</th>
								<th>Nama Pasien</th>
								<th>Jenis Kelamin</th>
								<th>Umur</th>
								<th>Poliklinik / Ruang</th>
								<th>Jenis Masuk</th>
								<th>Nama Dokter</th>
								<th>Kelompok</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th>Cara Bayar</th>
								<th>Tanggal</th>
							</tr>
							</thead>
						</table>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
			</div>
		</div>
</section>

	<script type="text/javascript">
		function fnExcelReport()
		{
			var tab_text="<table border='2px'><tr>";
			var textRange; var j=0;
			tab = document.getElementById('cetak'); // id of table

			for(j = 0 ; j < tab.rows.length ; j++)
			{
				tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
				//tab_text=tab_text+"</tr>";
			}

			tab_text=tab_text+"</table>";
			tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
			tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
			tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

			var ua = window.navigator.userAgent;
			var msie = ua.indexOf("MSIE ");

			if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
			{
				txtArea1.document.open("txt/html","replace");
				txtArea1.document.write(tab_text);
				txtArea1.document.close();
				txtArea1.focus();
				sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xlsx");
			}
			else                 //other browser not tested on IE 11
				sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

			return (sa);
		}
</script>
