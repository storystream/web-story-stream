<?php
class scan {
	
	public function ver($_url,$_string)
	{

$curl=curl_init();
	curl_setopt($curl, CURLOPT_URL, $_url);

	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	$strona=curl_exec($curl);
	curl_close($curl);


	if(strpos($strona, $_string) !== false)
	{
echo "nie ma";

	}
	else
	{
echo "jest";

	}
		
		
		
	}
}
?>  