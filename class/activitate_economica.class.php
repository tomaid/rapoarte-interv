 <?php

class ActivitateEconomica {
	private $connection;
	public function __construct($connection=null, $masterid=1) {
		$this->masterid=$masterid;
		$stmt = $connection->prepare("SELECT a.id, a.nume, a.subcat
						FROM domeniu_activitate a 
						WHERE a.masterid=?");
		$stmt->bind_param('s', $this->masterid);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->nume,  $this->subcat);
		$this->rez[] = array("0", "Nu este cazul");
		while ($stmt -> fetch())
		{	$this->subcat == 1 ?? "a";
			$this->rez[] = array($this->id, $this->nume);
		}
		// print_r($this->rez);
		$stmt->close();
	}
	public function get_actEc(){
	      return $this->rez;
	}
	public function get_actEc_html()
	{
	      foreach($this->rez as $i)
	      { 
	      	$thishtml.="<option value=\"$i[0]\">$i[1] ($i[0])</option>";
	      }
	      return $thishtml;
	}
}
?>
