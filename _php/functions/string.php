<?php
/*
Returns true if haystack contains needle.
Case sensitive.
*/
function StrContains($haystack, $needle)
{
	return(strpos($haystack,$needle)!==false);
}

/*
Makes first letter from the string uppercase. Can handle Polish UTF-8 chars.
Does not require mb_string.
*/
function StrUCFirst($string)
{
	$from=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','ą','ć','ę','ł','ń','ó','ś','ź','ż');
	$to  =array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','Ą','Ć','Ę','Ł','Ń','Ó','Ś','Ź','Ż');
	
	//bierzemy pierwszy znak ze stringa i sprawdzamy czy jest dwubajtowy
	if(ord($string[0])>127)
	{
		$znak=substr($string,0,2);
	}
	else
	{
		$znak=$string[0];
	}

	$znak_out=str_replace($from,$to,$znak);
	return substr_replace($string, $znak_out, 0, strlen($znak));
}

function SkrocTekst($tekst, $ile=230)
{
	//Tworzy wersje skrocona danego tekstu.
	//Jako drugi parametr ($ile) należy podać ile maksymalnie znaków może
	//mieć skrócona wersja tekstu (nie licząc końcowych trzech kropek).
	
	//Ucina podany tekst przy ostatniej spacji, która mieści się w limicie ($ile).
	//Nigdy nie ucina tekstu w środku wyrazu.

	//Nie wymaga mb_string. Nie działa dla unicode (czyli dla utf-8 też nie).

	//Przykład działania:
	//echo SkrocTekst('Ala ma kota.', 10);
	//Wynik:
	//Ala ma...

	if (strlen($tekst)>$ile)
	{
		return(substr($tekst,0,strrpos(substr($tekst,0,$ile),' ')).'...');
	}
	else
	{
		return($tekst);
	}
}

function SkrocTekstBrutalnie($tekst, $ile=230)
{
	//działa jak SkrocTekst, ale nie zwraca uwagi na wyrazy
	//po prostu jeśli tekst jest dłuższy niż $ile, to obcina i dopisuje '...'
	//jeśli jest dłuższy lub równy, to zwraca $tekst niezmieniony
	
	if (strlen($tekst)>$ile)
	{
		return(substr($tekst,0,$ile).'...');
	}
	else
	{
		return($tekst);
	}
}

function MBPodzielTekst($tekst, $ile=230)
{
	//tworzy wersje skrocona danego tekstu w UTF-8
	//wymaga mb_string
	//wymaga ustawionego internal encoding na utf-8

	//mb_internal_encoding('UTF-8');

	//$tekst=strip_tags($tekst);
	if (mb_strlen($tekst)>$ile)
	{
		//oblicz pozycję ostatniej spacji wewnątrz dopuszczalnego limitu ilości znaków
		$pos_spc=mb_strrpos(mb_substr($tekst,0,$ile),' ');
		$out=array();
		$out[0]=mb_substr($tekst,0,$pos_spc).'...';
		$out[1]=mb_substr($tekst,$pos_spc+1);
		return($out);
	}
	else
	{
		$out=array();
		$out[0]=$tekst;
		$out[1]='';
		return($out);
	}
}

function PolskiLiczebnik($liczba, $forma1, $forma2, $forma5)
{
	//Wybiera i zwraca odpowiednią formę, żeby pasowała do liczby
	//PolskiLiczebnik(liczba, 'pies', 'psy', 'psów')
	//np. 1 pies, 2 psy, 5 psów
	
	$liczba=intval($liczba);

	if($liczba==1)						//1 pies
		return $forma1;
	elseif($liczba % 100>=5 && $liczba % 100<=21)	//5 psów, 111 psów, 312 psów, 13 psów, 121 psów, ale 22 psy
		return $forma5;
	elseif($liczba % 10==2 || $liczba % 10==3 || $liczba % 10==4)		//22 psy, 23 psy, 24 psy, ale 25 psów
		return $forma2;
	else
		return $forma5;
}

function DoRewrite($tekst)
{
	/*
	Funkcja zamienia litery na małe, spacje na myślniki i polskie krzaki na łacińskie odpowiedniki.
	*/

	$from=array('ą','ć','ę','ł','ń','ó','ś','ź','ż','.',' ','â','ê','î','ô','û','ŷ','ä','ë','ï','ö','ü','ÿ','á','é','í','ó','ú','ý','à','è','ì','ò','ù','ỳ','ç');
	$to  =array('a','c','e','l','n','o','s','z','z','-','-','a','e','i','o','u','y','a','e','i','o','u','y','a','e','i','o','u','y','a','e','i','o','u','y','c');

	$tekst=mb_strtolower($tekst, 'utf-8');			//na małe litery
	$tekst=str_replace($from, $to ,$tekst);			//wywal krzaki i zamień spacje i kropki na myślniki
	$tekst=preg_replace('|[^a-z0-9\-]|i', '', $tekst);	//wywal wszystkie inne znaki (np. przestankowe)

	return $tekst;
}

function UsunAkcenty($tekst)
{
	$from=array('ą','ć','ę','ł','ń','ó','ś','ź','ż','â','ê','î','ô','û','ŷ','ä','ë','ï','ö','ü','ÿ','á','é','í','ó','ú','ý','à','è','ì','ò','ù','ỳ','ç',
				'Ą','Ć','Ę','Ł','Ń','Ó','Ś','Ź','Ż','Â','Ê','Î','Ô','Û','Ŷ','Ä','Ë','Ï','Ö','Ü','Ÿ','Á','É','Í','Ó','Ú','Ý','À','È','Ì','Ò','Ù','Ỳ','Ç');
	$to  =array('a','c','e','l','n','o','s','z','z','a','e','i','o','u','y','a','e','i','o','u','y','a','e','i','o','u','y','a','e','i','o','u','y','c',
				'A','C','E','L','N','O','S','Z','Z','A','E','I','O','U','Y','A','E','I','O','U','Y','A','E','I','O','U','Y','A','E','I','O','U','Y','C');

	return str_replace($from, $to ,$tekst);			//wywal krzaki
}

function NeutralizeCaptcha($captcha_code)
{
	//zamienia znaki 
	//i wszystko na duże litery, żeby zapobiec błędom często popełnianym
	//przez ludzi spowodowanych podobieństwem do siebie różnych znaków
	
	return strtoupper(strtr($captcha_code,
		array('0'=>'O', '1'=>'I', '5'=>'S', '6'=>'G')));
}
?>