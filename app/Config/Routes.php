<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');

$routes->group('admin', ['filter' => 'login'], function($routes)
{	
	$routes->add('/', 'Admin::index');

	$routes->group('cabang', function($routes)
	{
		$routes->add('/', 'Admin::cabang');
		$routes->post('getKota', 'Admin::getListKotaByProvinsi');
		$routes->post('getListCabang', 'Admin::getListCabang');
		$routes->post('data', 'Admin::dataCabang');
		$routes->post('save', 'Admin::saveCabang');
		$routes->post('delete', 'Admin::deleteCabang');
	});

	$routes->group('rute', function($routes)
	{
		$routes->add('/', 'Admin::rute');
		$routes->post('data', 'Admin::getRute');
		$routes->post('save', 'Admin::saveRute');
		$routes->post('delete', 'Admin::deleteRute');
		$routes->post('aktivasi', 'Admin::setAktivasiRute');
	});

	$routes->group('jadwal', function($routes)
	{
		$routes->add('/', 'Admin::jadwal');
		$routes->post('data', 'Admin::getJadwal');
		$routes->post('save', 'Admin::saveJadwal');
		$routes->post('delete', 'Admin::deleteJadwal');
		$routes->post('aktivasi', 'Admin::setAktivasiJadwal');
	});

	$routes->group('mobil', function($routes)
	{
		$routes->add('/', 'Admin::mobil');
		$routes->post('data', 'Admin::getMobil');
		$routes->post('save', 'Admin::saveMobil');
		$routes->post('delete', 'Admin::deleteMobil');
		$routes->post('aktivasi', 'Admin::setAktivasiMobil');
	});

	$routes->group('sopir', function($routes)
	{
		$routes->add('/', 'Admin::sopir');
		$routes->post('data', 'Admin::getSopir');
		$routes->post('save', 'Admin::saveSopir');
		$routes->post('delete', 'Admin::deleteSopir');
		$routes->post('aktivasi', 'Admin::setAktivasiSopir');
	});
	
	$routes->group('pelanggan', function($routes)
	{
		$routes->add('/', 'Admin::pelanggan');
		$routes->add('data', 'Admin::getPelanggan');
	});

	$routes->group('transaksi', function($routes)
	{
		$routes->add('list', 'Admin::listTransaksi');
		$routes->add('add', 'Admin::addTransaksi');
		$routes->add('data', 'Admin::getTransaksi');
		$routes->add('save', 'Admin::saveTransaksi');
		$routes->add('print', 'Admin::printTransaksi');
		$routes->add('status', 'Admin::statusTransaksi');
		$routes->post('getCabangTujuan', 'Admin::getCabangTujuan');
		$routes->post('getJadwal', 'Admin::getListJadwal');
		$routes->post('getTransaksi', 'Admin::getListTransaksi');
	});

	$routes->group('penjadwalan', function($routes)
	{
		$routes->add('save', 'Admin::savePenjadwalan');
	});

	$routes->group('users', function($routes)
	{
		$routes->add('/', 'Admin::users');
		$routes->post('data', 'Admin::getUsers');
		$routes->post('save', 'Admin::saveUsers');
		$routes->post('delete', 'Admin::deleteUsers');
		$routes->post('password', 'Admin::ubahPasswordUsers');
	});
});

$routes->group('user', function($routes) {
	$routes->add('/', 'Home::index');
	$routes->post('jadwal', 'Home::getJadwal');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
