 <?php

class tipInterventie {
	private $connection;
	public function __construct($connection=null, $catinterv="", $participanti="") {
		$this->catinterv=$catinterv;
		$this->participanti=$participanti;
		$stmt = $connection->prepare("SELECT t.nrcod, n.numeinterventie 
						FROM tip_interv t 
						LEFT JOIN nume_interventie n ON t.nume_int = n.idnume
						WHERE t.categorieinterventie=? AND t.participanti=?");
		$stmt->bind_param('ss', $this->catinterv, $this->participanti);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->nrcod, $this->numeinterventie);
		$this->results = array();
		$this->results[] = array("", "Selectați");
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->nrcod, $this->numeinterventie);
		}
		$stmt->close();
	}
	public function get_tipInterv(){
	      return $this->results;
	}
	public function get_tipInterv_html()
	{
	      foreach($this->results as $i)
	      { 
	      	$thishtml.="<option value=\"$i[0]\">$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
