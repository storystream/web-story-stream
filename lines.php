<?php
// ładujemy główne biblioteki
include ('globals.php');
issetLogin();
//pobieramy histrie
$smarty->assign ( "lines",  MysqlGetArray("SELECT * FROM `line` where parent=".$_GET['ART']) );

if (isset ($_GET['FOR'])){
	$smarty->assign ( "FOR",  $_GET['FOR'] );
	$legend = MysqlGetArray("SELECT * FROM `line` WHERE id ='".(int)$_GET['FOR']."' ");
	$smarty->assign ( "NAME",  $legend[0]['name']);
}

if (isset ($_GET['ACT']) && $_GET['ACT'] == 'update'){
	//usuwamy miasto
	$sql = "UPDATE `line` SET name='".addslashes($_POST['name'])."' WHERE `id` = '".(int)$_POST['FOR']."'";
	sqlResult($sql);
	header("Location: lines.php?ART=".$_POST['ART']);
}


$smarty->display ( "general/top.tpl" );
$smarty->display ( "boxes/lines.tpl" );
?>
