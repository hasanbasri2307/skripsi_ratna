<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'auth/login';
$route['dashboard'] = "dashboard/index";
$route['login'] = "auth/login";
$route['auth/do_login'] = "auth/do_login";
$route['logout'] = "user/do_logout";
$route['user'] = "user/index";
$route['user/add'] = "user/user_add";
$route['user/edit/(:num)'] = "user/user_edit/$1";
$route['user/delete/(:num)'] = "user/user_delete/$1";
$route['user/view/(:num)'] = "user/user_view/$1"; 

$route['stok_beras'] = "stok_beras/index";
$route['stok_beras/add'] = "stok_beras/stok_beras_add";
$route['stok_beras/edit/(:num)'] = "stok_beras/stok_beras_edit/$1";
$route['stok_beras/delete/(:num)'] = "stok_beras/stok_beras_delete/$1";
$route['stok_beras/view/(:num)'] = "stok_beras/stok_beras_view/$1"; 

$route['kriteria'] = "kriteria/index";
$route['kriteria/add'] = "kriteria/kriteria_add";
$route['kriteria/edit/(:num)'] = "kriteria/kriteria_edit/$1";
$route['kriteria/delete/(:num)'] = "kriteria/kriteria_delete/$1";
$route['kriteria/view/(:num)'] = "kriteria/kriteria_view/$1"; 

$route['transaksi'] = "transaksi/index";
$route['transaksi/add'] = "transaksi/transaksi_add";
$route['transaksi/edit/(:num)'] = "transaksi/transaksi_edit/$1";
$route['transaksi/delete/(:num)'] = "transaksi/transaksi_delete/$1";
$route['transaksi/view/(:num)'] = "transaksi/transaksi_view/$1";

$route['seleksi'] = "seleksi/seleksi_add";
$route['seleksi/add'] = "seleksi/seleksi_add";
$route['seleksi/edit/(:num)'] = "seleksi/seleksi_edit/$1";
$route['seleksi/delete/(:num)'] = "seleksi/seleksi_delete/$1";
$route['seleksi/view/(:num)'] = "seleksi/seleksi_view/$1";


$route['pembagian'] = "pembagian/index";
$route['pembagian/add'] = "pembagian/pembagian_add";
$route['pembagian/edit/(:num)'] = "pembagian/pembagian_edit/$1";
$route['pembagian/delete/(:num)'] = "pembagian/pembagian_delete/$1";
$route['pembagian/view/(:num)'] = "pembagian/pembagian_view/$1";
$route['pembagian/view/(:num)/(:num)'] = "pembagian/detail_pembagian/$1/$2";

$route['laporan_data_warga'] = "report/data_warga";
$route['laporan_data_stok_beras'] = "report/stok_beras";
$route['laporan_penerimaan_beras'] = "report/penerimaan_beras";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */