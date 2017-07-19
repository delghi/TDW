<?php
session_start();
if(isset($_SESSION['email'])) {
    header("Location: http://localhost/TDW/index"); /* Redirect browser */  
        exit();
}
if(isset($_POST['login'])) {
    login($app);
}

$main = new Template('templates/admin-login.html');
//$body = new Template('templates/admin-login.html');
//$main->setContent('body', $body->get());
$main->close();


function login($app) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $criptedPsw = hash("sha512", $password);
    
    $utente = $app['database']->login($username,$criptedPsw);
    if(count($utente) == 0){
        echo 'not logged';
        
    } else {
        $_SESSION['email'] = $username;
        header("Location: http://localhost/TDW/index"); /* Redirect browser */  
        exit();
        
        
    }
    
    
    
    
}