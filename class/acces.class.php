 <?php       
/*
clasa cu functie recursiva pentru validare acces
*/
class acces_recursiv {
	private $connection;
	public function __construct($connection=null, $structura=''){
		$this->connection=$connection;
		$this->structura =$structura;
		$this->subunitati = array();
	}
	private function setStructura(){
		if(($this->structura!=='')&&(in_array($this->structura, $_SESSION['subunit_acces']))){
			$this->cautaSubunitati($this->structura);
		}
		else{
			$this->cautaSubunitati($_SESSION['acces']);
		}
	}
	private function cautaSubunitati($struct){ // functie recursiva pentru a afla subunitatile
		$stmt = $this->connection->prepare("SELECT s.idstructura FROM structura s WHERE s.idsuprastructura=?");
		$stmt->bind_param('s', $struct);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id);
		while ($stmt -> fetch()){
			$this->subunitati[] = $id;
			$this->cautaSubunitati($id);
		}
		$stmt->close();
	}
	public function setAcces() {
		$this->subunitati[] = $this->structura;
		$this->setStructura();
		$_SESSION['subunit_acces'] = $this->subunitati;
	}
	public function setInsert() {
		$this->subunitati[] = $this->structura;
		$this->setStructura();
		$_SESSION['subunit_acces'] = $this->subunitati;
	}
	public function getSubunitati() {
		$this->subunitati[] = $this->structura;
		$this->setStructura();
		return $this->subunitati;
	}

}
?>
