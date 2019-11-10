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

$route['transaksi'] = 'TransaksiController/index';
$route['transaksi/create'] = 'TransaksiController/create';
$route['transaksi/grafik'] = 'TransaksiController/grafik';
$route['transaksi/edit/(:any)'] = 'TransaksiController/edit/$1';
$route['transaksi/delete/(:any)'] = 'TransaksiController/delete/$1';
$route['transaksi/data-grafik/(:any)'] = 'TransaksiController/datagrafik/$1';
$route['transaksi/grafik-tahun'] = 'TransaksiController/grafik_tahun';
$route['transaksi/grafik-kategori/(:any)/(:any)'] = 'TransaksiController/grafik_kategori/$1/$2';

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
