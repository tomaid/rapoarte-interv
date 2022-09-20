 <?php
class login {
	private $user;
	private $connection;
	private $parola;
	public function __construct($connection=null, $user='') {
		$this->user=$user;
		$stmt = $connection->prepare("SELECT m.pass, m.tabacces, s.judid, s.tipsubunitate, s.codsubunitate
		FROM membri m
		LEFT JOIN structura s ON m.tabacces = s.idstructura
		WHERE m.user=? LIMIT 1");
		$stmt->bind_param('s', $this->user);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->pass, $this->acces, $this->judet, $this->tipsubunitate, $this->codsubunitate);
		$stmt->fetch();
	  	$stmt->close();
	}
	public function verifica_parola($parola){

		if (password_verify($parola, $this->pass))
	    {
	      $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	      $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
	      $_SESSION['user'] = $this->user;
	      $_SESSION['acces'] = $this->acces;
	      $_SESSION['judid'] = $this->judet;
	      $_SESSION['tipsubunitate'] = $this->tipsubunitate;
	      $_SESSION['codsubunitate'] = $this->codsubunitate;
	      $_SESSION['inserare']=1;
	      if($this->acces<=1000)$_SESSION['inserare']=0;
	      return TRUE;
	    }
	    else
	    {
	      return FALSE;
		}
	}

}
?>