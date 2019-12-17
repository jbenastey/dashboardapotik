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
			url: root + 'data-grafik/' + tahun,
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
									"#007bff",
								borderColor:
									"#007bff",
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
			url: root + 'grafik-kategori/'+label+'/'+tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
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

