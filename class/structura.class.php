 <?php

class structura {
	private $connection;
	private $suprastructura;
	public function __construct($connection=null,$suprastructura=null) {
		$suprastructura = $suprastructura ?? $_SESSION['acces'];
		$this->connection = $connection;
		$this->suprastructura = $suprastructura;
		$stmt = $connection->prepare("SELECT s.idstructura, s.idsuprastructura, s.numestructura FROM structura s WHERE s.idsuprastructura=?");
		$stmt->bind_param('s', $this->suprastructura);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->id, $this->suprastruct, $this->structura);
		$this->results = array();
		while ($stmt -> fetch())
		{
			$this->results[] = array($this->id, $this->suprastruct, $this->structura);
		}
		$stmt->close();
	}
	public function get_structura()
	{	$current_struct = $this->get_current_struct();
		array_unshift($this->results,$current_struct);
	    return $this->results;
	}
	
	public function get_structura_html()
	{	
			$current_struct = $this->get_current_struct();
			$thishtml="<option value=\"$current_struct[0]\">- Început -</option>";
	      	foreach($this->results as $i)
	      	{
	      		$thishtml.="<option value=\"$i[0]\">$i[2]</option>";
	      	}
	      	return $thishtml;
	}
		private function get_current_struct()
	{
		$stmt = $this->connection->prepare("SELECT s.idstructura, s.idsuprastructura, s.numestructura FROM structura s WHERE s.idstructura=?");
		$stmt->bind_param('s', $this->suprastructura);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->current_id, $this->current_suprastruct, $this->current_structura);
		$stmt->fetch();
		return array($this->current_suprastruct, $this->current_suprastruct, $this->current_structura);
		$stmt->close();
	}
}
?>
