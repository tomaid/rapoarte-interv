 <?php

class Tari {
	private $connection;
	public function __construct($connection=null) {
		$stmt = $connection->prepare("SELECT t.id, t.nume FROM tari t ORDER BY nume");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->tara);
		$this->results = array();
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id, $this->tara);
		}
		$stmt->close();
	}
	public function get_tari(){
	      return $this->results;
	}
	public function get_tari_html($tara="")
	{
	      if($tara=="")$tara=1;
	      foreach($this->results as $i)
	      { $selected = "";
	      	if($i[0] == $tara)$selected="selected";
	      	$thishtml.="<option value=\"$i[0]\" $selected>$i[1]</option>";
	      }
	      return $thishtml;
	}
}
?>
