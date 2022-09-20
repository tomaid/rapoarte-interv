<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/cod_interventie.class.php';
$cod = new sanitize();
$cod_clean = $cod->get_string($connection,$_GET['code']);
$codes_interventie = new codInterventie($connection,$cod_clean);
echo json_encode($codes_interventie->get_codInterv());
?>
