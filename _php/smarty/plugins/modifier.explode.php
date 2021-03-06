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
function smarty_modifier_explode($string,$int,$separator)
{
	$explode = explode($separator,$string);
    $explode_data .= $explode[$int];
	
    $explode_data .= "<div id=\"pages2\">"; 

    for ($i = 0; $i <= count($explode)-1; $i++) {	
    	$new_i = $i + 1;
    	
    	if (count($explode) != 1)
    	{
	    	if ($_GET['COMU'] == $i)
	    	{
				$explode_data .= "	<span>$new_i</span>";
	    	}else{
	    		$explode_data .= "	<a href=\"http://www.handsomemen.pl/wlosy,".$_GET['FOR'].",".$_GET['ID'].",".$i.".html#top_desc\" >$new_i</a>";
	    	}
    	}
    	
    }
    $explode_data .= "</div>";
    return $explode_data;
}


/* vim: set expandtab: */

?>
                                                   