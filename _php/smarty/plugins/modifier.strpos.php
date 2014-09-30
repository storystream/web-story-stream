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
function smarty_modifier_strpos($string,$stream)
{
	$pos = strpos($string, $stream);
	if ($pos === false) {
	    return false;
	} else {
	    return true;
	}

}

/* vim: set expandtab: */

?>
