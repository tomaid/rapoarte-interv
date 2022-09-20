 <?php

class codAlert {
	private $connection;
	public function __construct($connection=null, $iddestinatie="") {
		$this->destinatie=$iddestinatie;
		if($this->destinatie==="")$this->destinatie=9;
		$stmt = $connection->prepare("SELECT a.id, a.nume FROM mod_alertare a ORDER BY a.id");
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
	public function get_tipAlert(){
	      return $this->results;
	}
	public function get_tipAlert_html()
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
