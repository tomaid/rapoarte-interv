 <?php
class Formpage {
	private $fpid;

	public function __construct($connection=null,$fpidn='') {
		($fpidn!=0)? $fpid=$fpidn : $fpid=$_GET['id'] ;
		$satinze_vars = new sanitize();
		$this->fpid=$satinze_vars->get_string($connection,$fpid);
		$this->button= "Introducere";
		$this->hiddeninput= '';
		$this->activate_javascript='';
		$this->activate_newtablerow='';
		$this->activate_numar='';
		if($this->fpid!='')
			{
				require_once "verifyid.class.php"; // verifica daca userul poate modifica interventia cu id-ul
        		$verifyid = new Verifyid($connection);
        		$verif=$verifyid->verifySmurd($connection,$this->fpid);
        		if(!$verif){
        			header("Location: ".FOLER_INSTALARE);
        			exit();
        		}
				$this->button= "Actualizare";
				$this->hiddeninput= '<input id="idofpost" name="idofpost" type="hidden" value="'.$this->fpid.'">';
				$this->activate_javascript='<script src="js/id_Smurd.js" type="text/javascript"></script>
				<script type="text/javascript">
				getimpout = new Getinputs('.$this->fpid.');
				getimpout.load();
				</script>';
				$this->activate_newtablerow='<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft">Nr. IGSU:</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft" colspan="2"><span id="nrigsu"></span>/<span id="nrisu"></span>/<span id="nrsubunitate"></span></td>
<!-- <td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft">Nr. ISU:</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft"><div id="nrisu"></div></td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft" colspan="2">Nr. subunitate:</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft"><div id="nrsubunitate"></div></td> -->
</tr>
';
$this->activate_numar=' numărul ';
			}
	}
	public function getButton(){
	      return $this->button;
	}
	public function getHidden(){
	      return $this->hiddeninput;
	}
	public function getJS(){
	      return $this->activate_javascript;
	}
	public function getTablerow(){
	      return $this->activate_newtablerow;
	}
		public function getactualizarenumar(){
	      return $this->activate_numar;
	}
}
?>
