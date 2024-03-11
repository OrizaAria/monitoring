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

$routes->get('/register', 'Home::register');
$routes->put('/orderan/(.*)/selesai', 'Orderan::selesai/$1');

$routes->resource('pegawai');
$routes->resource('produksi');
$routes->resource('dashboard');
$routes->get('/', 'Dashboard::index');
$routes->get('/upah/(.*)/info', 'Upah::info/$1');
$routes->put('/upah/(.*)/bayar', 'Upah::bayar/$1');
$routes->put('/orderan/(.*)/kirim', 'Orderan::kirim/$1');
$routes->resource('orderan');
$routes->resource('hanca');
$routes->resource('upah');
