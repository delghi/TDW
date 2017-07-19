<?php
ini_set('display_errors','On');
error_reporting(E_ALL); 
//
//require_once '../app/init.php';
//$app = new App;
// 
require 'core/init.php';

//$router = new Router();

//require 'routes.php';
//
//$uri = trim($_SERVER['REQUEST_URI'], '/ \TDW_Project');
//
//require $router->direct($uri);

require Router::load('routes.php')
    ->direct(Request::uri(), Request::method());

