<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//var_dump($_POST);

if(isset($_POST['insert-post'])){
    insertPost($app);
} else {
   $main = new Template('templates/admin-frame-public.html');
$content = new Template('templates/admin-posts-management.html');

$resultSet = $app['database']->selectAll('anchor_point');
//var_dump($resultSet);

foreach ($resultSet as $key => $value) {
    foreach ($value as $chiave => $valore) {
        $content->setContent($chiave, $valore);
    }
}

$main->setContent('body', $content->get());
$main->close(); 
}

function insertPost($app) {
    $postTitolo = ($_POST['titolo']);
    $postSottotitolo = ($_POST['sottotitolo']);
    $postContenuto = ($_POST['contenuto']);
    $anchorPointId = ($_POST['anchorID']);
    if ($app['database']->insertPost('posts', $postTitolo, $postSottotitolo , $postContenuto,$anchorPointId)){
        echo "<script>alert('Testo inserito');
        location.href='http://localhost/TDW/admin-posts-management';
        </script>";
    }
}

