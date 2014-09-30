<?php

function smarty_modifier_tag($string)
{

	$array = explode("||", $string);
	
	//poobieramy id dla kazdego na podtawie tego bedzie latwiej
	
	
	for ($i = 0; $i <= count($array); $i++) {
		
		echo "<a href='tag,0,".trim($array[$i]).".html'>".trim($array[$i])."</a>";
		if ($i!=count($array))
		{
			echo ", ";
		}
	}
}


?>
