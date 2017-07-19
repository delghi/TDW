<?php


$main = new Template('templates/admin-frame-public.html');
$body = new Template('templates/user.html');

$resultSet = $app['database']->selectAll('utenti');

$count = 0;
foreach( $resultSet as $user){
    $count += count($user);
}

if ($count != 0) {
   foreach ($resultSet as $key => $value) {
    foreach ($value as $chiave => $valore) {
        $body->setContent($chiave, $valore);
    }
} 
}



$main->setContent('body', $body->get());
$main->close();

