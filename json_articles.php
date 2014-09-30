<?php
// ładujemy główne biblioteki
include ('globals.php');
//pobieramy histrie
echo json_encode( MysqlGetArray("SELECT * FROM `articles`") );

?>