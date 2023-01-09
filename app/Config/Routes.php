<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Halaman Website Pengunjung 
$routes->get('/', 'Home::index');

// Halaman admin User List
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

// Halaman User
$routes->get('/user', 'User::index', ['filter' => 'role:admin,user']);
$routes->get('/user/index', 'User::index', ['filter' => 'role:admin,user']);

// admin berita HTTP METHOD
$routes->get('/adminberita/tambahberita', 'AdminBerita::tambahberita', ['filter' => 'role:admin,user']);
$routes->post('/adminberita/tambahberita/save', 'AdminBerita::save', ['filter' => 'role:admin,user']);
$routes->get('/adminberita/edit/(:segment)', 'AdminBerita::edit/$1', ['filter' => 'role:admin,user']);
$routes->post('/adminberita/edit/(:segment)/update', 'AdminBerita::update/$1', ['filter' => 'role:admin,user']);
$routes->delete('adminberita/(:num)', 'AdminBerita::delete/$1');

// admin informasi
$routes->get('/admininformasi/tambahinformasi', 'AdminInformasi::tambahinformasi', ['filter' => 'role:admin,user']);
$routes->post('/admininformasi/tambahinformasi/save', 'AdminInformasi::save', ['filter' => 'role:admin,user']);
$routes->get('/admininformasi/edit/(:segment)', 'AdminInformasi::edit/$1', ['filter' => 'role:admin,user']);
$routes->post('/admininformasi/edit/(:segment)/update', 'AdminInformasi::update/$1', ['filter' => 'role:admin,user']);
$routes->delete('/admininformasi/(:num)', 'AdminInformasi::delete/$1');

// admin komoditi
$routes->get('/adminkomoditi/tambahkomoditi', 'AdminKomoditi::tambahkomoditi', ['filter' => 'role:admin,user']);
$routes->post('/adminkomoditi/tambahkomoditi/save', 'AdminKomoditi::save', ['filter' => 'role:admin,user']);
$routes->get('/adminkomoditi/edit/(:segment)', 'AdminKomoditi::edit/$1', ['filter' => 'role:admin,user']);
$routes->post('/adminkomoditi/edit/(:segment)/update', 'AdminKomoditi::update/$1', ['filter' => 'role:admin,user']);
$routes->delete('/adminkomoditi/(:num)', 'AdminKomoditi::delete/$1');

// admin produk
$routes->get('/adminproduk/tambahproduk', 'AdminProduk::tambahproduk', ['filter' => 'role:admin,user']);
$routes->post('/adminproduk/tambahproduk/save', 'AdminProduk::save', ['filter' => 'role:admin,user']);
$routes->get('/adminproduk/edit/(:segment)', 'AdminProduk::edit/$1', ['filter' => 'role:admin,user']);
$routes->post('/adminproduk/edit/(:segment)/update', 'AdminProduk::update/$1', ['filter' => 'role:admin,user']);
$routes->delete('/adminproduk/(:num)', 'AdminProduk::delete/$1');

// admin ktp
$routes->get('/adminktp/tambahktp', 'AdminKtp::tambahktp', ['filter' => 'role:admin,user']);
$routes->post('/adminktp/tambahktp/save', 'AdminKtp::save', ['filter' => 'role:admin,user']);
$routes->get('/adminktp/edit/(:segment)', 'AdminKtp::edit/$1', ['filter' => 'role:admin,user']);
$routes->post('/adminktp/edit/(:segment)/update', 'AdminKtp::update/$1', ['filter' => 'role:admin,user']);
$routes->delete('/adminktp/(:num)', 'AdminKtp::delete/$1');

// admin sktm
$routes->get('/adminsktm/tambahsktm', 'AdminSktm::tambahsktm', ['filter' => 'role:admin,user']);
$routes->post('/adminsktm/tambahsktm/save', 'AdminSktm::save', ['filter' => 'role:admin,user']);
$routes->get('/adminsktm/edit/(:segment)', 'AdminSktm::edit/$1', ['filter' => 'role:admin,user']);
$routes->post('/adminsktm/edit/(:segment)/update', 'AdminSktm::update/$1', ['filter' => 'role:admin,user']);
$routes->delete('/adminsktm/(:num)', 'AdminSktm::delete/$1');

// menu konten delete
$routes->delete('/adminperkawinan/(:num)', 'AdminPerkawinan::delete/$1');
$routes->delete('/adminkelahiran/(:num)', 'AdminKelahiran::delete/$1');
$routes->delete('/adminkematian/(:num)', 'AdminKematian::delete/$1');
$routes->delete('/adminpindahpenduduk/(:num)', 'AdminPindahpenduduk::delete/$1');
$routes->delete('/adminjaminanpersalinan/(:num)', 'AdminJaminanpersalinan::delete/$1');
$routes->delete('/adminwaris/(:num)', 'AdminWaris::delete/$1');
$routes->delete('/admindomisiliusaha/(:num)', 'AdminDomisiliusaha::delete/$1');
$routes->delete('/adminhargatanah/(:num)', 'AdminHargatanah::delete/$1');

$routes->get('/adminberita', 'Adminberita::index', ['filter' => 'role:admin,user']);
$routes->get('/admininformasi', 'admininformasi::index', ['filter' => 'role:admin,user']);
$routes->get('/admindomisiliusaha', 'admindomisiliusaha::index', ['filter' => 'role:admin,user']);
$routes->get('/adminhargatanah', 'adminhargatanah::index', ['filter' => 'role:admin,user']);
$routes->get('/adminjaminanpersalinan', 'adminjaminanpersalinan::index', ['filter' => 'role:admin,user']);
$routes->get('/adminkelahiran', 'adminkelahiran::index', ['filter' => 'role:admin,user']);
$routes->get('/adminkematian', 'adminkematian::index', ['filter' => 'role:admin,user']);
$routes->get('/adminkomoditi', 'adminkomoditi::index', ['filter' => 'role:admin,user']);
$routes->get('/adminktp', 'adminktp::index', ['filter' => 'role:admin,user']);
$routes->get('/adminpengaduanmasyarakat', 'adminpengaduanmasyarakat::index', ['filter' => 'role:admin,user']);
$routes->get('/adminperkawinan', 'adminperkawinan::index', ['filter' => 'role:admin,user']);
$routes->get('/adminpindahpenduduk', 'adminpindahpenduduk::index', ['filter' => 'role:admin,user']);
$routes->get('/adminproduk', 'adminproduk::index', ['filter' => 'role:admin,user']);
$routes->get('/adminsktm', 'adminsktm::index', ['filter' => 'role:admin,user']);
$routes->get('/adminwaris', 'adminwaris::index', ['filter' => 'role:admin,user']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
