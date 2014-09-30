<?php
include ('globals.php');

function destroy ()
{
	session_destroy();
	unset($_SESSION);
	unset($_COOKIE);
	return;
}

destroy();
header ( "Location: login.php" );
exit();
		

?>