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
		url : root + 'transaksi/grafik-tahun',
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
							backgroundColor: '#007bff',
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
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							transaksi_tahun(label);
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


	function transaksi_tahun(tahun) {
		console.log(tahun);
		var html = '';
		$.ajax({
			url: root + 'transaksi/data-grafik/' + tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html += '' +
					'<h3>Grafik Transaksi Tahun ' + tahun + '</h3>' +
					'<div class="chart">' +
					'<canvas id="transaksi-chart2" width="1000" height="280"></canvas>' +
					'</div><hr>' +
					'<div class="chart">' +
					'<canvas id="transaksi-chart3" width="1000" height="280"></canvas>' +
					'</div>';
				$('#transaksi-detail').html(html);

				var $salesChart2 = $('#transaksi-chart2');
				var salesChart3 = new Chart($salesChart2, {
					type: 'bar',
					data: {
						labels: ["ASKES", "NONASKES", "LAINNYA"],
						datasets: [
							{
								label: 'Penjualan',
								backgroundColor:
									"#0000ff",
								borderColor:
									"#0000ff",
								data:
									[
										response.askes_penjualan,
										response.non_penjualan,
										response.lain_penjualan,
									]
							},
							{
								label: 'Pembelian',
								backgroundColor:
									"#ff0f60",
								borderColor:
									"#ff0f60",
								data:
									[
										response.askes_pembelian,
										response.non_pembelian,
										response.lain_pembelian,
									]
							},
							{
								label: 'Koreksi Penjualan',
								backgroundColor:
									"#ffb100",
								borderColor:
									"#ffb100",
								data:
									[
										response.askes_koreksi,
										response.non_koreksi,
										response.lain_koreksi,
									]
							},
							{
								label: 'Koreksi Persediaan',
								backgroundColor:
									"#2cff28",
								borderColor:
									"#2cff28",
								data:
									[
										response.askes_sedia,
										response.non_sedia,
										response.lain_sedia,
									]
							},
							{
								label: 'Mutasi',
								backgroundColor:
									"#24ceff",
								borderColor:
									"#24ceff",
								data:
									[
										response.askes_mutasi,
										response.non_mutasi,
										response.lain_mutasi,
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
								transaksi_kategori(label,tahun);
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
				var $salesChart3 = $('#transaksi-chart3');
				var salesChart2 = new Chart($salesChart3, {
					type: 'pie',
					data: {
						labels: ["LAINNYA", "ASKES", "NONASKES"],
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
						},
					}
				});
			}
		})
	}

	function transaksi_kategori(label,tahun) {
		console.log(label);
		var html2 = '';
		$.ajax({
			url: root + 'transaksi/grafik-kategori/'+label+'/'+tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html2 += '' +
					'<h3>Grafik Transaksi Kategori '+label+'</h3>' +
					'<div class="chart">' +
					'<canvas id="transaksi-chart4" width="1000"></canvas>' +
					'</div>';
				$('#transaksi-detail2').html(html2);


				var nama = [];
				var penjualan = [];
				var pembelian = [];
				var koreksi = [];
				var sedia = [];
				var mutasi = [];

				for(var i = 0; i < response.length; i++){
					if (response[i]['jenis_transaksi'] === 'PENJUALAN'){
						nama.push(response[i]['nama_obat']);
						penjualan.push(1);
						pembelian.push(0);
						koreksi.push(0);
						sedia.push(0);
						mutasi.push(0);
					}
					else if (response[i]['jenis_transaksi'] === 'PEMBELIAN'){
						nama.push(response[i]['nama_obat']);
						penjualan.push(0);
						pembelian.push(1);
						koreksi.push(0);
						sedia.push(0);
						mutasi.push(0);
					}
					else if (response[i]['jenis_transaksi'] === 'KOREKSI PERSEDIAAN'){
						nama.push(response[i]['nama_obat']);
						penjualan.push(0);
						pembelian.push(0);
						koreksi.push(0);
						sedia.push(1);
						mutasi.push(0);
					}
					else if (response[i]['jenis_transaksi'] === 'KOREKSI PENJUALAN'){
						nama.push(response[i]['nama_obat']);
						penjualan.push(0);
						pembelian.push(0);
						koreksi.push(1);
						sedia.push(0);
						mutasi.push(0);
					}
					else if (response[i]['jenis_transaksi'] === 'MUTASI'){
						nama.push(response[i]['nama_obat']);
						penjualan.push(1);
						pembelian.push(0);
						koreksi.push(0);
						sedia.push(0);
						mutasi.push(0);
					}
				}

				console.log(nama);
				console.log(sedia);

				var $salesChart5 = $('#transaksi-chart4');
				var salesChart5 = new Chart($salesChart5, {
					type: 'horizontalBar',
					data: {
						labels: nama,
						datasets: [
							{
								label: 'Pembelian',
								backgroundColor:
									"#0000ff",
								borderColor:
									"#0000ff",
								data: pembelian
							},
							{
								label: 'Penjualan',
								backgroundColor:
									"#DEB840",
								borderColor:
									"#DEB840",
								data: penjualan
							},
							{
								label: 'Koreksi Penjualan',
								backgroundColor:
									"#de2c00",
								borderColor:
									"#de2c00",
								data: koreksi
							},
							{
								label: 'Koreksi Persediaan',
								backgroundColor:
									"#35de06",
								borderColor:
									"#35de06",
								data: sedia
							},
							{
								label: 'Mutasi',
								backgroundColor:
									"#de14c7",
								borderColor:
									"#de14c7",
								data: mutasi
							}

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
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						}
					}
				});
			}
		})
	}
})

