<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

//index backend
$route['admin/dashboard']['GET']        = 'admin/Dashboard/index';

//
$route['login']['GET'] = 'admin/Login/loginAdmin';
$route['admin/login']['POST'] = 'admin/Login/loginAksi';
$route['admin/logout']['GET'] = 'admin/Login/logoutAksi';

//admin
$route['admin/admin']['GET']             = 'admin/Admin/adminIndex';
$route['admin/admin/tambah']['GET']      = 'admin/Admin/adminTambah';
$route['admin/admin/save']['POST']       = 'admin/Admin/adminSave';
$route['admin/admin/edit/(:num)']['GET'] = 'admin/Admin/adminEdit/$1';
$route['admin/admin/update/(:num)']['POST'] = 'admin/Admin/adminUpdate/$1';
$route['admin/admin/delete/(:num)']['GET'] = 'admin/Admin/adminDelete/$1';

//user
$route['admin/user']['GET']             = 'admin/User/userIndex';
$route['admin/user/tambah']['GET']      = 'admin/User/userTambah';
$route['admin/user/save']['POST']       = 'admin/User/userSave';
$route['admin/user/edit/(:num)']['GET'] = 'admin/user/userEdit/$1';
$route['admin/user/update/(:num)']['POST'] = 'admin/user/userUpdate/$1';
$route['admin/user/delete/(:num)']['GET'] = 'admin/User/userDelete/$1';

// kategori
$route['admin/kategori']['GET']                 = 'admin/Kategori/kategoriIndex';
$route['admin/kategori/tambah']['GET']          = 'admin/Kategori/kategoriTambah';
$route['admin/kategori/save']['POST']           = 'admin/Kategori/kategoriSave';
$route['admin/kategori/edit/(:num)']['GET'] = 'admin/Kategori/kategoriEdit/$1';
$route['admin/kategori/update/(:num)']['POST'] = 'admin/Kategori/kategoriUpdate/$1';
$route['admin/kategori/delete/(:num)']['GET'] = 'admin/Kategori/kategoriDelete/$1';

//slider
$route['admin/slider']['GET']           = 'admin/Slider/sliderIndex';
$route['admin/slider/tambah']['GET']    = 'admin/Slider/sliderTambah';
$route['admin/slider/save']['POST']     = 'admin/Slider/sliderSave';
$route['admin/slider/edit/(:num)']['GET'] = 'admin/Slider/sliderEdit/$1';
$route['admin/slider/update/(:num)']['POST'] = 'admin/Slider/sliderUpdate/$1';
$route['admin/slider/delete/(:num)']['GET'] = 'admin/Slider/sliderDelete/$1';

//store
$route['admin/store']['GET']            = 'admin/Store/storeIndex';
$route['admin/store/tambah']['GET']     = 'admin/Store/storeTambah';
$route['admin/store/save']['POST']      = 'admin/Store/storeSave';

//barang
$route['admin/barang']['GET']           = 'admin/Barang/barangIndex';
$route['admin/barang/tambah']['GET']    = 'admin/Barang/barangTambah';
$route['admin/barang/save']['POST']     = 'admin/Barang/barangSave';

//ulasan
$route['admin/ulasan']['GET']           = 'admin/Ulasan/ulasanIndex';
$route['admin/ulasan/tambah']['GET']    = 'admin/Ulasan/ulasanTambah';
$route['admin/ulasan/save']['POST']     = 'admin/Ulasan/barangSave';
$route['admin/ulasan/delete/(:num)']['GET'] = 'admin/Ulasan/ulasanDelete/$1';
