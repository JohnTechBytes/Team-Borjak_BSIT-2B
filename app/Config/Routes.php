<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth', 'Auth::auth');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/logout', 'Auth::logout');
// User Acounts routes
$routes->get('/users', 'Users::index');
$routes->post('users/save', 'Users::save');
$routes->get('users/edit/(:segment)', 'Users::edit/$1');
$routes->post('users/update', 'Users::update');
$routes->delete('users/delete/(:num)', 'Users::delete/$1');
$routes->post('users/fetchRecords', 'Users::fetchRecords');
// Person Routes
$routes->get('person', 'Person::index');
$routes->post('person/save', 'Person::save');
$routes->post('person/delete/(:any)', 'Person::delete/$1');
$routes->get('person/edit/(:any)', 'Person::edit/$1');
$routes->post('person/update', 'Person::update_person');
// Dashboard routing
$routes->get('dashboard/new-orders', 'Dashboard::newOrders');
$routes->get('dashboard/bounce-rate', 'Dashboard::bounceRate');
$routes->get('dashboard/user-registrations', 'Dashboard::userRegistrations');
$routes->get('dashboard/unique-visitors', 'Dashboard::uniqueVisitors');
// This maps the URL with a dash to your controller method
$routes->get('user-registrations', 'Dashboard::userRegistrations');
$routes->get('log', 'Logs::index');
$routes->get('dashboard', 'Dashboard::log');
// Student routes
$routes->get('/student', 'Student::index');
$routes->post('student/save', 'Student::save');
$routes->get('student/edit/(:segment)', 'Student::edit/$1');
$routes->post('student/update', 'Student::update');
$routes->delete('student/delete/(:num)', 'Student::delete/$1');
$routes->post('student/fetchRecords', 'Student::fetchRecords');
//parent routes
$routes->get('/parent', 'ParentTable::index');
$routes->post('parent/save', 'ParentTable::save');
$routes->get('parent/edit/(:segment)', 'ParentTable::edit/$1');
$routes->post('parent/update', 'ParentTable::update');
$routes->delete('parent/delete/(:num)', 'ParentTable::delete/$1');
$routes->post('parent/fetchRecords', 'ParentTable::fetchRecords');
//phone routes
$routes->get('/phone', 'Phone::index');
$routes->post('phone/save', 'Phone::save');
$routes->get('phone/edit/(:segment)', 'Phone::edit/$1');
$routes->post('phone/update', 'Phone::update');
$routes->delete('phone/delete/(:num)', 'Phone::delete/$1');
$routes->post('phone/fetchRecords', 'Phone::fetchRecords');