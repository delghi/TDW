<?php
session_start();

$main = new Template('templates/admin-frame-public.html');
$content = new Template('templates/user.html');

$resultSet = $app['database']->selectAll('tipo_camera');
//var_dump($resultSet);
foreach ($resultSet as $key => $value) {
    foreach ($value as $chiave => $valore) {
        $content->setContent($chiave, $valore);
    }
}

$main->setContent('body', $content->get());
$main->close();


 
 