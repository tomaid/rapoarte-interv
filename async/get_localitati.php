<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/localitati.class.php';
$judete = new sanitize();
$judet_clean = $judete->get_string($connection,$_GET['judet']);
$localitati = new Localitati($connection,$judet_clean);
echo json_encode($localitati->get_localitate());
?>
