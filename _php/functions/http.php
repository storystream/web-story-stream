<?php

 // Nakladka
function panel_klienta()
{
	$arr = array('profil', 'panel', 'biling', 'rejestracja', 'odzyskaj_haslo','konta_voip','ksiazka_tel','doladuj_online_false',
	'wyslij_sms_lista', 'phone2phone', 'biling_lista_kont','koszyk', 'platnosci', 'phone-to-phone', 
	'kredyt', 'faktura', 'haslo_aktywacja', 'partner', 'realizuj_kod', 'faq_profil', 'wyslij_sms', 'faktury_vat');
	
	$arrWyk = array('program_partnerski');
	
	foreach ($arrWyk as $key => $value)
	{			
		if (strpos($_ENV["SCRIPT_NAME"], $value) !== false) return false;						
	}
	
	foreach ($arr as $key => $value)
	{			
		if (strpos($_ENV["SCRIPT_NAME"], $value) !== false) return true;						
	}	
	
	return false ;
}

$panel_klienta = panel_klienta();

## WYJĄTKI
// rozrownienie dla zalogowanych i dla nie zalogowanych / doladowujac kody konta



if ( strlen($_SESSION['email_klienta']) > 2 && $panel_klienta == false)
{

	$arr = array("doladuj_konto", "doladuj2", "transakcja_banki",
	"transakcja_potwierdzenie", "transakcja_przelewy24", "doladuj_online_sukces", "transakcja_rezygnacja","numer_telefonu",
	"doladuj_kod", "kod" ,"darmowe_dni" ,"transakcja_ok", "transakcja_proforma", "doladuj_proforma_sukces",
	"zaplac_postpaid" ,"doladuj_wplata_sukces");

	foreach ($arr as $key => $value)
	{
		if (strpos($_SERVER["SCRIPT_NAME"], $value))
			$panel_klienta = true;
	}
 }
 
$_SESSION['panel_klienta'] = $panel_klienta;
unset($panel_klienta);


// / Nakladka

/*
Builds a query string from $_GET and additional_values

$additional_values - array, eg. 
'foo'=>'bar',
'baz'=>'boom',
'cow'=>'milk',
'php'=>'hypertext processor'

The function returns
foo=bar&baz=boom&cow=milk&php=hypertext+processor
*/
function RebuildUrlQuery($additional_values=0)
{
	if(!empty($additional_values) && is_array($additional_values))
		$values=array_merge($_GET,$additional_values);
	else
		$values=$_GET;
	
	$out=array();
	reset($values);
	while (list($key, $value) = each($values))
	{
		$value=strval($value);
		if($value=='')
			continue;

		$out[]=$key.'='.urlencode($value);
	}

	$out2=implode('&',$out);

	return $out2;
}

/*
Wy�wietla tablic� $_POST w postaci listy p�l typu hidden. Pomija pola wymienione
w tablicy $skip_values. Zwraca np. taki tekst:

<input type="hidden" name="action" value="555" />
<input type="hidden" name="costam" value="wartosc_costam" />
*/
function RebuildPostQuery($skip_values=0)
{
	$values=RemoveMagicQuotes($_POST);
	if(!empty($skip_values) && is_array($skip_values))
	{
		//wywalamy wszystkie pola, kt�rych nazwy znajduj� si� w tablicy $skip_values
		foreach($skip_values as $skip_value)
		{
			unset($values[$skip_value]);
		}
	}

	$out='';
	reset($values);
	while (list($key, $value) = each($values))
	{
		$value=htmlspecialchars($value);
		$out.="<input type=\"hidden\" name=\"$key\" value=\"$value\" />\n";
	}

	return $out;
}

/*
* (mixed)remote_filesize($uri,$user='',$pw='')
* returns the size of a remote stream in bytes or
* the string 'unknown'. Also takes user and pw
* incase the site requires authentication to access
* the uri
*/
function remote_filesize($uri,$user='',$pw='')
{
	// start output buffering
	ob_start();
	// initialize curl with given uri
	$ch = curl_init($uri);
	// make sure we get the header
	curl_setopt($ch, CURLOPT_HEADER, 1);
	// make it a http HEAD request
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	// if auth is needed, do it here
	if (!empty($user) && !empty($pw))
	{
		$headers = array('Authorization: Basic ' .  base64_encode($user.':'.$pw));  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}
	$okay = curl_exec($ch);
	curl_close($ch);
	// get the output buffer
	$head = ob_get_contents();
	// clean the output buffer and return to previous
	// buffer settings
	ob_end_clean();

	// gets you the numeric value from the Content-Length
	// field in the http header
	$regex = '/Content-Length:\s([0-9].+?)\s/';
	$count = preg_match($regex, $head, $matches);
	
	// if there was a Content-Length field, its value
	// will now be in $matches[1]
	if (isset($matches[1]))
	{
		$size = $matches[1];
	}
	else
	{
		$size = 'unknown';
	}
	
	return $size;
}

function Redirect($relativeUrl)
{
	//Przekierowanie
	session_write_close();
	ob_end_clean();
	header("Location: http://" . $_SERVER['HTTP_HOST']
             . rtrim(dirname($_SERVER['PHP_SELF']), '/\\')
             . "/" . $relativeUrl);
	exit();
}

function JSRedirect($url)
{
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	echo('<html><head>');
	echo('<meta name="robots" content="noindex,nofollow">');
	echo('<meta http-equiv="cache-control" content="no-cache">');
	echo('<script language="javascript" type="text/javascript">');
	echo('function Redirect() {');
	echo('var url="'.$url.'";');
	echo('if(window.parent) {window.parent.location=url} else {window.location=url}');
	echo('}');
	echo('</script></head><body onload="Redirect();">');
	//echo('Przekierowanie na adres <a href="'.htmlspecialchars($url).'">'.htmlspecialchars($url).'</a>...');
	echo('</body></html>');
	exit;
}

function GetPostQuery($values='')
{
	if($values==='')
		$values=$_POST;

	$out=array();
	reset($values);
	while (list($key, $value) = each($values))
	{
		$value=strval($value);
		if($value=='')
			continue;

		$out[]=$key.'='.urlencode($value);
	}

	$out2=implode('&',$out);

	return $out2;
}


function geteutuus ()
{
	$url='https://www.commerzbank.de/de/hauptnavigation/kurse/kursinfo/devisenk/taegl_devisenk/taegl_devisenk.html';

	//$this->ClearCookieJar();
	$a=curl_init();
	curl_setopt($a, CURLOPT_URL, $url);
	curl_setopt($a, CURLOPT_RETURNTRANSFER,1);
	//curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($a, CURLOPT_AUTOREFERER, true);
	curl_setopt($a, CURLOPT_COOKIEJAR, $a->cookiejar);
	curl_setopt($a, CURLOPT_FOLLOWLOCATION, true);
	$out=curl_exec($a);
	//file_put_contents('register.out', $out);
	$matches = explode('</td>',$out);		
 	return $matches[5];
}
?>
