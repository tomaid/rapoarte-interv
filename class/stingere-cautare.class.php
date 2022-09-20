<?php
class CautareRapoarteStingere {
	public $connection;
	public function __construct($connection=null, $nrIGSU='',$zi='', $luna='', $an='', $nume='', $judet='', $localitate='', $structura='', $pagina='', $descarcare=''){
		$this->connection =$connection;
		$this->nrIGSU =$nrIGSU;
		$this->zi=$zi;
		$this->luna=$luna;
		$this->an=$an;
		$this->nume =$nume;
		$this->judet =$judet;
		$this->localitate =$localitate;
		$this->structura =$structura;
		$this->pagina =$pagina;
		$this->descarcare =$descarcare;
		$this->limit='';
		$this->subunitati = array();
		$this->conditions = array();
		$this->parameters = array();
		$this->satinze_vars = new sanitize();
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
		header("Content-disposition: attachment; filename=situatie-stingere.xls");
		header("Content-Transfer-Encoding: binary");
		header('Cache-Control: must-revalidate');
		header("Content-Type: text/xls");
		$buffer = fopen('php://output', 'w');
		ob_clean();
		fwrite($buffer, "DATA_RAP\tORA_RAP\tGRUP\tFELUL\tFEL_UNIT\tCOD_COMP\tNR_COMP\tNR_GRUP\tNR_CTP\tEVEN\tAGENT\tTUTEL\tFIRMA\tTIPAG\tRAMUR\tTIP\tDEST\tCOS\tLOCAL\tMEDIU\tJUDET\tADRESA\tSECTOR\tDIST\tDATA_AN\tORA_AN\tMIJL_AN\tDATA_SO\tORA_SO\tDATA_LO\tORA_LO\tDATA_LI\tORA_LI\tDATA_RE\tORA_RE\tFORTE_SPR\tPROC_INTR\tCONDUC_ST\tALAS_U1\tALAS_U2\tALAS_U3\tALAS_U4\tASIP_U1\tASIP_U2\tASIP_U3\tASIP_U4\tASIJ_U1\tASIJ_U2\tASIJ_U3\tASIJ_U4\tAISI_U1\tAISI_U2\tAISI_U3\tAISI_U4\tFGI_U1\tFGI_U2\tFGI_U3\tFGI_U4\tACI_U1\tACI_U2\tACI_U3\tACI_U4\tAMB_U1\tAMB_U2\tAMB_U3\tAMB_U4\tADES_U1\tADES_U2\tADES_U3\tADES_U4\tMP_U1\tMP_U2\tMP_U3\tMP_U4\tALTEU_U1\tALTEU_U2\tALTEU_U3\tALTEU_U4\tACM_U1\tACM_U2\tACM_U3\tACM_U4\tNR_PMO\tNR_PMMMS\tNR_ABC_SOL\tNR_PC\tALTE_MI_P\tALTE_MI_J\tALTE_MI_G\tALTE_PROT\tALTE_MAPN\tALTE_CET\tNR_PER_SAA\tNR_PER_SAC\tAR_PM\tAS_PM\tIN_PM\tRA_PM\tAR_PC\tAS_PC\tIN_PC\tRA_PC\tAR_ALTI\tAS_ALTI\tIN_ALTI\tRA_ALTI\tAR_CO\tAS_CO\tIN_CO\tRA_CO\tDS_PM\tRS_PM\tDS_PC\tRS_PC\tDS_ALTI\tRS_ALTI\tDS_CO\tRS_CO\tV06D\tV714D\tV1525D\tV2655D\tV5670D\tV70D\tV06R\tV714R\tV1525R\tV2655R\tV5670R\tV70R\tMO_ANMA\tSA_ANMA\tMO_ANMI\tSA_ANMI\tMO_PASARI\tSA_PASARI\tBUNURI_DIS\tBUNURI_SAL\tBUNURI_DEG\tSURSA_AP\tMIJL_AP\tPR_MAT\tIMPREJUR\tARS\tVERIF_RAP\tRAP_EVAL\tDATE_SUPL\tNUME_OP\tNUME_OP1\tNUME_OP2\tNUME_OP3\tRAPORT\tSMIJ\tS1JET\tS2JET\tS3JET\tSSPU\tSPUL\tSAUT\tOB1\tOB2\tOB3\tOB4\tOB5\tOB6\tOB7\tMUNAS\tCMUNAS\tPROIEC\tGREOFE\tGREDEF\tBOMART\tBOMAVI\tMANTIT\tMANTIP\tMMARIN\tARUGRE\tMUNINF\tALTMUN\tSAFEC\tCAUZEC\tTIPZON\tGOSPAF\tEFPOL\tASISSP\tMASSU\n");
		foreach ($this->resultsdesc as $value){
  			fwrite($buffer, $value[0]."\t".$value[1]."\t".$value[2]."\t".$value[3]."\t".$value[4]."\t".$value[5]."\t".$value[6]."\t".$value[6]."\t0\t".$value[7]."\t".$value[8]."\t".$value[9]."\t\t".$value[10]."\t".$value[11]."\t".$value[12]."\t".$value[13]."\t".$value[14]."\t".$value[15]."\t".$value[16]."\t".$value[17]."\t".$value[18]."\t0\t".$value[19]."\t".$value[20]."\t".$value[21]."\t".$value[22]."\t".$value[23]."\t".$value[24]."\t".$value[25]."\t".$value[26]."\t".$value[27]."\t".$value[28]."\t".$value[29]."\t".$value[30]."\t".$value[31]."\t".$value[32]."\t".$value[33]."\t".$value[34]."\t".$value[35]."\t".$value[36]."\t".$value[37]."\t0\t0\t0\t0\t0\t0\t0\t0\t".$value[38]."\t".$value[39]."\t".$value[40]."\t".$value[41]."\t".$value[42]."\t".$value[43]."\t".$value[44]."\t".$value[45]."\t".$value[46]."\t".$value[47]."\t".$value[48]."\t".$value[49]."\t".$value[50]."\t".$value[51]."\t".$value[52]."\t".$value[53]."\t".$value[54]."\t".$value[55]."\t".$value[56]."\t".$value[57]."\t".$value[58]."\t".$value[59]."\t".$value[60]."\t".$value[61]."\t".$value[62]."\t".$value[63]."\t".$value[64]."\t".$value[65]."\t".$value[66]."\t".$value[67]."\t".$value[68]."\t".$value[69]."\t".$value[70]."\t".$value[71]."\t".$value[72]."\t".$value[73]."\t".$value[74]."\t".$value[75]."\t".$value[76]."\t0\t".$value[77]."\t".$value[78]."\t".$value[79]."\t".$value[80]."\t".$value[81]."\t".$value[82]."\t0\t".$value[83]."\t".$value[84]."\t".$value[85]."\t0\t".$value[86]."\t".$value[87]."\t".$value[88]."\t0\t".$value[89]."\t".$value[90]."\t".$value[91]."\t0\t".$value[92]."\t".$value[93]."\t".$value[94]."\t".$value[95]."\t".$value[96]."\t".$value[97]."\t".$value[98]."\t".$value[99]."\t".$value[100]."\t".$value[101]."\t".$value[102]."\t".$value[103]."\t".$value[104]."\t".$value[105]."\t".$value[106]."\t".$value[107]."\t".$value[108]."\t".$value[109]."\t".$value[110]."\t".$value[111]."\t".$value[112]."\t".$value[113]."\t".$value[114]."\t".$value[115]."\t".$value[116]."\t".$value[117]."\t".$value[118]."\t".$value[119]."\t".$value[120]."\t0\t".$value[121]."\t".$value[122]."\t".$value[123]."\t".$value[124]."\t".$value[125]."\t".$value[126]."\t1\t".$value[127]."\t\t\t\t\t\t".$value[128]."\t".$value[129]."\t".$value[130]."\t".$value[131]."\t".$value[132]."\t".$value[133]."\t".$value[134]."\t".$value[135]."\t".$value[136]."\t".$value[137]."\t".$value[138]."\t".$value[139]."\t".$value[140]."\t".$value[141]."\t\t\t".$value[142]."\t".$value[143]."\t".$value[144]."\t".$value[145]."\t".$value[146]."\t".$value[147]."\t".$value[148]."\t".$value[149]."\t".$value[150]."\t".$value[151]."\t".$value[152]."\t".$value[153]."\t".$value[154]."\t".$value[155]."\t".$value[156]."\t".$value[157]."\t".$value[158]."\t".$value[159]."\n");
		}
fclose($buffer);
readfile('php://output');
	}
	public function cautareFiltrare() {
		$this->setNr();
		$this->setData();
		$this->setNume();
		$this->setJudet();
		$this->setLocalitate();
		$this->setStructura();
		$this->setOffset();
		
		if ($this->conditions)$sqll = " WHERE ".implode(" AND ", $this->conditions);
		$sqlfinal = 'SELECT i.id, i.igsu, i.isu, i.subunit, i.anunt, i.nume_victima, j.nume, l.localitate, s.numestructura FROM intStingere i LEFT JOIN judete j ON i.judet = j.id LEFT JOIN localitati l ON i.localitati = l.id LEFT JOIN structura s ON i.struct = s.idstructura '.$sqll.' ORDER BY CAST(i.id as UNSIGNED INTEGER) DESC '.$this->limit;
		$stmt = $this->connection->prepare($sqlfinal);
		$stmt->bind_param(str_repeat("s", count($this->parameters)), ...$this->parameters);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id, $igsu, $isu, $subunit, $zi, $nume, $judet, $localitate, $struct);
		$this->results = array();
    	while ($stmt->fetch()){
    		$data = date('d/m/Y', $zi);
    		$this->results[] = array($id, $igsu, $isu, $subunit, $data, $nume, $judet, $localitate, $struct);
    	}

		if($this->descarcare==1)
		{
		$sqlfinaldesc = 'SELECT i.anunt,s.judid,i.svsu_spsualte,i.tipsubunitate,i.codsubunit,i.subunit,i.cod_interv,i.nume_victima,i.organtutelar,i.tipproprietate,i.codactivitateeconom,i.tipobiectiv,i.cod_dest,i.cos_fum,l.localitate,l.urban,i.judet,i.adresa,i.distanta_km,i.anunt,i.alertare,i.sosire,i.localizare,i.lichidare,i.retragere,i.forte_cerute_in_sprijin,i.procedee_intrerupere,i.comandant_interventie,i.tipurgenta_asasmare_1,i.tipurgenta_asasmedie_1,i.tipurgenta_asasmica_1,i.tipurgenta_alteasas_1,i.tipurgenta_asasmare_2,i.tipurgenta_asasmedie_2,i.tipurgenta_asasmica_2,i.tipurgenta_alteasas_2,i.tipurgenta_asasmare_3,i.tipurgenta_asasmedie_3,i.tipurgenta_asasmica_3,i.tipurgenta_alteasas_3,i.tipurgenta_asasmare_4,i.tipurgenta_asasmedie_4,i.tipurgenta_asasmica_4,i.tipurgenta_alteasas_4,i.tipurgenta_aisi_1,i.tipurgenta_aisi_2,i.tipurgenta_aisi_3,i.tipurgenta_aisi_4,i.tipurgenta_aspfgi_1,i.tipurgenta_aspfgi_2,i.tipurgenta_aspfgi_3,i.tipurgenta_aspfgi_4,i.tipurgenta_aci_1,i.tipurgenta_aci_2,i.tipurgenta_aci_3,i.tipurgenta_aci_4,i.tipurgenta_ambulante_1,i.tipurgenta_ambulante_2,i.tipurgenta_ambulante_3,i.tipurgenta_ambulante_4,i.tipurgenta_descarc_1,i.tipurgenta_descarc_2,i.tipurgenta_descarc_3,i.tipurgenta_descarc_4,i.tipurgenta_mptmpr_1,i.tipurgenta_mptmpr_2,i.tipurgenta_mptmpr_3,i.tipurgenta_mptmpr_4,i.tipurgenta_alteautospeciale_1,i.tipurgenta_alteautospeciale_2,i.tipurgenta_alteautospeciale_3,i.tipurgenta_alteautospeciale_4,i.tipurgenta_multirisc_1,i.tipurgenta_multirisc_2,i.tipurgenta_multirisc_3,i.tipurgenta_multirisc_4,i.personal_destinat_ofiter,i.personal_destinat_maistru,i.personal_destinat_subofiter,i.personal_destinat_voluntar,i.personal_destinat_politie,i.personal_destinat_jandarmi,i.personal_destinat_frontiera,i.personal_destinat_armata,i.personal_destinat_cetateni,i.pers_salvate_adulti,i.pers_evacuate_adulti,i.pers_salvate_copii,i.pers_evacuate_copii,i.deces_ars_isu,i.deces_asfix_isu,i.ranit_ars_isu,i.ranit_asfix_isu,i.deces_ars_svsu,i.deces_asfix_svsu,i.ranit_ars_svsu,i.ranit_asfix_svsu,i.deces_ars_altep,i.deces_asfix_altep,i.ranit_ars_altep,i.ranit_asfix_altep,i.deces_ars_copii,i.deces_asfix_copii,i.ranit_asfix_copii,i.ranit_ars_copii,i.deces_altesit_isu,i.ranit_altesit_isu,i.deces_altesit_svsu,i.ranit_altesit_svsu,i.deces_altesit_altep,i.ranit_altesitx_altep,i.deces_altesit_copii,i.ranit_altesit_copii,i.deced06,i.deced714,i.deced25,i.deced55,i.deced70,i.deced71,i.ranit06,i.ranit714,i.ranit25,i.ranit55,i.ranit70,i.ranit71,i.anim_mari_moarte,i.anim_mari_ranite,i.anim_mici_moarte,i.anim_mici_ranite,i.anim_pasari_moarte,i.anim_pasari_ranite,i.val_salv,i.val_distr,i.sursa_probabila,i.mijloc_producere,i.primul_mat_ars,i.imprejur_determ,i.consecinte_even,i.verific_raport,i.date_suplimentare,i.mijstingere_isu,i.mijstingere_svsu,i.mijstingere_spsu,i.mijstingere_isu_tipb,i.mijstingere_svsu_tipb,i.mijstingere_spsu_tipb,i.mijstingere_isu_tipc,i.mijstingere_svsu_tipc,i.mijstingere_spsu_tipc,i.mijstingere_isu_tipd,i.mijstingere_svsu_tipd,i.mijstingere_spsu_tipd,i.mijstingere_isu_tevigen,i.mijstingere_svsu_tevigen,i.mijstingere_spsu_tevigen,i.mijstingere_isu_refpulb,i.mijstingere_svsu_refpulb,i.mijstingere_spsu_refpulb,i.mijstingere_isu_autostin,i.mijstingere_svsu_autosting,i.mijstingere_spsu_autosting,i.despreob1,i.despreob2,i.despreob3,i.despreob4,i.despreob5,i.despreob6,i.despreob7,i.munitie_asanat_proiectil,i.munitie_asanat_grenade,i.munitie_asanat_grenade_defens,i.munitie_asanat_proiectil,i.munitie_asanat_bombe_artilerie,i.bombe_aviatie,i.mine_antitanc,i.mine_antipers,i.mine_marine,i.aruncator_gren,i.muninfanterie,i.alte_munitii,i.suprafata_afectata,i.expl_mun,i.zona_afect,i.nr_gospodarii,i.poluaretransf,i.asist_spec,i.masuri_su FROM intStingere i LEFT JOIN judete j ON i.judet=j.id LEFT JOIN localitati l ON i.localitati=l.id LEFT JOIN structura s ON i.struct=s.idstructura '.$sqll.' ORDER BY CAST(i.id as UNSIGNED INTEGER) DESC '.$this->limit;
		$stmt = $this->connection->prepare($sqlfinaldesc);
		$stmt->bind_param(str_repeat("s", count($this->parameters)), ...$this->parameters);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($anunt, $judet, $svsu_spsualte, $tipsubunitate, $codsubunit, $subunit, $cod_interv, $nume_victima, $organtutelar,$tipproprietate, $codactivitateeconom, $tipobiectiv, $cod_dest, $cos_fum, $localitate, $urban, $judet, $adresa, $distanta_km, $anunt, $alertare, $sosire, $localizare, $lichidare, $retragere, $forte_cerute_in_sprijin, $procedee_intrerupere, $comandant_interventie, $tipurgenta_asasmare_1, $tipurgenta_asasmedie_1, $tipurgenta_asasmica_1, $tipurgenta_alteasas_1, $tipurgenta_asasmare_2, $tipurgenta_asasmedie_2, $tipurgenta_asasmica_2, $tipurgenta_alteasas_2, $tipurgenta_asasmare_3, $tipurgenta_asasmedie_3, $tipurgenta_asasmica_3, $tipurgenta_alteasas_3, $tipurgenta_asasmare_4, $tipurgenta_asasmedie_4, $tipurgenta_asasmica_4, $tipurgenta_alteasas_4, $tipurgenta_aisi_1, $tipurgenta_aisi_2, $tipurgenta_aisi_3, $tipurgenta_aisi_4, $tipurgenta_aspfgi_1, $tipurgenta_aspfgi_2, $tipurgenta_aspfgi_3, $tipurgenta_aspfgi_4, $tipurgenta_aci_1, $tipurgenta_aci_2, $tipurgenta_aci_3, $tipurgenta_aci_4, $tipurgenta_ambulante_1, $tipurgenta_ambulante_2, $tipurgenta_ambulante_3, $tipurgenta_ambulante_4, $tipurgenta_descarc_1, $tipurgenta_descarc_2, $tipurgenta_descarc_3, $tipurgenta_descarc_4, $tipurgenta_mptmpr_1, $tipurgenta_mptmpr_2, $tipurgenta_mptmpr_3, $tipurgenta_mptmpr_4, $tipurgenta_alteautospeciale_1, $tipurgenta_alteautospeciale_2, $tipurgenta_alteautospeciale_3, $tipurgenta_alteautospeciale_4, $tipurgenta_multirisc_1, $tipurgenta_multirisc_2, $tipurgenta_multirisc_3, $tipurgenta_multirisc_4, $personal_destinat_ofiter, $personal_destinat_maistru, $personal_destinat_subofiter, $personal_destinat_voluntar, $personal_destinat_politie, $personal_destinat_jandarmi, $personal_destinat_frontiera, $personal_destinat_armata, $personal_destinat_cetateni, $pers_salvate_adulti, $pers_evacuate_adulti, $pers_salvate_copii, $pers_evacuate_copii, $deces_ars_isu, $deces_asfix_isu, $ranit_ars_isu, $ranit_asfix_isu, $deces_ars_svsu, $deces_asfix_svsu, $ranit_ars_svsu, $ranit_asfix_svsu, $deces_ars_altep, $deces_asfix_altep, $ranit_ars_altep, $ranit_asfix_altep, $deces_ars_copii, $deces_asfix_copii, $ranit_asfix_copii, $ranit_ars_copii, $deces_altesit_isu, $ranit_altesit_isu, $deces_altesit_svsu, $ranit_altesit_svsu, $deces_altesit_altep, $ranit_altesitx_altep, $deces_altesit_copii, $ranit_altesit_copii, $deced06, $deced714, $deced25, $deced55, $deced70, $deced71, $ranit06, $ranit714, $ranit25, $ranit55, $ranit70, $ranit71, $anim_mari_moarte, $anim_mari_ranite, $anim_mici_moarte, $anim_mici_ranite, $anim_pasari_moarte, $anim_pasari_ranite, $val_salv, $val_distr, $sursa_probabila, $mijloc_producere, $primul_mat_ars, $imprejur_determ, $consecinte_even, $verific_raport, $date_suplimentare, $mijstingere_isu, $mijstingere_svsu, $mijstingere_spsu, $mijstingere_isu_tipb, $mijstingere_svsu_tipb, $mijstingere_spsu_tipb, $mijstingere_isu_tipc, $mijstingere_svsu_tipc, $mijstingere_spsu_tipc, $mijstingere_isu_tipd, $mijstingere_svsu_tipd, $mijstingere_spsu_tipd, $mijstingere_isu_tevigen, $mijstingere_svsu_tevigen, $mijstingere_spsu_tevigen, $mijstingere_isu_refpulb, $mijstingere_svsu_refpulb, $mijstingere_spsu_refpulb, $mijstingere_isu_autostin, $mijstingere_svsu_autosting, $mijstingere_spsu_autosting, $despreob1, $despreob2, $despreob3, $despreob4, $despreob5, $despreob6, $despreob7, $munitie_asanat_proiectil, $munitie_asanat_grenade, $munitie_asanat_grenade_defens, $munitie_asanat_proiectil, $munitie_asanat_bombe_artilerie, $bombe_aviatie, $mine_antitanc, $mine_antipers, $mine_marine, $aruncator_gren, $muninfanterie, $alte_munitii, $suprafata_afectata, $expl_mun, $zona_afect, $nr_gospodarii, $poluaretransf, $asist_spec, $masuri_su);
		$this->resultsdesc = array();
    	while ($stmt->fetch()){
    			$anuntzi=$anuntora=$svsu_filtrat=$nume_filtrat=$localitate_filtrat=$adresa_filtrat=$strada=$numar=$bloc=$scara=$apartament=$etaj=$sosirezi=$sosireora=$localizarezi=$localizareora=$lichidarezi=$lichidareora=$retragerezi=$retragereora=$strada=$numar=$bloc=$scara=$apartament=$etaj=$persoane_salv_adulti=$persoane_salv_copii=$raniti_ISU=$raniti_SVSU=$raniti_alte=$raniti_copii=$date_suplimentare_filtrat=$mijstingere_total=$tevirefulare_total=$teavarefulare1=$teavarefulare2=$teavarefulare3=$tevispuma_total=$tevipulbere_total=$autostingator=$poluaretransf="";
    		if($anunt>0){
    			$anuntzi=date('m/d/Y', $anunt);
    			$anuntora=date('H:i', $anunt);
    		}
    		else{
    			$anuntzi="";
    			$anuntora="";
    		}
    		if($sosire>0){
    			$sosirezi=date('m/d/Y', $anunt);
    			$sosireora=date('H:i', $anunt);
    		}
    		else{
    			$sosirezi="";
    			$sosireora="";
    		}
    		if($localizare>0){
    			$localizarezi=date('m/d/Y', $anunt);
    			$localizarera=date('H:i', $anunt);
    		}
    		else{
    			$localizarezi="";
    			$localizareora="";
    		}
    		if($lichidare>0){
    			$lichidarezi=date('m/d/Y', $anunt);
    			$lichidareora=date('H:i', $anunt);
    		}
    		else{
    			$lichidarezi="";
    			$lichidareora="";
    		}
    		if($retragere>0){
    			$retragerezi=date('m/d/Y', $anunt);
    			$retragereora=date('H:i', $anunt);
    		}
    		else{
    			$retragerezi="";
    			$retragereora="";
    		}
    		$svsu_filtrat=$this->satinze_vars->set_StringDownload($svsu_spsualte);
    		
    		$nume_filtrat=$this->satinze_vars->set_StringDownload($nume_victima);
    		$adresa_filtrat=json_decode($adresa);
    		
    		$strada=$this->satinze_vars->set_StringDownload($adresa_filtrat[0]);
    		$numar=$this->satinze_vars->set_StringDownload($adresa_filtrat[1]);
    		$bloc=$this->satinze_vars->set_StringDownload($adresa_filtrat[2]);
    		$scara=$this->satinze_vars->set_StringDownload($adresa_filtrat[3]);
    		$apartament=$this->satinze_vars->set_StringDownload($adresa_filtrat[4]);
    		$etaj=$this->satinze_vars->set_StringDownload($adresa_filtrat[5]);
    		$date_suplimentare_filtrat=$this->satinze_vars->set_StringDownload($date_suplimentare);
    		$ASAS_urg1 = $tipurgenta_asasmare_1+$tipurgenta_asasmedie_1+$tipurgenta_asasmica_1+$tipurgenta_alteasas_1;
    		$ASAS_urg2=$tipurgenta_asasmare_2+$tipurgenta_asasmedie_2+$tipurgenta_asasmica_2+$tipurgenta_alteasas_2;
    		$ASAS_urg3=$tipurgenta_asasmare_3+$tipurgenta_asasmedie_3+$tipurgenta_asasmica_3+$tipurgenta_alteasas_3;
    		$ASAS_urg4=$tipurgenta_asasmare_4+$tipurgenta_asasmedie_4+$tipurgenta_asasmica_4+$tipurgenta_alteasas_4;
    		$adresa_filtrat = "Str. ".$strada.", nr. ".$numar.", bl. ".$bloc.", sc. ".$scara.", ap. ".$apartament.", et. ".$etaj;
    		$localitate_filtrat=$this->satinze_vars->set_StringDownload($localitate);
    		$persoane_salv_adulti=$pers_salvate_adulti+$pers_evacuate_adulti;
    		$persoane_salv_copii=$pers_salvate_copii+$pers_evacuate_copii;
    		$raniti_ISU=$ranit_ars_isu+$ranit_asfix_isu;
    		$raniti_SVSU= $ranit_ars_svsu+$ranit_asfix_svsu;
    		$raniti_alte = $ranit_ars_altep+$ranit_asfix_altep;
    		$raniti_copii = $ranit_asfix_copii+$ranit_ars_copii;
    		$mijstingere_total=$mijstingere_isu+$mijstingere_svsu+$mijstingere_spsu;
    		($mijstingere_total>0)?$mijstingere_total="D":$mijstingere_total="N";
    		$tevirefulare_total=$mijstingere_isu_tipb+$mijstingere_svsu_tipb+$mijstingere_spsu_tipb+$mijstingere_isu_tipc+$mijstingere_svsu_tipc+$mijstingere_spsu_tipc+$mijstingere_isu_tipd+$mijstingere_svsu_tipd+$mijstingere_spsu_tipd;
    		($tevirefulare_total==1)?$teavarefulare1="D":$teavarefulare1="N";
    		(($tevirefulare_total==2)||($tevirefulare_total==3))?$teavarefulare2="D":$teavarefulare2="N";
    		($tevirefulare_total>3)?$teavarefulare3="D":$teavarefulare3="N";

    		$tevispuma_total=$mijstingere_isu_tevigen+$mijstingere_svsu_tevigen+$mijstingere_spsu_tevigen;
    		($tevispuma_total>0)?$tevispuma_total="D":$tevispuma_total="N";
			$tevipulbere_total=$mijstingere_isu_refpulb+$mijstingere_svsu_refpulb+$mijstingere_spsu_refpulb;
    		($tevipulbere_total>0)?$tevipulbere_total="D":$tevipulbere_total="N";
    		$autostingator=$mijstingere_isu_autostin+$mijstingere_svsu_autosting+$mijstingere_spsu_autosting;
    		($autostingator>0)?$autostingator="D":$autostingator="N";
    		($poluaretransf==1)?$poluaretransf="D":$poluaretransf="N";
    		$dest_filtrat="";
    		$dest_filtrat = $this->dest($cod_dest);
    		$this->resultsdesc[] = array($anuntzi,$anuntora, $judet, $svsu_spsualte, $tipsubunitate, $codsubunit, $subunit, 
    			$cod_interv, $nume_filtrat, $organtutelar,$tipproprietate, $codactivitateeconom, $tipobiectiv, $dest_filtrat, 
    			$cos_fum, $localitate_filtrat, $urban, $judet, $adresa_filtrat, $distanta_km, $anuntzi, $anuntora, $alertare, 
    			$sosirezi, $sosireora, $localizarezi, $localizareora, $lichidarezi, $lichidareora, $retragerezi, $retragereora, 
    			$forte_cerute_in_sprijin, $procedee_intrerupere, $comandant_interventie, $ASAS_urg1, $ASAS_urg2, $ASAS_urg3, $ASAS_urg4, $tipurgenta_aisi_1, $tipurgenta_aisi_2, $tipurgenta_aisi_3, $tipurgenta_aisi_4, 
    			$tipurgenta_aspfgi_1, $tipurgenta_aspfgi_2, $tipurgenta_aspfgi_3, $tipurgenta_aspfgi_4, 
    			$tipurgenta_aci_1, $tipurgenta_aci_2, $tipurgenta_aci_3, $tipurgenta_aci_4, 
    			$tipurgenta_ambulante_1, $tipurgenta_ambulante_2, $tipurgenta_ambulante_3, $tipurgenta_ambulante_4, 
    			$tipurgenta_descarc_1, $tipurgenta_descarc_2, $tipurgenta_descarc_3, $tipurgenta_descarc_4, 
    			$tipurgenta_mptmpr_1, $tipurgenta_mptmpr_2, $tipurgenta_mptmpr_3, $tipurgenta_mptmpr_4, 
    			$tipurgenta_alteautospeciale_1, $tipurgenta_alteautospeciale_2, $tipurgenta_alteautospeciale_3, 
    			$tipurgenta_alteautospeciale_4, $tipurgenta_multirisc_1, $tipurgenta_multirisc_2, $tipurgenta_multirisc_3, 
    			$tipurgenta_multirisc_4, $personal_destinat_ofiter, $personal_destinat_maistru, $personal_destinat_subofiter, 
    			$personal_destinat_voluntar, $personal_destinat_politie, $personal_destinat_jandarmi, 
    			$personal_destinat_frontiera, $personal_destinat_armata, $personal_destinat_cetateni, 
    			$persoane_salv_adulti, $persoane_salv_copii, 
    			$deces_ars_isu, $deces_asfix_isu, $raniti_ISU, $deces_ars_svsu, $deces_asfix_svsu, $raniti_SVSU, $deces_ars_altep, $deces_asfix_altep, $raniti_alte, $deces_ars_copii, $deces_asfix_copii, $raniti_copii, $deces_altesit_isu, $ranit_altesit_isu, $deces_altesit_svsu, $ranit_altesit_svsu, $deces_altesit_altep, $ranit_altesitx_altep, $deces_altesit_copii, $ranit_altesit_copii, $deced06, $deced714, $deced25, $deced55, $deced70, $deced71, $ranit06, $ranit714, $ranit25, $ranit55, $ranit70, $ranit71, $anim_mari_moarte, $anim_mari_ranite, $anim_mici_moarte, $anim_mici_ranite, $anim_pasari_moarte, $anim_pasari_ranite, $val_distr, $val_salv, $sursa_probabila, $mijloc_producere, $primul_mat_ars, $imprejur_determ, $consecinte_even, $verific_raport, $date_suplimentare_filtrat, 
    			$mijstingere_total, $teavarefulare1,$teavarefulare2,$teavarefulare3,
    			$tevispuma_total, $tevipulbere_total, $autostingator, 
    			$despreob1, $despreob2, $despreob3, $despreob4, $despreob5, $despreob6, $despreob7, $munitie_asanat_proiectil, $munitie_asanat_grenade, $munitie_asanat_grenade_defens, $munitie_asanat_bombe_artilerie, $bombe_aviatie, $mine_antitanc, $mine_antipers, $mine_marine, $aruncator_gren, $muninfanterie, $alte_munitii, $suprafata_afectata, $expl_mun, $zona_afect, $nr_gospodarii, $poluaretransf, $asist_spec, $masuri_su);
    	}
			$this->setDescarcare();
			$stmt->close();
		}
		else{
			$sqlfin = 'SELECT COUNT(*) FROM intStingere i LEFT JOIN judete j ON i.judet = j.id LEFT JOIN localitati l ON i.localitati = l.id LEFT JOIN structura s ON i.struct = s.idstructura '.$sqll.' ORDER BY CAST(i.id as UNSIGNED INTEGER) DESC';
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
  				<td colspan=\"2\">$result[8]</td>
  				<td><center>
  					<a class=\"buttonnewsmall\" href=\"fisa-stingere.php?id={$result[0]}\" >Editare</a>
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
