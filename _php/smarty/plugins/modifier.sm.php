<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty cat modifier plugin
 *
 * Type:     modifier<br>
 * Name:     cat<br>
 * Date:     Feb 24, 2003
 * Purpose:  catenate a value to a variable
 * Input:    string to catenate
 * Example:  {$var|cat:"foo"}
 * @link http://smarty.php.net/manual/en/language.modifier.cat.php cat
 *          (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @version 1.0
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_sm($string)
{
	$trans = array(
		"Ä" => "A", "ä" => "a","Ö" => "O", 
		"ö" => "o","Ü" => "U", "ü" => "u","Ś" => "S", "ś" => "s","Ł" => "L", "ł" => "l","Ń" => "N", "ń" => "n",
		"Ż" => "Z","ż" => "z","Ź" => "Z", "ź" => "z"," " => "_", "Ć" => "C","ć" => "c","-" => "_",);
		$string = strtr($string, $trans);
		$string = preg_replace("/([^a-zA-Z0-9_]+)/", "-", html_entity_decode($string));
		return strtolower(trim(str_replace("-", "_", $string)));

}

/* vim: set expandtab: */

?>
