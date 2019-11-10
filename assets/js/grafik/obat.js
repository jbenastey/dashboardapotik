$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/dashboardapotik/';
	var getUrl = root + 'obat/data-grafik';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode      = 'index';
	var intersect = true;

	var $salesChart = $('#obat-chart');
	var $salesChart2 = $('#obat-chart2');
	var $salesChart3 = $('#obat-chart3');
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
					labels  : ["Alkes","tablet","salep","sirup","cairan","injeksi"],
					datasets: [
						{
							label		   : 'jumlah',
							backgroundColor: 
							"#DEB887",
							borderColor    : 
							"#DEB887",
							data           : [
							response.alkes,
							response.tablet,
							response.salep,
							response.sirup,
							response.cairan,
							response.injeksi]
						}]				},
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
					legend             : {
						display: true,
						position: 'bottom',
					},
				}
			});

			var salesChart3  = new Chart($salesChart3, {
				type   : 'bar',
				data   : {
					labels  : ["Alkes","tablet","salep","sirup","cairan","injeksi"],
					datasets: [
						{
							label		   : 'Persediaan',
							backgroundColor: 
							"#0000ff",
							borderColor    : 
							"#0000ff",
							data           : 
							[
							response.alkes_sedia,response.tablet_sedia,response.salep_sedia,response.sirup_sedia,response.cairan_sedia,response.injeksi_sedia,
							]
						},
						{
							label		   : 'Produsen',
							backgroundColor: 
							"#DEB840",
							borderColor    : 
							"#DEB840",
							data           : 
							[
							response.alkes_produsen,response.tablet_produsen,response.salep_produsen,response.sirup_produsen,response.cairan_produsen,response.injeksi_produsen,
							]
						}

						]				},
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
					legend             : {
						display: true,
						position: 'bottom',
					},
				}
			});

			var salesChart2  = new Chart($salesChart2, {
				type   : 'pie',
				data   : {
					labels  : ["Alkes","tablet","salep","sirup","cairan","injeksi"],
					datasets: [
						{
							label		   : 'bentuk',
							backgroundColor: [
							"#DEB887",
							"#A9A9A9",
							"#DC143C",
							"#F4A460",
							"#CDA776",
							"#1D7A46",],
							borderColor    : [
							"#DEB887",
							"#A9A9A9",
							"#DC143C",
							"#F4A460",
							"#CDA776",
							"#1D7A46",],
							data           : [
							response.alkes,response.tablet,response.salep,response.sirup,response.cairan,response.injeksi]
						}]
						
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
						text: 'Berdasarkan bentuk'},
					legend             : {
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


})

