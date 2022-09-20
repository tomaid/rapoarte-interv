 <?php
class Esalonsuperior {
	private $connection;
	private $suprastructura;
		public function __construct($connection=null,$suprastructura=null) {
			$this->ownstructura = $suprastructura;
			$stmt = $connection->prepare("SELECT s.idsuprastructura FROM structura s WHERE s.idstructura=?");
			$stmt->bind_param('s', $suprastructura);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($thisid);
			$stmt -> fetch();
			if($thisid!='')
			{
				$this->suprastruct[]=$thisid;
				$this->__construct($connection,$thisid);
			}
			$stmt->close();
			
		}
	public function getStruct($acces=null)
	{	
		array_pop($this->suprastruct);
		$array_final = array_reverse($this->suprastruct);
		$array_final[]=$acces;
		return $array_final;
	}	
}
?>
