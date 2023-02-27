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

// Routing for general views
$routes->get('/', 'Main\HomeController::index');
$routes->get('clubs', 'Main\ClubsController::index');
$routes->get('teams', 'Main\TeamsController::index');
$routes->get('committees', 'Main\CommitteesController::index');
$routes->get('development', 'Main\DevelopmentController::index');
$routes->get('news', 'Main\NewsController::index');
$routes->get('contact', 'Main\ContactController::index');
$routes->get('faqs', 'Main\FaqsController::index');
$routes->get('about', 'Main\AboutController::index');


// Routing for admin views and functions
$routes->group('admin', ['filter' => 'adminfilter'], static function ($routes) {
    // Index pages
    $routes->get('dashboard', 'Admin\DashController::index');
    $routes->get('alerts', 'Admin\AlertsController::index');
    $routes->get('clubs', 'Admin\ClubsController::index');
    $routes->get('teams', 'Admin\TeamsController::index');
    $routes->get('competitions', 'Admin\CompetitionsController::index');
    $routes->get('committees', 'Admin\CommitteesController::index');
    $routes->get('development', 'Admin\DevelopmentController::index');
    $routes->get('users', 'Admin\UsersController::index');
    $routes->get('news', 'Admin\NewsController::index');
    $routes->get('email', 'Admin\EmailController::index');
    $routes->get('settings', 'Admin\SettingsController::index');

    // Functions
    $routes->match(['get', 'post'], 'sendEmail', 'Admin\EmailController::sendEmail');
});

// Codeigniter's default auth routing
service('auth')->routes($routes);


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
