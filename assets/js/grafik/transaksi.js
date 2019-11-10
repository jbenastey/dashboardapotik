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
	var $salesChart2 = $('#transaksi-chart2');
	$.ajax({
		url : getUrl,
		type : 'GET',
		async : true,
		cache : false,
		dataType : 'json',
		success: function (response) {
			console.log(response);
			var salesChart  = new Chart($salesChart, {
				type   : 'bar',
				data   : {
					labels  : ["2015","2016","2017","2018","2019"],
					datasets: [
						{
							label		   : 'Jumlah Transaksi',
							backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : [
							response.tahun2015,
							response.tahun2016,
							response.tahun2017,
							response.tahun2018,
							response.tahun2019]
						},
						{
							label		   : 'Jumlah penjualan',
							backgroundColor: '#A9A9A9',
							borderColor    : '#A9A9A9',
							data           : [
							response.penjualan_2015,
							response.penjualan_2016,
							response.penjualan_2017,
							response.penjualan_2018,
							response.penjualan_2019]
						},
						{
							label		   : 'Jumlah pembelian',
							backgroundColor: '#1D7A46',
							borderColor    : '#1D7A46',
							data           : [
							response.pembelian_2015,
							response.pembelian_2016,
							response.pembelian_2017,
							response.pembelian_2018,
							response.pembelian_2019]
						},
						{
							label		   : 'Jumlah koreksi persediaan',
							backgroundColor: '#CDA776',
							borderColor    : '#CDA776',
							data           : [
							response.koreksi_persediaan_2015,
							response.koreksi_persediaan_2016,
							response.koreksi_persediaan_2017,
							response.koreksi_persediaan_2018,
							response.koreksi_persediaan_2019]
						},
						{
							label		   : 'Jumlah mutasi',
							backgroundColor: '#DC143C',
							borderColor    : '#DC143C',
							data           : [
							response.mutasi_2015,
							response.mutasi_2016,
							response.mutasi_2017,
							response.mutasi_2018,
							response.mutasi_2019]
						},
						{
							label		   : 'koreksi penjualan',
							backgroundColor: '#DEB887',
							borderColor    : '#DEB887',
							data           : [
							response.koreksi_penjualan_2015,
							response.koreksi_penjualan_2016,
							response.koreksi_penjualan_2017,
							response.koreksi_penjualan_2018,
							response.koreksi_penjualan_2019]
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
						text: 'keterangan transaksi berdasarkan tahun'},
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
			var salesChart2  = new Chart($salesChart2, {
				type   : 'line',
				data   : {
					labels  : ["2015","2016","2017","2018","2019"],
					datasets: [
						{
							label		   : 'Jumlah Transaksi',
							// backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : [
							response.tahun2015,
							response.tahun2016,
							response.tahun2017,
							response.tahun2018,
							response.tahun2019]
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
})

