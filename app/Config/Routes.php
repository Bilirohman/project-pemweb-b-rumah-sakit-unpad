<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/salah', 'Home::salahRole');

$routes->get('/book', 'PatientsController::getBook');
$routes->post('/book/save', 'PatientsController::save');
$routes->get('/book/success', 'PatientsController::success');

$routes->get('/login', 'AuthController::getLogin');
$routes->post('/login', 'AuthController::postLogin');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::getRegister');
$routes->post('/register', 'AuthController::postRegister');

$routes->get('/dashboard', 'DashboardController::getDashboard', ['filter' => 'roleFilter:admin,doctor']) ;
$routes->post('/dashboard/tambah-dokter', 'DashboardController::tambahDokter', ['filter' => 'roleFilter:admin,doctor']);
$routes->get('/dashboard/edit-dokter/(:num)', 'DashboardController::editDokter/$1', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('/dashboard/update-dokter/(:num)', 'DashboardController::updateDokter/$1', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('/dashboard/hapus-dokter/(:num)', 'DashboardController::hapusDokter/$1', ['filter' => 'roleFilter:admin,doctor']);

$routes->get('dashboard/data-pasien', 'DashboardController::getPatientView', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/data-pasien/registrasi', 'DashboardController::buatRegistrasi',['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/data-pasien/tambah-pasien', 'DashboardController::tambahPasien', ['filter' => 'roleFilter:admin,doctor']);
$routes->get('dashboard/data-pasien/export', 'DashboardController::exportRegistrasi', ['filter' => 'roleFilter:admin,doctor']);

$routes->get('dashboard/riwayat-pemeriksaan', 'DashboardController::getRiwayatPemeriksaan', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/riwayat-pemeriksaan/tambah', 'DashboardController::buatPemeriksaan', ['filter' => 'roleFilter:admin,doctor']);

$routes->get('dashboard/janji-temu', 'DashboardController::getJanjiTemu', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('/dashboard/janji-temu/hapus/(:num)', 'DashboardController::deleteJanjiTemu/$1', ['filter' => 'roleFilter:admin,doctor']);

$routes->get('dashboard/jadwal-praktek', 'DashboardController::getJadwalPraktek', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/jadwal-praktek/tambah', 'DashboardController::tambahJadwalPraktek', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/jadwal-praktek/hapus', 'DashboardController::hapusJadwalPraktek', ['filter' => 'roleFilter:admin,doctor']);


$routes->get('dashboard/laporan-rawat', 'DashboardController::getLaporanRawat', ['filter' => 'roleFilter:admin,doctor']);
$routes->get('dashboard/menu-apotek', 'DashboardController::getMenuApotek', ['filter' => 'roleFilter:admin,doctor']);

$routes->get('dashboard/pesan-obat', 'DashboardController::getPesanObat', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/pesan-obat/add', 'DashboardController::pesanObat', ['filter' => 'roleFilter:admin,doctor']);
$routes->post('dashboard/pesan-obat/editstatus', 'DashboardController::updateStatusPesananObat',['filter' => 'roleFilter:admin,apoteker']);


$routes->get('/apoteker', 'ApotekerController::getMenuApotek', ['filter' => 'roleFilter:admin, apoteker']);
$routes->get('/apoteker/pesan-obat', 'ApotekerController::getPesanObat', ['filter' => 'roleFilter:admin, apoteker']);
$routes->post('apoteker/pesan-obat/add', 'ApotekerController::pesanObat', ['filter' => 'roleFilter:admin, apoteker']);




