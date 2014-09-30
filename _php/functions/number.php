<?php
define('EPSILON', 1.0e-8);

function FormatMoney($number)
{
	$reszta=fmodAddOn($number, 0.1);

	//spr.czy $number ma tylko 1 miejsce po przecinku
	if($reszta<EPSILON)
		return number_format($number, 2, '.', '');
	else
		return floatval($number);
}

function fmodAddOn($x,$y)
{
	$z=($x/$y)+EPSILON;
	$i = floor($z);
    // r = x - i * y
    return $x - $i*$y;
}
?>