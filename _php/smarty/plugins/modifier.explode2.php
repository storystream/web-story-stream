<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty replace modifier plugin
 *
 * Type:     modifier<br>
 * Name:     replace<br>
 * Purpose:  simple search/replace
 * @link http://smarty.php.net/manual/en/language.modifier.replace.php
 *          replace (Smarty online manual)
 * @param string
 * @param string
 * @param string
 * @return string
 */


function smarty_modifier_explode2($string,$int,$separator)
{
	$explode = explode($separator,$string);
    $explode_data .= $explode[$int];
    return $explode_data;
}

/* vim: set expandtab: */

?>
 