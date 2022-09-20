 <?php
require_once 'header.php';
class logout {
	public function destroySession()
	{

		$_SESSION=array();
		if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000, '/');
		session_destroy();
		header("Location: login.php");
	}
}
?>
