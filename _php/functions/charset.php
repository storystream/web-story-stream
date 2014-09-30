<?php
/*
Funkcja do konwersji polskich znakow miedzy roznymi systemami kodowania

Przyklad:
include_once('charset.php5');
echo(PlConvert('UTF-8','ISO-8859-2','Źdźbło żygało w ówczesnych ąbłękach'));
*/
function PlConvert($source,$dest,$tekst)
{
	$source=strtoupper($source);
	$dest=strtoupper($dest);
	if($source==$dest) return $tekst;

	$chars['POLSKAWY']    =array('a','c','e','l','n','o','s','z','z','A','C','E','L','N','O','S','Z','Z');
	$chars['ISO-8859-2']  =array("\xB1","\xE6","\xEA","\xB3","\xF1","\xF3","\xB6","\xBC","\xBF","\xA1","\xC6","\xCA","\xA3","\xD1","\xD3","\xA6","\xAC","\xAF");
	$chars['WINDOWS-1250']=array("\xB9","\xE6","\xEA","\xB3","\xF1","\xF3","\x9C","\x9F","\xBF","\xA5","\xC6","\xCA","\xA3","\xD1","\xD3","\x8C","\x8F","\xAF");
	$chars['UTF-8']       =array('ą','ć','ę','ł','ń','ó','ś','ź','ż','Ą','Ć','Ę','Ł','Ń','Ó','Ś','Ź','Ż');
	$chars['ENTITIES']    =array('&#261;','&#263;','&#281;','&#322;','&#324;','&#243;','&#347;','&#378;','&#380;','&#260;','&#262;','&#280;','&#321;','&#323;','&#211;','&#346;','&#377;','&#379;');

	if(!isset($chars[$source])) return false;
	if(!isset($chars[$dest])) return false;
	
	return str_replace($chars[$source],$chars[$dest],$tekst);
}
?>