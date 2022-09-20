<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/sate.class.php';
$localitate = new sanitize();
$localitate_clean = $localitate->get_string($connection,$_GET['localitate']);
$sate = new Sate($connection,$localitate_clean);
echo json_encode($sate->get_sate());
?>
