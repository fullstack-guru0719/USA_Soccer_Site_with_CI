<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Router for the frontend pages
$route['default_controller'] = 'FrontendController';
$route['view-player'] = 'FrontendController/viewPlayer';
$route['about'] = 'FrontendController/about';
$route['sponsor'] = 'FrontendController/sponsor';
$route['roster'] = 'FrontendController/roaster';
$route['player/(:any)'] = 'FrontendController/player/$1';
$route['academy'] = 'FrontendController/academy';
$route['donate'] = 'FrontendController/donate';
$route['shop'] = 'FrontendController/shop';
$route['shop/pay'] = 'FrontendController/pay';
$route['shop/pay_success'] = 'FrontendController/pay_success';
$route['shop/pay_cancel'] = 'FrontendController/pay_cancel';
$route['shop/(:any)'] = 'FrontendController/shop/$1';
$route['shop/attr/(:any)'] = 'FrontendController/shop_attr/$1';
$route['shop/colour/(:any)'] = 'FrontendController/shop_colour/$1';
$route['shop/(:any)/(:any)'] = 'FrontendController/$1/$2';
$route['shopcart'] = 'FrontendController/shopcart';
$route['contact'] = 'FrontendController/contact';

// Router for the backend pages
$route['backend'] = 'BackendController';
$route['login'] = 'BackendController/login_index';
$route['login/(:any)'] = 'BackendController/$1';
$route['register'] = 'BackendController/register_index';
$route['reg_paypal'] = 'BackendController/reg_paypal';
$route['reset'] = 'BackendController/reset';
$route['backend/settings'] = 'SettingsController/index';
$route['backend/settings/deleteLogo/(:any)'] = 'SettingsController/deleteLogo/$1';
$route['backend/sponsors'] = 'SponsorsController';
$route['backend/sponsors/(.+)'] = 'SponsorsController/$1';
$route['backend/latest_videos'] = 'VideosController';
$route['backend/latest_videos/(.+)'] = 'VideosController/$1';
$route['backend/(:any)'] = 'BackendController/$1';
$route['backend/fees/(:any)'] = 'BackendController/fees/$1';
$route['backend/users/(:any)'] = 'BackendController/$1';
$route['backend/users/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/roles/(:any)'] = 'BackendController/$1';
$route['backend/staffs/(:any)'] = 'BackendController/$1';
$route['backend/staffs/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/schedules/(:any)'] = 'BackendController/$1';
$route['backend/schedules/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/slider_manage/(:any)'] = 'BackendController/$1';
$route['backend/slider_manage/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/latest_result/(:any)'] = 'BackendController/$1';
$route['backend/latest_result/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/mails/(:any)'] = 'BackendController/$1';
$route['backend/mails/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/products/(:any)'] = 'BackendController/$1';
$route['backend/products/(:any)/(:any)'] = 'BackendController/$1/$2';
$route['backend/add_player/(:any)'] = 'BackendController/add_player/$1';
$route['backend/(:any)/(:any)'] = 'BackendController/$1/$2';


$route['news'] = 'FrontendController/news';
$route['news/(:any)'] = 'FrontendController/news_detail/$1';
$route['videos'] = 'FrontendController/videos';
$route['schedules'] = 'FrontendController/schedules';
$route['schedules/(:any)'] = 'FrontendController/schedules/$1';
$route['tournaments'] = 'FrontendController/tournaments';
$route['tournaments/(:any)'] = 'FrontendController/tournaments/$1';
$route['trainings'] = 'FrontendController/trainings';
$route['trainings/(:any)'] = 'FrontendController/trainings/$1';
$route['partners'] = 'FrontendController/partners';
$route['schedules'] = 'FrontendController/schedules';

