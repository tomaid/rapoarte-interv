<?php
$js_head="";
require_once "js/headers/head_stingere.php"; // introducem toate clasele js in header-ul html
require_once "header.php";
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}

require_once "class/judete.class.php"; // extrage judetele din baza de date
require_once "class/structurafiltru.class.php"; // extrage structurile din baza de date
require_once "class/localitati.class.php"; // extrage localitatile din baza de date
require_once "class/sanitizefiltrustingere.class.php"; // introduce data
require_once "class/stingere-cautare.class.php"; // clasa de cautare si afisare a interventiilor
require_once "js/loaders/load_stingere.php"; // javascript loaders
$sanitizefiltrustingere = new Sanitizefiltru();
$anitizedfiltru=$sanitizefiltrustingere->setFlitru($connection);
$judet = new judete($connection);
$judete=$judet->get_judete_html($sanitizefiltrustingere->getJudet());
$localitati_start = new Localitati($connection,$sanitizefiltrustingere->getJudet());
$localitati=$localitati_start->get_localitate_html($sanitizefiltrustingere->getLcalitate());
$structuri = new StructuraFiltru($connection);
$structura=$structuri->get_structura_html($sanitizefiltrustingere->getStructura());
$subunitate=$structuri->get_subunitate_html($sanitizefiltrustingere->getStructura(),$sanitizefiltrustingere->getSubunit());
$cautareRapoarteStingere = new CautareRapoarteStingere($connection, $sanitizefiltrustingere->getNRigsu(), $sanitizefiltrustingere->getZi(), $sanitizefiltrustingere->getLuna(), $sanitizefiltrustingere->getAn(), $sanitizefiltrustingere->getNume(), $sanitizefiltrustingere->getJudet(), $sanitizefiltrustingere->getLcalitate(), $sanitizefiltrustingere->getS(), $sanitizefiltrustingere->getPagina(), $sanitizefiltrustingere->getDescarcare());
$cautareRapoarteStingere->cautareFiltrare();
require_once "template/stingere.php";
require_once "template/filterform-stingere.php";
require_once "template/paginatie-stingere.php";
require_once "footer.php";
?>
