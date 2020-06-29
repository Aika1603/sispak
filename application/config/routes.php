<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/beranda';
$route['logout'] = 'login/logout';
$route['kasus/(:any)'] = 'kasus/detail/$1';
$route['find/solusi/(:any)'] = 'find/solusi/$1';

$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
