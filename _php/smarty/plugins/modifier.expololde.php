<?

function smarty_modifier_expololde($string)
{
	$explode = explode(",",$string);
	$c = count($explode);
	
	
	for ($i = 0; $i <= $c-1; $i++) {
echo "<li><span>".$explode[$i]."</span></li>";
}

    return ;
}
