<?php 
ob_start();
session_start();
define ('ROOTPATH' , dirname(__DIR__) );
require_once ROOTPATH . '/config/config.php';
require_once ROOTPATH . '/config/mySQL.php';
require_once ROOTPATH . '/config/app.php';
$_SESSION['SITE_URL'] = Config::SITE_URL;

/* if(isset($_SESSION['auth']) && $_SESSION['auth'])
 {

 }*/

$app = new App();
 $app->urlProcess();
?>

