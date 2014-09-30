<?php
// ładujemy główne biblioteki
include ('globals.php');
issetLogin();
//pobieramy histrie
$smarty->assign ( "articles",  MysqlGetArray("SELECT * FROM `articles`") );


if (isset ($_GET['FOR'])){
	$smarty->assign ( "FOR",  $_GET['FOR'] );
	$legend = MysqlGetArray("SELECT * FROM `articles` WHERE id ='".(int)$_GET['FOR']."' ");
	$smarty->assign ( "NAME",  $legend[0]['name']);
	$smarty->assign ( "AUTHOR",  $legend[0]['author']);
}

if (isset ($_GET['ACT']) && $_GET['ACT'] == 'update'){
	//usuwamy miasto
	$sql = "UPDATE `articles` SET name='".addslashes($_POST['name'])."',author='".addslashes($_POST['author'])."' WHERE `id` = '".(int)$_POST['FOR']."'";
	sqlResult($sql);
	header("Location: index.php");

}


if (isset ($_GET['ACT']) && $_GET['ACT'] == 'delete'){
	//usuwamy miasto
	$sql = "DELETE FROM `articles` WHERE `id` = '".(int)$_GET['FOR']."' LIMIT 1";
	sqlResult($sql);

	$sql2 = "DELETE FROM `line` WHERE `parent` = '".(int)$_GET['FOR']."'";
	sqlResult($sql2);

	//usuwamy miasto
	$sql3 = "DELETE FROM `legends` WHERE `parent` = '".(int)$_GET['FOR']."'";
	sqlResult($sql3);

	$sql4 = "DELETE FROM `history` WHERE `parent` = '".(int)$_GET['FOR']."'";
	sqlResult($sql4);

	sqlResult($sql);
	header("Location: index.php");
}


if (isset ($_GET['ACT']) && $_GET['ACT'] == 'add'){
	//usuwamy miasto
	$sql = "INSERT INTO articles (name,author)VALUES ('".addslashes($_POST['name'])."','".addslashes($_POST['author'])."');";
	sqlResult($sql);
	$last_insert_id = mysql_insert_id();

	//dodajemy linie
	$sql = "INSERT INTO `line` ( `name`, `color`, `parent`) VALUES ( 'line 1', '#f06011', ".$last_insert_id."),( 'line 2', '#61ab26', ".$last_insert_id."),( 'line 3', '#174eb1', ".$last_insert_id."),( 'line 4', '#eaa522', ".$last_insert_id.");";
	sqlResult($sql);

	header("Location: index.php");
}

$smarty->display ( "general/top.tpl" );
$smarty->display ( "boxes/index.tpl" );
?>
