<?php



$main = new Template("templates/admin-frame-public.html");
$body = new Template("templates/test.html");
$result = $conn->selectAll('articoli');



//var_dump($result);
foreach ($result as $key => $value) {
    $body->setContent($key, $value);
}

$main->setContent('body', $body->get());
$main->close();
	
//	$oid = mysql_query("SELECT users.username,
//	                           users.name, 
//	                           users.surname,
//	                           zodiac.name AS zodiac
//	                      FROM users
//	                 LEFT JOIN zodiac
//	                        ON zodiac.id = users.id_zodiac
//	                  ORDER BY surname, name");
//
//	if (!$oid) {
//		echo "Attenzione: errone non precisato!";
//		exit;
//	}
//		
//	do{
//		$data = mysql_fetch_assoc($oid);
//		if ($data) {
//		    $content[] = $data;
//		}
//	} while ($data);
//
//	$main->setContent(persona,$content);
//	
//	$main->close();
