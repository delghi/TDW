<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//in POST 
if(isset($_POST['prenota'])) {
//    var_dump($_POST);
    $camereDisponibili = isCameraAvailable($app);
    $main = new Template('templates/newtemplate/frame-public.html');
    $body = new Template('templates/newtemplate/room-1-column.html');
    $count = 0;
    foreach( $camereDisponibili as $camere){
        $count += count($camere);
    }

    if ($count != 0) {
       foreach ($camereDisponibili as $key => $value) {
        foreach ($value as $chiave => $valore) {
            $body->setContent($chiave, $valore);
        }
    } 
    }
    
    $main->setContent('body', $body->get());
    $main->close();
} elseif (isset ($_POST['calcola_prezzo'])) {
    
    
    $timestamp = strtotime($_POST['checkin']);
    $checkinDay = date("d", $timestamp);
    $checkinMonth = getLetterByMonth(date("m", $timestamp));
    $timestamp = strtotime($_POST['checkout']);
    $checkoutDay = date("d", $timestamp);
    $checkoutMonth = getLetterByMonth(date("m", $timestamp));
    
    
    $totaleSoggiorno = calcolaPrezzo($app);
//    $main = new Template('templates/newtemplate/frame-public.html');
    $body = new Template('templates/newtemplate/riepilogo.html');
    $body->setContent("totale_soggiorno", $totaleSoggiorno);
    $body->setContent("checkin_day",$checkinDay);
    $body->setContent("checkin_month",$checkinMonth);
    $body->setContent("checkout_day",$checkoutDay);
    $body->setContent("checkout_month",$checkoutMonth);
    $body->setContent("checkout",$_POST['checkout']);
    $body->setContent('body', $body->get());
    $body->close();
} else {
       //in GET
    $main = new Template('templates/newtemplate/frame-public.html');
    $body = new Template('templates/newtemplate/booking.html');
    $main->setContent('body', $body->get());
    $main->close();
}


function isCameraAvailable($app) {
   $checkin = $_POST['checkin'];
   $checkout = $_POST['checkout'];
   $tipologia = $_POST['tipo_camera'];
   $result = $app['database']->checkDisponibilita($checkin, $checkout, $tipologia);
   return $result;
}

function calcolaPrezzo($app) {
   $checkin = new DateTime($_POST['checkin']);
   $checkout = new DateTime($_POST['checkout']);
   $tipologia = $_POST['tipo_camera'];
   $totale = 0;
   while($checkin < $checkout){
       $result = $app['database']->getPrezzoForOneDay($checkin, $checkout, $tipologia);
          foreach ($result as $key => $value) {
        foreach ($value as $chiave => $valore) {
            $totale += $valore;
        }
    } 
       $checkin->modify('+1 day'); 
   }
   return $totale;
}

function getLetterByMonth($date) {
    switch ($date) {
        case 01: return "GEN";
        case 02: return "FEB";   
        case 03: return "MAR";
        case 04: return "APR";
        case 05: return "MAG";   
        case 06: return "GIU";
        case 07: return "LUG";
        case 08: return "AGO";
        case 09: return "SET";
        case 10: return "OTT";
        case 11: return "NOV";
        case 12: return "DIC";
            break;
        default:
            break;
    }
}






