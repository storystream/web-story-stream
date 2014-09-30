<?php
// ładujemy główne biblioteki
include ('globals.php');
//pobieramy histrie
$array = array();
$article = MysqlGetArray("SELECT * FROM `articles` where id=".(int)$_GET['FOR'] );
$array['id'] = $article[0]['id'];
$array['name'] = $article[0]['name'];
$array['author'] = $article[0]['author'];
$array['create'] = $article[0]['create'];
$array['legends'] = MysqlGetArray("SELECT id,name FROM `legends` where parent='".(int)$_GET['FOR']."'");
$array['line'] = MysqlGetArray("SELECT id,name,color FROM `line` where parent='".(int)$_GET['FOR']."'");
$array['article'] = MysqlGetArray("SELECT * FROM `history` WHERE `parent` = '".(int)$_GET['FOR']."'");


echo json_encode($array);

?>
