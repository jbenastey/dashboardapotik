$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/dashboardapotik/';
	var getUrl = root + 'transaksi/data-grafik';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode      = 'index';
	var intersect = true;

	var $salesChart = $('#transaksi-chart');
	var $salesChart1 = $('#transaksi-chart1');
	$.ajax({
		url : root + 'grafik-tahun',
		type : 'GET',
		async : true,
		cache : false,
		dataType : 'json',
		success: function (response) {
			console.log(response);
			var salesChart  = new Chart($salesChart, {
				type   : 'line',
				data   : {
					labels  : ["2015","2016","2017","2018","2019","2020"],
					datasets: [
						{
							label		   : 'Jumlah Transaksi',
							// backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : [
							response.data2015,
							response.data2016,
							response.data2017,
							response.data2018,
							response.data2019,
							response.data2020,
							]
						},
					]
				},
				options: {
					maintainAspectRatio: false,
					tooltips           : {
						mode     : mode,
						intersect: intersect
					},
					hover              : {
						mode     : mode,
						intersect: intersect
					},
					title:{ display: true,
						text: 'Data Transaksi'},
					legend             : {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
			var salesChart2  = new Chart($salesChart1, {
				type   : 'bar',
				data   : {
					labels  : ["2015","2016","2017","2018","2019","2020"],
					datasets: [
						{
							label		   : 'Jumlah Transaksi',
							backgroundColor: '#00ff32',
							borderColor    : '#00ff32',
							data           : [
							response.data2015,
							response.data2016,
							response.data2017,
							response.data2018,
							response.data2019,
							response.data2020,
							]
						},

					]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							// transaksi_tahun(label);
							transaksi_bulan(label);
						}
					},
					maintainAspectRatio: false,
					tooltips           : {
						mode     : mode,
						intersect: intersect
					},
					hover              : {
						mode     : mode,
						intersect: intersect
					},
					title:{ display: true,
						text: 'Jumlah seluruh transaksi berdasarkan tahun'},
					legend             : {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});


	function transaksi_bulan(tahun) {
		console.log(tahun);
		var html = '';
		$.ajax({
			url: root + 'grafik-bulan/' + tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html += '' +
					'<h3>Grafik Obat Tahun ' + tahun + '</h3>' +
					'<div class="chart">' +
					'<canvas id="obat-chart6" width="1000" height="280"></canvas>' +
					'</div>';
				$('#detail3').html(html);

				var $salesChart = $('#obat-chart6');
				var salesChart3 = new Chart($salesChart, {
					type: 'bar',
					data: {
						labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
						datasets: [
							{
								label: 'Jumlah',
								backgroundColor:
									"#ff00ff",
								borderColor:
									"#ff00ff",
								data:
									[
										response.jan.length,
										response.feb.length,
										response.mar.length,
										response.apr.length,
										response.mei.length,
										response.jun.length,
										response.jul.length,
										response.agu.length,
										response.sep.length,
										response.okt.length,
										response.nov.length,
										response.des.length,
									]
							}

						]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								transaksi_tahun(tahun,label);
							}
						},
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					}
				});
			}
		});
	}


	function transaksi_tahun(tahun,bulan) {
		console.log(tahun);
		console.log(bulan);
		var bulannya = angkaBulan(bulan);
		var html = '';
		$.ajax({
			url: root + 'data-grafik/' + tahun + '/' + bulannya,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html += '' +
					'<h3>Grafik Transaksi '+bulan+' ' + tahun + '</h3>' +
					'<div class="chart">' +
					'<canvas id="transaksi-chart2" width="1000" height="280"></canvas>' +
					'</div><hr>' +
					'<div class="row">' +
						'<div class="col-6">' +
							'<div class="chart">' +
							'<canvas id="transaksi-chart3" width="1000" height="280"></canvas>' +
							'</div>' +
						'</div>' +
						'<div class="col-6">' +
							'<div class="chart">' +
							'<canvas id="transaksi-chart5" width="1000" height="280"></canvas>' +
							'</div>' +
						'</div>' +
					'</div>' +
					'<hr>' +
					'<div class="row">' +
						'<div class="col-6">' +
							'<div class="chart">' +
							'<canvas id="transaksi-chart6" width="1000" height="280"></canvas>' +
							'</div>' +
						'</div>' +
						'<div class="col-6">' +
							'<div class="chart">' +
							'<canvas id="transaksi-chart7" width="1000" height="280"></canvas>' +
							'</div>' +
						'</div>' +
					'</div>';
				$('#transaksi-detail').html(html);

				var $salesChart2 = $('#transaksi-chart2');
				var salesChart3 = new Chart($salesChart2, {
					type: 'bar',
					data: {
						labels: ["ASKES", "NON ASKES", "LAINNYA"],
						datasets: [
							{
								label: 'Penjualan',
								backgroundColor:
									"#ff6b00",
								borderColor:
									"#ff6b00",
								data:
									[
										response.askes_total,
										response.non_total,
										response.lain_total,
									]
							},
						]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								transaksi_kategori(label,tahun,bulannya);
							}
						},
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
					}
				});

				var $salesChart3 = $('#transaksi-chart3');
				var salesChart2 = new Chart($salesChart3, {
					type: 'pie',
					data: {
						labels: ["LAINNYA", "ASKES", "NON ASKES"],
						datasets: [
							{
								label: 'bentuk',
								backgroundColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",],
								borderColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",],
								data: [
									response.lain_total,
									response.askes_total,
									response.non_total,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Berdasarkan bentuk'
						},
						legend: {
							display: true,
							position: 'bottom',
						}
					}
				});

				var $salesChart3 = $('#transaksi-chart5');
				var salesChart2 = new Chart($salesChart3, {
					type: 'pie',
					data: {
						labels: [
							"0 - 5 Tahun",
							"6 - 11 Tahun",
							"12 - 20 Tahun",
							"21 - 35 Tahun",
							"35 - 50 Tahun",
							"51 - 65 Tahun",
							"65 Tahun Keatas",
						],
						datasets: [
							{
								label: 'umur',
								backgroundColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#88de00",
									"#0972a9",
									"#dc18b7",
									"#ff6b00",
								],
								borderColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#88de00",
									"#0972a9",
									"#dc18b7",
									"#ff6b00",
								],
								data: [
									response.kanak,
									response.balita,
									response.remaja,
									response.dewasa,
									response.dewasa2,
									response.lansia,
									response.lansia2,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Berdasarkan Umur Pasien'
						},
						legend: {
							display: true,
							position: 'bottom',
						}
					}
				});

				var $salesChart3 = $('#transaksi-chart6');
				var salesChart2 = new Chart($salesChart3, {
					type: 'pie',
					data: {
						labels: [
							"Laki-laki",
							"Perempuan",
						],
						datasets: [
							{
								label: 'jenis kelamin',
								backgroundColor: [
									"#0000de",
									"#ff00ff",
								],
								borderColor: [
									"#0000de",
									"#ff00ff",
								],
								data: [
									response.laki,
									response.perempuan,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Berdasarkan Jenis Kelamin Pasien'
						},
						legend: {
							display: true,
							position: 'bottom',
						}
					}
				});

				var $salesChart3 = $('#transaksi-chart7');
				var salesChart2 = new Chart($salesChart3, {
					type: 'pie',
					data: {
						labels: [
							"BPJS PBI",
							"BPJS NON PBI",
							"JAMKESDA",
							"Bayar Sendiri",
							"KEMENKES RI",
						],
						datasets: [
							{
								label: 'cara bayar',
								backgroundColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#88de00",
									"#0972a9",
								],
								borderColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#88de00",
									"#0972a9",
								],
								data: [
									response.bpjspbi,
									response.bpjsnonpbi,
									response.jamkesda,
									response.sendiri,
									response.kemenkes,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Berdasarkan Cara Pembayaran Pasien'
						},
						legend: {
							display: true,
							position: 'bottom',
						}
					}
				});
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	}

	function transaksi_kategori(label,tahun,bulannya) {
		var label = label.replace(' ','-');
		console.log(label);
		console.log(tahun);
		console.log(bulannya);
		var html2 = '';
		$.ajax({
			url: root + 'grafik-kategori/'+label+'/'+tahun+'/'+bulannya,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(root + 'grafik-kategori/'+label+'/'+tahun);
				html2 += '' +
					'<h3>Grafik Transaksi Kategori '+label+'</h3>' +
					'<div class="chart">' +
					'<canvas id="transaksi-chart4" width="1000" height="1000"></canvas>' +
					'</div>';
				$('#transaksi-detail2').html(html2);


				var obat_nama = [];
				var total = [];

				for(var i = 0; i < response.length; i++){
						obat_nama.push(response[i]['obat_nama']);
						total.push(response[i]['total']);
				}

				console.log(obat_nama);
				console.log(total);

				var $salesChart5 = $('#transaksi-chart4');
				var salesChart5 = new Chart($salesChart5, {
					type: 'horizontalBar',
					data: {
						labels: obat_nama,
						datasets: [
							{
								label: 'Penjualan',
								backgroundColor:
									"#DEB840",
								borderColor:
									"#DEB840",
								data: total
							},

						]
					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							xAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						}
					}
				});
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	}


	$.ajax({
		url: root + 'banyak',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {

			$('#obat-banyak').html(response.obat[0].obat_nama);
			$('#produsen-banyak').html(response.produsen[0].produsen_nama);
			$('#dokter-banyak').html(response.dokter[0].dokter_nama);
			$('#pasien-banyak').html(response.pasien[0].pasien_nama);

			var obat = [];
			var jumlahObat = [];
			if (response.obat.length < 10){
				for (var i = 0; i < response.obat.length; i++) {
					obat.push(response.obat[i].obat_nama);
					jumlahObat.push(response.obat[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					obat.push(response.obat[i].obat_nama);
					jumlahObat.push(response.obat[i].total);
				}
			}

			var produsen = [];
			var jumlahProdusen = [];
			if (response.produsen.length < 10){
				for (var i = 0; i < response.produsen.length; i++) {
					produsen.push(response.produsen[i].produsen_nama);
					jumlahProdusen.push(response.produsen[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					produsen.push(response.produsen[i].produsen_nama);
					jumlahProdusen.push(response.produsen[i].total)
				}
			}

			var dokter = [];
			var jumlahDokter = [];
			if (response.dokter.length < 10){
				for (var i = 0; i < response.dokter.length; i++) {
					dokter.push(response.dokter[i].dokter_nama);
					jumlahDokter.push(response.dokter[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					dokter.push(response.dokter[i].dokter_nama);
					jumlahDokter.push(response.dokter[i].total)
				}
			}

			var pasien = [];
			var jumlahPasien = [];
			if (response.pasien.length < 10){
				for (var i = 0; i < response.pasien.length; i++) {
					pasien.push(response.pasien[i].pasien_nama);
					jumlahPasien.push(response.pasien[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					pasien.push(response.pasien[i].pasien_nama);
					jumlahPasien.push(response.pasien[i].total)
				}
			}

			var mahal = [];
			var jumlahMahal = [];
			if (response.mahal.length < 10){
				for (var i = 0; i < response.mahal.length; i++) {
					mahal.push(response.mahal[i].obat_nama);
					jumlahMahal.push(response.mahal[i].transaksi_harga)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					mahal.push(response.mahal[i].obat_nama);
					jumlahMahal.push(response.mahal[i].transaksi_harga)
				}
			}
			var buku_chart = $('#obat-banyak-chart');
			var salesChart = new Chart(buku_chart, {
				type: 'horizontalBar',
				data: {
					labels: obat,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
							jumlahObat
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Obat Terjual Terbanyak',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var pinjam_chart = $('#produsen-banyak-chart');
			var salesChart = new Chart(pinjam_chart, {
				type: 'horizontalBar',
				data: {
					labels: produsen,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
							jumlahProdusen
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Produsen Terbanyak',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var pinjam_chart2 = $('#dokter-banyak-chart');
			var salesChart = new Chart(pinjam_chart2, {
				type: 'horizontalBar',
				data: {
					labels: dokter,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
							jumlahDokter
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Dokter Terbanyak',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var pinjam_chart2 = $('#pasien-banyak-chart');
			var salesChart = new Chart(pinjam_chart2, {
				type: 'horizontalBar',
				data: {
					labels: pasien,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
							jumlahPasien
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Pasien Terbanyak',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var pinjam_chart2 = $('#obat-mahal-chart');
			var salesChart = new Chart(pinjam_chart2, {
				type: 'horizontalBar',
				data: {
					labels: mahal,
					datasets: [
						{
							label: 'harga',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
							jumlahMahal
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Obat Termahal',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
		}
	})
})


function angkaBulan(bulan) {
	if (bulan === 'Januari'){
		return '01';
	}else if (bulan === 'Februari'){
		return '02';
	}else if (bulan === 'Maret'){
		return '03';
	}else if (bulan === 'April'){
		return '04';
	}else if (bulan === 'Mei'){
		return '05';
	}else if (bulan === 'Juni'){
		return '06';
	}else if (bulan === 'Juli'){
		return '07';
	}else if (bulan === 'Agustus'){
		return '08';
	}else if (bulan === 'September'){
		return '09';
	}else if (bulan === 'Oktober'){
		return '10';
	}else if (bulan === 'November'){
		return '11';
	}else if (bulan === 'Desember'){
		return '12';
	}
}


