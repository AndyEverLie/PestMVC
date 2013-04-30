<?php
require "vendor/autoload.php";

define ( 'VIEW_BASE_PATH', __DIR__ . '/app/View/' );
define ( 'CSS_BASE_PATH', '/app/View/admin/css' );
define ( 'JS_BASE_PATH', '/app/View/admin/js' );

define ( 'MODEL_BASE_PATH', __DIR__ . '/app/Model' );

$connections = array (
		'development' => 'mysql://root:gkim@localhost/ratech' 
);

// initialize ActiveRecord
\ActiveRecord\Config::initialize ( function ($cfg) use($connections) {
	$cfg->set_model_directory ( MODEL_BASE_PATH );
	$cfg->set_connections ( $connections );
} );

// echo '<pre>';
// var_dump($_SERVER);

// $router = new \PestMVC\Router ();
$mvc = new \PestMVC\App ();

// TODO route sequence.
// $routes = array (
// // '/' => '',
// // '/:Controller/:action' => "Main:test@get",
// // '/test/:title' => "Main:test@get",
// '/users' => "User:index",
// '/users/add' => "User:add",
// '/users/:page' => "User:index", //分页
// '/users/edit/:id' => "User:edit",
// '/users/delete/:id' => "User:delete",
// '/news/cat/:cat_id' => "News:index",
// '/news/cat/:cat_id/pg/:pg_id' => "News:index",
// '/news/cat/:cat_id/add' => "News:add",
// '/news/cat/:cat_id/edit/:id' => "News:edit",
// '/news/cat/:cat_id/delete/:id' => "News:delete",
// );

$mvc->get ( '/users', \PestMVC\Helper::route_param ( 'user', 'index' ) );
$mvc->get ( '/users/pg/:pg_id', \PestMVC\Helper::route_param ( 'user', 'index' ) );
$mvc->get ( '/users/add', \PestMVC\Helper::route_param ( 'user', 'add' ) );
$mvc->post ( '/users/create', \PestMVC\Helper::route_param ( 'user', 'create' ) );
$mvc->get ( '/users/:id/edit', \PestMVC\Helper::route_param ( 'user', 'edit' ) );
$mvc->put ( '/users/:id', \PestMVC\Helper::route_param ( 'user', 'update' ) );
$mvc->delete ( '/users/:id', \PestMVC\Helper::route_param ( 'user', 'delete' ) );
$mvc->get ( '/users/:id/delete', \PestMVC\Helper::route_param ( 'user', 'delete' ) );

$mvc->get ( '/news/cat/:cat_id', \PestMVC\Helper::route_param ( 'news', 'index' ) );
$mvc->get ( '/news/cat/:cat_id/pg/:pg_id', \PestMVC\Helper::route_param ( 'news', 'index' ) );
$mvc->get ( '/news/cat/:cat_id/add', \PestMVC\Helper::route_param ( 'news', 'add' ) );
$mvc->post ( '/news/create', \PestMVC\Helper::route_param ( 'news', 'create' ) );
$mvc->get ( '/news/:id/edit', \PestMVC\Helper::route_param ( 'news', 'edit' ) );
$mvc->put ( '/news/:id', \PestMVC\Helper::route_param ( 'news', 'update' ) );
$mvc->delete ( '/news/:id', \PestMVC\Helper::route_param ( 'news', 'delete' ) );
$mvc->get ( '/news/:id/delete', \PestMVC\Helper::route_param ( 'news', 'delete' ) );
// $mvc->put ('/news/:id');
// $mvc->rest ( 'news' );

$mvc->get ( '/qa', \PestMVC\Helper::route_param ( 'qa', 'index' ) );
$mvc->get ( '/qa/:id/read', \PestMVC\Helper::route_param ( 'qa', 'read' ) );

$mvc->rest ( 'user' );

// echo '<pre>';
// print_r($mvc->router);
$mvc->run ();


