 <?php
class sanitize {
	private $string;
	public function get_string($connection=null, $string='') {
		$this->string=$string;
		$this->string= strip_tags($this->string);
		$this->string = htmlentities($this->string);
		$this->string = str_replace("&icirc;", "î", $this->string);
  		$this->string = str_replace("&acirc;", "â", $this->string);
  		$this->string = str_replace("&Icirc;", "Î", $this->string);
  		$this->string = str_replace("&Acirc;", "Â", $this->string);
  		$this->string = str_replace("\r", " ", $this->string);
  		$this->string = str_replace("\n", " ", $this->string);
  		$this->string = str_replace(";", ",", $this->string);
		$this->string = stripslashes($this->string);
		$this->string = $connection->real_escape_string($this->string);
		return $this->string;

	}
	public function get_time_string($connection=null, $zi='', $luna='', $an='', $ora='', $min='') {
		$this->zi=$this->get_string($connection,$zi);
		$this->luna=$this->get_string($connection,$luna);
		$this->an=$this->get_string($connection,$an);
		$this->ora=$this->get_string($connection,$ora);
		$this->min=$this->get_string($connection,$min);
	return mktime($this->ora, $this->min, 0, $this->luna, $this->zi, $this->an);
	}
	public function set_StringDownload($string='') {
		$this->string=$string;
		$this->string = str_replace("î", "i", $this->string);
  		$this->string = str_replace("â;", "a", $this->string);
  		$this->string = str_replace("Î", "I", $this->string);
  		$this->string = str_replace("Â", "A", $this->string);
  		$this->string = str_replace("Ț", "T", $this->string);
  		$this->string = str_replace("ț", "t", $this->string);
  		$this->string = str_replace("ș", "s", $this->string);
  		$this->string = str_replace("Ș", "S", $this->string);
  		$this->string = str_replace("\r", " ", $this->string);
  		$this->string = str_replace("\n", " ", $this->string);
  		$this->string = str_replace(";", ",", $this->string);
		return $this->string;

	}
}
?>
