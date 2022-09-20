 <?php

class codPredare {
	private $connection;
	public function __construct($connection=null, $iddestinatie="") {
		$this->destinatie=$iddestinatie;
		$stmt = $connection->prepare("SELECT d.id, d.nume FROM predare_pacient d ORDER BY d.id");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->nume);
		$this->results = array();
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id, $this->nume);
		}
		$stmt->close();
	}
	public function get_tipPredare(){
	      return $this->results;
	}
	public function get_tipPredare_html()
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
