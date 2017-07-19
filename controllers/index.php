<?php

//require 'view/index.view.php';

session_start();
//var_dump($_SESSION);

if(isset($_POST['delete-post'])){
    deletePost($app);
} 
    
    $main = new Template('templates/admin-frame-public.html');
    $body = new Template('templates/admin-home.html');

    $resultSet = $app['database']->selectAll('posts');

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


function deletePost($app){
    $postId = ($_POST['id-post']);

    if ($app['database']->deletePostsById($postId)) {
//        Router::load('routes.php')
//    ->direct(Request::uri(), Request::method());
    }
}

