<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'config/Routes.php')) {
    require SYSTEMPATH . 'config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dash::index', ['filter' => 'userLogin']);

$routes->get('/auth', 'Login::login');
$routes->post('/auth/processLogin', 'Login::processLogin');
$routes->post('/auth/processRegister', 'Login::processRegister');
$routes->get('/out', 'Login::out');
$routes->get('/jenis', 'Kursus::jenis', ['filter' => 'userLogin']);
$routes->get('/kursus', 'Kursus::kursus', ['filter' => 'userLogin']);
$routes->get('/detailJenis', 'Kursus::detailJenis', ['filter' => 'userLogin']);
$routes->post('/tambahJenis', 'Kursus::tambahJenis', ['filter' => 'userLogin']);
$routes->get('/detailKursus', 'Kursus::detailKursus', ['filter' => 'userLogin']);
$routes->post('/tambahKursus', 'Kursus::tambahKursus', ['filter' => 'userLogin']);
$routes->post('/tambahModul', 'Kursus::tambahModul', ['filter' => 'userLogin']);
$routes->get('/editKursus', 'Kursus::editKursus', ['filter' => 'userLogin']);
$routes->post('/updateKursus', 'Kursus::updateKursus', ['filter' => 'userLogin']);
$routes->get('/materi', 'Materi::materi', ['filter' => 'userLogin']);
$routes->post('/saveMateri', 'Materi::saveMateri', ['filter' => 'userLogin']);
$routes->post('/updateCaption', 'Materi::updateCaption', ['filter' => 'userLogin']);
$routes->get('/daftarKursus', 'Kursus::daftarKursus', ['filter' => 'userLogin']);
$routes->get('/updateStatusMateri', 'Materi::updateStatusMateri', ['filter' => 'userLogin']);
$routes->get('/profile', 'Profile::profile', ['filter' => 'userLogin']);
$routes->post('/addGambar', 'Profile::addGambar', ['filter' => 'userLogin']);
$routes->post('/daftarCreator', 'Profile::daftarCreator', ['filter' => 'userLogin']);
$routes->get('/sertif', 'Sertif::sertif', ['filter' => 'userLogin']);


$routes->get('/auth/(:any)', 'Login::index/$1');
$routes->get('/detailJenis/(:any)', 'Kursus::detailJenis/$1');
$routes->get('/detailKursus/(:any)', 'Kursus::detailKursus/$1');
$routes->get('/editKursus/(:any)', 'Kursus::editKursus/$1');
$routes->post('/updateKursus/(:any)', 'Kursus::updateKursus/$1');
$routes->post('/updateCaption/(:any)', 'Materi::updateCaption/$1');
$routes->get('/daftarKursus/(:any)', 'Kursus::daftarKursus/$1');
$routes->get('/updateStatusMateri/(:any)', 'Materi::updateStatusMateri/$1');
$routes->get('/sertif/(:any)', 'Sertif::sertif/$1');
