 <?php
class InsertStingere {
	private $fpid;
	public function __construct($connection=null) {
		if(($_POST['cod_interventie']=='')||(!is_numeric($_POST['cod_interventie'])))
		{
			$this->message= ERROR_INTRODUCERE_DATE;
		}
		else {
			$this->tip="I"; // S de la smurd sau I de la interventie stingere
			$satinze_vars = new sanitize();
			require_once "class/esalonsuperior.class.php"; // extrage esaloanele superioare
			$esalonSup = new Esalonsuperior($connection,$_SESSION['acces']);
			$this->eesalon=$esalonSup->getStruct($_SESSION['acces']);
if((!empty($_POST['idofpost']))&&(is_numeric($_POST['idofpost'])))$this->idofpost=$satinze_vars->get_string($connection,$_POST['idofpost']);
(is_numeric($_POST['participanti']))?$this->participanti=$satinze_vars->get_string($connection,$_POST['participanti']):$this->participanti="";
(is_numeric($_POST['categorie_interventie']))?$this->categ_interv=$satinze_vars->get_string($connection,$_POST['categorie_interventie']):$this->categ_interv="";
(is_numeric($_POST['tip_interventie']))?$this->tip_interv=$satinze_vars->get_string($connection,$_POST['tip_interventie']):$this->tip_interv="";
(is_numeric($_POST['cod_interventie']))?$this->cod_interv=$satinze_vars->get_string($connection,$_POST['cod_interventie']):$this->cod_interv="";

((is_numeric($_POST['modalert']))&&(!($_POST['modalert']<0)&&!($_POST['modalert']>9)))?$this->alertare=$satinze_vars->get_string($connection,$_POST['modalert']):$this->alertare="";
$this->nume_victima=$satinze_vars->get_string($connection,$_POST['denumire_persoana']);
$this->svsu_spsualte=$satinze_vars->get_string($connection,$_POST['svsu_spsu']);
(is_numeric($_POST['tara']))?$this->tara=$satinze_vars->get_string($connection,$_POST['tara']):$this->tara="";
(is_numeric($_POST['judet']))?$this->judet=$satinze_vars->get_string($connection,$_POST['judet']):$this->judet="";
(is_numeric($_POST['localitati']))?$this->localitati=$satinze_vars->get_string($connection,$_POST['localitati']):$this->localitati="";
(is_numeric($_POST['telefon']))?$this->telefon=$satinze_vars->get_string($connection,$_POST['telefon']):$this->telefon="";
(is_numeric($_POST['sate']))?$this->sate=$satinze_vars->get_string($connection,$_POST['sate']):$this->sate="";
 $adr[0] = $satinze_vars->get_string($connection,$_POST['adresa_strada']);
 $adr[1] = $satinze_vars->get_string($connection,$_POST['adresa_nr']);
 $adr[2] = $satinze_vars->get_string($connection,$_POST['adresa_bl']);
 $adr[3] = $satinze_vars->get_string($connection,$_POST['adresa_sc']);
 $adr[4] = $satinze_vars->get_string($connection,$_POST['adresa_ap']);
 $adr[5] = $satinze_vars->get_string($connection,$_POST['adresa_et']);
 $this->adresa = json_encode($adr);
$this->laty=$satinze_vars->get_string($connection,$_POST['laty']);
$this->longx=$satinze_vars->get_string($connection,$_POST['longx']);

(is_numeric($_POST['distanta_km']))?$this->distanta_km=$satinze_vars->get_string($connection,$_POST['distanta_km']):$this->distanta_km="";

((!empty($_POST['plecare_zi']))&&(!empty($_POST['plecare_luna']))&&(!empty($_POST['plecare_an']))&&(!empty($_POST['plecare_ora']))&&(!empty($_POST['plecare_min'])))?
        $this->plecare = $satinze_vars->get_time_string($connection,$_POST['plecare_zi'],$_POST['plecare_luna'],$_POST['plecare_an'],$_POST['plecare_ora'],$_POST['plecare_min']):$this->plecare="";
((!empty($_POST['anunt_zi']))&&(!empty($_POST['anunt_luna']))&&(!empty($_POST['anunt_an']))&&(!empty($_POST['anunt_ora']))&&(!empty($_POST['anunt_min'])))?
        $this->anunt = $satinze_vars->get_time_string($connection,$_POST['anunt_zi'],$_POST['anunt_luna'],$_POST['anunt_an'],$_POST['anunt_ora'],$_POST['anunt_min']):$this->anunt=time();
((!empty($_POST['sosire_zi']))&&(!empty($_POST['sosire_luna']))&&(!empty($_POST['sosire_an']))&&(!empty($_POST['sosire_ora']))&&(!empty($_POST['sosire_min'])))?
        $this->sosire = $satinze_vars->get_time_string($connection,$_POST['sosire_zi'],$_POST['sosire_luna'],$_POST['sosire_an'],$_POST['sosire_ora'],$_POST['sosire_min']):$this->sosire="";
((!empty($_POST['producere_zi']))&&(!empty($_POST['producere_luna']))&&(!empty($_POST['producere_an']))&&(!empty($_POST['producere_ora']))&&(!empty($_POST['producere_min'])))?
        $this->producere = $satinze_vars->get_time_string($connection,$_POST['producere_zi'],$_POST['producere_luna'],$_POST['producere_an'],$_POST['producere_ora'],$_POST['producere_min']):$this->producere="";
((!empty($_POST['retragere_zi']))&&(!empty($_POST['retragere_luna']))&&(!empty($_POST['retragere_an']))&&(!empty($_POST['retragere_ora']))&&(!empty($_POST['retragere_min'])))?
        $this->localizare = $satinze_vars->get_time_string($connection,$_POST['retragere_zi'],$_POST['retragere_luna'],$_POST['retragere_an'],$_POST['retragere_ora'],$_POST['retragere_min']):$this->localizare="";
((!empty($_POST['spital_zi']))&&(!empty($_POST['spital_luna']))&&(!empty($_POST['spital_an']))&&(!empty($_POST['spital_ora']))&&(!empty($_POST['spital_min'])))?
        $this->lichidare = $satinze_vars->get_time_string($connection,$_POST['spital_zi'],$_POST['spital_luna'],$_POST['spital_an'],$_POST['spital_ora'],$_POST['spital_min']):$this->lichidare="";
((!empty($_POST['eliberare_zi']))&&(!empty($_POST['eliberare_luna']))&&(!empty($_POST['eliberare_an']))&&(!empty($_POST['eliberare_ora']))&&(!empty($_POST['eliberare_min'])))?
        $this->retragere = $satinze_vars->get_time_string($connection,$_POST['eliberare_zi'],$_POST['eliberare_luna'],$_POST['eliberare_an'],$_POST['eliberare_ora'],$_POST['eliberare_min']):$this->retragere=""; 
((!empty($_POST['monitorizare_zi']))&&(!empty($_POST['monitorizare_luna']))&&(!empty($_POST['monitorizare_an']))&&(!empty($_POST['monitorizare_ora']))&&(!empty($_POST['monitorizare_min'])))?
        $this->sosiresvsu = $satinze_vars->get_time_string($connection,$_POST['monitorizare_zi'],$_POST['monitorizare_luna'],$_POST['monitorizare_an'],$_POST['monitorizare_ora'],$_POST['monitorizare_min']):$this->sosiresvsu="";
((!empty($_POST['imprimare_zi']))&&(!empty($_POST['imprimare_luna']))&&(!empty($_POST['imprimare_an']))&&(!empty($_POST['imprimare_ora']))&&(!empty($_POST['imprimare_min'])))?
        $this->sosirespsu = $satinze_vars->get_time_string($connection,$_POST['imprimare_zi'],$_POST['imprimare_luna'],$_POST['imprimare_an'],$_POST['imprimare_ora'],$_POST['imprimare_min']):$this->sosirespsu="";
((is_numeric($_POST['cod_organ_tutelar']))&&(!($_POST['cod_organ_tutelar']<0)&&!($_POST['cod_organ_tutelar']>27)))?$this->organtutelar=$satinze_vars->get_string($connection,$_POST['cod_organ_tutelar']):$this->organtutelar="";
((is_numeric($_POST['cod_tip_proprietate']))&&(!($_POST['cod_tip_proprietate']<0)&&!($_POST['cod_tip_proprietate']>9)))?$this->tipproprietate=$satinze_vars->get_string($connection,$_POST['cod_tip_proprietate']):$this->tipproprietate="";
((is_numeric($_POST['cod_activitate_economica']))&&(!($_POST['cod_activitate_economica']<111)&&!($_POST['cod_activitate_economica']>9999)))?$this->codactivitateeconom=$satinze_vars->get_string($connection,$_POST['cod_activitate_economica']):$this->codactivitateeconom="";
((is_numeric($_POST['cod_tip_obiectiv']))&&(!($_POST['cod_tip_obiectiv']<0)&&!($_POST['cod_tip_obiectiv']>9)))?$this->tipobiectiv=$satinze_vars->get_string($connection,$_POST['cod_tip_obiectiv']):$this->tipobiectiv="";
((is_numeric($_POST['cod_dest']))&&(!($_POST['cod_dest']<0)&&!($_POST['cod_dest']>146)))?$this->cod_dest=$satinze_vars->get_string($connection,$_POST['cod_dest']):$this->cod_dest="";
((is_numeric($_POST['cos_fum']))&&(!($_POST['cos_fum']<0)&&!($_POST['cos_fum']>2)))?$this->cos_fum=$satinze_vars->get_string($connection,$_POST['cos_fum']):$this->cos_fum="";
((is_numeric($_POST['intravilan']))&&(!($_POST['intravilan']<1)&&!($_POST['intravilan']>2)))?$this->intravilan=$satinze_vars->get_string($connection,$_POST['intravilan']):$this->intravilan="";
((is_numeric($_POST['fortaurg']))&&(!($_POST['fortaurg']<0)&&!($_POST['fortaurg']>5)))?$this->forte_cerute_in_sprijin=$satinze_vars->get_string($connection,$_POST['fortaurg']):$this->forte_cerute_in_sprijin="";
((is_numeric($_POST['procintr']))&&(!($_POST['procintr']<0)&&!($_POST['procintr']>6)))?$this->procedee_intrerupere=$satinze_vars->get_string($connection,$_POST['procintr']):$this->procedee_intrerupere="";
((is_numeric($_POST['cdtac']))&&(!($_POST['cdtac']<1)&&!($_POST['cdtac']>3)))?$this->comandant_actiune=$satinze_vars->get_string($connection,$_POST['cdtac']):$this->comandant_actiune="";
((is_numeric($_POST['cdtint']))&&(!($_POST['cdtint']<0)&&!($_POST['cdtint']>28)))?$this->comandant_interventie=$satinze_vars->get_string($connection,$_POST['cdtint']):$this->comandant_interventie="";
((is_numeric($_POST['ccapop']))&&(!($_POST['ccapop']<0)&&!($_POST['ccapop']>1)))?$this->crestere_capacitate=$satinze_vars->get_string($connection,$_POST['ccapop']):$this->crestere_capacitate="";
(is_numeric($_POST['pers_of']))?$this->personal_destinat_ofiter=$satinze_vars->get_string($connection,$_POST['pers_of']):$this->personal_destinat_ofiter="";
(is_numeric($_POST['pers_mm']))?$this->personal_destinat_maistru=$satinze_vars->get_string($connection,$_POST['pers_mm']):$this->personal_destinat_maistru="";
(is_numeric($_POST['pers_subof']))?$this->personal_destinat_subofiter=$satinze_vars->get_string($connection,$_POST['pers_subof']):$this->personal_destinat_subofiter="";
(is_numeric($_POST['pers_volunt']))?$this->personal_destinat_voluntar=$satinze_vars->get_string($connection,$_POST['pers_volunt']):$this->personal_destinat_voluntar="";
(is_numeric($_POST['pers_prim']))?$this->personal_destinat_primar=$satinze_vars->get_string($connection,$_POST['pers_prim']):$this->personal_destinat_primar="";
(is_numeric($_POST['pers_vice']))?$this->personal_destinat_viceprimar=$satinze_vars->get_string($connection,$_POST['pers_vice']):$this->personal_destinat_viceprimar="";
(is_numeric($_POST['pers_secret']))?$this->personal_destinat_secretar=$satinze_vars->get_string($connection,$_POST['pers_secret']):$this->personal_destinat_secretar="";
(is_numeric($_POST['pers_svsu']))?$this->personal_destinat_svsu=$satinze_vars->get_string($connection,$_POST['pers_svsu']):$this->personal_destinat_svsu="";
(is_numeric($_POST['pers_spsu']))?$this->personal_destinat_spsu=$satinze_vars->get_string($connection,$_POST['pers_spsu']):$this->personal_destinat_spsu="";
(is_numeric($_POST['pers_pol']))?$this->personal_destinat_politie=$satinze_vars->get_string($connection,$_POST['pers_pol']):$this->personal_destinat_politie="";
(is_numeric($_POST['pers_jandarmi']))?$this->personal_destinat_jandarmi=$satinze_vars->get_string($connection,$_POST['pers_jandarmi']):$this->personal_destinat_jandarmi="";
(is_numeric($_POST['pers_front']))?$this->personal_destinat_frontiera=$satinze_vars->get_string($connection,$_POST['pers_front']):$this->personal_destinat_frontiera="";
(is_numeric($_POST['pers_armata']))?$this->personal_destinat_armata=$satinze_vars->get_string($connection,$_POST['pers_armata']):$this->personal_destinat_armata="";
(is_numeric($_POST['pers_cet']))?$this->personal_destinat_cetateni=$satinze_vars->get_string($connection,$_POST['pers_cet']):$this->personal_destinat_cetateni="";
(is_numeric($_POST['mijstingere_isu']))?$this->mijstingere_isu=$satinze_vars->get_string($connection,$_POST['mijstingere_isu']):$this->mijstingere_isu="";
(is_numeric($_POST['mijstingere_svsu']))?$this->mijstingere_svsu=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu']):$this->mijstingere_svsu="";
(is_numeric($_POST['mijstingere_spsu']))?$this->mijstingere_spsu=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu']):$this->mijstingere_spsu="";
(is_numeric($_POST['mijstingere_isu_tipb']))?$this->mijstingere_isu_tipb=$satinze_vars->get_string($connection,$_POST['mijstingere_isu_tipb']):$this->mijstingere_isu_tipb="";
(is_numeric($_POST['mijstingere_svsu_tipb']))?$this->mijstingere_svsu_tipb=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu_tipb']):$this->mijstingere_svsu_tipb="";
(is_numeric($_POST['mijstingere_spsu_tipb']))?$this->mijstingere_spsu_tipb=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu_tipb']):$this->mijstingere_spsu_tipb="";
(is_numeric($_POST['mijstingere_isu_tipc']))?$this->mijstingere_isu_tipc=$satinze_vars->get_string($connection,$_POST['mijstingere_isu_tipc']):$this->mijstingere_isu_tipc="";
(is_numeric($_POST['mijstingere_svsu_tipc']))?$this->mijstingere_svsu_tipc=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu_tipc']):$this->mijstingere_svsu_tipc="";
(is_numeric($_POST['mijstingere_spsu_tipc']))?$this->mijstingere_spsu_tipc=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu_tipc']):$this->mijstingere_spsu_tipc="";
(is_numeric($_POST['mijstingere_isu_tipd']))?$this->mijstingere_isu_tipd=$satinze_vars->get_string($connection,$_POST['mijstingere_isu_tipd']):$this->mijstingere_isu_tipd="";
(is_numeric($_POST['mijstingere_svsu_tipd']))?$this->mijstingere_svsu_tipd=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu_tipd']):$this->mijstingere_svsu_tipd="";
(is_numeric($_POST['mijstingere_spsu_tipd']))?$this->mijstingere_spsu_tipd=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu_tipd']):$this->mijstingere_spsu_tipd="";
(is_numeric($_POST['mijstingere_isu_tevigen']))?$this->mijstingere_isu_tevigen=$satinze_vars->get_string($connection,$_POST['mijstingere_isu_tevigen']):$this->mijstingere_isu_tevigen="";
(is_numeric($_POST['mijstingere_svsu_tevigen']))?$this->mijstingere_svsu_tevigen=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu_tevigen']):$this->mijstingere_svsu_tevigen="";
(is_numeric($_POST['mijstingere_spsu_tevigen']))?$this->mijstingere_spsu_tevigen=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu_tevigen']):$this->mijstingere_spsu_tevigen="";
(is_numeric($_POST['mijstingere_isu_refpulb']))?$this->mijstingere_isu_refpulb=$satinze_vars->get_string($connection,$_POST['mijstingere_isu_refpulb']):$this->mijstingere_isu_refpulb="";
(is_numeric($_POST['mijstingere_svsu_refpulb']))?$this->mijstingere_svsu_refpulb=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu_refpulb']):$this->mijstingere_svsu_refpulb="";
(is_numeric($_POST['mijstingere_spsu_refpulb']))?$this->mijstingere_spsu_refpulb=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu_refpulb']):$this->mijstingere_spsu_refpulb="";
(is_numeric($_POST['mijstingere_isu_autosting']))?$this->mijstingere_isu_autosting=$satinze_vars->get_string($connection,$_POST['mijstingere_isu_autosting']):$this->mijstingere_isu_autosting="";
(is_numeric($_POST['mijstingere_svsu_autosting']))?$this->mijstingere_svsu_autosting=$satinze_vars->get_string($connection,$_POST['mijstingere_svsu_autosting']):$this->mijstingere_svsu_autosting="";
(is_numeric($_POST['mijstingere_spsu_autosting']))?$this->mijstingere_spsu_autosting=$satinze_vars->get_string($connection,$_POST['mijstingere_spsu_autosting']):$this->mijstingere_spsu_autosting="";
(is_numeric($_POST['tipurgenta_multirisc_1']))?$this->tipurgenta_multirisc_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_multirisc_1']):$this->tipurgenta_multirisc_1="";
(is_numeric($_POST['tipurgenta_multirisc_2']))?$this->tipurgenta_multirisc_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_multirisc_2']):$this->tipurgenta_multirisc_2="";
(is_numeric($_POST['tipurgenta_multirisc_3']))?$this->tipurgenta_multirisc_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_multirisc_3']):$this->tipurgenta_multirisc_3="";
(is_numeric($_POST['tipurgenta_multirisc_4']))?$this->tipurgenta_multirisc_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_multirisc_4']):$this->tipurgenta_multirisc_4="";
(is_numeric($_POST['tipurgenta_multirisc_svsu']))?$this->tipurgenta_multirisc_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_multirisc_svsu']):$this->tipurgenta_multirisc_svsu="";
(is_numeric($_POST['tipurgenta_multirisc_spsu']))?$this->tipurgenta_multirisc_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_multirisc_spsu']):$this->tipurgenta_multirisc_spsu="";
(is_numeric($_POST['tipurgenta_pma2_1']))?$this->tipurgenta_pma2_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma2_1']):$this->tipurgenta_pma2_1="";
(is_numeric($_POST['tipurgenta_pma2_2']))?$this->tipurgenta_pma2_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma2_2']):$this->tipurgenta_pma2_2="";
(is_numeric($_POST['tipurgenta_pma2_3']))?$this->tipurgenta_pma2_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma2_3']):$this->tipurgenta_pma2_3="";
(is_numeric($_POST['tipurgenta_pma2_4']))?$this->tipurgenta_pma2_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma2_4']):$this->tipurgenta_pma2_4="";
(is_numeric($_POST['tipurgenta_pma2_svsu']))?$this->tipurgenta_pma2_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma2_svsu']):$this->tipurgenta_pma2_svsu="";
(is_numeric($_POST['tipurgenta_pma2_spsu']))?$this->tipurgenta_pma2_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma2_spsu']):$this->tipurgenta_pma2_spsu="";
(is_numeric($_POST['tipurgenta_pma1_1']))?$this->tipurgenta_pma1_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma1_1']):$this->tipurgenta_pma1_1="";
(is_numeric($_POST['tipurgenta_pma1_2']))?$this->tipurgenta_pma1_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma1_2']):$this->tipurgenta_pma1_2="";
(is_numeric($_POST['tipurgenta_pma1_3']))?$this->tipurgenta_pma1_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma1_3']):$this->tipurgenta_pma1_3="";
(is_numeric($_POST['tipurgenta_pma1_4']))?$this->tipurgenta_pma1_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma1_4']):$this->tipurgenta_pma1_4="";
(is_numeric($_POST['tipurgenta_pma1_svsu']))?$this->tipurgenta_pma1_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma1_svsu']):$this->tipurgenta_pma1_svsu="";
(is_numeric($_POST['tipurgenta_pma1_spsu']))?$this->tipurgenta_pma1_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_pma1_spsu']):$this->tipurgenta_pma1_spsu="";
(is_numeric($_POST['tipurgenta_asasmare_1']))?$this->tipurgenta_asasmare_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmare_1']):$this->tipurgenta_asasmare_1="";
(is_numeric($_POST['tipurgenta_asasmare_2']))?$this->tipurgenta_asasmare_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmare_2']):$this->tipurgenta_asasmare_2="";
(is_numeric($_POST['tipurgenta_asasmare_3']))?$this->tipurgenta_asasmare_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmare_3']):$this->tipurgenta_asasmare_3="";
(is_numeric($_POST['tipurgenta_asasmare_4']))?$this->tipurgenta_asasmare_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmare_4']):$this->tipurgenta_asasmare_4="";
(is_numeric($_POST['tipurgenta_asasmare_svsu']))?$this->tipurgenta_asasmare_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmare_svsu']):$this->tipurgenta_asasmare_svsu="";
(is_numeric($_POST['tipurgenta_asasmare_spsu']))?$this->tipurgenta_asasmare_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmare_spsu']):$this->tipurgenta_asasmare_spsu="";
(is_numeric($_POST['tipurgenta_asasmedie_1']))?$this->tipurgenta_asasmedie_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmedie_1']):$this->tipurgenta_asasmedie_1="";
(is_numeric($_POST['tipurgenta_asasmedie_2']))?$this->tipurgenta_asasmedie_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmedie_2']):$this->tipurgenta_asasmedie_2="";
(is_numeric($_POST['tipurgenta_asasmedie_3']))?$this->tipurgenta_asasmedie_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmedie_3']):$this->tipurgenta_asasmedie_3="";
(is_numeric($_POST['tipurgenta_asasmedie_4']))?$this->tipurgenta_asasmedie_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmedie_4']):$this->tipurgenta_asasmedie_4="";
(is_numeric($_POST['tipurgenta_asasmedie_svsu']))?$this->tipurgenta_asasmedie_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmedie_svsu']):$this->tipurgenta_asasmedie_svsu="";
(is_numeric($_POST['tipurgenta_asasmedie_spsu']))?$this->tipurgenta_asasmedie_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmedie_spsu']):$this->tipurgenta_asasmedie_spsu="";
(is_numeric($_POST['tipurgenta_asasmica_1']))?$this->tipurgenta_asasmica_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmica_1']):$this->tipurgenta_asasmica_1="";
(is_numeric($_POST['tipurgenta_asasmica_2']))?$this->tipurgenta_asasmica_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmica_2']):$this->tipurgenta_asasmica_2="";
(is_numeric($_POST['tipurgenta_asasmica_3']))?$this->tipurgenta_asasmica_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmica_3']):$this->tipurgenta_asasmica_3="";
(is_numeric($_POST['tipurgenta_asasmica_4']))?$this->tipurgenta_asasmica_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmica_4']):$this->tipurgenta_asasmica_4="";
(is_numeric($_POST['tipurgenta_asasmica_svsu']))?$this->tipurgenta_asasmica_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmica_svsu']):$this->tipurgenta_asasmica_svsu="";
(is_numeric($_POST['tipurgenta_asasmica_spsu']))?$this->tipurgenta_asasmica_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asasmica_spsu']):$this->tipurgenta_asasmica_spsu="";
(is_numeric($_POST['tipurgenta_alteasas_1']))?$this->tipurgenta_alteasas_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteasas_1']):$this->tipurgenta_alteasas_1="";
(is_numeric($_POST['tipurgenta_alteasas_2']))?$this->tipurgenta_alteasas_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteasas_2']):$this->tipurgenta_alteasas_2="";
(is_numeric($_POST['tipurgenta_alteasas_3']))?$this->tipurgenta_alteasas_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteasas_3']):$this->tipurgenta_alteasas_3="";
(is_numeric($_POST['tipurgenta_alteasas_4']))?$this->tipurgenta_alteasas_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteasas_4']):$this->tipurgenta_alteasas_4="";
(is_numeric($_POST['tipurgenta_alteasas_svsu']))?$this->tipurgenta_alteasas_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteasas_svsu']):$this->tipurgenta_alteasas_svsu="";
(is_numeric($_POST['tipurgenta_alteasas_spsu']))?$this->tipurgenta_alteasas_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteasas_spsu']):$this->tipurgenta_alteasas_spsu="";
(is_numeric($_POST['tipurgenta_aisi_1']))?$this->tipurgenta_aisi_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_aisi_1']):$this->tipurgenta_aisi_1="";
(is_numeric($_POST['tipurgenta_aisi_2']))?$this->tipurgenta_aisi_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_aisi_2']):$this->tipurgenta_aisi_2="";
(is_numeric($_POST['tipurgenta_aisi_3']))?$this->tipurgenta_aisi_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_aisi_3']):$this->tipurgenta_aisi_3="";
(is_numeric($_POST['tipurgenta_aisi_4']))?$this->tipurgenta_aisi_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_aisi_4']):$this->tipurgenta_aisi_4="";
(is_numeric($_POST['tipurgenta_aisi_svsu']))?$this->tipurgenta_aisi_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aisi_svsu']):$this->tipurgenta_aisi_svsu="";
(is_numeric($_POST['tipurgenta_aisi_spsu']))?$this->tipurgenta_aisi_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aisi_spsu']):$this->tipurgenta_aisi_spsu="";
(is_numeric($_POST['tipurgenta_aspfgi_1']))?$this->tipurgenta_aspfgi_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspfgi_1']):$this->tipurgenta_aspfgi_1="";
(is_numeric($_POST['tipurgenta_aspfgi_2']))?$this->tipurgenta_aspfgi_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspfgi_2']):$this->tipurgenta_aspfgi_2="";
(is_numeric($_POST['tipurgenta_aspfgi_3']))?$this->tipurgenta_aspfgi_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspfgi_3']):$this->tipurgenta_aspfgi_3="";
(is_numeric($_POST['tipurgenta_aspfgi_4']))?$this->tipurgenta_aspfgi_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspfgi_4']):$this->tipurgenta_aspfgi_4="";
(is_numeric($_POST['tipurgenta_aspfgi_svsu']))?$this->tipurgenta_aspfgi_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspfgi_svsu']):$this->tipurgenta_aspfgi_svsu="";
(is_numeric($_POST['tipurgenta_aspfgi_spsu']))?$this->tipurgenta_aspfgi_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspfgi_spsu']):$this->tipurgenta_aspfgi_spsu="";
(is_numeric($_POST['tipurgenta_aservamop_1']))?$this->tipurgenta_aservamop_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_aservamop_1']):$this->tipurgenta_aservamop_1="";
(is_numeric($_POST['tipurgenta_aservamop_2']))?$this->tipurgenta_aservamop_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_aservamop_2']):$this->tipurgenta_aservamop_2="";
(is_numeric($_POST['tipurgenta_aservamop_3']))?$this->tipurgenta_aservamop_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_aservamop_3']):$this->tipurgenta_aservamop_3="";
(is_numeric($_POST['tipurgenta_aservamop_4']))?$this->tipurgenta_aservamop_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_aservamop_4']):$this->tipurgenta_aservamop_4="";
(is_numeric($_POST['tipurgenta_aservamop_svsu']))?$this->tipurgenta_aservamop_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aservamop_svsu']):$this->tipurgenta_aservamop_svsu="";
(is_numeric($_POST['tipurgenta_aservamop_spsu']))?$this->tipurgenta_aservamop_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aservamop_spsu']):$this->tipurgenta_aservamop_spsu="";
(is_numeric($_POST['tipurgenta_crbnadp_1']))?$this->tipurgenta_crbnadp_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_crbnadp_1']):$this->tipurgenta_crbnadp_1="";
(is_numeric($_POST['tipurgenta_crbnadp_2']))?$this->tipurgenta_crbnadp_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_crbnadp_2']):$this->tipurgenta_crbnadp_2="";
(is_numeric($_POST['tipurgenta_crbnadp_3']))?$this->tipurgenta_crbnadp_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_crbnadp_3']):$this->tipurgenta_crbnadp_3="";
(is_numeric($_POST['tipurgenta_crbnadp_4']))?$this->tipurgenta_crbnadp_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_crbnadp_4']):$this->tipurgenta_crbnadp_4="";
(is_numeric($_POST['tipurgenta_crbnadp_svsu']))?$this->tipurgenta_crbnadp_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_crbnadp_svsu']):$this->tipurgenta_crbnadp_svsu="";
(is_numeric($_POST['tipurgenta_crbnadp_spsu']))?$this->tipurgenta_crbnadp_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_crbnadp_spsu']):$this->tipurgenta_crbnadp_spsu="";
(is_numeric($_POST['tipurgenta_aci_1']))?$this->tipurgenta_aci_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_aci_1']):$this->tipurgenta_aci_1="";
(is_numeric($_POST['tipurgenta_aci_2']))?$this->tipurgenta_aci_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_aci_2']):$this->tipurgenta_aci_2="";
(is_numeric($_POST['tipurgenta_aci_3']))?$this->tipurgenta_aci_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_aci_3']):$this->tipurgenta_aci_3="";
(is_numeric($_POST['tipurgenta_aci_4']))?$this->tipurgenta_aci_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_aci_4']):$this->tipurgenta_aci_4="";
(is_numeric($_POST['tipurgenta_aci_svsu']))?$this->tipurgenta_aci_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aci_svsu']):$this->tipurgenta_aci_svsu="";
(is_numeric($_POST['tipurgenta_aci_spsu']))?$this->tipurgenta_aci_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aci_spsu']):$this->tipurgenta_aci_spsu="";
(is_numeric($_POST['tipurgenta_aspscaf_1']))?$this->tipurgenta_aspscaf_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspscaf_1']):$this->tipurgenta_aspscaf_1="";
(is_numeric($_POST['tipurgenta_aspscaf_2']))?$this->tipurgenta_aspscaf_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspscaf_2']):$this->tipurgenta_aspscaf_2="";
(is_numeric($_POST['tipurgenta_aspscaf_3']))?$this->tipurgenta_aspscaf_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspscaf_3']):$this->tipurgenta_aspscaf_3="";
(is_numeric($_POST['tipurgenta_aspscaf_4']))?$this->tipurgenta_aspscaf_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspscaf_4']):$this->tipurgenta_aspscaf_4="";
(is_numeric($_POST['tipurgenta_aspscaf_svsu']))?$this->tipurgenta_aspscaf_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspscaf_svsu']):$this->tipurgenta_aspscaf_svsu="";
(is_numeric($_POST['tipurgenta_aspscaf_spsu']))?$this->tipurgenta_aspscaf_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_aspscaf_spsu']):$this->tipurgenta_aspscaf_spsu="";
(is_numeric($_POST['tipurgenta_barcisalupe_1']))?$this->tipurgenta_barcisalupe_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_barcisalupe_1']):$this->tipurgenta_barcisalupe_1="";
(is_numeric($_POST['tipurgenta_barcisalupe_2']))?$this->tipurgenta_barcisalupe_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_barcisalupe_2']):$this->tipurgenta_barcisalupe_2="";
(is_numeric($_POST['tipurgenta_barcisalupe_3']))?$this->tipurgenta_barcisalupe_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_barcisalupe_3']):$this->tipurgenta_barcisalupe_3="";
(is_numeric($_POST['tipurgenta_barcisalupe_4']))?$this->tipurgenta_barcisalupe_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_barcisalupe_4']):$this->tipurgenta_barcisalupe_4="";
(is_numeric($_POST['tipurgenta_barcisalupe_svsu']))?$this->tipurgenta_barcisalupe_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_barcisalupe_svsu']):$this->tipurgenta_barcisalupe_svsu="";
(is_numeric($_POST['tipurgenta_barcisalupe_spsu']))?$this->tipurgenta_barcisalupe_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_barcisalupe_spsu']):$this->tipurgenta_barcisalupe_spsu="";
(is_numeric($_POST['tipurgenta_afzm_1']))?$this->tipurgenta_afzm_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_afzm_1']):$this->tipurgenta_afzm_1="";
(is_numeric($_POST['tipurgenta_afzm_2']))?$this->tipurgenta_afzm_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_afzm_2']):$this->tipurgenta_afzm_2="";
(is_numeric($_POST['tipurgenta_afzm_3']))?$this->tipurgenta_afzm_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_afzm_3']):$this->tipurgenta_afzm_3="";
(is_numeric($_POST['tipurgenta_afzm_4']))?$this->tipurgenta_afzm_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_afzm_4']):$this->tipurgenta_afzm_4="";
(is_numeric($_POST['tipurgenta_afzm_svsu']))?$this->tipurgenta_afzm_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_afzm_svsu']):$this->tipurgenta_afzm_svsu="";
(is_numeric($_POST['tipurgenta_afzm_spsu']))?$this->tipurgenta_afzm_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_afzm_spsu']):$this->tipurgenta_afzm_spsu="";
(is_numeric($_POST['tipurgenta_ambulante_1']))?$this->tipurgenta_ambulante_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_ambulante_1']):$this->tipurgenta_ambulante_1="";
(is_numeric($_POST['tipurgenta_ambulante_2']))?$this->tipurgenta_ambulante_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_ambulante_2']):$this->tipurgenta_ambulante_2="";
(is_numeric($_POST['tipurgenta_ambulante_3']))?$this->tipurgenta_ambulante_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_ambulante_3']):$this->tipurgenta_ambulante_3="";
(is_numeric($_POST['tipurgenta_ambulante_4']))?$this->tipurgenta_ambulante_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_ambulante_4']):$this->tipurgenta_ambulante_4="";
(is_numeric($_POST['tipurgenta_ambulante_svsu']))?$this->tipurgenta_ambulante_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_ambulante_svsu']):$this->tipurgenta_ambulante_svsu="";
(is_numeric($_POST['tipurgenta_ambulante_spsu']))?$this->tipurgenta_ambulante_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_ambulante_spsu']):$this->tipurgenta_ambulante_spsu="";
(is_numeric($_POST['tipurgenta_descarc_1']))?$this->tipurgenta_descarc_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_descarc_1']):$this->tipurgenta_descarc_1="";
(is_numeric($_POST['tipurgenta_descarc_2']))?$this->tipurgenta_descarc_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_descarc_2']):$this->tipurgenta_descarc_2="";
(is_numeric($_POST['tipurgenta_descarc_3']))?$this->tipurgenta_descarc_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_descarc_3']):$this->tipurgenta_descarc_3="";
(is_numeric($_POST['tipurgenta_descarc_4']))?$this->tipurgenta_descarc_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_descarc_4']):$this->tipurgenta_descarc_4="";
(is_numeric($_POST['tipurgenta_descarc_svsu']))?$this->tipurgenta_descarc_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_descarc_svsu']):$this->tipurgenta_descarc_svsu="";
(is_numeric($_POST['tipurgenta_descarc_spsu']))?$this->tipurgenta_descarc_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_descarc_spsu']):$this->tipurgenta_descarc_spsu="";
(is_numeric($_POST['tipurgenta_asptransportapa_1']))?$this->tipurgenta_asptransportapa_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_asptransportapa_1']):$this->tipurgenta_asptransportapa_1="";
(is_numeric($_POST['tipurgenta_asptransportapa_2']))?$this->tipurgenta_asptransportapa_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_asptransportapa_2']):$this->tipurgenta_asptransportapa_2="";
(is_numeric($_POST['tipurgenta_asptransportapa_3']))?$this->tipurgenta_asptransportapa_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_asptransportapa_3']):$this->tipurgenta_asptransportapa_3="";
(is_numeric($_POST['tipurgenta_asptransportapa_4']))?$this->tipurgenta_asptransportapa_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_asptransportapa_4']):$this->tipurgenta_asptransportapa_4="";
(is_numeric($_POST['tipurgenta_asptransportapa_svsu']))?$this->tipurgenta_asptransportapa_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asptransportapa_svsu']):$this->tipurgenta_asptransportapa_svsu="";
(is_numeric($_POST['tipurgenta_asptransportapa_spsu']))?$this->tipurgenta_asptransportapa_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_asptransportapa_spsu']):$this->tipurgenta_asptransportapa_spsu="";
(is_numeric($_POST['tipurgenta_mptmpr_1']))?$this->tipurgenta_mptmpr_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_mptmpr_1']):$this->tipurgenta_mptmpr_1="";
(is_numeric($_POST['tipurgenta_mptmpr_2']))?$this->tipurgenta_mptmpr_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_mptmpr_2']):$this->tipurgenta_mptmpr_2="";
(is_numeric($_POST['tipurgenta_mptmpr_3']))?$this->tipurgenta_mptmpr_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_mptmpr_3']):$this->tipurgenta_mptmpr_3="";
(is_numeric($_POST['tipurgenta_mptmpr_4']))?$this->tipurgenta_mptmpr_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_mptmpr_4']):$this->tipurgenta_mptmpr_4="";
(is_numeric($_POST['tipurgenta_mptmpr_svsu']))?$this->tipurgenta_mptmpr_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_mptmpr_svsu']):$this->tipurgenta_mptmpr_svsu="";
(is_numeric($_POST['tipurgenta_mptmpr_spsu']))?$this->tipurgenta_mptmpr_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_mptmpr_spsu']):$this->tipurgenta_mptmpr_spsu="";
(is_numeric($_POST['tipurgenta_alteautospeciale_1']))?$this->tipurgenta_alteautospeciale_1=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteautospeciale_1']):$this->tipurgenta_alteautospeciale_1="";
(is_numeric($_POST['tipurgenta_alteautospeciale_2']))?$this->tipurgenta_alteautospeciale_2=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteautospeciale_2']):$this->tipurgenta_alteautospeciale_2="";
(is_numeric($_POST['tipurgenta_alteautospeciale_3']))?$this->tipurgenta_alteautospeciale_3=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteautospeciale_3']):$this->tipurgenta_alteautospeciale_3="";
(is_numeric($_POST['tipurgenta_alteautospeciale_4']))?$this->tipurgenta_alteautospeciale_4=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteautospeciale_4']):$this->tipurgenta_alteautospeciale_4="";
(is_numeric($_POST['tipurgenta_alteautospeciale_svsu']))?$this->tipurgenta_alteautospeciale_svsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteautospeciale_svsu']):$this->tipurgenta_alteautospeciale_svsu="";
(is_numeric($_POST['tipurgenta_alteautospeciale_spsu']))?$this->tipurgenta_alteautospeciale_spsu=$satinze_vars->get_string($connection,$_POST['tipurgenta_alteautospeciale_spsu']):$this->tipurgenta_alteautospeciale_spsu="";
(is_numeric($_POST['pers_salvate_adulti']))?$this->pers_salvate_adulti=$satinze_vars->get_string($connection,$_POST['pers_salvate_adulti']):$this->pers_salvate_adulti="";
(is_numeric($_POST['pers_salvate_copii']))?$this->pers_salvate_copii=$satinze_vars->get_string($connection,$_POST['pers_salvate_copii']):$this->pers_salvate_copii="";
(is_numeric($_POST['pers_evacuate_adulti']))?$this->pers_evacuate_adulti=$satinze_vars->get_string($connection,$_POST['pers_evacuate_adulti']):$this->pers_evacuate_adulti="";
(is_numeric($_POST['pers_evacuate_copii']))?$this->pers_evacuate_copii=$satinze_vars->get_string($connection,$_POST['pers_evacuate_copii']):$this->pers_evacuate_copii="";
(is_numeric($_POST['deces_altesit_altep']))?$this->deces_altesit_altep=$satinze_vars->get_string($connection,$_POST['deces_altesit_altep']):$this->deces_altesit_altep="";
(is_numeric($_POST['deces_altesit_copii']))?$this->deces_altesit_copii=$satinze_vars->get_string($connection,$_POST['deces_altesit_copii']):$this->deces_altesit_copii="";
(is_numeric($_POST['deces_altesit_isu']))?$this->deces_altesit_isu=$satinze_vars->get_string($connection,$_POST['deces_altesit_isu']):$this->deces_altesit_isu="";
(is_numeric($_POST['deces_altesit_svsu']))?$this->deces_altesit_svsu=$satinze_vars->get_string($connection,$_POST['deces_altesit_svsu']):$this->deces_altesit_svsu="";
(is_numeric($_POST['deces_ars_altep']))?$this->deces_ars_altep=$satinze_vars->get_string($connection,$_POST['deces_ars_altep']):$this->deces_ars_altep="";
(is_numeric($_POST['deces_ars_copii']))?$this->deces_ars_copii=$satinze_vars->get_string($connection,$_POST['deces_ars_copii']):$this->deces_ars_copii="";
(is_numeric($_POST['deces_ars_isu']))?$this->deces_ars_isu=$satinze_vars->get_string($connection,$_POST['deces_ars_isu']):$this->deces_ars_isu="";
(is_numeric($_POST['deces_ars_svsu']))?$this->deces_ars_svsu=$satinze_vars->get_string($connection,$_POST['deces_ars_svsu']):$this->deces_ars_svsu="";
(is_numeric($_POST['deces_asfix_altep']))?$this->deces_asfix_altep=$satinze_vars->get_string($connection,$_POST['deces_asfix_altep']):$this->deces_asfix_altep="";
(is_numeric($_POST['deces_asfix_copii']))?$this->deces_asfix_copii=$satinze_vars->get_string($connection,$_POST['deces_asfix_copii']):$this->deces_asfix_copii="";
(is_numeric($_POST['deces_asfix_isu']))?$this->deces_asfix_isu=$satinze_vars->get_string($connection,$_POST['deces_asfix_isu']):$this->deces_asfix_isu="";
(is_numeric($_POST['deces_asfix_svsu']))?$this->deces_asfix_svsu=$satinze_vars->get_string($connection,$_POST['deces_asfix_svsu']):$this->deces_asfix_svsu="";
(is_numeric($_POST['ranit_altesit_copii']))?$this->ranit_altesit_copii=$satinze_vars->get_string($connection,$_POST['ranit_altesit_copii']):$this->ranit_altesit_copii="";
(is_numeric($_POST['ranit_altesit_isu']))?$this->ranit_altesit_isu=$satinze_vars->get_string($connection,$_POST['ranit_altesit_isu']):$this->ranit_altesit_isu="";
(is_numeric($_POST['ranit_altesit_svsu']))?$this->ranit_altesit_svsu=$satinze_vars->get_string($connection,$_POST['ranit_altesit_svsu']):$this->ranit_altesit_svsu="";
(is_numeric($_POST['ranit_altesit_altep']))?$this->ranit_altesitx_altep=$satinze_vars->get_string($connection,$_POST['ranit_altesit_altep']):$this->ranit_altesitx_altep="";
(is_numeric($_POST['ranit_ars_altep']))?$this->ranit_ars_altep=$satinze_vars->get_string($connection,$_POST['ranit_ars_altep']):$this->ranit_ars_altep="";
(is_numeric($_POST['ranit_ars_copii']))?$this->ranit_ars_copii=$satinze_vars->get_string($connection,$_POST['ranit_ars_copii']):$this->ranit_ars_copii="";
(is_numeric($_POST['ranit_ars_isu']))?$this->ranit_ars_isu=$satinze_vars->get_string($connection,$_POST['ranit_ars_isu']):$this->ranit_ars_isu="";
(is_numeric($_POST['ranit_ars_svsu']))?$this->ranit_ars_svsu=$satinze_vars->get_string($connection,$_POST['ranit_ars_svsu']):$this->ranit_ars_svsu="";
(is_numeric($_POST['ranit_asfix_altep']))?$this->ranit_asfix_altep=$satinze_vars->get_string($connection,$_POST['ranit_asfix_altep']):$this->ranit_asfix_altep="";
(is_numeric($_POST['ranit_asfix_copii']))?$this->ranit_asfix_copii=$satinze_vars->get_string($connection,$_POST['ranit_asfix_copii']):$this->ranit_asfix_copii="";
(is_numeric($_POST['ranit_asfix_isu']))?$this->ranit_asfix_isu=$satinze_vars->get_string($connection,$_POST['ranit_asfix_isu']):$this->ranit_asfix_isu="";
(is_numeric($_POST['ranit_asfix_svsu']))?$this->ranit_asfix_svsu=$satinze_vars->get_string($connection,$_POST['ranit_asfix_svsu']):$this->ranit_asfix_svsu="";
(is_numeric($_POST['deced06']))?$this->deced06=$satinze_vars->get_string($connection,$_POST['deced06']):$this->deced06="";
(is_numeric($_POST['deced25']))?$this->deced25=$satinze_vars->get_string($connection,$_POST['deced25']):$this->deced25="";
(is_numeric($_POST['deced55']))?$this->deced55=$satinze_vars->get_string($connection,$_POST['deced55']):$this->deced55="";
(is_numeric($_POST['deced70']))?$this->deced70=$satinze_vars->get_string($connection,$_POST['deced70']):$this->deced70="";
(is_numeric($_POST['deced71']))?$this->deced71=$satinze_vars->get_string($connection,$_POST['deced71']):$this->deced71="";
(is_numeric($_POST['deced714']))?$this->deced714=$satinze_vars->get_string($connection,$_POST['deced714']):$this->deced714="";
(is_numeric($_POST['ranit06']))?$this->ranit06=$satinze_vars->get_string($connection,$_POST['ranit06']):$this->ranit06="";
(is_numeric($_POST['ranit25']))?$this->ranit25=$satinze_vars->get_string($connection,$_POST['ranit25']):$this->ranit25="";
(is_numeric($_POST['ranit55']))?$this->ranit55=$satinze_vars->get_string($connection,$_POST['ranit55']):$this->ranit55="";
(is_numeric($_POST['ranit70']))?$this->ranit70=$satinze_vars->get_string($connection,$_POST['ranit70']):$this->ranit70="";
(is_numeric($_POST['ranit71']))?$this->ranit71=$satinze_vars->get_string($connection,$_POST['ranit71']):$this->ranit71="";
(is_numeric($_POST['ranit714']))?$this->ranit714=$satinze_vars->get_string($connection,$_POST['ranit714']):$this->ranit714="";
(is_numeric($_POST['contam06']))?$this->contam06=$satinze_vars->get_string($connection,$_POST['contam06']):$this->contam06="";
(is_numeric($_POST['contam25']))?$this->contam25=$satinze_vars->get_string($connection,$_POST['contam25']):$this->contam25="";
(is_numeric($_POST['contam55']))?$this->contam55=$satinze_vars->get_string($connection,$_POST['contam55']):$this->contam55="";
(is_numeric($_POST['contam70']))?$this->contam70=$satinze_vars->get_string($connection,$_POST['contam70']):$this->contam70="";
(is_numeric($_POST['contam71']))?$this->contam71=$satinze_vars->get_string($connection,$_POST['contam71']):$this->contam71="";

(is_numeric($_POST['gradcontamin']))?$this->gradcontamin=$satinze_vars->get_string($connection,$_POST['gradcontamin']):$this->gradcontamin="";

(is_numeric($_POST['contam714']))?$this->contam714=$satinze_vars->get_string($connection,$_POST['contam714']):$this->contam714="";
(is_numeric($_POST['anim_mari_contam']))?$this->anim_mari_contam=$satinze_vars->get_string($connection,$_POST['anim_mari_contam']):$this->anim_mari_contam="";
(is_numeric($_POST['anim_mari_moarte']))?$this->anim_mari_moarte=$satinze_vars->get_string($connection,$_POST['anim_mari_moarte']):$this->anim_mari_moarte="";
(is_numeric($_POST['anim_mari_ranite']))?$this->anim_mari_ranite=$satinze_vars->get_string($connection,$_POST['anim_mari_ranite']):$this->anim_mari_ranite="";
(is_numeric($_POST['anim_mici_contam']))?$this->anim_mici_contam=$satinze_vars->get_string($connection,$_POST['anim_mici_contam']):$this->anim_mici_contam="";
(is_numeric($_POST['anim_mici_moarte']))?$this->anim_mici_moarte=$satinze_vars->get_string($connection,$_POST['anim_mici_moarte']):$this->anim_mici_moarte="";
(is_numeric($_POST['anim_mici_ranite']))?$this->anim_mici_ranite=$satinze_vars->get_string($connection,$_POST['anim_mici_ranite']):$this->anim_mici_ranite="";
(is_numeric($_POST['anim_pasari_contam']))?$this->anim_pasari_contam=$satinze_vars->get_string($connection,$_POST['anim_pasari_contam']):$this->anim_pasari_contam="";
(is_numeric($_POST['anim_pasari_moarte']))?$this->anim_pasari_moarte=$satinze_vars->get_string($connection,$_POST['anim_pasari_moarte']):$this->anim_pasari_moarte="";
(is_numeric($_POST['anim_pasari_ranite']))?$this->anim_pasari_ranite=$satinze_vars->get_string($connection,$_POST['anim_pasari_ranite']):$this->anim_pasari_ranite="";
(is_numeric($_POST['munitie_asanat_bombe_artilerie']))?$this->munitie_asanat_bombe_artilerie=$satinze_vars->get_string($connection,$_POST['munitie_asanat_bombe_artilerie']):$this->munitie_asanat_bombe_artilerie="";
(is_numeric($_POST['munitie_asanat_grenade']))?$this->munitie_asanat_grenade=$satinze_vars->get_string($connection,$_POST['munitie_asanat_grenade']):$this->munitie_asanat_grenade="";
(is_numeric($_POST['munitie_asanat_grenade_defens']))?$this->munitie_asanat_grenade_defens=$satinze_vars->get_string($connection,$_POST['munitie_asanat_grenade_defens']):$this->munitie_asanat_grenade_defens="";
(is_numeric($_POST['munitie_asanat_proiectil']))?$this->munitie_asanat_proiectil=$satinze_vars->get_string($connection,$_POST['munitie_asanat_proiectil']):$this->munitie_asanat_proiectil="";
(is_numeric($_POST['bombe_aviatie']))?$this->bombe_aviatie=$satinze_vars->get_string($connection,$_POST['bombe_aviatie']):$this->bombe_aviatie="";
(is_numeric($_POST['mine_antitanc']))?$this->mine_antitanc=$satinze_vars->get_string($connection,$_POST['mine_antitanc']):$this->mine_antitanc="";
(is_numeric($_POST['mine_antipers']))?$this->mine_antipers=$satinze_vars->get_string($connection,$_POST['mine_antipers']):$this->mine_antipers="";
(is_numeric($_POST['mine_marine']))?$this->mine_marine=$satinze_vars->get_string($connection,$_POST['mine_marine']):$this->mine_marine="";
(is_numeric($_POST['aruncator_gren']))?$this->aruncator_gren=$satinze_vars->get_string($connection,$_POST['aruncator_gren']):$this->aruncator_gren="";
(is_numeric($_POST['muninfanterie']))?$this->muninfanterie=$satinze_vars->get_string($connection,$_POST['muninfanterie']):$this->muninfanterie="";
(is_numeric($_POST['alte_munitii']))?$this->alte_munitii=$satinze_vars->get_string($connection,$_POST['alte_munitii']):$this->alte_munitii="";
(is_numeric($_POST['val_distr']))?$this->val_distr=$satinze_vars->get_string($connection,$_POST['val_distr']):$this->val_distr="";
(is_numeric($_POST['val_salv']))?$this->val_salv=$satinze_vars->get_string($connection,$_POST['val_salv']):$this->val_salv="";
((is_numeric($_POST['cod_sursa_probabila']))&&(!($_POST['cod_sursa_probabila']<0)&&!($_POST['cod_sursa_probabila']>16)))?$this->sursa_probabila=$satinze_vars->get_string($connection,$_POST['cod_sursa_probabila']):$this->sursa_probabila="";
((is_numeric($_POST['cod_mijloc_producere']))&&(!($_POST['cod_mijloc_producere']<0)&&!($_POST['cod_mijloc_producere']>143)))?$this->mijloc_producere=$satinze_vars->get_string($connection,$_POST['cod_mijloc_producere']):$this->mijloc_producere="";
((is_numeric($_POST['cod_primul_mat_ars']))&&(!($_POST['cod_primul_mat_ars']<0)&&!($_POST['cod_primul_mat_ars']>59)))?$this->primul_mat_ars=$satinze_vars->get_string($connection,$_POST['cod_primul_mat_ars']):$this->primul_mat_ars="";
((is_numeric($_POST['cod_imprejur_determ']))&&(!($_POST['cod_imprejur_determ']<0)&&!($_POST['cod_imprejur_determ']>117)))?$this->imprejur_determ=$satinze_vars->get_string($connection,$_POST['cod_imprejur_determ']):$this->imprejur_determ="";
((is_numeric($_POST['despreob1']))&&(!($_POST['despreob1']<0)&&!($_POST['despreob1']>2)))?$this->despreob1=$satinze_vars->get_string($connection,$_POST['despreob1']):$this->despreob1="";
((is_numeric($_POST['despreob2']))&&(!($_POST['despreob2']<0)&&!($_POST['despreob2']>2)))?$this->despreob2=$satinze_vars->get_string($connection,$_POST['despreob2']):$this->despreob2="";
((is_numeric($_POST['despreob3']))&&(!($_POST['despreob3']<0)&&!($_POST['despreob3']>2)))?$this->despreob3=$satinze_vars->get_string($connection,$_POST['despreob3']):$this->despreob3="";
((is_numeric($_POST['despreob4']))&&(!($_POST['despreob4']<0)&&!($_POST['despreob4']>2)))?$this->despreob4=$satinze_vars->get_string($connection,$_POST['despreob4']):$this->despreob4="";
((is_numeric($_POST['despreob5']))&&(!($_POST['despreob5']<0)&&!($_POST['despreob5']>2)))?$this->despreob5=$satinze_vars->get_string($connection,$_POST['despreob5']):$this->despreob5="";
((is_numeric($_POST['despreob6']))&&(!($_POST['despreob6']<0)&&!($_POST['despreob6']>2)))?$this->despreob6=$satinze_vars->get_string($connection,$_POST['despreob6']):$this->despreob6="";
((is_numeric($_POST['despreob7']))&&(!($_POST['despreob7']<0)&&!($_POST['despreob7']>2)))?$this->despreob7=$satinze_vars->get_string($connection,$_POST['despreob7']):$this->despreob7="";
$this->codsubst1=$satinze_vars->get_string($connection,$_POST['codsubst1']);
$this->codsubst2=$satinze_vars->get_string($connection,$_POST['codsubst2']);
$this->codsubst3=$satinze_vars->get_string($connection,$_POST['codsubst3']);
$this->codsubst4=$satinze_vars->get_string($connection,$_POST['codsubst4']);
$this->numesubst1=$satinze_vars->get_string($connection,$_POST['numesubst1']);
$this->numesubst2=$satinze_vars->get_string($connection,$_POST['numesubst2']);
$this->numesubst3=$satinze_vars->get_string($connection,$_POST['numesubst3']);
$this->numesubst4=$satinze_vars->get_string($connection,$_POST['numesubst4']);
$this->codpericol1=$satinze_vars->get_string($connection,$_POST['codpericol1']);
$this->codpericol2=$satinze_vars->get_string($connection,$_POST['codpericol2']);
$this->codpericol3=$satinze_vars->get_string($connection,$_POST['codpericol3']);
$this->codpericol4=$satinze_vars->get_string($connection,$_POST['codpericol4']);
(!empty($_POST['elib_subst_apa']))?$this->elib_subst_apa=1:$this->elib_subst_apa=0;
(!empty($_POST['elib_subst_aer']))?$this->elib_subst_aer=1:$this->elib_subst_aer=0;
(!empty($_POST['elib_subst_sol']))?$this->elib_subst_sol=1:$this->elib_subst_sol=0;
$this->tip_radionuclid = $satinze_vars->get_string($connection,$_POST['tip_radionuclid']);
(!empty($_POST['act_sursei']))?$this->act_sursei=$satinze_vars->get_string($connection,$_POST['act_sursei']):$this->act_sursei="";
(is_numeric($_POST['debit_doza']))?$this->debit_doza=$satinze_vars->get_string($connection,$_POST['debit_doza']):$this->debit_doza="";
$this->introduceti_caract_sursa=$satinze_vars->get_string($connection,$_POST['introduceti_caract_sursa']);
$this->alte_masuri_protective=$satinze_vars->get_string($connection,$_POST['alte_masuri_protective']);
$this->introduceti_contramasuri=$satinze_vars->get_string($connection,$_POST['introduceti_contramasuri']);
$this->introduceti_contramasuri_scurt=$satinze_vars->get_string($connection,$_POST['introduceti_contramasuri_scurt']);
$this->introduceti_anticip_sever=$satinze_vars->get_string($connection,$_POST['introduceti_anticip_sever']);
$this->introduceti_evol_inciden=$satinze_vars->get_string($connection,$_POST['introduceti_evol_inciden']);
$this->introduceti_consecinte_even=$satinze_vars->get_string($connection,$_POST['introduceti_consecinte_even']);
$this->introduceti_date_suplimentare=$satinze_vars->get_string($connection,$_POST['introduceti_date_suplimentare']);
(is_numeric($_POST['zonademortalitate']))?$this->zonademortalitate=$satinze_vars->get_string($connection,$_POST['zonademortalitate']):$this->zonademortalitate="";
(is_numeric($_POST['distanta_adapostire']))?$this->distanta_adapostire=$satinze_vars->get_string($connection,$_POST['distanta_adapostire']):$this->distanta_adapostire="";
(is_numeric($_POST['zonadeintoxicatie']))?$this->zonadeintoxicatie=$satinze_vars->get_string($connection,$_POST['zonadeintoxicatie']):$this->zonadeintoxicatie="";
(is_numeric($_POST['distanta_evacuare']))?$this->distanta_evacuare=$satinze_vars->get_string($connection,$_POST['distanta_evacuare']):$this->distanta_evacuare="";
((is_numeric($_POST['profilaxiacuiod']))&&(!($_POST['profilaxiacuiod']<1)&&!($_POST['profilaxiacuiod']>2)))?$this->profilaxiacuiod=$satinze_vars->get_string($connection,$_POST['profilaxiacuiod']):$this->profilaxiacuiod="";
(!empty($_POST['restrictiialimente1']))?$this->restrictiialimente1=1:$this->restrictiialimente1=0;
(!empty($_POST['restrictiialimente2']))?$this->restrictiialimente2=1:$this->restrictiialimente2=0;
(!empty($_POST['restrictiialimente3']))?$this->restrictiialimente3=1:$this->restrictiialimente3=0;
(!empty($_POST['restrictiialimente4']))?$this->restrictiialimente4=1:$this->restrictiialimente4=0;
(!empty($_POST['restrictiialimente5']))?$this->restrictiialimente5=1:$this->restrictiialimente5=0;
(!empty($_POST['restrictiialimente6']))?$this->restrictiialimente6=1:$this->restrictiialimente6=0;
(is_numeric($_POST['dozaacumulata']))?$this->dozaacumulata=$satinze_vars->get_string($connection,$_POST['dozaacumulata']):$this->dozaacumulata="";
(is_numeric($_POST['distanta1']))?$this->distanta1=$satinze_vars->get_string($connection,$_POST['distanta1']):$this->distanta1="";
(is_numeric($_POST['distanta2']))?$this->distanta2=$satinze_vars->get_string($connection,$_POST['distanta2']):$this->distanta2="";
(is_numeric($_POST['distanta3']))?$this->distanta3=$satinze_vars->get_string($connection,$_POST['distanta3']):$this->distanta3="";
(is_numeric($_POST['distanta4']))?$this->distanta4=$satinze_vars->get_string($connection,$_POST['distanta4']):$this->distanta4="";
(is_numeric($_POST['distanta5']))?$this->distanta5=$satinze_vars->get_string($connection,$_POST['distanta5']):$this->distanta5="";
(is_numeric($_POST['distanta6']))?$this->distanta6=$satinze_vars->get_string($connection,$_POST['distanta6']):$this->distanta6="";
(is_numeric($_POST['distanta7']))?$this->distanta7=$satinze_vars->get_string($connection,$_POST['distanta7']):$this->distanta7="";
(is_numeric($_POST['distanta8']))?$this->distanta8=$satinze_vars->get_string($connection,$_POST['distanta8']):$this->distanta8="";
(is_numeric($_POST['doza1']))?$this->doza1=$satinze_vars->get_string($connection,$_POST['doza1']):$this->doza1="";
(is_numeric($_POST['doza2']))?$this->doza2=$satinze_vars->get_string($connection,$_POST['doza2']):$this->doza2="";
(is_numeric($_POST['doza3']))?$this->doza3=$satinze_vars->get_string($connection,$_POST['doza3']):$this->doza3="";
(is_numeric($_POST['doza4']))?$this->doza4=$satinze_vars->get_string($connection,$_POST['doza4']):$this->doza4="";
(is_numeric($_POST['doza5']))?$this->doza5=$satinze_vars->get_string($connection,$_POST['doza5']):$this->doza5="";
(is_numeric($_POST['doza6']))?$this->doza6=$satinze_vars->get_string($connection,$_POST['doza6']):$this->doza6="";
(is_numeric($_POST['doza7']))?$this->doza7=$satinze_vars->get_string($connection,$_POST['doza7']):$this->doza7="";
(is_numeric($_POST['doza8']))?$this->doza8=$satinze_vars->get_string($connection,$_POST['doza8']):$this->doza8="";
(is_numeric($_POST['doza_int_sapt']))?$this->doza_int_sapt=$satinze_vars->get_string($connection,$_POST['doza_int_sapt']):$this->doza_int_sapt="";
(is_numeric($_POST['doza_int_luna']))?$this->doza_int_luna=$satinze_vars->get_string($connection,$_POST['doza_int_luna']):$this->doza_int_luna="";
(is_numeric($_POST['doza_int_zi']))?$this->doza_int_zi=$satinze_vars->get_string($connection,$_POST['doza_int_zi']):$this->doza_int_zi="";
(is_numeric($_POST['suprafata_afectata']))?$this->suprafata_afectata=$satinze_vars->get_string($connection,$_POST['suprafata_afectata']):$this->suprafata_afectata="";

(is_numeric($_POST['expl_mun']))?$this->expl_mun=$satinze_vars->get_string($connection,$_POST['expl_mun']):$this->expl_mun="";
(is_numeric($_POST['zona_afect']))?$this->zona_afect=$satinze_vars->get_string($connection,$_POST['zona_afect']):$this->zona_afect="";
(is_numeric($_POST['nr_gospodarii']))?$this->nr_gospodarii=$satinze_vars->get_string($connection,$_POST['nr_gospodarii']):$this->nr_gospodarii="";
(is_numeric($_POST['asist_spec']))?$this->asist_spec=$satinze_vars->get_string($connection,$_POST['asist_spec']):$this->asist_spec="";
(is_numeric($_POST['masuri_su']))?$this->masuri_su=$satinze_vars->get_string($connection,$_POST['masuri_su']):$this->masuri_su="";
((is_numeric($_POST['poluaretransf']))&&(!($_POST['poluaretransf']<1)&&!($_POST['poluaretransf']>2)))?$this->poluaretransf=$satinze_vars->get_string($connection,$_POST['poluaretransf']):$this->poluaretransf="";
((is_numeric($_POST['verific_raport']))&&(!($_POST['verific_raport']<0)&&!($_POST['poluaretransf']>2)))?$this->verific_raport=$satinze_vars->get_string($connection,$_POST['verific_raport']):$this->verific_raport="";

$this->inserttime=time();

		}
	}

	public function insertInterventie($connection=null){
	require_once "class/fpid.class.php"; // extrage ultimul nr. pentru fiecare structura
	$fpid = new Fpid($connection,$this->eesalon,$this->tip);
	$fpid_array=$fpid->getFpid();

	$this->esalon1 = $fpid_array[0];
	$this->esalon2 = $fpid_array[1];
	$this->esalon3 = $fpid_array[2];

	$stmt = $connection->prepare('INSERT INTO intStingere (struct,igsu,isu,subunit,participanti,tipsubunitate,codsubunit,
categ_interv,tip_interv,cod_interv,alertare,nume_victima,svsu_spsualte,
tara,judet,localitati,sate,adresa,laty,longx,distanta_km,plecare,anunt,sosire,
producere,localizare,lichidare,retragere,sosiresvsu,sosirespsu,organtutelar,tipproprietate,
codactivitateeconom,tipobiectiv,cod_dest,cos_fum,forte_cerute_in_sprijin,procedee_intrerupere,
comandant_actiune,comandant_interventie,crestere_capacitate,personal_destinat_ofiter,
personal_destinat_maistru,personal_destinat_subofiter,personal_destinat_voluntar,personal_destinat_primar,
personal_destinat_viceprimar,personal_destinat_secretar,personal_destinat_svsu,personal_destinat_spsu,
personal_destinat_politie,personal_destinat_jandarmi,personal_destinat_frontiera,personal_destinat_armata,
personal_destinat_cetateni,mijstingere_isu,mijstingere_svsu,mijstingere_spsu,mijstingere_isu_tipb,
mijstingere_svsu_tipb,mijstingere_spsu_tipb,mijstingere_isu_tipc,mijstingere_svsu_tipc,mijstingere_spsu_tipc,
mijstingere_isu_tipd,mijstingere_svsu_tipd,mijstingere_spsu_tipd,mijstingere_isu_tevigen,mijstingere_svsu_tevigen,
mijstingere_spsu_tevigen,mijstingere_isu_refpulb,mijstingere_svsu_refpulb,mijstingere_spsu_refpulb,
mijstingere_isu_autostin,mijstingere_svsu_autosting,mijstingere_spsu_autosting,tipurgenta_multirisc_1,
tipurgenta_multirisc_2,tipurgenta_multirisc_3,tipurgenta_multirisc_4,tipurgenta_multirisc_svsu,
tipurgenta_multirisc_spsu,tipurgenta_pma2_1,tipurgenta_pma2_2,tipurgenta_pma2_3,tipurgenta_pma2_4,
tipurgenta_pma2_svsu,tipurgenta_pma2_spsu,tipurgenta_pma1_1,tipurgenta_pma1_2,tipurgenta_pma1_3,
tipurgenta_pma1_4,tipurgenta_pma1_svsu,tipurgenta_pma1_spsu,tipurgenta_asasmare_1,tipurgenta_asasmare_2,
tipurgenta_asasmare_3,tipurgenta_asasmare_4,tipurgenta_asasmare_svsu,tipurgenta_asasmare_spsu,tipurgenta_asasmedie_1,
tipurgenta_asasmedie_2,tipurgenta_asasmedie_3,tipurgenta_asasmedie_4,tipurgenta_asasmedie_svsu,tipurgenta_asasmedie_spsu,
tipurgenta_asasmica_1,tipurgenta_asasmica_2,tipurgenta_asasmica_3,tipurgenta_asasmica_4,tipurgenta_asasmica_svsu,
tipurgenta_asasmica_spsu,tipurgenta_alteasas_1,tipurgenta_alteasas_2,tipurgenta_alteasas_3,tipurgenta_alteasas_4,
tipurgenta_alteasas_svsu,tipurgenta_alteasas_spsu,tipurgenta_aisi_1,tipurgenta_aisi_2,tipurgenta_aisi_3,
tipurgenta_aisi_4,tipurgenta_aisi_svsu,tipurgenta_aisi_spsu,tipurgenta_aspfgi_1,tipurgenta_aspfgi_2,
tipurgenta_aspfgi_3,tipurgenta_aspfgi_4,tipurgenta_aspfgi_svsu,tipurgenta_aspfgi_spsu,tipurgenta_aservamop_1,
tipurgenta_aservamop_2,tipurgenta_aservamop_3,tipurgenta_aservamop_4,tipurgenta_aservamop_svsu,
tipurgenta_aservamop_spsu,tipurgenta_crbnadp_1,tipurgenta_crbnadp_2,tipurgenta_crbnadp_3,tipurgenta_crbnadp_4,
tipurgenta_crbnadp_svsu,tipurgenta_crbnadp_spsu,tipurgenta_aci_1,tipurgenta_aci_2,tipurgenta_aci_3,tipurgenta_aci_4,
tipurgenta_aci_svsu,tipurgenta_aci_spsu,tipurgenta_aspscaf_1,tipurgenta_aspscaf_2,tipurgenta_aspscaf_3,
tipurgenta_aspscaf_4,tipurgenta_aspscaf_svsu,tipurgenta_aspscaf_spsu,tipurgenta_barcisalupe_1,
tipurgenta_barcisalupe_2,tipurgenta_barcisalupe_3,tipurgenta_barcisalupe_4,tipurgenta_barcisalupe_svsu,
tipurgenta_barcisalupe_spsu,tipurgenta_afzm_1,tipurgenta_afzm_2,tipurgenta_afzm_3,tipurgenta_afzm_4,
tipurgenta_afzm_svsu,tipurgenta_afzm_spsu,tipurgenta_ambulante_1,tipurgenta_ambulante_2,tipurgenta_ambulante_3,
tipurgenta_ambulante_4,tipurgenta_ambulante_svsu,tipurgenta_ambulante_spsu,tipurgenta_descarc_1,tipurgenta_descarc_2,
tipurgenta_descarc_3,tipurgenta_descarc_4,tipurgenta_descarc_svsu,tipurgenta_descarc_spsu,tipurgenta_asptransportapa_1,
tipurgenta_asptransportapa_2,tipurgenta_asptransportapa_3,tipurgenta_asptransportapa_4,tipurgenta_asptransportapa_svsu,
tipurgenta_asptransportapa_spsu,tipurgenta_mptmpr_1,tipurgenta_mptmpr_2,tipurgenta_mptmpr_3,tipurgenta_mptmpr_4,
tipurgenta_mptmpr_svsu,tipurgenta_mptmpr_spsu,tipurgenta_alteautospeciale_1,tipurgenta_alteautospeciale_2,
tipurgenta_alteautospeciale_3,tipurgenta_alteautospeciale_4,tipurgenta_alteautospeciale_svsu,
tipurgenta_alteautospeciale_spsu,pers_salvate_adulti,pers_salvate_copii,pers_evacuate_adulti,pers_evacuate_copii,
deces_altesit_altep,deces_altesit_copii,deces_altesit_isu,deces_altesit_svsu,deces_ars_altep,deces_ars_copii,
deces_ars_isu,deces_ars_svsu,deces_asfix_altep,deces_asfix_copii,deces_asfix_isu,deces_asfix_svsu,ranit_altesit_copii,
ranit_altesit_isu,ranit_altesit_svsu,ranit_altesitx_altep,ranit_ars_altep,ranit_ars_copii,ranit_ars_isu,ranit_ars_svsu,
ranit_asfix_altep,ranit_asfix_copii,ranit_asfix_isu,ranit_asfix_svsu,deced06,deced25,deced55,deced70,deced71,deced714,
ranit06,ranit25,ranit55,ranit70,ranit71,ranit714,contam06,contam25,contam55,contam70,contam71,contam714,
anim_mari_contam,anim_mari_moarte,anim_mari_ranite,anim_mici_contam,anim_mici_moarte,anim_mici_ranite,
anim_pasari_contam,anim_pasari_moarte,anim_pasari_ranite,munitie_asanat_bombe_artilerie,munitie_asanat_grenade,
munitie_asanat_grenade_defens,munitie_asanat_proiectil,bombe_aviatie,mine_antitanc,mine_antipers,mine_marine,
aruncator_gren,muninfanterie,alte_munitii,val_distr,val_salv,sursa_probabila,mijloc_producere,primul_mat_ars,
imprejur_determ,despreob1,despreob2,despreob3,despreob4,despreob5,despreob6,despreob7,codsubst1,codsubst2,codsubst3,
codsubst4,numesubst1,numesubst2,numesubst3,numesubst4,codpericol1,codpericol2,codpericol3,codpericol4,elib_subst_apa,
elib_subst_aer,elib_subst_sol,tip_radionuclid,act_sursei,debit_doza,caract_sursa,alte_masuri_protective,
contramasuri,contramasuri_scurt,
anticip_sever,evol_inciden,consecinte_even,date_suplimentare,zonademortalitate,distanta_adapostire,zonadeintoxicatie,
distanta_evacuare,profilaxiacuiod,restrictiialimente1,restrictiialimente2,restrictiialimente3,restrictiialimente4,
restrictiialimente5,restrictiialimente6,dozaacumulata,distanta1,distanta2,distanta3,distanta4,distanta5,distanta6,
distanta7,distanta8,doza1,doza2,doza3,doza4,doza5,doza6,doza7,doza8,doza_int_sapt,doza_int_luna,doza_int_zi,
suprafata_afectata,expl_mun,zona_afect,nr_gospodarii,asist_spec,masuri_su,poluaretransf,verific_raport,intravilan, gradcontaminare, telefon, inserttime) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	$stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', $_SESSION['acces'],$this->esalon1,$this->esalon2,$this->esalon3,$this->participanti, $_SESSION['tipsubunitate'], $_SESSION['codsubunitate'], $this->categ_interv,$this->tip_interv,$this->cod_interv,$this->alertare,$this->nume_victima,$this->svsu_spsualte,$this->tara,$this->judet,
$this->localitati,$this->sate,$this->adresa ,$this->laty,$this->longx,$this->distanta_km,$this->plecare ,$this->anunt ,$this->sosire ,
$this->producere ,$this->localizare ,$this->lichidare ,$this->retragere ,$this->sosiresvsu ,$this->sosirespsu ,$this->organtutelar,
$this->tipproprietate,$this->codactivitateeconom,$this->tipobiectiv,$this->cod_dest,$this->cos_fum,$this->forte_cerute_in_sprijin,
$this->procedee_intrerupere,$this->comandant_actiune,$this->comandant_interventie,$this->crestere_capacitate,$this->personal_destinat_ofiter,
$this->personal_destinat_maistru,$this->personal_destinat_subofiter,$this->personal_destinat_voluntar,$this->personal_destinat_primar,
$this->personal_destinat_viceprimar,$this->personal_destinat_secretar,$this->personal_destinat_svsu,$this->personal_destinat_spsu,
$this->personal_destinat_politie,$this->personal_destinat_jandarmi,$this->personal_destinat_frontiera,$this->personal_destinat_armata,
$this->personal_destinat_cetateni,$this->mijstingere_isu,$this->mijstingere_svsu,$this->mijstingere_spsu,$this->mijstingere_isu_tipb,
$this->mijstingere_svsu_tipb,$this->mijstingere_spsu_tipb,$this->mijstingere_isu_tipc,$this->mijstingere_svsu_tipc,
$this->mijstingere_spsu_tipc,$this->mijstingere_isu_tipd,$this->mijstingere_svsu_tipd,$this->mijstingere_spsu_tipd,
$this->mijstingere_isu_tevigen,$this->mijstingere_svsu_tevigen,$this->mijstingere_spsu_tevigen,$this->mijstingere_isu_refpulb,
$this->mijstingere_svsu_refpulb,$this->mijstingere_spsu_refpulb,$this->mijstingere_isu_autosting,$this->mijstingere_svsu_autosting,
$this->mijstingere_spsu_autosting,$this->tipurgenta_multirisc_1,$this->tipurgenta_multirisc_2,$this->tipurgenta_multirisc_3,
$this->tipurgenta_multirisc_4,$this->tipurgenta_multirisc_svsu,$this->tipurgenta_multirisc_spsu,$this->tipurgenta_pma2_1,
$this->tipurgenta_pma2_2,$this->tipurgenta_pma2_3,$this->tipurgenta_pma2_4,$this->tipurgenta_pma2_svsu,$this->tipurgenta_pma2_spsu,
$this->tipurgenta_pma1_1,$this->tipurgenta_pma1_2,$this->tipurgenta_pma1_3,$this->tipurgenta_pma1_4,$this->tipurgenta_pma1_svsu,
$this->tipurgenta_pma1_spsu,$this->tipurgenta_asasmare_1,$this->tipurgenta_asasmare_2,$this->tipurgenta_asasmare_3,
$this->tipurgenta_asasmare_4,$this->tipurgenta_asasmare_svsu,$this->tipurgenta_asasmare_spsu,$this->tipurgenta_asasmedie_1,
$this->tipurgenta_asasmedie_2,$this->tipurgenta_asasmedie_3,$this->tipurgenta_asasmedie_4,$this->tipurgenta_asasmedie_svsu,
$this->tipurgenta_asasmedie_spsu,$this->tipurgenta_asasmica_1,$this->tipurgenta_asasmica_2,$this->tipurgenta_asasmica_3,
$this->tipurgenta_asasmica_4,$this->tipurgenta_asasmica_svsu,$this->tipurgenta_asasmica_spsu,$this->tipurgenta_alteasas_1,
$this->tipurgenta_alteasas_2,$this->tipurgenta_alteasas_3,$this->tipurgenta_alteasas_4,$this->tipurgenta_alteasas_svsu,
$this->tipurgenta_alteasas_spsu,$this->tipurgenta_aisi_1,$this->tipurgenta_aisi_2,$this->tipurgenta_aisi_3,
$this->tipurgenta_aisi_4,$this->tipurgenta_aisi_svsu,$this->tipurgenta_aisi_spsu,$this->tipurgenta_aspfgi_1,
$this->tipurgenta_aspfgi_2,$this->tipurgenta_aspfgi_3,$this->tipurgenta_aspfgi_4,$this->tipurgenta_aspfgi_svsu,
$this->tipurgenta_aspfgi_spsu,$this->tipurgenta_aservamop_1,$this->tipurgenta_aservamop_2,$this->tipurgenta_aservamop_3,
$this->tipurgenta_aservamop_4,$this->tipurgenta_aservamop_svsu,$this->tipurgenta_aservamop_spsu,$this->tipurgenta_crbnadp_1,
$this->tipurgenta_crbnadp_2,$this->tipurgenta_crbnadp_3,$this->tipurgenta_crbnadp_4,$this->tipurgenta_crbnadp_svsu,
$this->tipurgenta_crbnadp_spsu,$this->tipurgenta_aci_1,$this->tipurgenta_aci_2,$this->tipurgenta_aci_3,$this->tipurgenta_aci_4,
$this->tipurgenta_aci_svsu,$this->tipurgenta_aci_spsu,$this->tipurgenta_aspscaf_1,$this->tipurgenta_aspscaf_2,
$this->tipurgenta_aspscaf_3,$this->tipurgenta_aspscaf_4,$this->tipurgenta_aspscaf_svsu,$this->tipurgenta_aspscaf_spsu,
$this->tipurgenta_barcisalupe_1,$this->tipurgenta_barcisalupe_2,$this->tipurgenta_barcisalupe_3,$this->tipurgenta_barcisalupe_4,
$this->tipurgenta_barcisalupe_svsu,$this->tipurgenta_barcisalupe_spsu,$this->tipurgenta_afzm_1,$this->tipurgenta_afzm_2,
$this->tipurgenta_afzm_3,$this->tipurgenta_afzm_4,$this->tipurgenta_afzm_svsu,$this->tipurgenta_afzm_spsu,$this->tipurgenta_ambulante_1,
$this->tipurgenta_ambulante_2,$this->tipurgenta_ambulante_3,$this->tipurgenta_ambulante_4,$this->tipurgenta_ambulante_svsu,
$this->tipurgenta_ambulante_spsu,$this->tipurgenta_descarc_1,$this->tipurgenta_descarc_2,$this->tipurgenta_descarc_3,
$this->tipurgenta_descarc_4,$this->tipurgenta_descarc_svsu,$this->tipurgenta_descarc_spsu,$this->tipurgenta_asptransportapa_1,
$this->tipurgenta_asptransportapa_2,$this->tipurgenta_asptransportapa_3,$this->tipurgenta_asptransportapa_4,
$this->tipurgenta_asptransportapa_svsu,$this->tipurgenta_asptransportapa_spsu,$this->tipurgenta_mptmpr_1,
$this->tipurgenta_mptmpr_2,$this->tipurgenta_mptmpr_3,$this->tipurgenta_mptmpr_4,$this->tipurgenta_mptmpr_svsu,
$this->tipurgenta_mptmpr_spsu,$this->tipurgenta_alteautospeciale_1,$this->tipurgenta_alteautospeciale_2,
$this->tipurgenta_alteautospeciale_3,$this->tipurgenta_alteautospeciale_4,$this->tipurgenta_alteautospeciale_svsu,
$this->tipurgenta_alteautospeciale_spsu,$this->pers_salvate_adulti,$this->pers_salvate_copii,$this->pers_evacuate_adulti,
$this->pers_evacuate_copii,$this->deces_altesit_altep,$this->deces_altesit_copii,$this->deces_altesit_isu,
$this->deces_altesit_svsu,$this->deces_ars_altep,$this->deces_ars_copii,$this->deces_ars_isu,$this->deces_ars_svsu,
$this->deces_asfix_altep,$this->deces_asfix_copii,$this->deces_asfix_isu,$this->deces_asfix_svsu,$this->ranit_altesit_copii,
$this->ranit_altesit_isu,$this->ranit_altesit_svsu,$this->ranit_altesitx_altep,$this->ranit_ars_altep,$this->ranit_ars_copii,
$this->ranit_ars_isu,$this->ranit_ars_svsu,$this->ranit_asfix_altep,$this->ranit_asfix_copii,$this->ranit_asfix_isu,
$this->ranit_asfix_svsu,$this->deced06,$this->deced25,$this->deced55,$this->deced70,$this->deced71,$this->deced714,
$this->ranit06,$this->ranit25,$this->ranit55,$this->ranit70,$this->ranit71,$this->ranit714,$this->contam06,$this->contam25,
$this->contam55,$this->contam70,$this->contam71,$this->contam714,$this->anim_mari_contam,$this->anim_mari_moarte,
$this->anim_mari_ranite,$this->anim_mici_contam,$this->anim_mici_moarte,$this->anim_mici_ranite,$this->anim_pasari_contam,
$this->anim_pasari_moarte,$this->anim_pasari_ranite,$this->munitie_asanat_bombe_artilerie,$this->munitie_asanat_grenade,
$this->munitie_asanat_grenade_defens,$this->munitie_asanat_proiectil,$this->bombe_aviatie,$this->mine_antitanc,
$this->mine_antipers,$this->mine_marine,$this->aruncator_gren,$this->muninfanterie,$this->alte_munitii,$this->val_distr,
$this->val_salv,$this->sursa_probabila,$this->mijloc_producere,$this->primul_mat_ars,$this->imprejur_determ,$this->despreob1,
$this->despreob2,$this->despreob3,$this->despreob4,$this->despreob5,$this->despreob6,$this->despreob7,$this->codsubst1,
$this->codsubst2,$this->codsubst3,$this->codsubst4,$this->numesubst1,$this->numesubst2,$this->numesubst3,$this->numesubst4,
$this->codpericol1,$this->codpericol2,$this->codpericol3,$this->codpericol4,$this->elib_subst_apa,$this->elib_subst_aer,
$this->elib_subst_sol,$this->tip_radionuclid, $this->act_sursei,$this->debit_doza,$this->introduceti_caract_sursa,$this->alte_masuri_protective,
$this->introduceti_contramasuri,$this->introduceti_contramasuri_scurt,$this->introduceti_anticip_sever,
$this->introduceti_evol_inciden,$this->introduceti_consecinte_even,$this->introduceti_date_suplimentare,
$this->zonademortalitate,$this->distanta_adapostire,$this->zonadeintoxicatie,$this->distanta_evacuare,$this->profilaxiacuiod,
$this->restrictiialimente1,$this->restrictiialimente2,$this->restrictiialimente3,$this->restrictiialimente4,
$this->restrictiialimente5,$this->restrictiialimente6,$this->dozaacumulata,$this->distanta1,$this->distanta2,
$this->distanta3,$this->distanta4,$this->distanta5,$this->distanta6,$this->distanta7,$this->distanta8,$this->doza1,
$this->doza2,$this->doza3,$this->doza4,$this->doza5,$this->doza6,$this->doza7,$this->doza8,$this->doza_int_sapt,
$this->doza_int_luna,$this->doza_int_zi,$this->suprafata_afectata,$this->expl_mun,$this->zona_afect,$this->nr_gospodarii,
$this->asist_spec,$this->masuri_su,$this->poluaretransf,$this->verific_raport, $this->gradcontamin, $this->intravilan, 
$this->telefon, $this->inserttime);
	$stmt->execute();
	$last_id = $stmt->insert_id;
	$stmt->close();
	$this->message = SUCCES_INTRODUCERE_DATE;
	return $last_id;


	}
	public function updateInterventie($connection=null){
			require_once "class/verifyid.class.php"; // verifica daca userul poate modifica interventia cu id-ul
			$verifyid = new Verifyid($connection);
			if($this->idofpost===''){
				$this->message = ERROR3329;
				exit();
			}
			$verif=$verifyid->verifyStingere($connection,$this->idofpost);
			if($verif)
			{

			$stmt = $connection->prepare('UPDATE intStingere SET participanti=?,categ_interv=?,tip_interv=?,
			cod_interv=?,alertare=?,nume_victima=?,svsu_spsualte=?,
tara=?,judet=?,localitati=?,sate=?,adresa=?,laty=?,longx=?,distanta_km=?,plecare=?,anunt=?,sosire=?,
producere=?,localizare=?,lichidare=?,retragere=?,sosiresvsu=?,sosirespsu=?,organtutelar=?,tipproprietate=?,
codactivitateeconom=?,tipobiectiv=?,cod_dest=?,cos_fum=?,forte_cerute_in_sprijin=?,procedee_intrerupere=?,
comandant_actiune=?,comandant_interventie=?,crestere_capacitate=?,personal_destinat_ofiter=?,
personal_destinat_maistru=?,personal_destinat_subofiter=?,personal_destinat_voluntar=?,personal_destinat_primar=?,
personal_destinat_viceprimar=?,personal_destinat_secretar=?,personal_destinat_svsu=?,personal_destinat_spsu=?,
personal_destinat_politie=?,personal_destinat_jandarmi=?,personal_destinat_frontiera=?,personal_destinat_armata=?,
personal_destinat_cetateni=?,mijstingere_isu=?,mijstingere_svsu=?,mijstingere_spsu=?,mijstingere_isu_tipb=?,
mijstingere_svsu_tipb=?,mijstingere_spsu_tipb=?,mijstingere_isu_tipc=?,mijstingere_svsu_tipc=?,mijstingere_spsu_tipc=?,
mijstingere_isu_tipd=?,mijstingere_svsu_tipd=?,mijstingere_spsu_tipd=?,mijstingere_isu_tevigen=?,mijstingere_svsu_tevigen=?,
mijstingere_spsu_tevigen=?,mijstingere_isu_refpulb=?,mijstingere_svsu_refpulb=?,mijstingere_spsu_refpulb=?,
mijstingere_isu_autostin=?,mijstingere_svsu_autosting=?,mijstingere_spsu_autosting=?,tipurgenta_multirisc_1=?,
tipurgenta_multirisc_2=?,tipurgenta_multirisc_3=?,tipurgenta_multirisc_4=?,tipurgenta_multirisc_svsu=?,
tipurgenta_multirisc_spsu=?,tipurgenta_pma2_1=?,tipurgenta_pma2_2=?,tipurgenta_pma2_3=?,tipurgenta_pma2_4=?,
tipurgenta_pma2_svsu=?,tipurgenta_pma2_spsu=?,tipurgenta_pma1_1=?,tipurgenta_pma1_2=?,tipurgenta_pma1_3=?,
tipurgenta_pma1_4=?,tipurgenta_pma1_svsu=?,tipurgenta_pma1_spsu=?,tipurgenta_asasmare_1=?,tipurgenta_asasmare_2=?,
tipurgenta_asasmare_3=?,tipurgenta_asasmare_4=?,tipurgenta_asasmare_svsu=?,tipurgenta_asasmare_spsu=?,tipurgenta_asasmedie_1=?,
tipurgenta_asasmedie_2=?,tipurgenta_asasmedie_3=?,tipurgenta_asasmedie_4=?,tipurgenta_asasmedie_svsu=?,tipurgenta_asasmedie_spsu=?,
tipurgenta_asasmica_1=?,tipurgenta_asasmica_2=?,tipurgenta_asasmica_3=?,tipurgenta_asasmica_4=?,tipurgenta_asasmica_svsu=?,
tipurgenta_asasmica_spsu=?,tipurgenta_alteasas_1=?,tipurgenta_alteasas_2=?,tipurgenta_alteasas_3=?,tipurgenta_alteasas_4=?,
tipurgenta_alteasas_svsu=?,tipurgenta_alteasas_spsu=?,tipurgenta_aisi_1=?,tipurgenta_aisi_2=?,tipurgenta_aisi_3=?,
tipurgenta_aisi_4=?,tipurgenta_aisi_svsu=?,tipurgenta_aisi_spsu=?,tipurgenta_aspfgi_1=?,tipurgenta_aspfgi_2=?,
tipurgenta_aspfgi_3=?,tipurgenta_aspfgi_4=?,tipurgenta_aspfgi_svsu=?,tipurgenta_aspfgi_spsu=?,tipurgenta_aservamop_1=?,
tipurgenta_aservamop_2=?,tipurgenta_aservamop_3=?,tipurgenta_aservamop_4=?,tipurgenta_aservamop_svsu=?,
tipurgenta_aservamop_spsu=?,tipurgenta_crbnadp_1=?,tipurgenta_crbnadp_2=?,tipurgenta_crbnadp_3=?,tipurgenta_crbnadp_4=?,
tipurgenta_crbnadp_svsu=?,tipurgenta_crbnadp_spsu=?,tipurgenta_aci_1=?,tipurgenta_aci_2=?,tipurgenta_aci_3=?,tipurgenta_aci_4=?,
tipurgenta_aci_svsu=?,tipurgenta_aci_spsu=?,tipurgenta_aspscaf_1=?,tipurgenta_aspscaf_2=?,tipurgenta_aspscaf_3=?,
tipurgenta_aspscaf_4=?,tipurgenta_aspscaf_svsu=?,tipurgenta_aspscaf_spsu=?,tipurgenta_barcisalupe_1=?,
tipurgenta_barcisalupe_2=?,tipurgenta_barcisalupe_3=?,tipurgenta_barcisalupe_4=?,tipurgenta_barcisalupe_svsu=?,
tipurgenta_barcisalupe_spsu=?,tipurgenta_afzm_1=?,tipurgenta_afzm_2=?,tipurgenta_afzm_3=?,tipurgenta_afzm_4=?,
tipurgenta_afzm_svsu=?,tipurgenta_afzm_spsu=?,tipurgenta_ambulante_1=?,tipurgenta_ambulante_2=?,tipurgenta_ambulante_3=?,
tipurgenta_ambulante_4=?,tipurgenta_ambulante_svsu=?,tipurgenta_ambulante_spsu=?,tipurgenta_descarc_1=?,tipurgenta_descarc_2=?,
tipurgenta_descarc_3=?,tipurgenta_descarc_4=?,tipurgenta_descarc_svsu=?,tipurgenta_descarc_spsu=?,tipurgenta_asptransportapa_1=?,
tipurgenta_asptransportapa_2=?,tipurgenta_asptransportapa_3=?,tipurgenta_asptransportapa_4=?,tipurgenta_asptransportapa_svsu=?,
tipurgenta_asptransportapa_spsu=?,tipurgenta_mptmpr_1=?,tipurgenta_mptmpr_2=?,tipurgenta_mptmpr_3=?,tipurgenta_mptmpr_4=?,
tipurgenta_mptmpr_svsu=?,tipurgenta_mptmpr_spsu=?,tipurgenta_alteautospeciale_1=?,tipurgenta_alteautospeciale_2=?,
tipurgenta_alteautospeciale_3=?,tipurgenta_alteautospeciale_4=?,tipurgenta_alteautospeciale_svsu=?,
tipurgenta_alteautospeciale_spsu=?,pers_salvate_adulti=?,pers_salvate_copii=?,pers_evacuate_adulti=?,pers_evacuate_copii=?,
deces_altesit_altep=?,deces_altesit_copii=?,deces_altesit_isu=?,deces_altesit_svsu=?,deces_ars_altep=?,deces_ars_copii=?,
deces_ars_isu=?,deces_ars_svsu=?,deces_asfix_altep=?,deces_asfix_copii=?,deces_asfix_isu=?,deces_asfix_svsu=?,ranit_altesit_copii=?,
ranit_altesit_isu=?,ranit_altesit_svsu=?,ranit_altesitx_altep=?,ranit_ars_altep=?,ranit_ars_copii=?,ranit_ars_isu=?,ranit_ars_svsu=?,
ranit_asfix_altep=?,ranit_asfix_copii=?,ranit_asfix_isu=?,ranit_asfix_svsu=?,deced06=?,deced25=?,deced55=?,deced70=?,deced71=?,deced714=?,
ranit06=?,ranit25=?,ranit55=?,ranit70=?,ranit71=?,ranit714=?,contam06=?,contam25=?,contam55=?,contam70=?,contam71=?,contam714=?,
anim_mari_contam=?,anim_mari_moarte=?,anim_mari_ranite=?,anim_mici_contam=?,anim_mici_moarte=?,anim_mici_ranite=?,
anim_pasari_contam=?,anim_pasari_moarte=?,anim_pasari_ranite=?,munitie_asanat_bombe_artilerie=?,munitie_asanat_grenade=?,
munitie_asanat_grenade_defens=?,munitie_asanat_proiectil=?,bombe_aviatie=?,mine_antitanc=?,mine_antipers=?,mine_marine=?,
aruncator_gren=?,muninfanterie=?,alte_munitii=?,val_distr=?,val_salv=?,sursa_probabila=?,mijloc_producere=?,primul_mat_ars=?,
imprejur_determ=?,despreob1=?,despreob2=?,despreob3=?,despreob4=?,despreob5=?,despreob6=?,despreob7=?,codsubst1=?,codsubst2=?,codsubst3=?,
codsubst4=?,numesubst1=?,numesubst2=?,numesubst3=?,numesubst4=?,codpericol1=?,codpericol2=?,codpericol3=?,codpericol4=?,elib_subst_apa=?,
elib_subst_aer=?,elib_subst_sol=?, tip_radionuclid = ?, act_sursei=?,debit_doza=?,caract_sursa=?,alte_masuri_protective=?,contramasuri=?,contramasuri_scurt=?,
anticip_sever=?,evol_inciden=?,consecinte_even=?,date_suplimentare=?,zonademortalitate=?,distanta_adapostire=?,zonadeintoxicatie=?,
distanta_evacuare=?,profilaxiacuiod=?,restrictiialimente1=?,restrictiialimente2=?,restrictiialimente3=?,restrictiialimente4=?,
restrictiialimente5=?,restrictiialimente6=?,dozaacumulata=?,distanta1=?,distanta2=?,distanta3=?,distanta4=?,distanta5=?,distanta6=?,
distanta7=?,distanta8=?,doza1=?,doza2=?,doza3=?,doza4=?,doza5=?,doza6=?,doza7=?,doza8=?,doza_int_sapt=?,doza_int_luna=?,doza_int_zi=?,
suprafata_afectata=?,expl_mun=?,zona_afect=?,nr_gospodarii=?,asist_spec=?,masuri_su=?,poluaretransf=?,verific_raport=?, intravilan=?, gradcontaminare = ?, telefon = ?
WHERE id=? AND struct=?');
	$stmt->bind_param('sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', $this->participanti, $this->categ_interv,$this->tip_interv,$this->cod_interv,$this->alertare,$this->nume_victima,
$this->svsu_spsualte,$this->tara,$this->judet,
$this->localitati,$this->sate,$this->adresa ,$this->laty,$this->longx,$this->distanta_km,$this->plecare ,$this->anunt ,$this->sosire ,
$this->producere ,$this->localizare ,$this->lichidare ,$this->retragere ,$this->sosiresvsu ,$this->sosirespsu ,$this->organtutelar,
$this->tipproprietate,$this->codactivitateeconom,$this->tipobiectiv,$this->cod_dest,$this->cos_fum,$this->forte_cerute_in_sprijin,
$this->procedee_intrerupere,$this->comandant_actiune,$this->comandant_interventie,$this->crestere_capacitate,$this->personal_destinat_ofiter,
$this->personal_destinat_maistru,$this->personal_destinat_subofiter,$this->personal_destinat_voluntar,$this->personal_destinat_primar,
$this->personal_destinat_viceprimar,$this->personal_destinat_secretar,$this->personal_destinat_svsu,$this->personal_destinat_spsu,
$this->personal_destinat_politie,$this->personal_destinat_jandarmi,$this->personal_destinat_frontiera,$this->personal_destinat_armata,
$this->personal_destinat_cetateni,$this->mijstingere_isu,$this->mijstingere_svsu,$this->mijstingere_spsu,$this->mijstingere_isu_tipb,
$this->mijstingere_svsu_tipb,$this->mijstingere_spsu_tipb,$this->mijstingere_isu_tipc,$this->mijstingere_svsu_tipc,
$this->mijstingere_spsu_tipc,$this->mijstingere_isu_tipd,$this->mijstingere_svsu_tipd,$this->mijstingere_spsu_tipd,
$this->mijstingere_isu_tevigen,$this->mijstingere_svsu_tevigen,$this->mijstingere_spsu_tevigen,$this->mijstingere_isu_refpulb,
$this->mijstingere_svsu_refpulb,$this->mijstingere_spsu_refpulb,$this->mijstingere_isu_autosting,$this->mijstingere_svsu_autosting,
$this->mijstingere_spsu_autosting,$this->tipurgenta_multirisc_1,$this->tipurgenta_multirisc_2,$this->tipurgenta_multirisc_3,
$this->tipurgenta_multirisc_4,$this->tipurgenta_multirisc_svsu,$this->tipurgenta_multirisc_spsu,$this->tipurgenta_pma2_1,
$this->tipurgenta_pma2_2,$this->tipurgenta_pma2_3,$this->tipurgenta_pma2_4,$this->tipurgenta_pma2_svsu,$this->tipurgenta_pma2_spsu,
$this->tipurgenta_pma1_1,$this->tipurgenta_pma1_2,$this->tipurgenta_pma1_3,$this->tipurgenta_pma1_4,$this->tipurgenta_pma1_svsu,
$this->tipurgenta_pma1_spsu,$this->tipurgenta_asasmare_1,$this->tipurgenta_asasmare_2,$this->tipurgenta_asasmare_3,
$this->tipurgenta_asasmare_4,$this->tipurgenta_asasmare_svsu,$this->tipurgenta_asasmare_spsu,$this->tipurgenta_asasmedie_1,
$this->tipurgenta_asasmedie_2,$this->tipurgenta_asasmedie_3,$this->tipurgenta_asasmedie_4,$this->tipurgenta_asasmedie_svsu,
$this->tipurgenta_asasmedie_spsu,$this->tipurgenta_asasmica_1,$this->tipurgenta_asasmica_2,$this->tipurgenta_asasmica_3,
$this->tipurgenta_asasmica_4,$this->tipurgenta_asasmica_svsu,$this->tipurgenta_asasmica_spsu,$this->tipurgenta_alteasas_1,
$this->tipurgenta_alteasas_2,$this->tipurgenta_alteasas_3,$this->tipurgenta_alteasas_4,$this->tipurgenta_alteasas_svsu,
$this->tipurgenta_alteasas_spsu,$this->tipurgenta_aisi_1,$this->tipurgenta_aisi_2,$this->tipurgenta_aisi_3,
$this->tipurgenta_aisi_4,$this->tipurgenta_aisi_svsu,$this->tipurgenta_aisi_spsu,$this->tipurgenta_aspfgi_1,
$this->tipurgenta_aspfgi_2,$this->tipurgenta_aspfgi_3,$this->tipurgenta_aspfgi_4,$this->tipurgenta_aspfgi_svsu,
$this->tipurgenta_aspfgi_spsu,$this->tipurgenta_aservamop_1,$this->tipurgenta_aservamop_2,$this->tipurgenta_aservamop_3,
$this->tipurgenta_aservamop_4,$this->tipurgenta_aservamop_svsu,$this->tipurgenta_aservamop_spsu,$this->tipurgenta_crbnadp_1,
$this->tipurgenta_crbnadp_2,$this->tipurgenta_crbnadp_3,$this->tipurgenta_crbnadp_4,$this->tipurgenta_crbnadp_svsu,
$this->tipurgenta_crbnadp_spsu,$this->tipurgenta_aci_1,$this->tipurgenta_aci_2,$this->tipurgenta_aci_3,$this->tipurgenta_aci_4,
$this->tipurgenta_aci_svsu,$this->tipurgenta_aci_spsu,$this->tipurgenta_aspscaf_1,$this->tipurgenta_aspscaf_2,
$this->tipurgenta_aspscaf_3,$this->tipurgenta_aspscaf_4,$this->tipurgenta_aspscaf_svsu,$this->tipurgenta_aspscaf_spsu,
$this->tipurgenta_barcisalupe_1,$this->tipurgenta_barcisalupe_2,$this->tipurgenta_barcisalupe_3,$this->tipurgenta_barcisalupe_4,
$this->tipurgenta_barcisalupe_svsu,$this->tipurgenta_barcisalupe_spsu,$this->tipurgenta_afzm_1,$this->tipurgenta_afzm_2,
$this->tipurgenta_afzm_3,$this->tipurgenta_afzm_4,$this->tipurgenta_afzm_svsu,$this->tipurgenta_afzm_spsu,$this->tipurgenta_ambulante_1,
$this->tipurgenta_ambulante_2,$this->tipurgenta_ambulante_3,$this->tipurgenta_ambulante_4,$this->tipurgenta_ambulante_svsu,
$this->tipurgenta_ambulante_spsu,$this->tipurgenta_descarc_1,$this->tipurgenta_descarc_2,$this->tipurgenta_descarc_3,
$this->tipurgenta_descarc_4,$this->tipurgenta_descarc_svsu,$this->tipurgenta_descarc_spsu,$this->tipurgenta_asptransportapa_1,
$this->tipurgenta_asptransportapa_2,$this->tipurgenta_asptransportapa_3,$this->tipurgenta_asptransportapa_4,
$this->tipurgenta_asptransportapa_svsu,$this->tipurgenta_asptransportapa_spsu,$this->tipurgenta_mptmpr_1,
$this->tipurgenta_mptmpr_2,$this->tipurgenta_mptmpr_3,$this->tipurgenta_mptmpr_4,$this->tipurgenta_mptmpr_svsu,
$this->tipurgenta_mptmpr_spsu,$this->tipurgenta_alteautospeciale_1,$this->tipurgenta_alteautospeciale_2,
$this->tipurgenta_alteautospeciale_3,$this->tipurgenta_alteautospeciale_4,$this->tipurgenta_alteautospeciale_svsu,
$this->tipurgenta_alteautospeciale_spsu,$this->pers_salvate_adulti,$this->pers_salvate_copii,$this->pers_evacuate_adulti,
$this->pers_evacuate_copii,$this->deces_altesit_altep,$this->deces_altesit_copii,$this->deces_altesit_isu,
$this->deces_altesit_svsu,$this->deces_ars_altep,$this->deces_ars_copii,$this->deces_ars_isu,$this->deces_ars_svsu,
$this->deces_asfix_altep,$this->deces_asfix_copii,$this->deces_asfix_isu,$this->deces_asfix_svsu,$this->ranit_altesit_copii,
$this->ranit_altesit_isu,$this->ranit_altesit_svsu,$this->ranit_altesitx_altep,$this->ranit_ars_altep,$this->ranit_ars_copii,
$this->ranit_ars_isu,$this->ranit_ars_svsu,$this->ranit_asfix_altep,$this->ranit_asfix_copii,$this->ranit_asfix_isu,
$this->ranit_asfix_svsu,$this->deced06,$this->deced25,$this->deced55,$this->deced70,$this->deced71,$this->deced714,
$this->ranit06,$this->ranit25,$this->ranit55,$this->ranit70,$this->ranit71,$this->ranit714,$this->contam06,$this->contam25,
$this->contam55,$this->contam70,$this->contam71,$this->contam714,$this->anim_mari_contam,$this->anim_mari_moarte,
$this->anim_mari_ranite,$this->anim_mici_contam,$this->anim_mici_moarte,$this->anim_mici_ranite,$this->anim_pasari_contam,
$this->anim_pasari_moarte,$this->anim_pasari_ranite,$this->munitie_asanat_bombe_artilerie,$this->munitie_asanat_grenade,
$this->munitie_asanat_grenade_defens,$this->munitie_asanat_proiectil,$this->bombe_aviatie,$this->mine_antitanc,
$this->mine_antipers,$this->mine_marine,$this->aruncator_gren,$this->muninfanterie,$this->alte_munitii,$this->val_distr,
$this->val_salv,$this->sursa_probabila,$this->mijloc_producere,$this->primul_mat_ars,$this->imprejur_determ,$this->despreob1,
$this->despreob2,$this->despreob3,$this->despreob4,$this->despreob5,$this->despreob6,$this->despreob7,$this->codsubst1,
$this->codsubst2,$this->codsubst3,$this->codsubst4,$this->numesubst1,$this->numesubst2,$this->numesubst3,$this->numesubst4,
$this->codpericol1,$this->codpericol2,$this->codpericol3,$this->codpericol4,$this->elib_subst_apa,$this->elib_subst_aer,
$this->elib_subst_sol,$this->tip_radionuclid, $this->act_sursei,$this->debit_doza,$this->introduceti_caract_sursa,$this->alte_masuri_protective,
$this->introduceti_contramasuri,$this->introduceti_contramasuri_scurt,$this->introduceti_anticip_sever,
$this->introduceti_evol_inciden,$this->introduceti_consecinte_even,$this->introduceti_date_suplimentare,
$this->zonademortalitate,$this->distanta_adapostire,$this->zonadeintoxicatie,$this->distanta_evacuare,$this->profilaxiacuiod,
$this->restrictiialimente1,$this->restrictiialimente2,$this->restrictiialimente3,$this->restrictiialimente4,
$this->restrictiialimente5,$this->restrictiialimente6,$this->dozaacumulata,$this->distanta1,$this->distanta2,
$this->distanta3,$this->distanta4,$this->distanta5,$this->distanta6,$this->distanta7,$this->distanta8,$this->doza1,
$this->doza2,$this->doza3,$this->doza4,$this->doza5,$this->doza6,$this->doza7,$this->doza8,$this->doza_int_sapt,
$this->doza_int_luna,$this->doza_int_zi,$this->suprafata_afectata,$this->expl_mun,$this->zona_afect,$this->nr_gospodarii,
$this->asist_spec,$this->masuri_su,$this->poluaretransf,$this->verific_raport, $this->intravilan, $this->gradcontamin, 
$this->telefon, $this->idofpost, $_SESSION['acces']);
	$stmt->execute();
	$stmt->close();
	$this->message = ACTUALIZARE_INTERVENTIE;
	return $this->idofpost;
	}
	else $this->message = ERROR3328;
	}

	public function getMessage(){
	      return $this->message;
	}
}
?>
