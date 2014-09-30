<?php
function PolskaData($format='l, j F Y',$timestamp='')
{
	if(empty($timestamp))
		$date = date($format);
	else
		$date = date($format,$timestamp);

	$search=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday',
		'January','February','March','April','May','June','July','August','September',
		'October','November','December');

	$replace=array('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela',
		'stycznia','lutego','marca','kwietnia','maja','czerwca','lipca','sierpnia','września',
		'października','listopada','grudnia');

	$date=str_replace($search,$replace,$date);

    return $date;
}
?>