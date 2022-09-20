 <?php
class Sanitizefiltru {
	private $string;
	public function setFlitru($connection) {
		$satinze_vars = new sanitize();
		$this->arrayfiltru=array();
		$this->filtru_nrigsu=$this->filtru_data_int_zi=$this->filtru_data_int_luna=$this->filtru_data_int_an=$this->filtru_cautare_judet=$this->filtru_cautare_localitati=$this->filtru_cautare_structura=$this->filtru_cautare_subunit=$this->filtru_cautare_s=$this->filtru_cautare_nume=$this->filtru_cautare_prenume=$this->filtru_descarcare="";
		$this->filtru_pagina=1;
				$this->filtru_nrigsu=$satinze_vars->get_string($connection,$_GET['cautare_nrigsu']);
				if(strpos($this->filtru_nrigsu, "/"))$this->filtru_nrigsu = substr($this->filtru_nrigsu, 0, strpos($this->filtru_nrigsu, "/"));
				$this->arrayfiltru[]="cautare_nrigsu=".$this->filtru_nrigsu;
		if(!empty($_GET['cautare_data_int_zi'])) {
				$this->filtru_data_int_zi=$satinze_vars->get_string($connection,$_GET['cautare_data_int_zi']);
				$this->arrayfiltru[]="cautare_data_int_zi=".$this->filtru_data_int_zi;
		}
		if(!empty($_GET['cautare_data_int_luna'])) {
				$this->filtru_data_int_luna=$satinze_vars->get_string($connection,$_GET['cautare_data_int_luna']);
				$this->arrayfiltru[]="cautare_data_int_luna=".$this->filtru_data_int_luna;
		}
		if(!empty($_GET['cautare_data_int_an'])) {
				$this->filtru_data_int_an=$satinze_vars->get_string($connection,$_GET['cautare_data_int_an']);
				$this->arrayfiltru[]="cautare_data_int_an=".$this->filtru_data_int_an;
		}
		if(!empty($_GET['cautare_nume'])) {
				$this->filtru_cautare_nume=$satinze_vars->get_string($connection,$_GET['cautare_nume']);
				$this->arrayfiltru[]="cautare_nume=".$this->filtru_cautare_nume;
		}
		if(!empty($_GET['cautare_prenume'])) {
				$this->filtru_cautare_prenume=$satinze_vars->get_string($connection,$_GET['cautare_prenume']);
				$this->arrayfiltru[]="cautare_prenume=".$this->filtru_cautare_prenume;
		}
		if(!empty($_GET['cautare_judet'])) {
				$this->filtru_cautare_judet=$satinze_vars->get_string($connection,$_GET['cautare_judet']);
				$this->arrayfiltru[]="cautare_judet=".$this->filtru_cautare_judet;
		}
		if(!empty($_GET['cautare_localitati'])) {
				$this->filtru_cautare_localitati=$satinze_vars->get_string($connection,$_GET['cautare_localitati']);
				$this->arrayfiltru[]="cautare_localitati=".$this->filtru_cautare_localitati;
		}
		if(!empty($_GET['cautare_structura'])) {
				$this->filtru_cautare_structura=$satinze_vars->get_string($connection,$_GET['cautare_structura']);
				$this->arrayfiltru[]="cautare_structura=".$this->filtru_cautare_structura;
		}
		if((!empty($_GET['cautare_subunit']))&&(!empty($_GET['cautare_structura']))) {
				$this->filtru_cautare_subunit=$satinze_vars->get_string($connection,$_GET['cautare_subunit']);
				$this->arrayfiltru[]="cautare_subunit=".$this->filtru_cautare_subunit;
		}
		if(!empty($_GET['cautare_s'])) {
				$this->filtru_cautare_s=$satinze_vars->get_string($connection,$_GET['cautare_s']);
				$this->arrayfiltru[]="cautare_s=".$this->filtru_cautare_s;
		}
		if(!empty($_GET['pagina'])) {
				$this->filtru_pagina=$satinze_vars->get_string($connection,$_GET['pagina']);
				$this->arrayfiltru[]="pagina=".$this->filtru_pagina;
		}
		if($_GET['descarcare']==1) {
 				$this->filtru_descarcare=1;
				$this->arrayfiltru[]="descarcare=1";
		}
		// if(!empty($_GET['cautare_an_curent'])) {
		//		$this->filtru_cautare_an_curent=$satinze_vars->get_string($connection,$_GET['cautare_an_curent']);
		//		$this->arrayfiltru[]="&cautare_an_curent=".$filtru_cautare_an_curent;
		// }
	}
	public function getArray() {
		$filtruar=join("&",$this->arrayfiltru);
		print_r($filtruar);
		return $filtruar;
	}
	public function getNRigsu() {
		return $this->filtru_nrigsu;
	}
	public function getZi() {
		return $this->filtru_data_int_zi;
	}
	public function getLuna() {
		return $this->filtru_data_int_luna;
	}
	public function getAn() {
		return $this->filtru_data_int_an;
	}
	public function getNume() {
		return $this->filtru_cautare_nume;
	}
	public function getPrenume() {
		return $this->filtru_cautare_prenume;
	}
	public function getJudet() {
		return $this->filtru_cautare_judet;
	}
	public function getLcalitate() {
		return $this->filtru_cautare_localitati;
	}
	public function getStructura() {
		return $this->filtru_cautare_structura;
	}
	public function getSubunit() {
		return $this->filtru_cautare_subunit;
	}
	public function getS() {
		return $this->filtru_cautare_s;
	}
	public function getPagina() {
		return $this->filtru_pagina;
	}
	public function getDescarcare() {
		return $this->filtru_descarcare;
	}
}
?>
