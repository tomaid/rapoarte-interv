 <?php
class Numesubunitate {
	public $connection;
		public function __construct($connection=null) {
			$stmt = $connection->prepare("SELECT s.numestructura FROM structura s WHERE s.idstructura=? LIMIT 1");
			$stmt->bind_param('s', $_SESSION['acces']);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($thisid);
			$stmt -> fetch();
			$this->numestruct=$thisid;
			$stmt->close();
		}
		public function getNume()
		{
			return $this->numestruct;
		}
}
?>
