<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/gsmurd.class.php';
$cod = new sanitize();
$id = $cod->get_string($connection,$_GET['id']);
$FisaSmurd = new FisaSmurd($connection,$id);
echo json_encode($FisaSmurd->getFisa());
?>
