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

//bckend
$route['ptn'] = 'PtnController/index';
$route['ptn/tambah'] = 'PtnController/tambah';
$route['ptn/edit'] = 'PtnController/edit';
$route['ptn/hapus/(:any)'] = 'PtnController/hapus/$1';
$route['ptn/ajaxGet/(:any)'] = 'PtnController/ajaxGetOne/$1';

$route['responden'] = 'RespondenController/index';
$route['responden/tambah'] = 'RespondenController/tambah';
$route['responden/edit'] = 'RespondenController/edit';
$route['responden/hapus/(:any)'] = 'RespondenController/hapus/$1';

$route['jwb'] = 'JwbController/index';
$route['jwb/tambah'] = 'JwbController/tambah';
$route['jwb/edit'] = 'JwbController/edit';
$route['jwb/hapus/(:any)'] = 'JwbController/hapus/$1';
$route['jwb/ajaxGet/(:any)'] = 'JwbController/ajaxGetOne/$1';

$route['layanan'] = 'LynController/index';
$route['layanan/tambah'] = 'LynController/tambah';
$route['layanan/edit'] = 'LynController/edit';
$route['layanan/hapus/(:any)'] = 'LynController/hapus/$1';
$route['layanan/ajaxGet/(:any)'] = 'LynController/ajaxGetOne/$1';

$route['user'] = 'UsrController/index';
$route['user/tambah'] = 'UsrController/tambah';
$route['user/edit'] = 'UsrController/edit';
$route['user/hapus/(:any)'] = 'UsrController/hapus/$1';
$route['user/ajaxGet/(:any)'] = 'UsrController/ajaxGetOne/$1';

$route['beranda'] = 'Welcome';


$route['monitor'] = 'Welcome/monitor';
$route['tes_chart'] = 'Welcome/tes_chart';
$route['monitor3/(:any)'] = 'Monitor3Controller/index/$1';
$route['monitor4/(:any)'] = 'Monitor4Controller/index/$1';
$route['mntr3/step1'] = 'Monitor3Controller/step1';
$route['mntr4/step1'] = 'Monitor4Controller/step1';


$route['instansi'] = 'InstansiController/index';

$route['umum'] = 'UmumController/index';
$route['playlist/hapus/(:any)'] = 'UmumController/deleteVideo/$1';

$route['set/monitor2'] = 'SettingController/monitor2';
$route['set/monitor4'] = 'SettingController/monitor4';
$route['set/android'] = 'SettingController/android';
$route['set/monitor4/add'] = 'SettingController/add_monitor4';
$route['set/monitor4/hapus/(:any)'] = 'SettingController/hapus_monitor4/$1';


$route['step-1'] = 'UmumController/step1';
$route['step-2'] = 'UmumController/step2';
$route['step-3'] = 'UmumController/step3';
$route['step-4'] = 'UmumController/step4';
$route['step-5'] = 'UmumController/step5';
$route['step-6'] = 'UmumController/step6';
$route['wizard'] = 'UmumController/wizard';

$route['laporan'] = 'LprnController/index';
$route['laporan/semua'] = 'LprnController/semua';
$route['laporan/monitor3'] = 'LprnController/monitor3';
$route['laporan/monitor4'] = 'LprnController/monitor4';
// $route['laporan/export/semua/(:any)/(:any)/(:any)'] = 'LprnController/exportSemua/$1/$2/$3';
$route['laporan/export/semua'] = 'LprnController/exportSemua';
$route['laporan/export/layanan'] = 'LprnController/exportLayanan';
$route['laporan/export/responden'] = 'LprnController/exportResponden';
$route['laporan/export/layanan'] = 'LprnController/exportLayanan';
$route['laporan/ajaxGet/(:any)/(:any)/(:any)/(:any)'] = 'LprnController/ajaxGetLaporan/$1/$2/$3/$4';



$route['ajax/getVotes'] = 'Welcome/ajaxGetVotes';
$route['ajax/getVotesMonitor3'] = 'APIController/ajaxGetMonitor3';
$route['ajax/getVotesMonitor4'] = 'APIController/ajaxGetMonitor4';
$route['ajaxUpdate/(:any)/(:any)/(:any)'] = 'Monitor3Controller/ajaxUpdate/$1/$2/$3';
$route['ajaxReset/(:any)'] = 'Monitor3Controller/ajaxReset/$1';
$route['ajaxInsert/(:any)/(:any)/(:any)'] = 'Monitor4Controller/ajaxInsert/$1/$2/$3';


//API
$route['api/layanan'] = 'APIController/apiLayanan';
$route['api/pertanyaan'] = 'APIController/apiPertanyaan';
$route['api/kpsn'] = 'APIController/apiKpsn';
$route['api/responden'] = 'APIController/apiResponden';
$route['api/jawaban'] = 'APIController/apiJawaban';
$route['api/instansi'] = 'APIController/apiInstansi';
$route['api/user'] = 'APIController/apiUser';
$route['api/insert_terhubung'] = 'APIController/insertTerhubung';
$route['api/set/android'] = 'APIController/apiSetAndroid';



$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

$route['default_controller'] = 'AuthController/login';
// $route['default_controller'] = 'UmumController/step1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
