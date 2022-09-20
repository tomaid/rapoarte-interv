 <?php
class Current_data {
	public $luna;
	private $numeluna;
	
	public function __construct() {
		$this->timp = new DateTime();
		$this->datacurenta = $this->timp->format( 'd.m.Y' );
		$this->anulcurent = $this->timp->format( 'Y' );
		$this->lunacurenta = $this->timp->format( 'm' );
		$this->ziuacurenta = $this->timp->format( 'd' );
	}
	
	public function get_luna($numeluna){
	$this->cautaluna = array ("01" => "Ianuarie",
	"02" => "Februarie",
	"03" => "Martie",
	"04" => "Aprilie",
	"05" => "Mai",
	"06" => "Iunie",
	"07" => "Iulie",
	"08" => "August",
	"09" => "Septembrie",
	"10" => "Octombrie",
	"11" => "Noiembrie",
	"12" => "Decembrie");
	return $this->cautaluna[$numeluna];
	}
	
	public function get_Time(){
	      return $this->datacurenta;
	}
	
	public function get_numeLuna($luna){
	$this->nume_luna=$this->get_luna($luna);
	      return $this->nume_luna;
	}
	
	public function get_currentDate(){
	$this->luna_currenta=$this->get_luna($this->lunacurenta);
	return $this->ziuacurenta." ".$this->luna_currenta." ".$this->anulcurent;
	}

}
?>
