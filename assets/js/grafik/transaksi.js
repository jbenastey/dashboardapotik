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
	$.ajax({
		url : root + 'transaksi/grafik-tahun',
		type : 'GET',
		async : true,
		cache : false,
		dataType : 'json',
		success: function (response) {
			console.log(response);
			var salesChart  = new Chart($salesChart, {
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
			// var salesChart2  = new Chart($salesChart2, {
			// 	type   : 'line',
			// 	data   : {
			// 		labels  : ["2015","2016","2017","2018","2019"],
			// 		datasets: [
			// 			{
			// 				label		   : 'Jumlah Transaksi',
			// 				// backgroundColor: '#007bff',
			// 				borderColor    : '#007bff',
			// 				data           : [
			// 				response.tahun2015,
			// 				response.tahun2016,
			// 				response.tahun2017,
			// 				response.tahun2018,
			// 				response.tahun2019]
			// 			},
			//
			// 		]
			// 	},
			// 	options: {
			// 		maintainAspectRatio: false,
			// 		tooltips           : {
			// 			mode     : mode,
			// 			intersect: intersect
			// 		},
			// 		hover              : {
			// 			mode     : mode,
			// 			intersect: intersect
			// 		},
			// 		title:{ display: true,
			// 			text: 'Jumlah seluruh transaksi berdasarkan tahun'},
			// 		legend             : {
			// 			display: true,
			// 			position: 'bottom',
			// 		},
			// 		scales: {
			// 			yAxes:[{
			// 				ticks: {
			// 					beginAtZero : true
			// 				}
			// 			}]
			// 		}
			// 	}
			// });
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});
})

