 <?php

class Sate {
	private $connection;
	public function __construct($connection=null, $localitate="") {
		$this->localitate=$localitate;
		$stmt = $connection->prepare("SELECT l.id, l.sat FROM sate l WHERE l.oras=?");
		$stmt->bind_param('s', $this->localitate);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->sat);
		$this->results = array();
		$this->results[] = array("", "Selectați");
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id, $this->sat);
		}
		$stmt->close();
	}
	public function get_sate(){
	      return $this->results;
	}
	public function get_sate_html()
	{
	      foreach($this->results as $i)
	      { 
	      	$thishtml.="<option value=\"$i[0]\" $selected>$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
