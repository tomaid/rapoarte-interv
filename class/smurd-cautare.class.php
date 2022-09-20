<?php
// require_once "class/judete.class.php"; 
class CautareRapoarteSmurd {
	public $connection;
	public function __construct($connection=null, $nrIGSU='',$zi='', $luna='', $an='', $nume='', $prenume='', $judet='', $localitate='', $structura='', $pagina='', $descarcare=''){
		$this->connection =$connection;
		$this->nrIGSU =$nrIGSU;
		$this->zi=$zi;
		$this->luna=$luna;
		$this->an=$an;
		$this->nume =$nume;
		$this->prenume =$prenume;
		$this->judet =$judet;
		$this->localitate =$localitate;
		$this->structura =$structura;
		$this->pagina =$pagina;
		$this->descarcare =$descarcare;
		$this->limit='';
		$this->subunitati = array();
		$this->conditions = array();
		$this->parameters = array();
		$this->sv = new sanitize(); // clasa de curatare a variabilelor
	}

	private function setNr(){
		if($this->nrIGSU!==''){
			$this->conditions[] = 'i.igsu = ? ';
			$this->parameters[] = $this->nrIGSU;
		}
	}
	private function setData(){
		if(($this->zi!=='')&&($this->luna!=='')&&($this->an!=='')){
			$this->conversieUnixdate(1);
			$this->conditions[] = 'i.anunt >= ? ';
			$this->parameters[] = $this->inceputzi;
			$this->conditions[] = 'i.anunt <= ? ';
			$this->parameters[] = $this->sfarsitzi;
		}
		elseif(($this->zi==='')&&($this->luna!=='')&&($this->an!=='')){
			$this->conversieUnixdate(2);
			$this->conditions[] = 'i.anunt >= ? ';
			$this->parameters[] = $this->inceputzi;
			$this->conditions[] = 'i.anunt <= ? ';
			$this->parameters[] = $this->sfarsitzi;
		}
		elseif(($this->zi==='')&&($this->luna!=='')&&($this->an==='')){
			$this->conversieUnixdate(5);
			$this->conditions[] = 'i.anunt >= ? ';
			$this->parameters[] = $this->inceputzi;
			$this->conditions[] = 'i.anunt <= ? ';
			$this->parameters[] = $this->sfarsitzi;
		}
		elseif(($this->zi==='')&&($this->luna==='')&&($this->an!=='')){
			$this->conversieUnixdate(3);
			$this->conditions[] = 'i.anunt >= ? ';
			$this->parameters[] = $this->inceputzi;
			$this->conditions[] = 'i.anunt <= ? ';
			$this->parameters[] = $this->sfarsitzi;
		}
		else
		{	
			$this->conversieUnixdate(4);
			$this->conditions[] = 'i.anunt >= ? ';
			$this->parameters[] = $this->inceputzi;
			$this->conditions[] = 'i.anunt <= ? ';
			$this->parameters[] = $this->sfarsitzi;
		}
	}
	private function conversieUnixdate($cas=''){

		switch ($cas) {
		    case 1:
		        $zi= $this->zi+1;
		        $luna=$this->luna;
		        $an=$this->an;
		        break;
		    case 2:
		    	$this->zi=1;
		    	$zi=1;
		        $luna=$this->luna+1;
		        $an=$this->an;
		        break;
		    case 3:
		        $this->zi=1;
		    	$zi=1;
		    	$luna=1;
		    	$this->luna=1;
		        $an=$this->an+1;
		        break;
		    case 4:
		        $this->zi=1;
		    	$zi=1;
		    	$luna=1;
		    	$this->luna=1;
		    	$this->an=date('Y');
		        $an=$this->an+1;
		        break;
		    case 5:
		    	$this->zi=1;
		    	$zi=1;
		        $luna=$this->luna+1;
		        $this->an=date('Y');
		        $an=$this->an;
		        break;

		}
		$this->inceputzi=mktime(0, 0, 0, $this->luna, $this->zi,$this->an);
		$this->sfarsitzi=mktime(0, 0, 0, $luna, $zi, $an);
	}
	private function setNume(){
		if($this->nume!==''){
			$this->conditions[] = ' (i.nume_victima = convert(? using utf8mb4) COLLATE utf8mb4_general_ci) ';
			$this->parameters[] = $this->nume;
		}
	}
	private function setPrenume(){
		if($this->prenume!==''){
			$this->conditions[] = ' (i.prenume_victima = convert(? using utf8mb4) COLLATE utf8mb4_general_ci) ';
			$this->parameters[] = $this->prenume;
		}
	}
	private function setJudet(){
		if($this->judet!==''){
			$this->conditions[] = ' i.judet = ? ';
			$this->parameters[] = $this->judet;
		}
	}
	private function setLocalitate(){
		if($this->localitate!==''){
			$this->conditions[] = ' i.localitati = ?';
			$this->parameters[] = $this->localitate;
		}
	}
	private function setStructura(){
		require_once 'acces.class.php'; // creeaza vector cu subunitatile accesibile
		(($this->structura!=='')&&
			(in_array($this->structura, $_SESSION['subunit_acces']))) ? 
				$subunits = $this->structura : $subunits= $_SESSION['acces'];
			$subus = new acces_recursiv($this->connection,$subunits);
			$this->subunitati = $subus->getSubunitati();
			foreach($this->subunitati as $cod){
				$cond[] = 'i.struct = ? ';
        		$this->parameters[] = $cod;
        	}
        	$this->conditions[] = " (".implode(" OR ", $cond).") ";
	}
	private function setOffset(){
		if($this->descarcare==1){
				$this->limit = '';
				// $this->parameters[] = $this->offset;
			}
			else{
				if($this->pagina!==''){
					if($this->pagina==0)$this->pagina=1;
					$this->offset = ($this->pagina-1) * 10;
					$this->limit = ' LIMIT ?,10';
					$this->parameters[] = $this->offset;
					}
		}
	}
	private function DN($inv=0){ // verificam daca valoarea este 1
		if($inv>=1)return 1;
		else return 0;
	}
	private function PP($inv=0){ // predare pacient
		if($inv==3)return 4;
		if($inv==4)return 3;
		return $inv;
	}
	private function VD($d=0,$i=""){ // d este data, i este D zi sau H ora 

		if($d>0){
			if($i==="D") return date('m/d/Y', $d);
			if($i==="H") return date('H:i', $d);
		}
		return "";
	}
	private function dest($ins=0){ // verificam daca valoarea este 1
		if(($ins==137)||($ins==138))return 42;
		if($ins==139)return 136;
		if($ins==140)return 137;
		if(($ins==141)||($ins==142))return 116;
		if(($ins>142)&&($ins<147))return 135;
		return $ins;
	}

	private function setDescarcare(){
		
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-disposition: attachment; filename=situatie-smurd.xls");
		header("Content-Transfer-Encoding: binary");
		header('Cache-Control: must-revalidate');
		header("Content-Type: text/xls");

		$buffer = fopen('php://output', 'w');
		ob_clean();
		fwrite($buffer, "DATA_RAP\tORA_RAP\tGRUP\tSVSP\tNR_SMUR\tNR_EVSMUR\tNR_GRUP\tNR_CTP\tEVEN\tAGENT\tDEST\tLOCAL\tMEDIU\tJUDET\tADRESA\tSECTOR\tDIST\tDATA_AN\tORA_AN\tDATA_SO\tORA_SO\tDATA_RE\tORA_RE\tDATA_SP\tORA_SP\tDATA_EL\tORA_EL\tPA\tPAD\tEU\tTIM\tMU\tPMA\tELI\tALTEE\tEUDI\tEUS\tNR_PER_AA\tNR_PER_AC\tNR_PER_CA\tNR_PER_RA\tNR_PER_CC\tNR_PER_RC\tAMA\tAMI\tPAS\tDATE_SUPL\tMOTIV\tSTARE\tPREDARE\tSTAREP\tF01\tF02\tF03\tF04\tF05\tF06\tF07\tF08\tF09\tF10\tF11\tF12\tF13\tF14\tF15\tF16\tF17\tF18\tF19\tF20\tF21\tF22\tF23\tF24\tF25\tF26\tF27\tF28\tF29\tF30\tF31\tM01\tM02\tM03\tM04\tM05\tM06\tM07\tM08\tM09\tM10\tM11\tM12\tM13\tM14\tM15\tM16\tM17\tM18\tM19\tM20\tM21\tM22\tM23\tM24\tM25\tM26\tM27\tM28\tM29\tM30\tM31\tM32\tM33\tM34\tM35\tM36\tM37\tM38\tD01\tD02\tD03\tD04\tD05\tD06\tD07\tD08\tD09\tD10\tD11\tD12\tD13\tNUME_OP\tNUME_OP1\tRAPORT\n");
		foreach ($this->resultsmurd as $value){
  			fwrite($buffer, $value[0]."\t".$value[1]."\t".$value[2]."\t".$value[3]."\t".$value[4]."\t".$value[5]."\t".$value[5]."\t\t".$value[6]."\t".$value[7]."\t".$value[8]."\t".$value[9]."\t".$value[10]."\t".$value[11]."\t".$value[12]."\t0\t".$value[13]."\t".$value[0]."\t".$value[1]."\t".$value[14]."\t".$value[15]."\t".$value[16]."\t".$value[17]."\t".$value[18]."\t".$value[19]."\t".$value[20]."\t".$value[21]."\t".$value[22]."\t".$value[23]."\t".$value[24]."\t".$value[25]."\t".$value[26]."\t".$value[27]."\t".$value[28]."\t".$value[29]."\t".$value[30]."\t".$value[31]."\t".$value[32]."\t".$value[33]."\t".$value[34]."\t".$value[35]."\t".$value[36]."\t".$value[37]."\t".$value[38]."\t".$value[39]."\t".$value[40]."\t".$value[41]."\t".$value[42]."\t".$value[43]."\t".$value[44]."\t".$value[45]."\t0\t0\t".$value[46]."\t".$value[47]."\t".$value[48]."\t".$value[49]."\t0\t0\t0\t0\t".$value[50]."\t".$value[51]."\t".$value[52]."\t0\t0\t0\t0\t".$value[53]."\t0\t0\t0\t0\t0\t0\t".$value[54]."\t".$value[55]."\t".$value[56]."\t".$value[57]."\t".$value[58]."\t0\t0\t".$value[59]."\t".$value[60]."\t".$value[61]."\t".$value[62]."\t".$value[63]."\t".$value[64]."\t".$value[65]."\t0\t".$value[66]."\t0\t0\t".$value[67]."\t".$value[68]."\t0\t0\t0\t0\t0\t0\t0\t".$value[69]."\t0\t0\t".$value[70]."\t".$value[71]."\t0\t".$value[72]."\t".$value[73]."\t0\t0\t0\t0\t0\t".$value[74]."\t0\t0\t0\t".$value[75]."\t".$value[76]."\t".$value[77]."\t".$value[78]."\t".$value[79]."\t".$value[80]."\t".$value[81]."\t".$value[82]."\t".$value[83]."\t".$value[84]."\t".$value[85]."\t".$value[86]."\t".$value[87]."\t".$value[88]."\n");
}
fclose($buffer);
readfile('php://output');

	}
	public function cautareFiltrare() {
		$this->setNr();
		$this->setData();
		$this->setNume();
		$this->setPrenume();
		$this->setJudet();
		$this->setLocalitate();
		$this->setStructura();
		$this->setOffset();
		
		if ($this->conditions)$sqll = " WHERE ".implode(" AND ", $this->conditions);
		$sqlfinal = 'SELECT i.id, i.igsu, i.isu, i.subunit, i.anunt, i.nume_victima, i.prenume_victima, j.nume, l.localitate, s.numestructura FROM intSmurd i LEFT JOIN judete j ON i.judet = j.id LEFT JOIN localitati l ON i.localitati = l.id LEFT JOIN structura s ON i.struct = s.idstructura '.$sqll.' ORDER BY CAST(i.id as UNSIGNED INTEGER) DESC '.$this->limit;
		// print_r($connection->error_list);
		$stmt = $this->connection->prepare($sqlfinal);
		$stmt->bind_param(str_repeat("s", count($this->parameters)), ...$this->parameters);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id, $igsu, $isu, $subunit, $zi, $nume, $prenume, $judet, $localitate, $struct);
		$this->results = array();
    	while ($stmt->fetch()){
    		$data = date('d/m/Y', $zi);
    		$this->results[] = array($id, $igsu, $isu, $subunit, $data, $nume, $prenume, $judet, $localitate, $struct);
    	}

		if($this->descarcare==1)
		{
		$sqlfinalsmurd = 'SELECT i.anunt,s.judid,i.tipsubunitate,i.codsubunit,i.subunit,i.cod_interv,i.nume_victima,i.prenume_victima,i.cod_destinatie,i.localitati,l.urban,i.judet,i.adresa,i.km,i.sosire,i.retragere,i.spital,i.eliberare,i.echip_eba_b2,i.echip_desc,i.echip_asasd,i.echip_timc1,i.echip_timnn,i.echip_mu,i.echip_pma1,i.echip_pma2,i.echip_elicop,i.echip_alte,i.echip_saj,i.echip_sap,i.echip_eisi,i.echip_scaf,i.echip_moto,i.echip_atpvm,i.asistate_adulti,i.asistate_copii,i.chimic_adulti,i.radiologic_adulti,i.chimic_copii,i.radiologic_copii,i.animale_salvate_mari,i.animale_salvate_mici,i.animale_salvate_pasari,i.descriere,i.date_suplimentare,i.cod_solicit,i.stare_pacient_constient,i.stare_pacient_inconstient,i.stare_pacient_trauma,i.cod_predare,i.deces_laloculsol,i.deces_intrans,i.stare_predare_agrav,i.stare_predare_ameliorat,i.stare_predare_nuecazul,i.stare_predare_stationar,i.puls_prezent,i.puls_absent,i.stare_pacient_decedat,i.checkscr,i.checkResuscitare,i.resp_normala,i.resp_dispnee,i.resp_absent,i.dureri,i.plaga,i.contuzie,i.frinchisa,i.frdeschis,i.arsura,i.cresp_deschidere_manuala,i.cresp_aspiratie,i.vent_balon,i.vent_masca,i.cresp_pipag,i.intubatie_cu_inductie,i.intubatie_fara_inductie,i.cresp_oxigen,i.resuscitare_intrav,i.resuscitare_compres,i.resuscitare_defibrib,i.monitorizare,i.intvmed_plagi,i.mataj_guler,i.mataj_saltea,i.mataj_targa,i.mataj_desc,i.transport_prelata,i.transport_scaun,i.transport_targa,i.resuscitare_socuri,i.mataj_ked,i.mataj_alte,i.intvmed_pans,i.intvmed_folie,i.intvmed_hemo,i.intvmed_alte,i.manevre_descarcerare_1,i.manevre_descarcerare_2,i.manevre_descarcerare_3,i.manevre_descarcerare_4,i.manevre_descarcerare_5,i.manevre_descarcerare_6,i.manevre_descarcerare_7,i.manevre_descarcerare_8,i.manevre_descarcerare_9,i.manevre_descarcerare_10,i.manevre_descarcerare_11,i.manevre_descarcerare_12,i.manevre_descarcerare_13 FROM intSmurd i LEFT JOIN judete j ON i.judet = j.id LEFT JOIN localitati l ON i.localitati = l.id LEFT JOIN structura s ON i.struct = s.idstructura '.$sqll.' ORDER BY CAST(i.id as UNSIGNED INTEGER) ASC '.$this->limit;
		$stmt = $this->connection->prepare($sqlfinalsmurd);
		$stmt->bind_param(str_repeat("s", count($this->parameters)), ...$this->parameters);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($anunt,$judid,$tipsubunit,$codsubunit,$subunit,$cod_interv,$nume_victima,$prenume_victima,$cod_destinatie,$localitati,$urban,$judet,$adresa,$km,$sosire,$retragere,$spital,$eliberare,$echip_eba_b2,$echip_desc,$echip_asasd,$echip_timc1,$echip_timnn,$echip_mu,$echip_pma1,$echip_pma2,$echip_elicop,$echip_alte,$echip_saj,$echip_sap,$echip_eisi,$echip_scaf,$echip_moto,$echip_atpvm,$asistate_adulti,$asistate_copii,$chimic_adulti,$radiologic_adulti,$chimic_copii,$radiologic_copii,$animale_salvate_mari,$animale_salvate_mici,$animale_salvate_pasari,$descriere,$date_suplimentare,$cod_solicit,$stare_pacient_constient,$stare_pacient_inconstient,$stare_pacient_trauma,$cod_predare,$deces_laloculsol,$deces_intrans,$stare_predare_agrav,$stare_predare_ameliorat,$stare_predare_nuecazul,$stare_predare_stationar,$puls_prezent,$puls_absent,$stare_pacient_decedat,$checkscr,$checkResuscitare,$resp_normala,$resp_dispnee,$resp_absent,$dureri,$plaga,$contuzie,$frinchisa,$frdeschis,$arsura,$cresp_deschidere_manuala,$cresp_aspiratie,$vent_balon,$vent_masca,$cresp_pipag,$intubatie_cu_inductie,$intubatie_fara_inductie,$cresp_oxigen,$resuscitare_intrav,$resuscitare_compres,$resuscitare_defibrib,$monitorizare,$intvmed_plagi,$mataj_guler,$mataj_saltea,$mataj_targa,$mataj_desc,$transport_prelata,$transport_scaun,$transport_targa,$resuscitare_socuri,$mataj_ked,$mataj_alte,$intvmed_pans,$intvmed_folie,$intvmed_hemo,$intvmed_alte,$manevre_descarcerare_1,$manevre_descarcerare_2,$manevre_descarcerare_3,$manevre_descarcerare_4,$manevre_descarcerare_5,$manevre_descarcerare_6,$manevre_descarcerare_7,$manevre_descarcerare_8,$manevre_descarcerare_9,$manevre_descarcerare_10,$manevre_descarcerare_11,$manevre_descarcerare_12,$manevre_descarcerare_13);
		$this->resultsmurd = array();
    	while ($stmt->fetch()){
    		$anunt_zi=$anunt_ora=$sosire_zi=$sosire_ora=$retragere_zi=$retragere_ora=$spital_zi=$spital_ora=$eliberare_zi=$eliberare_ora="";
    		$anunt_zi = $this->VD($anunt,"D");
    		$anunt_ora = $this->VD($anunt,"H");
    		$sosire_zi = $this->VD($sosire,"D");
    		$sosire_ora = $this->VD($sosire,"H");
    		$retragere_zi = $this->VD($retragere,"D");
    		$retragere_ora = $this->VD($retragere,"H");
    		$spital_zi = $this->VD($spital,"D");
    		$spital_ora = $this->VD($spital,"H");
    		$eliberare_zi = $this->VD($eliberare,"D");
    		$eliberare_ora = $this->VD($eliberare,"H");
    		$nume_filtrat=$destinatie_filtered=$localitati_filtrat=$strada=$numar=$bloc=$scara=$apartament=$etaj=$adresa_filtrat=$date_suplimentare_filtrat=$predarepacient_filtrat="";
    		$nume_filtrat = $this->sv->set_StringDownload($nume_victima)." ".$this->sv->set_StringDownload($prenume_victima);
    		$destinatie_filtered=$this->dest($cod_destinatie);
    		$localitati_filtrat = $this->sv->set_StringDownload($localitati);
    		$adresa_filtrat=json_decode($adresa);
    		$strada=$this->sv->set_StringDownload($adresa_filtrat[0]);
    		$numar=$this->sv->set_StringDownload($adresa_filtrat[1]);
    		$bloc=$this->sv->set_StringDownload($adresa_filtrat[2]);
    		$scara=$this->sv->set_StringDownload($adresa_filtrat[3]);
    		$apartament=$this->sv->set_StringDownload($adresa_filtrat[4]);
    		$etaj=$this->sv->set_StringDownload($adresa_filtrat[5]);
    		$stare_filtrat=0;
    		if(($stare_pacient_constient==1)||($stare_pacient_inconstient==1))$stare_filtrat = 1;
    		$adresa_filtrat = "Str. ".$strada.", nr. ".$numar.", bl. ".$bloc.", sc. ".$scara.", ap. ".$apartament.", et. ".$etaj;
    		$date_suplimentare_filtrat=$this->sv->set_StringDownload($date_suplimentare)." ".$this->sv->set_StringDownload($descriere);
    		$predarepacient_filtrat = $this->PP($cod_predare);
    		$stare_predare_pacient_filtrat=0;
    		if($stare_predare_nuecazul==1)$stare_predare_pacient_filtrat=0;
    		if($stare_predare_ameliorat==1)$stare_predare_pacient_filtrat=1;
    		if($stare_predare_stationar==1)$stare_predare_pacient_filtrat=2;
    		if($stare_predare_agrav==1)$stare_predare_pacient_filtrat=3;
    		if($deces_laloculsol==1)$stare_predare_pacient_filtrat=4;
    		if($deces_intrans==1)$stare_predare_pacient_filtrat=4;
    		$resuscitat=0;
    		if(($checkscr>0)||($checkResuscitare>0))$resuscitat=1;
    		$plagi_contuzii=0;
    		if(($plaga==1)||($contuzie==1))$plagi_contuzii=1;
    		$fracturi=0;
    		if(($frinchisa==1)||($frdeschis==1))$fracturi=1;
    		$contaminat_chimic=0;
    		$contaminat_radio=0;
    		if(($chimic_adulti>0)||($chimic_copii>0))$contaminat_chimic=1;
    		if(($radiologic_adulti>0)||($radiologic_copii>0))$contaminat_radio=1;
    		$ventilatie_balon=0;
    		if(($vent_balon==1)||($vent_masca==1))$ventilatie_balon=1;
    		$EKGmonitorizare=0;
    		if($monitorizare>0)$EKGmonitorizare=1;
    		$altemateaj=0;
    		$echiptim=$echip_pma=$alteechipaje=0;
    		$echiptim=$echip_timc1+$echip_timnn;
    		$echip_pma=$echip_pma1+$echip_pma2;
    		$alteechipaje=$echip_alte+$echip_saj+$echip_sap+$echip_eisi+$echip_scaf;
    		if(($transport_prelata==1)||($transport_scaun==1)||($transport_targa==1)||($resuscitare_socuri==1)||($mataj_ked==1)||($mataj_alte==1)||($intvmed_pans==1)||($intvmed_folie==1)||($intvmed_hemo==1)||($intvmed_alte))$altemateaj=1;

    		$this->resultsmurd[] = array($anunt_zi,$anunt_ora,$judid,$tipsubunit,$codsubunit,$subunit,$cod_interv,$nume_filtrat, $destinatie_filtered, $localitati_filtrat, $this->DN($urban),$judet, $adresa_filtrat, $km, $sosire_zi,$sosire_ora, $retragere_zi, $retragere_ora, $spital_zi,$spital_ora, $eliberare_zi, $eliberare_ora, $echip_eba_b2,$echip_desc,$echip_asasd,$echiptim, $echip_mu,$echip_pma,$echip_elicop,$alteechipaje,$echip_moto,$echip_atpvm,$asistate_adulti,$asistate_copii,$chimic_adulti,$radiologic_adulti,$chimic_copii,$radiologic_copii,$animale_salvate_mari,$animale_salvate_mici,$animale_salvate_pasari,$date_suplimentare_filtrat, $cod_solicit, $stare_filtrat, $predarepacient_filtrat, $stare_predare_pacient_filtrat, $this->DN($puls_prezent),$this->DN($puls_absent), $this->DN($stare_pacient_decedat),$resuscitat, $this->DN($resp_normala),$this->DN($resp_dispnee),$this->DN($resp_absent),$dureri,$plagi_contuzii, $fracturi, $this->DN($arsura), $contaminat_chimic, $contaminat_radio,$this->DN($cresp_deschidere_manuala),$this->DN($cresp_aspiratie), $ventilatie_balon, $this->DN($cresp_pipag),$this->DN($intubatie_cu_inductie),$this->DN($intubatie_fara_inductie),$this->DN($cresp_oxigen), $this->DN($resuscitare_intrav),$this->DN($resuscitare_compres),$this->DN($resuscitare_defibrib),$EKGmonitorizare,$this->DN($intvmed_plagi),$this->DN($mataj_guler),$this->DN($mataj_saltea),$this->DN($mataj_targa),$this->DN($mataj_desc),$altemateaj,$this->DN($manevre_descarcerare_1),$this->DN($manevre_descarcerare_2),$this->DN($manevre_descarcerare_3),$this->DN($manevre_descarcerare_4),$this->DN($manevre_descarcerare_5),$this->DN($manevre_descarcerare_6),$this->DN($manevre_descarcerare_7),$this->DN($manevre_descarcerare_8),$this->DN($manevre_descarcerare_9),$this->DN($manevre_descarcerare_10),$this->DN($manevre_descarcerare_11),$this->DN($manevre_descarcerare_12),$this->DN($manevre_descarcerare_13));
    	}
			$this->setDescarcare();
		}
		else{
			$sqlfin = 'SELECT COUNT(*) FROM intSmurd i LEFT JOIN judete j ON i.judet = j.id LEFT JOIN localitati l ON i.localitati = l.id LEFT JOIN structura s ON i.struct = s.idstructura '.$sqll.' ORDER BY CAST(i.id as UNSIGNED INTEGER) DESC';
	    	array_pop($this->parameters);
			$stmt = $this->connection->prepare($sqlfin);
			$stmt->bind_param(str_repeat("s", count($this->parameters)), ...$this->parameters);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($this->totalInt);
			$stmt->fetch();
	    	$this->totalpagini=ceil($this->totalInt/10);
			$stmt->close();
			$this->setPagina();
		}

	}

	public function getTDrows() {
		$html="";
		foreach($this->results as $result)
		$html.="<tr class=\"forteheighttable\">
  				<td><center>$result[1]/$result[2]/$result[3]</center></td>
  				<td><center>$result[4]</center></td>
  				<td>$result[5]</td>
  				<td>$result[6]</td>
  				<td>$result[7]</td>
  				<td>$result[8]</td>
  				<td colspan=\"2\">$result[9]</td>
  				<td><center>
  					<a class=\"buttonnewsmall\" href=\"fisa-smurd.php?id={$result[0]}\" >Editare</a>
  				</center></td>
  				</tr>";
  		return $html;
	}
	private function setPagina(){
		$this->prevpg=$this->pagina-1;
		$this->nextpg=$this->pagina+1;
		if($this->pagina<=1){	
			$this->prevpg=1;
			$this->pagina=1;
			$this->nextpg=$this->pagina+1;
		}
		if($this->pagina>=$this->totalpagini){
			$this->pagina=$this->totalpagini;
			$this->nextpg=$this->totalpagini;
			$this->prevpg=$this->pagina-1;
		}
	}
	public function getPagina() {
		return $this->pagina;
	}
	public function getPagini() {
		return $this->totalpagini;
	}
	public function getTotalint() {
		return $this->totalInt;
	}
	public function getPrevpage() {
		return $this->prevpg;
	}
	public function getNextpage() {
		return $this->nextpg;
	}

}
?>