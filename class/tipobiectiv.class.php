 <?php

class TipObiectiv {
	private $connection;
	public function __construct($connection=null, $iddestinatie="") {
		$this->destinatie=$iddestinatie;
		$stmt = $connection->prepare("SELECT t.id, t.nume FROM tip_obiectiv t WHERE t.id<900");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->nrcod, $this->numedest);
		$this->results = array();
		$this->results[] = array("0", "Nu este cazul");
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->nrcod, $this->numedest);
		}
		$stmt->close();
	}
	public function get_tipObiectiv(){
	      return $this->results;
	}
	public function get_tipObiectiv_html()
	{
	      foreach($this->results as $i)
	      { 
	      	$selected = "";
	      	if($i[0] == $this->destinatie)$selected="selected";
	      	$thishtml.="<option value=\"$i[0]\" $selected>$i[1] ($i[0])</option>";
	      }
	      return $thishtml;
	}
}
?>
