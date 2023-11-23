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
$routes->get('/', 'Home::index');
$routes->get('/signin', 'Home::signin');
$routes->get('/signup', 'Home::signup');
$routes->post('/signup_insert', 'Home::signup_insert');
$routes->post('/signin_check', 'Home::signin_check');
$routes->get('/report', 'Home::report');
$routes->get('/sales_performance', 'Home::sales_performance');
$routes->get('/outlet_promotion', 'Home::outlet_promotion');
$routes->get('/outlet_update', 'Home::outlet_update');
$routes->get('/data_input', 'Home::data_input');
$routes->post('/get_sales_by_year', 'Home::get_sales_by_year');
$routes->post('/get_sales', 'Home::get_sales');
$routes->get('/get_sales', 'Home::get_sales');
$routes->post('/get_sales_monthly_total', 'Home::get_sales_monthly_total');
$routes->get('/signout', 'Home::signout');
$routes->post('/get_outlets', 'Home::get_outlets');
$routes->get('/add_sale', 'Home::add_salepage');
$routes->post('/sale_insert', 'Home::sale_insert');
$routes->post('/get_users', 'Home::get_users');
$routes->post('/delete_user', 'Home::delete_user');
$routes->post('/change_user_permission', 'Home::change_user_permission');
$routes->get('/add_outlet_update_item', 'Home::add_outlet_update_item');
$routes->get('/add_outlet_promotion_item', 'Home::add_outlet_promotion_item');

$routes->get('/outlet_update_item_edit', 'Home::outlet_update_item_edit_view');
$routes->get('/outlet_promotion_item_edit', 'Home::outlet_promotion_item_edit_view');

$routes->post('/edit_outlet_update_item', 'Home::edit_outlet_update_item');
$routes->post('/edit_outlet_promotion_item', 'Home::edit_outlet_promotion_item');

$routes->post('/update_item_insert', 'Home::update_item_insert');
$routes->post('/promotion_item_insert', 'Home::promotion_item_insert');

$routes->post('/update_item_delete', 'Home::update_item_delete');
$routes->post('/promotion_item_delete', 'Home::promotion_item_delete');
$routes->get('/account_setting', 'Home::account_setting');
$routes->post('/changePassword', 'Home::changePassword');
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
