<?php
/*
Replace html special characters in every value in an array, recursively.
Return modified array. Also works for strings.

'&' (ampersand) becomes '&amp;' 
'"' (double quote) becomes '&quot;'
'<' (less than) becomes '&lt;' 
'>' (greater than) becomes '&gt;' 
*/
function EscapeHtml(&$arr)
{
	if(!is_array($arr))
		return htmlspecialchars($arr);

	$out=array();
	reset($arr);
	while (list($key, $value) = each($arr))
	{
		if(is_array($value))
		{
			$out[$key]=EscapeHtml($value);
		}
		else
		{
			$out[$key]=htmlspecialchars($value);
		}
	}
	return $out;
}

function StripSlashesRecursive(&$arr)
{
	if(!is_array($arr))
		return stripslashes($arr);

	$out=array();
	reset($arr);
	while (list($key, $value) = each($arr))
	{
		if(is_array($value))
		{
			$out[$key]=StripSlashesRecursive($value);
		}
		else
		{
			$out[$key]=stripslashes($value);
		}
	}
	return $out;
}

/*
Recursively escape all strings in an array. Return the escaped array.
Also works for strings.
*/
function EscapeMysql(&$arr)
{
	if(!is_array($arr))
		return mysql_escape_string($arr);

	$out=array();
	reset($arr);
	while (list($key, $value) = each($arr))
	{
		if(is_array($value))
		{
			$out[$key]=EscapeMysql($value);
		}
		else
		{
			$out[$key]=mysql_escape_string($value);
		}
	}
	return $out;
}

function RemoveMagicQuotes(&$arr)
{
	//działa zarówno dla stringów jak i tablic

	if(get_magic_quotes_gpc())
	{
		if(!is_array($arr))
			return(stripslashes($arr));

		$out=array();
		reset($arr);
		while (list($key, $value) = each($arr))
		{
			if(is_array($value))
			{
				$out[$key]=RemoveMagicQuotes($value);
			}
			else
			{
				$out[$key]=stripslashes($value);
			}
		}
		return $out;
	}
	else
	{
		return($arr);
	}
}

function EscapeJS($arr)
{
	if(!is_array($arr))
	{
		return EscapeJSString($arr);
	}

	$out=array();
	reset($arr);
	while (list($key, $value) = each($arr))
	{
		if(is_array($value))
		{
			$out[$key]=EscapeJS($value);
		}
		else
		{
			$out[$key]=EscapeJSString($value);
		}
	}
	return $out;
}

function EscapeJSString($str)
{
	return preg_replace_callback('|[^a-zA-Z0-9 ]|', create_function('$a', 'return "\x".dechex(ord($a[0]));'), $str);
}

/**
* orders a multidimentional array on the base of a label-key
*
* @param $arr, the array to be ordered
* @param $l the "label" identifing the field
* @param $f the ordering function to be used, 
*    strnatcasecmp() by default
* @return  TRUE on success, FALSE on failure.
*/
function array_key_multi_sort(&$arr, $l , $f='strnatcasecmp') {
       return usort($arr, create_function('$a, $b', "return $f(\$a['$l'], \$b['$l']);"));
}
?>