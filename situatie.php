<?php
require_once 'header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}
echo <<<_WORKS
<br><br><br><br><br>
IT WORKS	
_WORKS;
print_r($_SESSION);
require_once 'footer.php';
?>
