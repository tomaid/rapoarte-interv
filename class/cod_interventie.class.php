 <?php

class codInterventie {
	private $connection;
	public function __construct($connection=null, $codinterv="") {
		$this->catinterv=$codinterv;
		$stmt = $connection->prepare("SELECT t.categorieinterventie, t.participanti 
						FROM tip_interv t
						WHERE t.nrcod=? LIMIT 1");
		$stmt->bind_param('s', $this->catinterv);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->categorieinterventie, $this->participanti);
		$stmt->fetch();
		$this->results = array($this->categorieinterventie, $this->participanti);
		$stmt->close();
	}
	public function get_codInterv(){
	      return $this->results;
	}
	public function get_codInterv_html()
	{
	      foreach($this->results as $i)
	      { 
	      	$thishtml.="<option value=\"$i[0]\">$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
