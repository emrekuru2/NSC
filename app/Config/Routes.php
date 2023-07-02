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
$routes->group('', ['filter' => 'alertfilter'], static function ($routes) {

    /**************************** GET ROUTING ****************************/
    // Homepage
    $routes->get('/', 'Main\HomeController::index');

    // Clubs Page
    $routes->get('clubs', 'Main\ClubsController::index');

    // Teams Page
    $routes->get('teams', 'Main\TeamsController::index');

    // Committees Page
    $routes->get('committees', 'Main\CommitteesController::index');

    // Development Page
    $routes->get('development', 'Main\DevelopmentController::index');
    $routes->get('development/(:num)', 'Main\DevelopmentController::register/$1');

    // FAQs Page
    $routes->get('faqs', 'Main\FaqsController::index');

    // Contact Page
    $routes->get('contact', 'Main\ContactController::index');

    // About Page
    $routes->get('about', 'Main\AboutController::index');

    // News Page
    $routes->get('news', 'Main\NewsController::index');
    $routes->get('news/(:num)', 'Main\NewsController::getNewsByID/$1');

    // Join Page
    $routes->get('join', 'Main\JoinClubController::index');


    /**************************** POST ROUTING ****************************/
    // Contact Page
    $routes->post('contactAdmins', 'Main\ContactController::contactAdmins');

    // Join Page
    $routes->post('join_club', 'Main\JoinClubController::joinClub');
    $routes->post('delete_request', 'Main\JoinClubController::deleteRequest');
});

// Routing for admin views and functions
$routes->group('admin', ['filter' => 'adminfilter'], static function ($routes) {

    /**************************** GET ROUTING ****************************/
    // Dashboard
    $routes->get('dashboard', 'Admin\DashController::index');

    // Alerts
    $routes->get('alerts', 'Admin\AlertsController::index');
    $routes->get('deleteAlert/(:num)', 'Admin\AlertsController::delete/$1');
    $routes->get('editAlert/(:num)', 'Admin\AlertsController::editMode/$1');

    // Clubs
    $routes->get('clubs', 'Admin\ClubsController::index');

    // Teams
    $routes->get('teams', 'Admin\TeamsController::index');

    // Competitions
    $routes->get('competitions', 'Admin\CompetitionsController::index');
    $routes->get('competitions/edit/(:num)', 'Admin\CompetitionsController::edit/$1');
    $routes->get('competitions/delete/(:num)', 'Admin\CompetitionsController::delete/$1');
    $routes->get('competitions/check/(:num)', 'Admin\CompetitionsController::check/$1');

    // Competition Types
    $routes->get('CompetitionType', 'Admin\CompetitionTypeController::index');
    $routes->get('CompetitionType/edit/(:num)', 'Admin\CompetitionTypeController::edit/$1');
    $routes->get('CompetitionType/check/(:num)', 'Admin\CompetitionTypeController::check/$1');
    $routes->get('CompetitionType/update/(:num)', 'Admin\CompetitionTypeController::update/$1');
    $routes->get('CompetitionType/edit/dashboard', 'Admin\DashController::index');
    $routes->get('CompetitionType/edit/alerts', 'Admin\AlertsController::index');
    $routes->get('CompetitionType/edit/clubs', 'Admin\ClubsController::index');
    $routes->get('CompetitionType/edit/teams', 'Admin\TeamsController::index');
    $routes->get('CompetitionType/edit/competitions', 'Admin\CompetitionsController::index');
    $routes->get('CompetitionType/edit/CompetitionType', 'Admin\CompetitionTypeController::index');
    $routes->get('CompetitionType/delete/(:num)', 'Admin\CompetitionTypeController::delete/$1');

    // Committees
    $routes->get('committees', 'Admin\CommitteesController::index');

    // Development
    $routes->get('development', 'Admin\DevelopmentController::index');

    // Development types
    $routes->get('developmentTypes', 'Admin\DevelopmentTypesController::index');
    $routes->get('deleteDev/(:num)', 'Admin\DevelopmentTypesController::deleteDev/$1');

    $routes->get('editDevType/(:num)', 'Admin\DevelopmentTypesController::editMode/$1');

    $routes->get('developmentTypes/store', 'Admin\DevelopmentTypesController::store');
    $routes->get('developmentTypes/edit/(:num)', 'Admin\DevelopmentTypesController::edit/$1');
    $routes->get('developmentTypes/check/(:num)', 'Admin\DevelopmentTypesController::check/$1');
    $routes->get('developmentTypes/update/(:num)', 'Admin\DevelopmentTypesController::update/$1');
    $routes->get('developmentTypes/edit/dashboard', 'Admin\DashController::index');
    $routes->get('developmentTypes/edit/alerts', 'Admin\AlertsController::index');
    $routes->get('developmentTypes/edit/clubs', 'Admin\ClubsController::index');
    $routes->get('developmentTypes/edit/teams', 'Admin\TeamsController::index');
    $routes->get('developmentTypes/edit/developmentType', 'Admin\DevelopmentController::index');
    $routes->get('developmentTypes/edit/developmentType', 'Admin\DevelopmentTypesController::index');
    $routes->get('developmentTypes/delete/(:num)', 'Admin\DevelopmentTypesController::delete/$1');

    // Users
    $routes->get('users', 'Admin\UsersController::index');
    $routes->get('users/edit/(:num)', 'Admin\UsersController::userDetails/$1');
    $routes->get('users/edit', 'Admin\UsersController::searchUserDetails');

    // News
    $routes->get('news', 'Admin\NewsController::index');

    // Email
    $routes->get('email', 'Admin\EmailController::index');

    // Settings
    $routes->get('settings', 'Admin\SettingsController::index');


    /**************************** POST ROUTING ****************************/
    // Dashboard
    $routes->post('accept_user', 'Admin\DashController::accept_user');

    // Alerts
    $routes->post('setAlert', 'Admin\AlertsController::set');
    $routes->post('disable/(:num)', 'Admin\AlertsController::disable/$1');
    $routes->post('createAlert', 'Admin\AlertsController::create');
    $routes->post('updateAlert/(:num)', 'Admin\AlertsController::update/$1');

    // Clubs
    $routes->post('updateClub', 'Admin\ClubsController::updateClub');
    $routes->post('createClub', 'Admin\ClubsController::createClub');
    $routes->post('deleteClub', 'Admin\ClubsController::deleteClub');
    $routes->post('addClubMembers', 'Admin\ClubsController::addMembers');
    $routes->post('removeClubMember', 'Admin\ClubsController::removeMember');
    $routes->post('addTeamsToClub', 'Admin\ClubsController::addTeams');
    $routes->post('removeTeamFromClub', 'Admin\ClubsController::removeTeam');

    // Teams
    $routes->post('updateTeam', 'Admin\TeamsController::updateTeam');
    $routes->post('createTeam', 'Admin\TeamsController::createTeam');
    $routes->post('deleteTeam', 'Admin\TeamsController::deleteTeam');
    $routes->post('removeTeamMember', 'Admin\TeamsController::removeMember');
    $routes->post('addTeamMembers', 'Admin\TeamsController::addMembers');

    // Competitions
    $routes->post('competitions', 'Admin\CompetitionsController::store');

    // Competitions Type
    $routes->post('CompetitionType', 'Admin\CompetitionTypeController::store');

    // Committees
    $routes->post('createCommittee', 'Admin\CommitteesController::createCommittee');
    $routes->post('modify_committee', 'Admin\CommitteesController::modify');
    $routes->post('modifyCommittee', 'Admin\CommitteesController::modifyCommittee');
    $routes->post('deleteCommittee', 'Admin\CommitteesController::deleteCommittee');

    // Development
    $routes->post('createDev', 'Admin\DevelopmentController::createDev');
    $routes->post('createProgType', 'Admin\DevelopmentController::createProgType');
    $routes->post('modifyProgram', 'Admin\DevelopmentController::modifyProgram');
    $routes->post('deleteProgram', 'Admin\DevelopmentController::deleteProgram');
    $routes->post('modify_development', 'Admin\DevelopmentController::modify');

    // Development Type
    $routes->post('developmentTypes', 'Admim\DevelopmentTypesController::store');
    $routes->post('developmentTypes/store', 'Admin\DevelopmentTypesController::store');
    $routes->post('developmentTypes/(:num)/edit', 'Admin\DevelopmentTypesController::edit/$1');
    $routes->post('updateDev/(:num)', 'Admin\DevelopmentTypesController::update/$1');

    // Users
    $routes->post('editUser/(:num)', 'Admin\UsersController::editUser/$1');

    // News
    $routes->post('createNews', 'Admin\NewsController::createNews');

    // Email
    $routes->post('sendEmail', 'Admin\EmailController::sendEmail');

    // Settings


    /**************************** PUT ROUTING ****************************/
    // Competitions 
    $routes->put('competitions/update/(:num)', 'Admin\CompetitionsController::update/$1');

    // Competition Types
    $routes->put('CompetitionType/update/(:num)', 'Admin\CompetitionTypeController::update/$1');

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
