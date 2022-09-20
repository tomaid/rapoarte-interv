<?php
$js_head="";
require_once "js/headers/head_fisa_smurd.php"; // introducem toate clasele js in header-ul html
require_once "header.php";
if(!$sesiune->check_autenfic())
{
  header("Location: login.php");
  exit();
}

if($_POST['Introducere'])
	{
		require_once "class/smurd.class.php";
		$insert = new InsertSmurd($connection);            // introducere date in sql
		if($_SESSION['inserare']==1){
			$idinserted=$insert->insertInterventie($connection);
			$messagefrom=$insert->getMessage();
		}
		else
		{
			$messagefrom=ERROR4401;
			// echo "aici";
		}
		// print_r($idinserted);
		// header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $idinserted . "&message=1");
	}

if($_POST['Actualizare'])
	{
		require_once "class/smurd.class.php";
		$actualizare = new InsertSmurd($connection); // actualizare date in sql
		$idinserted=$actualizare->updateInterventie($connection);
		$messagefrom=$actualizare->getMessage();
	}

require_once "class/tari.class.php"; // extrage țări din baza de date
require_once "class/form.class.php"; // seteaza butoanele/titlul formei
require_once "class/alertare.class.php"; // extrage tip alertare din baza de date
require_once "class/predare.class.php"; // extrage tip predare din baza de date
require_once "class/solicitare.class.php"; // extrage motiv solicitare din baza de date
require_once "class/judete.class.php"; // extrage judetele din baza de date
require_once "class/structura.class.php"; // extrage structurile din baza de date
require_once "class/localitati.class.php"; // extrage localitatile din baza de date
require_once "class/destinatie.class.php"; // introduce destinatie
require_once "class/participanti.class.php"; // extrage categorii participanti din baza de date
require_once "class/categ_interventie.class.php"; // extrage categorii interventii din baza de date
require_once "js/loaders/load_fisa_smurd.php"; // introduce data
$tara = new Tari($connection);   // țara
$tari=$tara->get_tari_html();
$judet = new judete($connection);
$judete=$judet->get_judete_html();
$particip = new Participanti($connection);
$participanti=$particip->get_Participanti_html();
$structuri = new structura($connection,$_GET['acces']);
$structura=$structuri->get_structura_html();
$localitati_start = new Localitati($connection,$_SESSION['judid']);
$localitati=$localitati_start->get_localitate_html();
$codsubunit= sprintf("%02d", $_SESSION['codsubunitate']);
$categint = new CategoriiInterventie($connection);
$categorie_interventie=$categint->get_Categorie_html();
$dest = new codDestinatie($connection);
$destinatieOpt=$dest->get_tipDest_html();
$alert= new codAlert($connection);
$alertare=$alert->get_tipAlert_html();
$solicit= new codSolicitare($connection);
$solicitare=$solicit->get_tipSolicit_html();
$pred= new codPredare($connection);
$predare=$pred->get_tipPredare_html();
$formpageid= new Formpage($connection, $idinserted);
$formpagebutton=$formpageid->getButton();
$hiddeninputs=$formpageid->getHidden();
$getjs=$formpageid->getJS();
$getablerow=$formpageid->getTablerow();
$getactualizarenumar=$formpageid->getactualizarenumar();
require_once "template/fisa-smurd.php";
require_once "footer.php";
?>
