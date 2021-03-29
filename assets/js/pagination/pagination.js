$(document).ready(function(){
	var root = window.location.origin + '/dashboardapotik/';

	$('#dt-fakta').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-fakta'
		},
		'columns': [
			{ data: 'id_obat' },
			{ data: 'id_produsen' },
			{ data: 'id_ruang' },
			{ data: 'id_pasien' },
			{ data: 'id_dokter' },
			{ data: 'id_transaksi' },
			{ data: 'id_waktu' },
		]
	});

	$('#dt-excel-dokter').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-dokter'
		},
		'columns': [
			{ data: 'dokter_id' },
			{ data: 'dokter_nama' },
		]
	});

	$('#dt-excel-obat').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-obat'
		},
		'columns': [
			{ data: 'obat_id' },
			{ data: 'obat_kode' },
			{ data: 'obat_nama' },
			{ data: 'obat_golongan' },
			{ data: 'obat_bentuk' },
			{ data: 'obat_depo' },
		]
	});

	$('#dt-excel-pasien').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-pasien'
		},
		'columns': [
			{ data: 'pasien_id' },
			{ data: 'pasien_nama' },
			{ data: 'pasien_jenis_kelamin' },
			{ data: 'pasien_umur' },
		]
	});

	$('#dt-excel-produsen').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-produsen'
		},
		'columns': [
			{ data: 'produsen_id' },
			{ data: 'produsen_nama' },
		]
	});

	$('#dt-excel-ruang').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-ruang'
		},
		'columns': [
			{ data: 'ruang_id' },
			{ data: 'ruang_poliklinik' },
			{ data: 'ruang_jenis_masuk' },
		]
	});

	$('#dt-excel-transaksi').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-transaksi'
		},
		'columns': [
			{ data: 'transaksi_id' },
			{ data: 'transaksi_kelompok' },
			{ data: 'transaksi_harga' },
			{ data: 'transaksi_jumlah' },
			{ data: 'transaksi_cara_bayar' },
			{ data: 'transaksi_tanggal' },
		]
	});

	$('#dt-dimensi-dokter').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-dokter'
		},
		'columns': [
			{ data: 'dokter_id' },
			{ data: 'dokter_nama' },
		]
	});

	$('#dt-dimensi-obat').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-obat'
		},
		'columns': [
			{ data: 'obat_id' },
			{ data: 'obat_nama' },
		]
	});

	$('#dt-dimensi-pasien').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-pasien'
		},
		'columns': [
			{ data: 'pasien_id' },
			{ data: 'pasien_nama' },
		]
	});

	$('#dt-dimensi-produsen').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-produsen'
		},
		'columns': [
			{ data: 'produsen_id' },
			{ data: 'produsen_nama' },
		]
	});

	$('#dt-dimensi-ruang').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-ruang'
		},
		'columns': [
			{ data: 'ruang_id' },
			{ data: 'ruang_poliklinik' },
		]
	});

	$('#dt-dimensi-transaksi').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-transaksi'
		},
		'columns': [
			{ data: 'transaksi_id' },
			{ data: 'transaksi_harga' },
			{ data: 'transaksi_jumlah' },
			{ data: 'transaksi_total' },
		]
	});
});
