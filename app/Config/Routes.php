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
$routes->group('', ['filter' => 'alertfilter', 'namespace' => 'App\Controllers\Main'], static function ($routes) {

    $routes->get('/', 'HomeController::index',                                ['as' => 'main_homepage']);
    $routes->get('clubs', 'ClubsController::index',                           ['as' => 'main_clubs']);
    $routes->get('teams', 'TeamsController::index',                           ['as' => 'main_teams']);
    $routes->get('committees', 'CommitteesController::index',                 ['as' => 'main_committees']);
    $routes->get('committees/view/(:num)', 'CommitteesController::view/$1', ['as' => 'main_committees_view']);
    $routes->get('development', 'DevelopmentController::index',               ['as' => 'main_developments']);
    $routes->get('development/(:num)', 'DevelopmentController::register/$1',  ['as' => 'main_developments_register']);
    $routes->get('faqs', 'FaqsController::index',                             ['as' => 'main_faqs']);
    $routes->get('contact', 'ContactController::index',                       ['as' => 'main_contact']);
    $routes->get('about', 'AboutController::index',                           ['as' => 'main_about']);
    $routes->get('news', 'NewsController::index',                             ['as' => 'main_news']);
    $routes->get('news/(:num)', 'NewsController::getNewsByID/$1',             ['as' => 'main_news_details']);
    $routes->get('join', 'JoinClubController::index',                         ['as' => 'main_join_page']);
    $routes->post('contactAdmins', 'ContactController::contactAdmins',        ['as' => 'main_contact_admins']);
    $routes->post('join_club', 'JoinClubController::joinClub',                ['as' => 'main_join_club']);
    $routes->post('delete_request', 'JoinClubController::deleteRequest',      ['as' => 'main_delete_club_request']);
});

// Routing for admin views and functions
$routes->group('admin', ['filter' => 'adminfilter', 'namespace' => 'App\Controllers\Admin'], static function ($routes) {

    $routes->group('dashboard', static function ($routes) {
        $routes->get('/', 'DashController::index',                            ['as' => 'admin_dashboard']);
        $routes->post('acceptUser', 'DashController::acceptUser',             ['as' => 'admin_accept_user']);
    });

    $routes->group('alerts', static function ($routes) {
        $routes->get('/', 'AlertsController::index',                          ['as' => 'admin_alerts']);
        $routes->get('read/(:any)', 'AlertsController::read/$1',              ['as' => 'admin_read_alert']);
        $routes->get('delete/(:num)', 'AlertsController::delete/$1',          ['as' => 'admin_delete_alert']);
        $routes->post('enable', 'AlertsController::enable',                   ['as' => 'admin_enable_alert']);
        $routes->post('disable/(:num)', 'AlertsController::disable/$1',       ['as' => 'admin_disable_alert']);
        $routes->post('create', 'AlertsController::create',                   ['as' => 'admin_create_alert']);
        $routes->post('update/(:num)', 'AlertsController::update/$1',         ['as' => 'admin_update_alert']);
    });

    $routes->group('clubs', static function ($routes) {
        $routes->get('/', 'ClubsController::index',                           ['as' => 'admin_clubs']);
        $routes->get('read/(:any)', 'ClubsController::read/$1',               ['as' => 'admin_read_club']);
        $routes->post('update', 'ClubsController::update',                    ['as' => 'admin_update_club']);
        $routes->post('create', 'ClubsController::create',                    ['as' => 'admin_create_club']);
        $routes->get('delete/(:any)', 'ClubsController::delete/$1',           ['as' => 'admin_delete_club']);
        $routes->post('addMember', 'ClubsController::addMember',              ['as' => 'admin_club_add_members']);
        $routes->get('removeMember/(:any)', 'ClubsController::removeMember/$1', ['as' => 'admin_club_remove_members']);
        $routes->post('addTeam', 'ClubsController::addTeam',                  ['as' => 'admin_club_add_teams']);
        $routes->get('removeTeam/(:any)', 'ClubsController::removeTeam/$1',            ['as' => 'admin_club_remove_teams']);
        $routes->get('addManager/(:any)', 'ClubsController::addManager/$1',   ['as' => 'admin_club_add_manager']);
        $routes->get('removeManager/(:any)', 'ClubsController::removeManager/$1',['as' => 'admin_club_remove_manager']);
    });

    $routes->group('teams', static function ($routes) {
        $routes->get('/', 'TeamsController::index',                           ['as' => 'admin_teams']);
        $routes->get('read/(:any)', 'TeamsController::read/$1',               ['as' => 'admin_read_team']);
        $routes->post('update', 'TeamsController::updateTeam',                ['as' => 'admin_update_team']);
        $routes->post('create', 'TeamsController::createTeam',                ['as' => 'admin_create_team']);
        $routes->post('delete', 'TeamsController::deleteTeam',                ['as' => 'admin_delete_team']);
        $routes->post('removeMember', 'TeamsController::removeMember',        ['as' => 'admin_team_remove_member']);
        $routes->post('addMembers', 'TeamsController::addMembers',            ['as' => 'admin_team_add_member']);
    });

    $routes->group('competitions', static function ($routes) {
        $routes->get('/', 'CompetitionsController::index',                    ['as' => 'admin_competitions']);
        $routes->get('edit/(:num)', 'CompetitionsController::edit/$1',        ['as' => 'admin_edit_competition']);
        $routes->get('delete/(:num)', 'CompetitionsController::delete/$1',    ['as' => 'admin_delete_competition']);
        $routes->get('check/(:num)', 'CompetitionsController::check/$1',      ['as' => 'admin_check_competition']);
        $routes->post('create', 'CompetitionsController::store',              ['as' => 'admin_create_competition']);
        $routes->post('update/(:num)', 'CompetitionsController::update/$1',   ['as' => 'admin_update_competition']);
    });

    $routes->group('competition_types', static function ($routes) {
        $routes->get('/', 'CompetitionTypeController::index',                 ['as' => 'admin_competition_types']);
        $routes->get('edit/(:num)', 'CompetitionTypeController::edit/$1',     ['as' => 'admin_edit_competition_type']);
        $routes->get('check/(:num)', 'CompetitionTypeController::check/$1',   ['as' => 'admin_check_competition_type']);
        $routes->get('update/(:num)', 'CompetitionTypeController::update/$1', ['as' => 'admin_update_competition_type']);
        $routes->get('delete/(:num)', 'CompetitionTypeController::delete/$1', ['as' => 'admin_delete_competition_type']);
        $routes->post('create', 'CompetitionTypeController::store',           ['as' => 'admin_create_competition_type']);
    });

    $routes->group('committees', static function ($routes) {
        $routes->get('/', 'CommitteesController::index',                      ['as' => 'admin_committees']);
        $routes->post('create', 'CommitteesController::createCommittee',      ['as' => 'admin_create_committee']);
        $routes->post('update', 'CommitteesController::modify',               ['as' => 'admin_update_committee']);
        $routes->post('edit', 'CommitteesController::modifyCommittee',        ['as' => 'admin_edit_committee']);
        $routes->post('delete', 'CommitteesController::deleteCommittee',      ['as' => 'admin_delete_committee']);
    });

    $routes->group('developments', static function ($routes) {
        $routes->get('/', 'DevelopmentController::index',                     ['as' => 'admin_developments']);
        $routes->post('create', 'DevelopmentController::createDev',           ['as' => 'admin_create_development']);
        $routes->post('update', 'DevelopmentController::modify',              ['as' => 'admin_update_development']);
        $routes->post('edit', 'DevelopmentController::modifyProgram',         ['as' => 'admin_edit_development']);
        $routes->post('delete', 'DevelopmentController::deleteProgram',       ['as' => 'admin_delete_development']);
    });

    $routes->group('development_types', static function ($routes) {
        $routes->get('/', 'DevelopmentTypesController::index',                ['as' => 'admin_development_types']);
        $routes->post('create', 'DevelopmentTypesController::create',         ['as' => 'admin_create_development_type']);
        $routes->get('edit/(:any)', 'DevelopmentTypesController::edit/$1',    ['as' => 'admin_edit_development_type']);
        $routes->post('update/(:any)', 'DevelopmentTypesController::update/$1', ['as' => 'admin_update_development_type']);
        $routes->get('delete/(:any)', 'DevelopmentTypesController::delete/$1',['as' => 'admin_delete_development_type']);
    });

    $routes->group('users', static function ($routes) {
        $routes->get('/', 'UsersController::index',                           ['as' => 'admin_users']);
        $routes->get('edit/(:any)', 'UsersController::userDetails/$1',        ['as' => 'admin_read_user']);
        $routes->get('search', 'UsersController::searchUserDetails',          ['as' => 'admin_competition_types']);
        $routes->post('editUser/(:num)', 'UsersController::editUser/$1',      ['as' => 'admin_competition_types']);
    });

    $routes->group('news', static function ($routes) {
        $routes->get('/', 'NewsController::index',                            ['as' => 'admin_news']);
        $routes->get('edit/(:any)', 'NewsController::editMode/$1',            ['as' => 'admin_edit_news']);
        $routes->post('update/(:any)', 'NewsController::update/$1',           ['as' => 'admin_update_news']);
        $routes->post('create', 'NewsController::create',                     ['as' => 'admin_create_news']);
    });

    $routes->group('email', static function ($routes) {
        $routes->get('/', 'EmailController::index',                           ['as' => 'admin_emails']);
        $routes->post('send', 'EmailController::sendEmail',                   ['as' => 'admin_send_email']);
    });

    $routes->group('settings', static function ($routes) {
        $routes->get('/', 'SettingsController::index',                        ['as' => 'admin_settings']);
        $routes->get('backup', 'SettingsController::backup',                  ['as' => 'admin_settings_db_backup']);
    });
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
