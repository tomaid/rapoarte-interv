<?php
 /**
  * @author Toma Ionut <contact@tomaionut.ro>
  * @copyright tomaionut.ro - Toate drepturile rezervate
  * @link https://tomaionut.ro
  */
include 'constants.php'; // constante folosite prin toata aplicatia

require_once 'class/db.class.php'; // conexiunea la baza de date
$db = new db();
$connection = $db->conn();
require_once 'class/sanitize.class.php'; // curațarea input-urilor de orice sql injections

require_once 'class/https.class.php'; // verifică daca folosim https
new https();

require_once 'class/session.class.php'; // verifica daca avem o sesiune activa
$sesiune = new session();

require_once 'class/current.data.class.php'; // reda data curenta
$data = new Current_data();

$datacurenta=$data->get_currentDate();

$userstr = 'Autentificare';
if($sesiune->check_autenfic())
{
  if($sesiune->check_sesiune())
  {
    destroySession();
    header("Location: logout.php");
    exit();
  };
  $user     = $_SESSION['user'];
  $loggedin = TRUE;
  $userstr  = "Sunteți autentificat ca : $user";
  // $detas_nume = $_SESSION['denumiresubunitate'];

}
else $loggedin = FALSE;

((isset($_GET['acces']))&&(in_array($_GET['acces'],$_SESSION['subunit_acces']))) ? $acces = $_GET['acces'] : $acces = $_SESSION['acces'];

if(!$ASYNC){
require_once 'template/header.php';
require_once 'template/loader.php';

if ($loggedin)
{
  require_once 'class/numesubunitate.class.php'; // reda data curenta
  $data = new Numesubunitate($connection);
  $subunitatenume=$data->getNume();
  require_once 'template/menu.php';

}
}
?>
