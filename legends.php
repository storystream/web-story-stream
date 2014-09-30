<?php
// ładujemy główne biblioteki
include ('globals.php');
issetLogin();
//pobieramy histrie
$smarty->assign ( "legends",  MysqlGetArray("SELECT * FROM `legends` where parent=".$_GET['ART']) );
$smarty->assign ( "sline",  count(MysqlGetArray("SELECT * FROM `legends` where parent=".(int)$_GET['ART'] ) ) );


if (isset ($_GET['FOR'])){
	$smarty->assign ( "FOR",  $_GET['FOR'] );
	$legend = MysqlGetArray("SELECT * FROM `legends` WHERE id ='".(int)$_GET['FOR']."' ");
	$smarty->assign ( "NAME",  $legend[0]['name']);
}

if (isset ($_GET['ACT']) && $_GET['ACT'] == 'delete'){
	//usuwamy miasto
	$sql = "DELETE FROM `legends` WHERE `id` = '".(int)$_GET['FOR']."' LIMIT 1";
	sqlResult($sql);

	$sql2 = "DELETE FROM `history` WHERE `legend` = '".(int)$_GET['FOR']."'";
	sqlResult($sql2);

	header("Location: legends.php?ART=".$_GET['ART']);
}

if (isset ($_GET['ACT']) && $_GET['ACT'] == 'update'){
	//usuwamy miasto
	$sql = "UPDATE `legends` SET name='".addslashes($_POST['name'])."' WHERE `id` = '".(int)$_POST['FOR']."'";
	sqlResult($sql);
	header("Location: legends.php?ART=".$_POST['ART']);
}

if (isset ($_GET['ACT']) && $_GET['ACT'] == 'add'){
	//usuwamy miasto
	$sql = "INSERT INTO legends (name,parent)VALUES ('".addslashes($_POST['name'])."','".addslashes($_POST['ART'])."');";
	sqlResult($sql);

	//dodajemy legende do istniejacych
	$last_insert_id = mysql_insert_id();

	//line
	$line = MysqlGetArray("SELECT * FROM `line` where parent = '".$_POST['ART']."'");

	//legend
	$articles = MysqlGetArray("SELECT * FROM `articles` where id = '".$_POST['ART']."'");

	foreach ($articles as $key_articles => $value_articles) {
		foreach ($line as $key_line => $value_line) {
			$sql = "INSERT INTO history (`parent`,`line`,`legend`) VALUES ('".$value_articles['id']."','".$value_line['id']."','".$last_insert_id."')";
			sqlResult($sql);
		}
	}

	header("Location: legends.php?ART=".$_POST['ART']);
}



$smarty->display ( "general/top.tpl" );
$smarty->display ( "boxes/legends.tpl" );
?>
