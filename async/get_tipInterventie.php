<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/tip_interventie.class.php';
$tip = new sanitize();
$participanti = new sanitize();
$tip_clean = $tip->get_string($connection,$_GET['tip']);
$participanti_clean = $participanti->get_string($connection,$_GET['participanti']);
$tipinterv = new tipInterventie($connection,$tip_clean,$participanti_clean);
echo json_encode($tipinterv->get_tipInterv());
?>
