 <?php
class Fpid {
	private $connection;
	public function __construct($connection=null, $struct="", $tip="") {
		foreach($struct as $structcount)
		{
		$stmt = $connection->prepare("UPDATE counters SET counter = LAST_INSERT_ID(counter+1) WHERE id = ? AND tip= ?");
		$stmt->bind_param('ss', $structcount,$tip);
		$stmt->execute();
		$this->results[] =$stmt->insert_id;
		$stmt->close();
		}
	}
	public function getFpid(){
	      return $this->results;
	}
}
?>
