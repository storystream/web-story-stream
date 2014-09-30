<?php

function smarty_modifier_timenice($time)
{
	$now = time();
	
	if ($time > $now) {
		echo 'Podana data nie może być większa od obecnej.'; // tutaj była 'zła data'
		return;
	}
		
	$diff = $now - $time;

	$minut = floor($diff/60);
	$godzin = floor($minut/60);
	$dni = floor($godzin/24);	
	
	if ($minut <= 60) {		
		switch($minut)
		{
			case 0: return "Przed chwilą";
			case 1: return "Minutę temu";
			case ($minut >= 2 && $minut <= 4):
			case ($minut >= 22 && $minut <= 24):
			case ($minut >= 32 && $minut <= 34):
			case ($minut >= 42 && $minut <= 44):
			case ($minut >= 52 && $minut <= 54): return "$minut minuty temu"; 
			default: return "$minut minut temu";
		}			
	}
	
	if ($godzin > 6 && $godzin < 24) {
		return "Dzisiaj ".date("H:i:s", $time);
	}
	elseif ($godzin > 0 && $godzin < 24) {
		$restMinutes = ($minut-(60*$godzin));
		switch($restMinutes)
		{		
			case 0: $res = null; break;
			case 1: $res = "Minutę temu"; break;
			case ($restMinutes >= 2 && $restMinutes <= 4):
			case ($restMinutes >= 22 && $restMinutes <= 24):
			case ($restMinutes >= 32 && $restMinutes <= 34):
			case ($restMinutes >= 42 && $restMinutes <= 44):
			case ($restMinutes >= 52 && $restMinutes <= 54): $res = "$restMinutes minuty temu"; break; 
			default: $res = "$restMinutes minut temu"; break;		
		}
		if ($godzin == 1) {
			return "Godzinę temu, ".$res;
		} else {
			return "$godzin godzin temu ".$res;
		}			
	}
	
	if ($godzin >= 24 && $godzin <= 48) {
		return "Wczoraj ".date("H:i:s", $time);
	}
	
	switch($dni)
	{
		case ($dni < 7): return "$dni dni temu, ".date("Y.m.d H:i", $time); break;
		case 7: return "Tydzień temu, ".date("Y.m.d H:i", $time); break;
		case ($dni > 7 && $dni < 14): return "Ponad tydzień temu, ".date("Y.m.d H:i", $time); break;
		case 14: return "Dwa tygodznie temu, ".date("Y.m.d H:i", $time); break;
		case ($dni > 14 && $dni < 30): return "Ponad 2 tygodnie temu, ".date("Y.m.d H:i", $time); break;
		case 30: case 31: return "Miesiąc temu"; break;	
		case ($dni > 31): return date("Y.m.d H:i", $time); break;	
	}
	return date("Y.m.d H:i", $time); 	     
}

?>
