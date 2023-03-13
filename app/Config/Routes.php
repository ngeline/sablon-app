<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// Users / pelanggan
$routes->get('/', 'LandingPageController::index');
$routes->get('cek-invoice', 'CekInvoiceController::index');
$routes->get('produk-detail', 'LandingPageController::detailProduk');
$routes->get('order', 'OrderController::index');
$routes->get('order-custom', 'OrderCustomController::index');

//Routes authentication
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::postlogin');
$routes->get('logout', 'AuthController::logout');

$routes->get('errors', 'AuthController::errors');

$routes->group('', ['filter' => 'AuthFilter'], function ($routes) {
    $routes->get('dashboard', 'DashboardController::index');

    // PEMILIK
    $routes->group('pemilik', ['filter' => 'PemilikFilter'], function ($routes) {
        // Kelola Users
        $routes->get('users', 'UsersController::index');
        $routes->post('users/store', 'UsersController::store');
        $routes->get('users/edit', 'UsersController::edit');
        $routes->post('users/update', 'UsersController::update');
        $routes->get('users/delete/(:num)', 'UsersController::delete/$1');

        // Kelola Bahan
        $routes->get('kelola-bahan', 'BahanController::index');
        $routes->post('kelola-bahan/store', 'BahanController::store');
        $routes->get('kelola-bahan/edit', 'BahanController::edit');
        $routes->post('kelola-bahan/update', 'BahanController::update');
        $routes->get('kelola-bahan/delete/(:num)', 'BahanController::delete/$1');
    });

    // ADMIN
    $routes->group('admin', ['filter' => 'AdminFilter'], function ($routes) {
        // Info Harga Bahan
        $routes->get('info-harga-bahan', 'InfoHargaBahanController::index');
        $routes->get('info-harga-bahan/notif', 'InfoHargaBahanController::notif');

        // Data Bahan
        $routes->get('data-bahan', 'BahanController::indexAdmin');
        $routes->get('data-bahan/detail', 'BahanController::edit');

        // Kelola Katalog
        $routes->get('kelola-katalog-produk', 'KatalogController::index');
        $routes->post('kelola-katalog-produk/store', 'KatalogController::store');
        $routes->get('kelola-katalog-produk/edit', 'KatalogController::edit');
        $routes->post('kelola-katalog-produk/update', 'KatalogController::update');
        $routes->get('kelola-katalog-produk/delete/(:num)', 'KatalogController::delete/$1');

        //Kelola Pesanan
        $routes->get('pesanan', 'PesananController::index');
        $routes->get('input-katalog', 'PesananController::katalog');
        $routes->post('input-katalog/store', 'PesananController::storeAdminPemesananKatalog');
        $routes->get('input-custom', 'PesananController::custom');
    });
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
