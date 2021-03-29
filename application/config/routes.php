<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['obat'] = 'ObatController/index';
$route['obat/create'] = 'ObatController/create';
$route['obat/import'] = 'ObatController/import';
$route['obat/edit/(:any)'] = 'ObatController/edit/$1';
$route['obat/delete/(:any)'] = 'ObatController/delete/$1';
$route['obat/grafik'] = 'ObatController/grafik';
$route['obat/data-grafik/(:any)'] = 'ObatController/datagrafik/$1';
$route['obat/grafik-kategori/(:any)/(:any)'] = 'ObatController/grafik_kategori/$1/$2';
$route['obat/grafik-tahun'] = 'ObatController/grafik_tahun';
$route['obat/grafik-bulan/(:any)'] = 'ObatController/grafik_bulan/$1';

$route['transaksi'] = 'TransaksiController/index';
$route['transaksi/create'] = 'TransaksiController/create';
$route['transaksi/import'] = 'TransaksiController/import';
$route['transaksi/grafik'] = 'TransaksiController/grafik';
$route['transaksi/edit/(:any)'] = 'TransaksiController/edit/$1';
$route['transaksi/lihat/(:any)'] = 'TransaksiController/lihat/$1';
$route['transaksi/delete/(:any)'] = 'TransaksiController/delete/$1';
$route['transaksi/data-grafik/(:any)'] = 'TransaksiController/datagrafik/$1';
$route['transaksi/grafik-tahun'] = 'TransaksiController/grafik_tahun';
$route['transaksi/grafik-kategori/(:any)/(:any)'] = 'TransaksiController/grafik_kategori/$1/$2';


$route['upload'] = 'ProsesController/upload';
$route['mentah'] = 'ProsesController/excel';
$route['dimensi'] = 'ProsesController/dimensi';
$route['refresh'] = 'ProsesController/refresh';
$route['fakta'] = 'ProsesController/fakta';
$route['refresh_fakta'] = 'ProsesController/refreshFakta';
$route['banyak'] = 'ProsesController/terbanyak';
$route['laporan'] = 'ProsesController/laporan';
$route['grafik-tahun'] = 'ProsesController/grafik_tahun';
$route['data-grafik/(:any)/(:any)'] = 'ProsesController/datagrafik/$1/$2';
$route['grafik-kategori/(:any)/(:any)/(:any)'] = 'ProsesController/grafik_kategori/$1/$2/$3';
$route['grafik-bulan/(:any)'] = 'ProsesController/grafik_bulan/$1';
$route['hapus/(:any)'] = 'ProsesController/hapus/$1';
$route['hapus-semua'] = 'ProsesController/hapusSemua';

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

$route['grafik'] = 'welcome/grafik';

$route['data-fakta'] = 'DataController/fakta';

$route['data-excel-dokter'] = 'DataController/excelDokter';
$route['data-excel-obat'] = 'DataController/excelObat';
$route['data-excel-pasien'] = 'DataController/excelPasien';
$route['data-excel-produsen'] = 'DataController/excelProdusen';
$route['data-excel-ruang'] = 'DataController/excelRuang';
$route['data-excel-transaksi'] = 'DataController/excelTransaksi';

$route['data-dimensi-dokter'] = 'DataController/dimensiDokter';
$route['data-dimensi-obat'] = 'DataController/dimensiObat';
$route['data-dimensi-pasien'] = 'DataController/dimensiPasien';
$route['data-dimensi-produsen'] = 'DataController/dimensiProdusen';
$route['data-dimensi-ruang'] = 'DataController/dimensiRuang';
$route['data-dimensi-transaksi'] = 'DataController/dimensiTransaksi';
$route['data-dimensi-waktu'] = 'DataController/dimensiWaktu';

$route['data-laporan'] = 'DataController/laporan';

$route['hapus-bulan'] = 'ProsesController/hapusBulan';
