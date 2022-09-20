<?php
session_set_cookie_params(60 * 60 * 24, '/covidnew/');
// ini_set('session.cookie_path', '/covidnew/');
session_start();
error_reporting(0);
ini_set('display_errors', 0);
define('DB_CHARSET', 'utf8');
setlocale(LC_TIME, 'ro_RO');
header("Content-type: text/html; charset=utf-8");
echo <<<_INIT
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='styles.css' type='text/css'>
<script src='javascript.js'></script>

_INIT;

require_once 'functions.php';
$timp = new DateTime();
$datacurenta = $timp->format( 'Y-m-d' );
$userstr = 'Autentificare';
$numeluna = array ("01" => "Ianuarie",
"02" => "Februarie",
"03" => "Martie",
"04" => "Aprilie",
"05" => "Mai",
"06" => "Iunie",
"07" => "Iulie",
"08" => "August",
"09" => "Septembrie",
"10" => "Octombrie",
"11" => "Noiembrie",
"12" => "Decembrie");
if(isset($_SESSION['user']))
{
  if(($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) || ($_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']))
  {
    destroySession();
    header("Location: login.php");
  };
  $user     = $_SESSION['user'];
  $loggedin = TRUE;
  $userstr  = "Ești autentificat ca : $user";
  $detas_nume = $_SESSION['denumiresubunitate'];

}
else $loggedin = FALSE;

echo <<<_MAIN
<title>ISU Dobrogea: $detas_nume</title>
</head>
<body>
_MAIN;
?>
