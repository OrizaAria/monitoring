<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('monitoringdb')) {
        echo 'Database created!';
    }
});



// $routes->get('login', 'Auth::login');
// $routes->get('auth', 'Auth::index');
// $routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('/', 'Home');
// $routes->get('home/generate', 'Home::generate');
// $routes->addRedirect('/', 'home');
$routes->get('barang', 'Barang::index');
$routes->get('barang/add', 'Barang::create');
$routes->post('barang', 'Barang::store');
$routes->get('barang/edit/(:num)', 'Barang::edit/$1');
$routes->put('barang/(:any)', 'Barang::update/$1');
$routes->delete('barang/(:segment)', 'Barang::destroy/$1');

$routes->presenter('pegawai');
$routes->resource('produksi');
$routes->resource('dashboard');
$routes->resource('hanca');
$routes->post('hanca/create/(:any)', 'Hanca::create($1)');
