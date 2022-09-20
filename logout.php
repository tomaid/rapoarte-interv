<?php
require_once 'class/logout.class.php';
$logut = new logout();
$logut->destroySession();
?>