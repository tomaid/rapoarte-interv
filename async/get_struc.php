<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/structura.class.php';
$structuri = new structura($connection,$acces);
echo json_encode($structuri->get_structura());
?>
