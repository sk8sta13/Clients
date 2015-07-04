<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['login'] = 'home/login';
$route['logout'] = 'home/logout';
$route['about'] = 'home/about';
$route['settings'] = 'home/settings';
$route['language/(en|pt-BR)'] = 'home/language/$1';

$route['user'] = 'user';
$route['user/create'] = 'user/create';
$route['user/save'] = 'user/save';
$route['user/edit/(:num)'] = 'user/edit/$1';
$route['user/active/(:num)'] = 'user/active/$1';
$route['user/delete/(:num)'] = 'user/delete/$1';

$route['clients'] = 'client';
$route['client/create'] = 'client/create';
$route['client/save'] = 'client/save';
$route['client/(:num)'] = 'client/detail/$1';
$route['client/active/(email|phone|address|document|custom)-(:num)-(:num)'] = 'client/active/$1/$2/$3';
$route['client/import'] = 'client/import';

$route['api/(:any)'] = 'webservice/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
