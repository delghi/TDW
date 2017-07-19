<?php


//$router->define([
//    '' => 'controllers/index.php',
//    'test' => 'controllers/test.php',
//    'admin-tables' => 'controllers/admin-tables.php',
//    'admin-user' => 'controllers/admin-user.php',
//    'testadd' => 'controllers/testadd.php'
//]);

//BACKOFFICE
$router->get('test','controllers/test.php');
$router->get('admin-tables','controllers/admin-tables.php');
$router->post('insertRoom','controllers/admin-tables.php');
$router->get('admin-user','controllers/admin-user.php');
$router->get('insertRoom','controllers/insertRoom.php');
$router->get('admin-posts-management', 'controllers/admin-posts-management.php');
$router->post('admin-posts-management', 'controllers/admin-posts-management.php');
$router->post('index','controllers/index.php');
$router->get('index','controllers/index.php');
$router->get('admin','controllers/login.php');
$router->post('login','controllers/login.php');
$router->post('upload','controllers/upload.php');
///FRONT OFFICE
$router->get('','controllers/frontoffice/fr-homepage.php');
$router->get('prenotazione','controllers/frontoffice/fr-prenotazione.php');
$router->post('prenotazione','controllers/frontoffice/fr-prenotazione.php');
