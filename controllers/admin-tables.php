<?php
session_start();
$showSuccess = false;
if(isset($_POST['insertRoom'])) {
    $numero = $_POST['numero'];
    $piano = $_POST['piano'];
    $id_tipologia = $_POST['id-tipologia'];
//    $optionals = $_POST['optionals'];
//    $nome = $_POST['nome'];
    if ($app['database']->insertRoom($numero, $piano, $id_tipologia)) {
        echo "<script>alert('Camera inserita');
            location.href='http://localhost/TDW/admin-tables';
            </script>";
//    header("Location: http://localhost/TDW/admin-tables"); /* Redirect browser */  
//    exit();
//   
    }
}

$main = new Template('templates/admin-frame-public.html');
$content = new Template('templates/admin-tableList.html');
//$resultSet = $app['database']->selectAll('camere')
//var_dump($resultSet);
$resultSet = $app['database']->getAllDetailsOfRooms();

foreach ($resultSet as $key => $value) {
    foreach ($value as $chiave => $valore) {
        $content->setContent($chiave, $valore);
    }
}

  $rs =  $app['database']->selectAll('tipo_camera');
  foreach ($rs as $key => $value) {
      foreach ($value as $chiave => $valore) {
          $content->setContent($chiave."tipo", $valore);
      }
  }
  
  //get attributi camere 

 $rs2 =  $app['database']->selectAttributiCamereDistinct();
  foreach ($rs2 as $key => $value) {
      foreach ($value as $chiave => $valore) {
          $content->setContent($chiave."_attributi", $valore);
      }
  }


$main->setContent('body', $content->get());
$main->close();

//function insertNewRoom($app, $numero, $piano, $tipo, $optionals) {
//    
//}