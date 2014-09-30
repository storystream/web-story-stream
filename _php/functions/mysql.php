<?php
include_once('string.php');
/*
Łączy się z bazą mysql używając standardowych parametrów
*/
$original_mysql_connection;

function MysqlConnect()
{
	global $mysql_server, $mysql_db, $mysql_pass, $mysql_user, $original_mysql_connection;
	
	
	if(!mysql_connect(SERWER,UZYTKOWNIK,HASLO))
	{
		die('Nie można połączyć się z bazą danych. '.mysql_error().'.');
		return false;
	}

	if(!@mysql_select_db(NAZWA_BAZY))
	{
		die('Nie można połączyć się z bazą danych. '.mysql_error().'.');
		return false;
	}
	
	mysql_query('SET NAMES utf8');
	//mysql_query('SET CHARACTER SET utf8');
}
function MysqlClose()
{
mysql_close();
}

function MakeMysqlDate($date)
{
	//zamienia poprawną datę typu yyyy-mm-dd na mysqlową
	//np. robi z 2005-2-2 => 2005-02-02
	
	if(empty($date))
	{
		return '0000-00-00';
	}
	else
	{
		list($y, $m, $d) = explode('-',$date);
		$timestamp=mktime(0,0,0,$m,$d,$y);
		return date('Y-m-d',$timestamp);
	}
}

function MysqlDateToTimestamp($date)
{
	//input: $date - string - date in the MySql format (YYYY-MM-DD)
	
	$a=explode('-', $date);
	if(empty($a) || count($a)!=3)
		return false;
	
	//hour, minute, second, month, day, year
	$timestamp=mktime(0, 0, 0, intval($a[1]), intval($a[2]), intval($a[0]));
	
	return $timestamp;
}

function MysqlGetOne($query_string)
{
	//wykonuje kwerendę i zwraca pierwszy element z pierwszego wiersza wyniku
	//lub false gdy błąd
	
	$query=mysql_query($query_string) or die(mysql_error());
	if(!$query)
		return false;

	return @mysql_result($query, 0);
}

function MysqlGetArray($query_string)
{
	$array=array();
	$query=MysqlQueryException($query_string);
	while($array[]=mysql_fetch_assoc($query));
	array_pop($array);

	return $array;
}

function MysqlGetInfo($linkid = null)
{
	$linkid? $strInfo = mysql_info($linkid) : $strInfo = mysql_info();
	var_dump($strInfo);
	$return = array();
	ereg("Records: ([0-9]*)", $strInfo, $records);
	ereg("Duplicates: ([0-9]*)", $strInfo, $dupes);
	ereg("Warnings: ([0-9]*)", $strInfo, $warnings);
	ereg("Deleted: ([0-9]*)", $strInfo, $deleted);
	ereg("Skipped: ([0-9]*)", $strInfo, $skipped);
	ereg("Rows matched: ([0-9]*)", $strInfo, $rows_matched);
	ereg("Changed: ([0-9]*)", $strInfo, $changed);
	
	$return['records'] = $records[1];
	$return['duplicates'] = $dupes[1];
	$return['warnings'] = $warnings[1];
	$return['deleted'] = $deleted[1];
	$return['skipped'] = $skipped[1];
	$return['rows_matched'] = $rows_matched[1];
	$return['changed'] = $changed[1];
	
	return $return;
}

function MysqlQueryException($sql)
{
	$query=mysql_query($sql);
	if(!$query)
	{
		//logujemy błąd do pliku
		$f=fopen('mysql.log', 'ab');
		fwrite($f, "----------------------- ".date(DATE_RFC822)."\n");
		fwrite($f, $sql."\n", strlen($sql)+1);
		fwrite($f, mysql_error()."\n");
	//	throw new Exception('Błąd podczas komunikacji z bazą danych.');
	}

	return $query;
}

/* Alternatywne funkcje. Krótsze nazwy i bardziej spójne działanie. */
class SQLException extends Exception
{

    private $query;
    function __construct($msg,$code,$query)
    {
        $this->query = $query;
        //logujemy błąd do pliku
	$f=fopen('mysql.log', 'ab');
	fwrite($f, "----------------------- ".date(DATE_RFC822)."\n");
	fwrite($f, $query."\n", strlen($query)+1);
	fwrite($f, mysql_error()."\n");
        parent::__construct($msg,$code);
    }

    function getQuery()
    {
        return $this->query;
    }

}

function sqlQuery($query)
{
    $result = mysql_query((String)$query);
    if(mysql_error()) {
        throw new SQLException(mysql_error(),mysql_errno(),$query);
    }
    return $result;
}

function sqlField($query)
{
    $sql = mysql_fetch_row(sqlQuery($query.' LIMIT 1'));
    return $sql[0];
}

function sqlRow($query, $keys='array')
{
    $func = 'mysql_fetch_'.$keys;
    return $func(sqlQuery($query.' LIMIT 1'));
}

function sqlResult($query)
{
    $sql = sqlQuery($query);
    $result = array();
    while($data = mysql_fetch_assoc($sql))
        $result[] = $data;
    return $result;
}

function sqlEscape($query)
{
    return mysql_real_escape_string($query);
}

function sqlColumn($query)
{
    $sql = sqlQuery($query);
    $result = array();
    while($data = mysql_fetch_row($sql))
        $result[] = $data[0];
    return $result;
}

?>
