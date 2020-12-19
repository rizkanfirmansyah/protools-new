<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home/(:any)'] = 'home/$1';

// Default Route, can use id before to next segment or URL
$route['id/list'] = 'todo';
$route['id/timeline'] = 'home';
$route['id/project'] = 'home';
$route['id/myproject'] = 'home';
$route['id/user'] = 'home';
$route['id/detail'] = 'home/detail';
$route['id/timeline'] = 'home/timeline';
$route['id/timeline/point'] = 'home/point_timeline';
$route['login'] = 'home/login';
$route['register'] = 'home/login';

// API
$route['api/getdata'] = 'api/get';
$route['api/getproject'] = 'api/project';
$route['api/postdata'] = 'api/postTable';
$route['api/getrule'] = 'api/rule';
$route['api/getrole'] = 'api/role';
$route['api/getparticipant'] = 'api/participant';
$route['api/getuser'] = 'api/user';
$route['sub_api/getuser'] = 'api/getuser';
$route['api/gettimeline'] = 'api/timeline';
$route['api/timeline/point'] = 'api/point';

// process
$route['join/project'] = 'process/join_project';
$route['project/insert'] = 'process/insert_project';
$route['project/delete'] = 'process/delete_project';
$route['participant/insert'] = 'process/insert_participant';
$route['rule/insert'] = 'process/insert_rule';
$route['user/insert'] = 'process/insert_user';
$route['update/status'] = 'process/update_status';
$route['change/password'] = 'process/change_password';
$route['delete/user'] = 'process/delete_user';
$route['login/user'] = 'process/login';
$route['timeline/insert'] = 'process/insert_timeline';
$route['point/insert'] = 'process/insert_point';
$route['timeline/delete'] = 'process/delete_timeline';
$route['point/delete'] = 'process/delete_point';
$route['timeline/check'] = 'process/check_timeline';
$route['point/check'] = 'process/check_point';
$route['sign/up'] = 'process/sign_up';

// Datatables
$route['datatable/table/(:segment)'] = 'datatable/loadtable/$1';

// Access User Scalable
$route['useraccess/project'] = 'access/user_project';
$route['useraccess/position'] = 'access/user_position';
$route['checkuser/role'] = 'access/user_role';
$route['out/project'] = 'access/out_project';
$route['set/access/project'] = 'access/set_project';
$route['set/access/timeline'] = 'access/set_timeline';

// Dumping
$route['to/dump/(:any)'] = 'process/table_dump/$1';
$route['cmd/action'] = 'process/cmd';
