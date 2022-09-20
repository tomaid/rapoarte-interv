<?php
$ASYNC=TRUE;
require_once '../header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: ../login.php");
  exit();
}
require_once '../class/validare_activitateEc.class.php';
$activec = new sanitize();
$activec_clean = $activec->get_string($connection,$_GET['subcat']);
$actc = new ActivitateEconomica($connection,$activec_clean);
echo json_encode($actc->get_actEc());
?>
