$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/dashboardapotik/';
	var getUrl = root + 'obat/data-grafik';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode = 'index';
	var intersect = true;

	var $salesChart = $('#obat-chart');
	var $salesChart0 = $('#obat-chart0');
	$.ajax({
		url: root + 'obat/grafik-tahun',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			// console.log(response);
			var salesChart = new Chart($salesChart0, {
				type: 'line',
				data: {
					labels: ["2015", "2016", "2017", "2018", "2019", "2020"],
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"rgba(222,184,135,0.19)",
							borderColor:
								"#DEB887",
							data: [
								response.data2015,
								response.data2016,
								response.data2017,
								response.data2018,
								response.data2019,
								response.data2020]
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
						text: 'Perkembangan Obat'
					},
					legend: {
						display: true,
						position: 'bottom',
					},
				}
			});
			var salesChart = new Chart($salesChart, {
				type: 'bar',
				data: {
					labels: ["2015", "2016", "2017", "2018", "2019", "2020"],
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data: [
								response.data2015,
								response.data2016,
								response.data2017,
								response.data2018,
								response.data2019,
								response.data2020]
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
						text: 'Klik untuk melihat lebih lanjut',
						position: 'bottom'
					},
					legend: {
						display: true,
						position: 'bottom',
					},
				}
			});

		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});

	function obat_tahun(tahun) {
		var html = '';
		$.ajax({
			url: root + 'obat/data-grafik/' + tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html += '' +
					'<h3>Grafik Obat Tahun ' + tahun + '</h3>' +
					'<div class="chart">' +
					'<canvas id="obat-chart1" width="1000" height="280"></canvas>' +
					'</div><hr>' +
					'<div class="chart">' +
					'<canvas id="obat-chart3" width="1000" height="280"></canvas>' +
					'</div>';
				$('#detail').html(html);

				var $salesChart = $('#obat-chart1');
				var salesChart3 = new Chart($salesChart, {
					type: 'bar',
					data: {
						labels: ["ALKES", "TABLET", "SALEP", "SIRUP", "CAIRAN", "INJEKSI"],
						datasets: [
							{
								label: 'Persediaan',
								backgroundColor:
									"#0000ff",
								borderColor:
									"#0000ff",
								data:
									[
										response.alkes_sedia, response.tablet_sedia, response.salep_sedia, response.sirup_sedia, response.cairan_sedia, response.injeksi_sedia,
									]
							},
							{
								label: 'Produsen',
								backgroundColor:
									"#DEB840",
								borderColor:
									"#DEB840",
								data:
									[
										response.alkes_produsen, response.tablet_produsen, response.salep_produsen, response.sirup_produsen, response.cairan_produsen, response.injeksi_produsen,
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
								obat_kategori(label);
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
				var $salesChart2 = $('#obat-chart3');
				var salesChart2 = new Chart($salesChart2, {
					type: 'pie',
					data: {
						labels: ["Alkes", "tablet", "salep", "sirup", "cairan", "injeksi"],
						datasets: [
							{
								label: 'bentuk',
								backgroundColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#F4A460",
									"#CDA776",
									"#1D7A46",],
								borderColor: [
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#F4A460",
									"#CDA776",
									"#1D7A46",],
								data: [
									response.alkes, response.tablet, response.salep, response.sirup, response.cairan, response.injeksi]
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

	function obat_kategori(label) {
		// console.log(label);
		var html2 = '';
		$.ajax({
			url: root + 'obat/grafik-kategori/'+label,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html2 += '' +
					'<h3>Grafik Obat Kategori '+label+'</h3>' +
					'<div class="chart">' +
					'<canvas id="obat-chart4" width="1000"></canvas>' +
					'</div>';
				$('#detail2').html(html2);


				var nama = [];
				var persediaan = [];
				var produsen = [];
				for(var i = 0; i < response.length; i++){
					nama.push(response[i]['nama_obat']);
					persediaan.push(response[i]['persediaan_obat']);
					produsen.push(response[i]['produsen_obat']);
				}
				console.log(nama);

				var $salesChart5 = $('#obat-chart4');
				var salesChart5 = new Chart($salesChart5, {
					type: 'horizontalBar',
					data: {
						labels: nama,
						datasets: [
							{
								label: 'Persediaan',
								backgroundColor:
									"#0000ff",
								borderColor:
									"#0000ff",
								data: persediaan
							},
							{
								label: 'Produsen',
								backgroundColor:
									"#DEB840",
								borderColor:
									"#DEB840",
								data: produsen
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
					}
				});
			}
		})
	}
})

