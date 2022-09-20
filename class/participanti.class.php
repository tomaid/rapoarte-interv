 <?php

class Participanti {
	private $connection;
	public function __construct($connection=null) {
		$stmt = $connection->prepare("SELECT p.idparticipant, p.participanti FROM participanti p");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->idparticipant, $this->participanti);
		$this->results = array();
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->idparticipant, $this->participanti);
		}
		$stmt->close();
	}
	public function get_Participanti(){
	      return $this->results;
	}
	public function get_Participanti_html($participanti='')
	{
	      foreach($this->results as $i)
	      { $selected = "";
	      	if($i[0] == $participanti)$selected="selected";
	      	$thishtml.="<option value=\"$i[0]\" style=\"padding:100px;\" $selected>$i[0] - $i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
