 <?php

class CategoriiInterventie {
	private $connection;
	public function __construct($connection=null) {
		$stmt = $connection->prepare("SELECT c.idinterv, c.interventie FROM cat_interv c");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id_iterventie, $this->interventie);
		$this->results = array();
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id_iterventie, $this->interventie);
		}
		$stmt->close();
	}
	public function get_Categorie(){
	      return $this->results;
	}
	public function get_Categorie_html($interventie='')
	{
	      foreach($this->results as $i)
	      { $selected = "";
	      	if($i[0] == $interventie)$selected="selected";
	      	$thishtml.="<option value=\"$i[0]\" $selected>$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
