<?php
include ('globals.php');

function login($l,$p)
{
	$a = MysqlGetArray("SELECT * FROM `user` WHERE l = '".addslashes($l)."' AND p = '".addslashes($p)."'");
	return $a;
}


if (isset($_SESSION['id']))
{
	header ( "Location: index.php" );
	exit();
} else {
    //pozwalamy na logowanie
}


if (isset( $_POST['l'] ) && $_POST['l'] != '' && isset( $_POST['p'] ) && $_POST['p'] != '')
{
	$array = login($_POST['l'],$_POST['p']);
	if (isset( $array[0]) && $array[0]['id'] != '')
	{
		$_SESSION['id'] = $array[0]['id'];
		$_SESSION['l'] = addslashes($array[0]['l']);
		header ( "Location: index.php" );
		exit();
	}else{
		$smarty->assign ( "error",  "Incorrect login details.");
	}
}else{
	$smarty->assign ( "error",  "Incorrect login details.");
}

$smarty->display ( "general/top.tpl" );			
$smarty->display ( "boxes/login.tpl" );			

?>