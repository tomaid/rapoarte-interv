 <?php

class Localitati {
	private $connection;
	public function __construct($connection=null, $judet="") {
		($judet!=="")?$this->judet=$judet:$this->judet=$_SESSION['judid'];
		$stmt = $connection->prepare("SELECT l.id, l.localitate FROM localitati l WHERE l.judet=?");
		$stmt->bind_param('s', $this->judet);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->localitate);
		$this->results = array();
		$this->results[] = array("", "Selectați");
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id, $this->localitate);
		}
		$stmt->close();
	}
	public function get_localitate(){
	      return $this->results;
	}
	public function get_localitate_html($localitate="")
	{	
	      foreach($this->results as $i)
	      {
	      	($i[0] == $localitate)?$selected="selected":$selected="";
	      	$thishtml.="<option value=\"$i[0]\" $selected>$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
