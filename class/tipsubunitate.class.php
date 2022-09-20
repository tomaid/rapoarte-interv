 <?php

class Subunitate {
	private $connection;
	public function __construct($connection=null) {
		$stmt = $connection->prepare("SELECT s.idsubunitate, s.numesubunitate FROM subunitate s ORDER BY s.idsubunitate");
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
	public function get_tipSubunitate(){
	      return $this->results;
	}
	public function get_tipSubunitate_html()
	{
	      foreach($this->results as $i)
	      {
	      	$thishtml.="<option value=\"$i[0]\">$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
