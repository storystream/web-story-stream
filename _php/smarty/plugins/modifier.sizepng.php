<?php
/**
 * Smarty shared plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Function: smarty_make_timestamp<br>
 * Purpose:  used by other smarty functions to make a timestamp
 *           from a string.
 * @param string
 * @return string
 */
function smarty_modifier_sizepng($string,$m='')
{

$imagepath	= '_down/'.$string;

list($width, $height, $type, $attr)=getimagesize($imagepath);
$ht=$height;
$wd=$width; 
echo $wd.'x'.$ht;
return;
}

/* vim: set expandtab: */

?>
