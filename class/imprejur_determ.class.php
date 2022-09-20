 <?php

class ImprejurariDeterm {
	private $connection;
	public function __construct($connection=null, $iddestinatie="") {
		$this->destinatie=$iddestinatie;
		$stmt = $connection->prepare("SELECT p.id, p.nume FROM imprej_determ p WHERE p.id<800");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->nrcod, $this->numedest);
		$this->results = array();
		$this->results[] = array("0", "Nu e cazul");
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->nrcod, $this->numedest);
		}
		$stmt->close();
	}
	public function get_ImprejurDeterm(){
	      return $this->results;
	}
	public function get_ImprejurDeterm_html()
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
