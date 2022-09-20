<?php
require_once 'header.php';
if($sesiune->check_autenfic())
{
  header("Location: smurd.php");
  exit();
}
require_once 'class/login.class.php';
$login = new stdClass();
$error=$login->user = $login->pass = NULL;
if ((isset($_POST['user'])) && (($_POST['user'] !== "" || $_POST['pass'] !== "")))
{
      $login->user=$_POST['user'];
      $login->pass=$_POST['pass'];

      $satinze_user = new sanitize();   // curata userul de vulnerabilitati/injectare 
      $sanitized_user=$satinze_user->get_string($connection,$login->user);

      $satinze_pass = new sanitize(); // curata parola de vulnerabilitati/injectare 
      $sanitized_pass=$satinze_pass->get_string($connection,$login->pass);

      $verif_login = new login($connection,$login->user); // autentifica userul si creeaza sesiunea
      $verific_login=$verif_login->verifica_parola($sanitized_pass);

      require_once 'class/acces.class.php'; // creeaza vector cu subunitatile accesibile
      $verif_acces = new acces_recursiv($connection,$_SESSION['acces']);
      $acces_ver=$verif_acces->setAcces();

      if($verific_login)
      {
          header("Location: smurd.php");
      }
      else
      {
          $error = ERROR_LOGIN;
      }
}

echo <<<_START
<div class="pagina-login">
<div class="form">
<form method='post' action='login.php' class="autentificare-forma">
<div>
<span class='error'>$error</span>
</div>
<div>
<p>Autentificare I.G.S.U.</p>
</div>
<div>
<input type='text' maxlength='20' name='user' placeholder="utilizator"  value='$login->user'>
</div>
<div>
<input type='password' maxlength='16' name='pass' placeholder="parola" value='$login->pass'>
</div>
<div>
<button type='submit' name='sterge' value='Validare'>Validare</button>
</div>
</form>
</div>
</div>
_START;
require_once 'footer.php';
?>
