<?php
$ASYNC=TRUE;
require_once 'header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}
require_once "class/structurafiltru.class.php"; // extrage structurile din baza de date
require_once "class/sanitizefiltrustingere.class.php"; // introduce data
require_once "class/stingere-cautare.class.php"; // clasa de cautare si afisare a interventiilor
$sanitizefiltrustingere = new Sanitizefiltru();
$anitizedfiltru=$sanitizefiltrustingere->setFlitru($connection);
$structuri = new StructuraFiltru($connection);
$cautareRapoarteStingere = new CautareRapoarteStingere($connection, $sanitizefiltrustingere->getNRigsu(), $sanitizefiltrustingere->getZi(), $sanitizefiltrustingere->getLuna(), $sanitizefiltrustingere->getAn(), $sanitizefiltrustingere->getNume(), $sanitizefiltrustingere->getJudet(), $sanitizefiltrustingere->getLcalitate(), $sanitizefiltrustingere->getS(), $sanitizefiltrustingere->getPagina(), $sanitizefiltrustingere->getDescarcare());
$cautareRapoarteStingere->cautareFiltrare();
?>

