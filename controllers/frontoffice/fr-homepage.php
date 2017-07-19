<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$main = new Template('templates/newtemplate/index.html');
$resultSet = $app['database']->getAnchorText();
//var_dump($resultSet);
$tempKey=array();
$tempValue = array();
$currentKey;
$tempTitle;
$tempTitleValue;
foreach ($resultSet as $key => $value) {    
    foreach ($value as $chiave => $valore) {
        if($chiave == 'name') {
             $tempKey[] = $valore;
             $currentKey = $valore;
        }
        if($chiave == 'contenuto') {
            $tempValue[] = $valore;
        }
        if($chiave == 'titolo') {
            $tempTitle[]   = $currentKey."Titolo";
            $tempTitleValue[] = $valore;
        }
        if($chiave == 'sottotitolo') {
            $tempTitle[]   = $currentKey."Sottotitolo";
            $tempTitleValue[] = $valore;
        }
    }
}
$tempFinal = array_combine($tempTitle, $tempTitleValue);
$finale = array_combine($tempKey, $tempValue);
$final = array_merge($finale, $tempFinal);
//var_dump($final);
foreach ($final as $key => $value) {
    $main->setContent($key, $value);
}


//get tipologia camere 



 $rs =  $app['database']->selectAttributiCamereDistinct();
  foreach ($rs as $key => $value) {
      foreach ($value as $chiave => $valore) {
          $main->setContent($chiave."_attributi", $valore);
      }
  }
//  print_r($rs);

$main->setContent('body', $main->get());
$main->close();

