<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->get('/topup', 'TopupController::index');
$routes->post('/upload','Home::uploadImage');
$routes->get('/download','Home::download');
$routes->get('/news','NewsController::index');
$routes->get('/news/(:num)','NewsController::readNews/$1');
$routes->get('/history', 'TopupController::history');
$routes->get('/rcon', 'AdminController::rconTestConnect');
$routes->match(['get', 'post'],'/buyItem', 'ProductController::buyItem');

// apis system
$routes->group('apis', function ($routes) {
    $routes->post('auth', 'AuthController::userLogin');
    $routes->post('checkwallet', 'TopupController::redeemWallet');
    $routes->get('status', 'Home::serverStatus');
    $routes->post('sendRcon', 'Home::sendRcon');
    $routes->post('buyItemPoints', 'ProductController::buyItemPoints');
    $routes->get('searchbyuid', 'ProfileController::searchPlayer');
    $routes->post('searchbyname', 'ProfileController::searchPlayerName');
    $routes->get('logout', 'AuthController::logout');
    $routes->post('redeemCoupon', 'ProductController::redeemCoupon');

});


// admin system
$routes->group('backend', function ($routes) {
    if (session()->get('isAdmin') == '1') {
        $routes->get('manage', 'AdminController::index');
        $routes->post('update_credits', 'AdminController::updateCredits');
        $routes->post('saveWebSettings', 'AdminController::updateWebSettings');
        $routes->post('saveNews', 'NewsController::saveNews');
        $routes->post('deleteNews', 'NewsController::deleteNews');
        $routes->post('removeProduct', 'AdminController::removeProduct');
        $routes->post('addproduct', 'AdminController::addProduct');
        $routes->post('editproduct', 'AdminController::editProduct');
        $routes->post('addCoupon', 'AdminController::addCoupon');
        $routes->post('deleteCoupon', 'AdminController::deleteCoupon');
        $routes->post('upLogo', 'AdminController::saveLogo');
        
        $routes->get('transections/(:num)', 'AdminController::transactions/$1');
    }
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
