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

// News functional routing
$routes->get('news/(:num)', 'Main\NewsController::getNewsByID/$1');
$routes->get('development/(:num)', 'Main\DevelopmentController::register/$1');


// Routing for admin views and functions
$routes->group('admin', ['filter' => 'adminfilter'], static function ($routes) {
    // GET
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

    // GET with parameters

    // PUT

    // POST
    $routes->match(['post'], 'setAlert', 'Admin\AlertsController::setAlert');
    $routes->match(['post'], 'sendEmail', 'Admin\EmailController::sendEmail');
    $routes->match(['post'], 'createNews', 'Admin\NewsController::createNews');

    $routes->match(['post'], 'createDev', 'Admin\DevelopmentController::createDev');
    $routes->match(['post'], 'createProgType', 'Admin\DevelopmentController::createProgType');
    $routes->match(['post'], 'modifyProgram', 'Admin\DevelopmentController::modifyProgram');
    $routes->match(['post'], 'deleteProgram', 'Admin\DevelopmentController::deleteProgram');
    $routes->match(['post'], 'modify_development', 'Admin\DevelopmentController::modify');

    $routes->match(['post'], 'editTeam', 'Admin\TeamsController::editTeam');
    $routes->match(['post'], 'updateTeam', 'Admin\TeamsController::updateTeam');
    $routes->match(['post'], 'createTeam', 'Admin\TeamsController::createTeam');
    $routes->match(['post'], 'deleteTeam', 'Admin\TeamsController::deleteTeam');
    $routes->match(['post'], 'removeTeamMember', 'Admin\TeamsController::removeMember');
    $routes->match(['post'], 'addTeamMembers', 'Admin\TeamsController::addMembers');

    $routes->match(['post'], 'editClub', 'Admin\ClubsController::editClub');
    $routes->match(['post'], 'updateClub', 'Admin\ClubsController::updateClub');
    $routes->match(['post'], 'createClub', 'Admin\ClubsController::createClub');
    $routes->match(['post'], 'deleteClub', 'Admin\ClubsController::deleteClub');
    $routes->match(['post'], 'removeClubMember', 'Admin\ClubsController::removeMember');
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
