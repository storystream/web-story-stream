<?php

	function HexID ($hexdata)
	{
	/*	$rawid = strtoupper(md5($hexdata));
		$workid = $rawid;

		$byte = hexdec( substr($workid,12,2) );
		$byte = $byte & hexdec("0f");
		$byte = $byte | hexdec("40");
		$workid = substr_replace($workid, strtoupper(dechex($byte)), 12, 2);

		$byte = hexdec( substr($workid,16,2) );
		$byte = $byte & hexdec("3f");
		$byte = $byte | hexdec("80");
		$workid = substr_replace($workid, strtoupper(dechex($byte)), 16, 2);

		$rid = substr($rawid, 0, 15).""
	    .User::getIdUserLoginActual();
		return $rid;
*/  

	   	$trans = array(
		"Ą" => "A", "ą" => "a","Ó" => "O", 
		"ó" => "o","Ę" => "E", "ę" => "e","Ś" => "S", "ś" => "s","Ł" => "L", "ł" => "l","Ń" => "N", "ń" => "n",
		"Ż" => "Z","ż" => "z","Ź" => "Z", "ź" => "z"," " => "_", "Ć" => "C","ć" => "c","-" => "_",);
		$string = strtr($hexdata, $trans);
		$string = preg_replace("/([^a-zA-Z0-9_]+)/", "-", html_entity_decode($string));
		return strtolower(trim(str_replace("-", "_", $string)));
		//return substr(crc32(strtolower(trim(str_replace("-", "_", $string)))),1,15);
  
	}
   
   function StringFormat ($_str)
   {
   		$trans = array(
		"Ą" => "A", "ą" => "a","Ó" => "O", 
		"ó" => "o","Ę" => "E", "ę" => "e","Ś" => "S", "ś" => "s","Ł" => "L", "ł" => "l","Ń" => "N", "ń" => "n",
		"Ż" => "Z","ż" => "z","Ź" => "Z", "ź" => "z"," " => "_", "Ć" => "C","ć" => "c","-" => "_",);
		$string = strtr($_str, $trans);
		$string = preg_replace("/([^a-zA-Z0-9_]+)/", "-", html_entity_decode($string));
		return strtolower(trim(str_replace("-", "_", $string)));
		//return substr(crc32(strtolower(trim(str_replace("-", "_", $string)))),1,15);
   }

	function search_table($table, $search){   
		foreach($table['data'] AS $key => $value)   
		{     
			 if($value['Id'] == $search)      
			 {         
			 	return $key;      
			 }   
		}   
		return -1;
	}
	
	function fitstLiteralString($_str)
	{
		$explode = explode(" ",$_str);
			for ($i = 0; $i <= 5; $i++) {
				$string .= $explode[$i]{0};
			}
			return strtoupper($string).substr(time(),6,10);
	}
	
	

?>
