<?php
$js_head="";
require_once "js/headers/head_smurd.php"; // introducem toate clasele js in header-ul html
require_once "header.php";
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}

require_once "class/judete.class.php"; // extrage judetele din baza de date
require_once "class/structurafiltru.class.php"; // extrage structurile din baza de date
require_once "class/localitati.class.php"; // extrage localitatile din baza de date
require_once "class/sanitizefiltrusmurd.class.php"; // introduce data
require_once "class/smurd-cautare.class.php"; // clasa de cautare si afisare a interventiilor
require_once "js/loaders/load_smurd.php"; // javascript loaders
$sanitizefiltrusmurd = new Sanitizefiltru();
$anitizedfiltru=$sanitizefiltrusmurd->setFlitru($connection);
$judet = new judete($connection);
$judete=$judet->get_judete_html($sanitizefiltrusmurd->getJudet());
$localitati_start = new Localitati($connection,$sanitizefiltrusmurd->getJudet());
$localitati=$localitati_start->get_localitate_html($sanitizefiltrusmurd->getLcalitate());
$structuri = new StructuraFiltru($connection);
$structura=$structuri->get_structura_html($sanitizefiltrusmurd->getStructura());
$subunitate=$structuri->get_subunitate_html($sanitizefiltrusmurd->getStructura(),$sanitizefiltrusmurd->getSubunit());
$cautareRapoarteSmurd = new CautareRapoarteSmurd($connection, $sanitizefiltrusmurd->getNRigsu(), $sanitizefiltrusmurd->getZi(), $sanitizefiltrusmurd->getLuna(), $sanitizefiltrusmurd->getAn(), $sanitizefiltrusmurd->getNume(), $sanitizefiltrusmurd->getPrenume(), $sanitizefiltrusmurd->getJudet(), $sanitizefiltrusmurd->getLcalitate(), $sanitizefiltrusmurd->getS(), $sanitizefiltrusmurd->getPagina(), $sanitizefiltrusmurd->getDescarcare());
$cautareRapoarteSmurd->cautareFiltrare();
require_once "template/smurd.php";
require_once "template/filterform.php";
require_once "template/paginatie.php";
require_once "footer.php";
?>
