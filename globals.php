<?
//error_reporting(E_ALL);
ini_set('memory_limit', '320M');
ini_set("display_errors","on");
ini_set("session.gc_maxlifetime","3600");
ini_set("session.save_path","ses");
ini_set("session.cookie_lifetime","3600");
session_start();
ob_start ();
header ( 'Content-type: text/html; charset=utf-8' );

define ("SERWER","127.0.0.1");
define ("UZYTKOWNIK","gpsguide");
define ("HASLO","gpsguide25");
define ("NAZWA_BAZY","gpsguide");

//dane logowania
define ("LOGIN","test");
define ("PASS","test");
define ("FR","20"); //filter range

/*******************
SMARTY
*******************/
require_once("_php/smarty/Smarty.class.php");
$smarty = new Smarty;

/*******************
AUTOLOAD
*******************/

include_once '_php/functions/functions.inc.php'; 
include_once '_php/functions/mysql.php'; 
include_once '_php/functions/string.php'; 
include_once '_php/functions/array.php'; 
include_once '_php/functions/charset.php'; 
include_once '_php/functions/date.php'; 
include_once '_php/functions/image.php';
MysqlConnect();

function __autoload($className)
{
	require_once('_php/action/'.$className.'.class.php');
}

$smarty->template_dir = "_tpl/";
$smarty->compile_dir = "_cache/"; 
$smarty->assign ( "self",  htmlspecialchars($_SERVER['PHP_SELF']) );
$smarty->assign ( 'GET', $_GET );
$smarty->assign ( 'SESSION', $_SESSION );
$smarty->assign ( 'COOKIE', $_COOKIE );
$smarty->assign ( 'POST', $_POST );
$smarty->assign ( 'WWW', 'http://localhost/tflorczak/' );
	

function issetLogin()
{
    if (isset($_SESSION['id']))
    {
        //pozwalamy oglądać
    } else {
        header ( "Location: login.php" );
        exit(); 
    }
}
?>
