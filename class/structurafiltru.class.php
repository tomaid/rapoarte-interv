 <?php

class StructuraFiltru {
	private $connection;
	private $suprastructura;
	public function __construct($connection=null) {
		$this->suprastructura=$_SESSION['acces'];
		$this->connection = $connection;
	}
	private function searchDb($struct){
		$stmt = $this->connection->prepare("SELECT s.idstructura, s.idsuprastructura, s.numestructura FROM structura s WHERE s.idsuprastructura=?");
		$stmt->bind_param('s', $struct);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id, $suprastruct, $structura);
		$results = array();
		while ($stmt -> fetch())
		{
			$results[] = array($id, $suprastruct, $structura);
		}
		return $results;
		$stmt->close();
	}

	private function getNumesuprastrut()
	{
		$stmt = $this->connection->prepare("SELECT s.numestructura FROM structura s WHERE s.idstructura=? LIMIT 1");
		$stmt->bind_param('s', $this->suprastructura);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($numesuprast);
		$stmt->fetch();
		return $numesuprast;
		$stmt->close();
	}

	public function get_structura_html($suprastruct="")
	{
			$thishtml="<option value=\"\"><b>{$this->getNumesuprastrut()}</b></option>";
	      	foreach($this->searchDb($_SESSION['acces']) as $i)
	      	{   ($i[0]==$suprastruct)?$selected="selected": $selected="";
	      		$thishtml.="<option value=\"$i[0]\" $selected>-&gt; $i[2]</option>";
	      	}
	      	return $thishtml;
	}
	public function get_subunitate_html($suprastruct="", $subunit="")
	{		$allsubunit = $this->searchDb($suprastruct);
			if((in_array($suprastruct, $_SESSION['subunit_acces']))&&($suprastruct!=="")&&(count($allsubunit)>0)){
				$thishtml="<br>Subunitate: <select name=\"cautare_subunit\" id=\"cautare_subunit\" style=\"width: 150px;\" tabindex=\"29\" onchange=\"FiltruSmurd.runtimeFilter('pagina', '0');FiltruSmurd.sFilter(this.value);FiltruSmurd.runFilter(this.id, this.value);\">
			<option value=\"{$suprastruct}\"><b>Alegeți subunitate</b></option>";
	      		foreach($allsubunit as $i)
	      		{   ($i[0]==$subunit)?$selected="selected": $selected="";
	      			$thishtml.="<option value=\"$i[0]\" $selected>-&gt; $i[2]</option>";
	      		}
	      		$thishtml.="</select>";
	      		return $thishtml;
			}
	}
}
?>
