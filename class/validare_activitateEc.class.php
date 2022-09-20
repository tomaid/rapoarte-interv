<?php
class ActivitateEconomica {
	private $connection;
	public function __construct($connection=null, $id=1) {
		$this->id=$id;
		$stmt = $connection->prepare("SELECT COUNT(*)
						FROM domeniu_activitate 
						WHERE id>100 AND id=?");
		$stmt->bind_param('s', $this->id);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($this->count);
		$stmt -> fetch();
		$stmt->close();
	}
	public function get_actEc(){
	      return $this->count;
	}
}
?>
