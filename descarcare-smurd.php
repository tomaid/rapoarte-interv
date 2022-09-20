<?php
$ASYNC=TRUE;
require_once 'header.php';
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}
require_once "class/structurafiltru.class.php"; // extrage structurile din baza de date
require_once "class/sanitizefiltrusmurd.class.php"; // introduce data
require_once "class/smurd-cautare.class.php"; // clasa de cautare si afisare a interventiilor
$sanitizefiltrusmurd = new Sanitizefiltru();
$anitizedfiltru=$sanitizefiltrusmurd->setFlitru($connection);
$structuri = new StructuraFiltru($connection);
$cautareRapoarteSmurd = new CautareRapoarteSmurd($connection, $sanitizefiltrusmurd->getNRigsu(), $sanitizefiltrusmurd->getZi(), $sanitizefiltrusmurd->getLuna(), $sanitizefiltrusmurd->getAn(), $sanitizefiltrusmurd->getNume(), $sanitizefiltrusmurd->getPrenume(), $sanitizefiltrusmurd->getJudet(), $sanitizefiltrusmurd->getLcalitate(), $sanitizefiltrusmurd->getS(), $sanitizefiltrusmurd->getPagina(), $sanitizefiltrusmurd->getDescarcare());
$cautareRapoarteSmurd->cautareFiltrare();
?>

