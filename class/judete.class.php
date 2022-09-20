<?php

class judete {
	private $connection;
	public function __construct($connection=null) {
		$this->connection=$connection;
		$stmt = $connection->prepare("SELECT j.id, j.tara, j.nume FROM judete j");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->tara, $this->judet);
		$this->results = array();
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id, $this->tara, $this->judet);
		}
		$stmt->close();
	}
	public function get_judet(){
	      return $this->results;
	}
	public function get_judete_html($cautare_judet = '')
	{
		($cautare_judet!=='') ? $this->cautare_judet=$cautare_judet : $this->cautare_judet=$_SESSION['judid'];
	      foreach($this->results as $i)
	      { 
	      	($i[0] == $this->cautare_judet)?$selected="selected":$selected = "";
	      	$thishtml.="<option value=\"$i[0]\" $selected>$i[2]</option>";
	      }
	      return $thishtml;
	}
}
?>
