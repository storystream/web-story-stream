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


function smarty_modifier_mina($string)
{
	$explode = explode('v=',$string);
    $explode_data .= $explode[1];
    
    $explode2 = explode('&',$explode[1]);
    
    return $explode2[0];
}

/* vim: set expandtab: */

?>
 