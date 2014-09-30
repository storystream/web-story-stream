<?php
// ładujemy główne biblioteki
include ('globals.php');
issetLogin();
//pobieramy histrie
$smarty->assign ( "legends",  MysqlGetArray("SELECT * FROM `legends` where parent=".(int)$_GET['FOR'] ) );
$smarty->assign ( "articles",  MysqlGetArray("SELECT * FROM `articles` where id=".(int)$_GET['FOR'] ) );
$smarty->assign ( "line",  MysqlGetArray("SELECT * FROM `line` where parent=".(int)$_GET['FOR'] ) );

$smarty->assign ( "slegends",  count(MysqlGetArray("SELECT * FROM `legends` where parent='".(int)$_GET['FOR']."'" ) ) );


$array = array();
foreach (MysqlGetArray("SELECT * FROM `articles` where id=".(int)$_GET['FOR']."") as $keya => $valuea) {
	foreach (MysqlGetArray("SELECT * FROM `line` where parent='".$_GET['FOR']."'") as $keyl => $valuel) {
		foreach (MysqlGetArray("SELECT * FROM `legends` where parent='".$_GET['FOR']."'") as $keyll => $valuell) {
			$array[$valuea['id']][$valuel['id']][$valuell['id']] = MysqlGetOne("SELECT html FROM `history` WHERE `parent`='".$_GET['FOR']."' and `line` = '".$valuel['id']."' and `legend` = '".$valuell['id']."'");
		}
	}
}

$smarty->assign ( "art",  $array );


if (isset ($_POST['ACT']) && $_POST['ACT'] == 'update'){
	//usuwamy miasto
	$sql = "UPDATE `history` SET html='".addslashes($_POST['html'])."' WHERE
	`parent` = '".(int)$_POST['FOR']."' and
	`line` = '".(int)$_POST['LINE']."' and
	`legend` = '".(int)$_POST['LEGEND']."'";
	sqlResult($sql);
	header("Location: details.php?FOR=".$_POST['FOR']);
}

if (isset ($_GET['LINE']) && $_GET['LINE'] != ''){
	//usuwamy miasto
	$sql = "SELECT html FROM `history` WHERE
	`parent` = '".(int)$_GET['FOR']."' and
	`line` = '".(int)$_GET['LINE']."' and
	`legend` = '".(int)$_GET['LEGEND']."'";
	$html = MysqlGetOne($sql);
	$smarty->assign ( "HTML",  ($html) );

}


$smarty->display ( "general/top.tpl" );
$smarty->display ( "boxes/details.tpl" );
?>
