<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Additional in-file definitions

$routes->group('admin', [], function($routes) {
	
	$routes->group('t00-jenis', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T00Jenis::index', ['as' => 'jenisList']);
		$routes->get('index', 'T00Jenis::index', ['as' => 'jenisIndex']);
		$routes->get('list', 'T00Jenis::index', ['as' => 'jenisList2']);
		$routes->get('add', 'T00Jenis::add', ['as' => 'newJenis']);
		$routes->post('add', 'T00Jenis::add', ['as' => 'createJenis']);
		$routes->get('edit/(:num)', 'T00Jenis::edit/$1', ['as' => 'editJenis']);
		$routes->post('edit/(:num)', 'T00Jenis::edit/$1', ['as' => 'updateJenis']);
		$routes->get('delete/(:num)', 'T00Jenis::delete/$1', ['as' => 'deleteJenis']);
		$routes->post('allmenuitems', 'T00Jenis::allItemsSelect', ['as' => 'select2ItemsOfJenis']);
		$routes->post('menuitems', 'T00Jenis::menuItems', ['as' => 'menuItemsOfJenis']);
	});
	
	$routes->group('t01-projects', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T01Projects::index', ['as' => 'projectList']);
		$routes->get('index', 'T01Projects::index', ['as' => 'projectIndex']);
		$routes->get('list', 'T01Projects::index', ['as' => 'projectList2']);
		$routes->get('add', 'T01Projects::add', ['as' => 'newProject']);
		$routes->post('add', 'T01Projects::add', ['as' => 'createProject']);
		$routes->get('edit/(:num)', 'T01Projects::edit/$1', ['as' => 'editProject']);
		$routes->post('edit/(:num)', 'T01Projects::edit/$1', ['as' => 'updateProject']);
		$routes->get('delete/(:num)', 'T01Projects::delete/$1', ['as' => 'deleteProject']);
		$routes->post('allmenuitems', 'T01Projects::allItemsSelect', ['as' => 'select2ItemsOfProject']);
		$routes->post('menuitems', 'T01Projects::menuItems', ['as' => 'menuItemsOfProject']);
	});
	
	$routes->group('t02-users', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T02Users::index', ['as' => 'userList']);
		$routes->get('index', 'T02Users::index', ['as' => 'userIndex']);
		$routes->get('list', 'T02Users::index', ['as' => 'userList2']);
		$routes->get('add', 'T02Users::add', ['as' => 'newUser']);
		$routes->post('add', 'T02Users::add', ['as' => 'createUser']);
		$routes->get('edit/(:num)', 'T02Users::edit/$1', ['as' => 'editUser']);
		$routes->post('edit/(:num)', 'T02Users::edit/$1', ['as' => 'updateUser']);
		$routes->get('delete/(:num)', 'T02Users::delete/$1', ['as' => 'deleteUser']);
		$routes->post('allmenuitems', 'T02Users::allItemsSelect', ['as' => 'select2ItemsOfUser']);
		$routes->post('menuitems', 'T02Users::menuItems', ['as' => 'menuItemsOfUser']);
	});
	
	$routes->group('t03-status', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T03StatusController::index', ['as' => 'statusList']);
		$routes->get('index', 'T03StatusController::index', ['as' => 'statusIndex']);
		$routes->get('list', 'T03StatusController::index', ['as' => 'statusList2']);
		$routes->get('add', 'T03StatusController::add', ['as' => 'newStatus']);
		$routes->post('add', 'T03StatusController::add', ['as' => 'createStatus']);
		$routes->get('edit/(:num)', 'T03StatusController::edit/$1', ['as' => 'editStatus']);
		$routes->post('edit/(:num)', 'T03StatusController::edit/$1', ['as' => 'updateStatus']);
		$routes->get('delete/(:num)', 'T03StatusController::delete/$1', ['as' => 'deleteStatus']);
		$routes->post('allmenuitems', 'T03StatusController::allItemsSelect', ['as' => 'select2ItemsOfStatus']);
		$routes->post('menuitems', 'T03StatusController::menuItems', ['as' => 'menuItemsOfStatus']);
	});
	
	$routes->group('t30-activities', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T30Activities::index', ['as' => 'activityList']);
		$routes->get('index', 'T30Activities::index', ['as' => 'activityIndex']);
		$routes->get('list', 'T30Activities::index', ['as' => 'activityList2']);
		$routes->get('add', 'T30Activities::add', ['as' => 'newActivity']);
		$routes->post('add', 'T30Activities::add', ['as' => 'createActivity']);
		$routes->get('edit/(:num)', 'T30Activities::edit/$1', ['as' => 'editActivity']);
		$routes->post('edit/(:num)', 'T30Activities::edit/$1', ['as' => 'updateActivity']);
		$routes->get('delete/(:num)', 'T30Activities::delete/$1', ['as' => 'deleteActivity']);
		$routes->post('allmenuitems', 'T30Activities::allItemsSelect', ['as' => 'select2ItemsOfActivity']);
		$routes->post('menuitems', 'T30Activities::menuItems', ['as' => 'menuItemsOfActivity']);
	});
	
	$routes->group('t31-activityds', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T31Activityds::index', ['as' => 'detailActivityList']);
		$routes->get('index', 'T31Activityds::index', ['as' => 'detailActivityIndex']);
		$routes->get('list', 'T31Activityds::index', ['as' => 'detailActivityList2']);
		$routes->get('add', 'T31Activityds::add', ['as' => 'newDetailActivity']);
		$routes->post('add', 'T31Activityds::add', ['as' => 'createDetailActivity']);
		$routes->get('edit/(:num)', 'T31Activityds::edit/$1', ['as' => 'editDetailActivity']);
		$routes->post('edit/(:num)', 'T31Activityds::edit/$1', ['as' => 'updateDetailActivity']);
		$routes->get('delete/(:num)', 'T31Activityds::delete/$1', ['as' => 'deleteDetailActivity']);
		$routes->post('allmenuitems', 'T31Activityds::allItemsSelect', ['as' => 'select2ItemsOfDetailActivity']);
		$routes->post('menuitems', 'T31Activityds::menuItems', ['as' => 'menuItemsOfDetailActivity']);
	});

});

$routes->match(['get', 'post'], 'user-profile', 'UserProfileController::index', ['as' => 'user-profile']);

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}