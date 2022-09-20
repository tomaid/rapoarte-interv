<?php
/*
clasa verifica daca este folosit link-ul cu https sau cu http
si redirectioneaza catre link-ul https
*/
class https {
   function __construct() {
   	$this->url= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  	if((!$_SERVER['HTTPS']) || (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on'))
		{
		header("Location: {$this->url}");
		exit();
		}
	}
}
?>
