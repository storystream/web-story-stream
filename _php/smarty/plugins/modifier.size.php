<?php


function smarty_modifier_size($string)
{
	$size = getimagesize("http://handsomemen.pl/portal/upload/testy/min_".$string);

	
	

	$a = explode("height",$size[3]);
	$b = explode("\"=",$a[1]);
	$c = substr($b[0],2,6);
	$d = substr($c,0,-1);
	if ($d < 100)
	{
	echo "<img src='portal/upload/testy/min_".$string."'>";
	}else{
	echo "<img src='portal/upload/testy/min_".$string."' height='100'>";
	}
	return;
}

/* vim: set expandtab: */

?>
