<?php
require_once "header.php";
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}
header("Location: smurd.php");
require_once "footer.php";
?>
