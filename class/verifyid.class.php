 <?php
class Verifyid {
	private $connection;
		public function verifySmurd($connection=null,$id) {
			$stmt = $connection->prepare("SELECT s.struct FROM intSmurd s WHERE s.id=?");
			$stmt->bind_param('s', $id);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($thisid);
			$stmt -> fetch();
			$stmt->close();
			if(in_array($thisid, $_SESSION['subunit_acces']))return true;
			return false;
		}
		public function verifyStingere($connection=null,$id) {
			$stmt = $connection->prepare("SELECT s.struct FROM intStingere s WHERE s.id=?");
			$stmt->bind_param('s', $id);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($thisid);
			$stmt -> fetch();
			$stmt->close();
			if(in_array($thisid, $_SESSION['subunit_acces']))return true;
			return false;
		}		
}
?>
