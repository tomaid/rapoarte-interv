<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/gstingere.class.php';
$cod = new sanitize();
$id = $cod->get_string($connection,$_GET['id']);
$FisaStingere = new FisaStingere($connection,$id);
echo json_encode($FisaStingere->getFisa());
?>
