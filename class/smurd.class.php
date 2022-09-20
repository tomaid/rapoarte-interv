 <?php
class InsertSmurd {
	private $fpid;
	public function __construct($connection=null) {
		if(($_POST['cod_interventie']=='')||(!is_numeric($_POST['cod_interventie'])))
		{
			$this->message= ERROR_INTRODUCERE_DATE;
		}
		else {
			$this->tip="S"; // S de la smurd sau I de la interventie stingere
			$satinze_vars = new sanitize();
			require_once "class/esalonsuperior.class.php"; // extrage esaloanele superioare
			$esalonSup = new Esalonsuperior($connection,$_SESSION['acces']);
			$this->eesalon=$esalonSup->getStruct($_SESSION['acces']);
if((!empty($_POST['idofpost']))&&(is_numeric($_POST['idofpost'])))$this->idofpost=$satinze_vars->get_string($connection,$_POST['idofpost']);
(is_numeric($_POST['participanti']))?$this->participanti=$satinze_vars->get_string($connection,$_POST['participanti']):$this->participanti="";
(is_numeric($_POST['categorie_interventie']))?$this->categ_interv=$satinze_vars->get_string($connection,$_POST['categorie_interventie']):$this->categ_interv="";
(is_numeric($_POST['tip_interventie']))?$this->tip_interv=$satinze_vars->get_string($connection,$_POST['tip_interventie']):$this->tip_interv="";
(is_numeric($_POST['cod_interventie']))?$this->cod_interv=$satinze_vars->get_string($connection,$_POST['cod_interventie']):$this->cod_interv="";
(is_numeric($_POST['alertare']))?$this->alertare=$satinze_vars->get_string($connection,$_POST['alertare']):$this->alertare="";
(is_numeric($_POST['cod_alert']))?$this->cod_alert=$satinze_vars->get_string($connection,$_POST['cod_alert']):$this->cod_alert="";
(is_numeric($_POST['solicitare']))?$this->solicitare=$satinze_vars->get_string($connection,$_POST['solicitare']):$this->solicitare="";
(is_numeric($_POST['cod_solicit']))?$this->cod_solicit=$satinze_vars->get_string($connection,$_POST['cod_solicit']):$this->cod_solicit="";
(is_numeric($_POST['destinatie']))?$this->destinatie=$satinze_vars->get_string($connection,$_POST['destinatie']):$this->destinatie="";
(is_numeric($_POST['cod_dest']))?$this->cod_dest=$satinze_vars->get_string($connection,$_POST['cod_dest']):$this->cod_dest="";
(is_numeric($_POST['predare']))?$this->predare=$satinze_vars->get_string($connection,$_POST['predare']):$this->predare="";
(is_numeric($_POST['cod_predare']))?$this->cod_predare=$satinze_vars->get_string($connection,$_POST['cod_predare']):$this->cod_predare="";
$this->nume_victima=$satinze_vars->get_string($connection,$_POST['nume_victima']);
$this->prenume_victima=$satinze_vars->get_string($connection,$_POST['prenume_victima']);
$this->denumire_persoana_nume=$satinze_vars->get_string($connection,$_POST['denumire_persoana_nume']);
$this->denumire_persoana_prenume=$satinze_vars->get_string($connection,$_POST['denumire_persoana_prenume']);
(is_numeric($_POST['varsta_victima']))?$this->varsta_victima=$satinze_vars->get_string($connection,$_POST['varsta_victima']):$this->varsta_victima="";
(is_numeric($_POST['tara']))?$this->tara=$satinze_vars->get_string($connection,$_POST['tara']):$this->tara="";
(is_numeric($_POST['judet']))?$this->judet=$satinze_vars->get_string($connection,$_POST['judet']):$this->judet="";
(is_numeric($_POST['localitati']))?$this->localitati=$satinze_vars->get_string($connection,$_POST['localitati']):$this->localitati="";
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
        $this->retragere = $satinze_vars->get_time_string($connection,$_POST['retragere_zi'],$_POST['retragere_luna'],$_POST['retragere_an'],$_POST['retragere_ora'],$_POST['retragere_min']):$this->retragere="";
((!empty($_POST['spital_zi']))&&(!empty($_POST['spital_luna']))&&(!empty($_POST['spital_an']))&&(!empty($_POST['spital_ora']))&&(!empty($_POST['spital_min'])))?
        $this->spital = $satinze_vars->get_time_string($connection,$_POST['spital_zi'],$_POST['spital_luna'],$_POST['spital_an'],$_POST['spital_ora'],$_POST['spital_min']):$this->spital="";
((!empty($_POST['eliberare_zi']))&&(!empty($_POST['eliberare_luna']))&&(!empty($_POST['eliberare_an']))&&(!empty($_POST['eliberare_ora']))&&(!empty($_POST['eliberare_min'])))?
        $this->eliberare = $satinze_vars->get_time_string($connection,$_POST['eliberare_zi'],$_POST['eliberare_luna'],$_POST['eliberare_an'],$_POST['eliberare_ora'],$_POST['eliberare_min']):$this->eliberare="";
((!empty($_POST['monitorizare_zi']))&&(!empty($_POST['monitorizare_luna']))&&(!empty($_POST['monitorizare_an']))&&(!empty($_POST['monitorizare_ora']))&&(!empty($_POST['monitorizare_min'])))?
        $this->monitorizare = $satinze_vars->get_time_string($connection,$_POST['monitorizare_zi'],$_POST['monitorizare_luna'],$_POST['monitorizare_an'],$_POST['monitorizare_ora'],$_POST['monitorizare_min']):$this->monitorizare="";
((!empty($_POST['imprimare_zi']))&&(!empty($_POST['imprimare_luna']))&&(!empty($_POST['imprimare_an']))&&(!empty($_POST['imprimare_ora']))&&(!empty($_POST['imprimare_min'])))?
        $this->imprimare = $satinze_vars->get_time_string($connection,$_POST['imprimare_zi'],$_POST['imprimare_luna'],$_POST['imprimare_an'],$_POST['imprimare_ora'],$_POST['imprimare_min']):$this->imprimare="";
((!empty($_POST['resuscitare_zi']))&&(!empty($_POST['resuscitare_luna']))&&(!empty($_POST['resuscitare_an']))&&(!empty($_POST['resuscitare_ora']))&&(!empty($_POST['resuscitare_min'])))?
        $this->resuscitare = $satinze_vars->get_time_string($connection,$_POST['resuscitare_zi'],$_POST['resuscitare_luna'],$_POST['resuscitare_an'],$_POST['resuscitare_ora'],$_POST['resuscitare_min']):$this->resuscitare="";
((!empty($_POST['scr_reusit_zi']))&&(!empty($_POST['scr_reusit_luna']))&&(!empty($_POST['scr_reusit_an']))&&(!empty($_POST['scr_reusit_ora']))&&(!empty($_POST['scr_reusit_min'])))?
        $this->scr_reusit = $satinze_vars->get_time_string($connection,$_POST['scr_reusit_zi'],$_POST['scr_reusit_luna'],$_POST['scr_reusit_an'],$_POST['scr_reusit_ora'],$_POST['scr_reusit_min']):$this->scr_reusit="";
((!empty($_POST['scr_nereusit_zi']))&&(!empty($_POST['scr_nereusit_luna']))&&(!empty($_POST['scr_nereusit_an']))&&(!empty($_POST['scr_nereusit_ora']))&&(!empty($_POST['scr_nereusit_min'])))?
        $this->scr_nereusit = $satinze_vars->get_time_string($connection,$_POST['scr_nereusit_zi'],$_POST['scr_nereusit_luna'],$_POST['scr_nereusit_an'],$_POST['scr_nereusit_ora'],$_POST['scr_nereusit_min']):$this->scr_nereusit="";

 $this->introduceti_descriere = $satinze_vars->get_string($connection,$_POST['introduceti_descriere']);
 $this->date_suplimentare = $satinze_vars->get_string($connection,$_POST['date_suplimentare']);

(is_numeric($_POST['asistate_adulti']))?$this->asistate_adulti=$satinze_vars->get_string($connection,$_POST['asistate_adulti']):$this->asistate_adulti="";
(is_numeric($_POST['chimic_adulti']))?$this->chimic_adulti=$satinze_vars->get_string($connection,$_POST['chimic_adulti']):$this->chimic_adulti="";
(is_numeric($_POST['radiologic_adulti']))?$this->radiologic_adulti=$satinze_vars->get_string($connection,$_POST['radiologic_adulti']):$this->radiologic_adulti="";
(is_numeric($_POST['asistate_copii']))?$this->asistate_copii=$satinze_vars->get_string($connection,$_POST['asistate_copii']):$this->asistate_copii="";
(is_numeric($_POST['chimic_copii']))?$this->chimic_copii=$satinze_vars->get_string($connection,$_POST['chimic_copii']):$this->chimic_copii="";
(is_numeric($_POST['radiologic_copii']))?$this->radiologic_copii=$satinze_vars->get_string($connection,$_POST['radiologic_copii']):$this->radiologic_copii="";
(is_numeric($_POST['nr_socuri']))?$this->nr_socuri=$satinze_vars->get_string($connection,$_POST['nr_socuri']):$this->nr_socuri="";
(is_numeric($_POST['animale_salvate_mari']))?$this->animale_salvate_mari=$satinze_vars->get_string($connection,$_POST['animale_salvate_mari']):$this->animale_salvate_mari="";
(is_numeric($_POST['animale_salvate_mici']))?$this->animale_salvate_mici=$satinze_vars->get_string($connection,$_POST['animale_salvate_mici']):$this->animale_salvate_mici="";
(is_numeric($_POST['animale_salvate_pasari']))?$this->animale_salvate_pasari=$satinze_vars->get_string($connection,$_POST['animale_salvate_pasari']):$this->animale_salvate_pasari="";
(is_numeric($_POST['echip_eba_b2']))?$this->echip_eba_b2=$satinze_vars->get_string($connection,$_POST['echip_eba_b2']):$this->echip_eba_b2="";
(is_numeric($_POST['echip_pma1']))?$this->echip_pma1=$satinze_vars->get_string($connection,$_POST['echip_pma1']):$this->echip_pma1="";
(is_numeric($_POST['echip_desc']))?$this->echip_desc=$satinze_vars->get_string($connection,$_POST['echip_desc']):$this->echip_desc="";
(is_numeric($_POST['echip_pma2']))?$this->echip_pma2=$satinze_vars->get_string($connection,$_POST['echip_pma2']):$this->echip_pma2="";
(is_numeric($_POST['echip_asasd']))?$this->echip_asasd=$satinze_vars->get_string($connection,$_POST['echip_asasd']):$this->echip_asasd="";
(is_numeric($_POST['echip_elicop']))?$this->echip_elicop=$satinze_vars->get_string($connection,$_POST['echip_elicop']):$this->echip_elicop="";
(is_numeric($_POST['echip_timc1']))?$this->echip_timc1=$satinze_vars->get_string($connection,$_POST['echip_timc1']):$this->echip_timc1="";
(is_numeric($_POST['echip_eisi']))?$this->echip_eisi=$satinze_vars->get_string($connection,$_POST['echip_eisi']):$this->echip_eisi="";
(is_numeric($_POST['echip_timnn']))?$this->echip_timnn=$satinze_vars->get_string($connection,$_POST['echip_timnn']):$this->echip_timnn="";
(is_numeric($_POST['echip_scaf']))?$this->echip_scaf=$satinze_vars->get_string($connection,$_POST['echip_scaf']):$this->echip_scaf="";
(is_numeric($_POST['echip_mu']))?$this->echip_mu=$satinze_vars->get_string($connection,$_POST['echip_mu']):$this->echip_mu="";
(is_numeric($_POST['echip_alte']))?$this->echip_alte=$satinze_vars->get_string($connection,$_POST['echip_alte']):$this->echip_alte="";
(is_numeric($_POST['echip_atpvm']))?$this->echip_atpvm=$satinze_vars->get_string($connection,$_POST['echip_atpvm']):$this->echip_atpvm="";
(is_numeric($_POST['echip_saj']))?$this->echip_saj=$satinze_vars->get_string($connection,$_POST['echip_saj']):$this->echip_saj="";
(is_numeric($_POST['echip_moto']))?$this->echip_moto=$satinze_vars->get_string($connection,$_POST['echip_moto']):$this->echip_moto="";
(is_numeric($_POST['echip_sap']))?$this->echip_sap=$satinze_vars->get_string($connection,$_POST['echip_sap']):$this->echip_sap="";
(!empty($_POST['mataj_alte_detalii']))?$this->mataj_alte_detalii=$satinze_vars->get_string($connection,$_POST['mataj_alte_detalii']):$this->mataj_alte_detalii="";
(!empty($_POST['intvmed_detalii']))?$this->intvmed_detalii=$satinze_vars->get_string($connection,$_POST['intvmed_detalii']):$this->intvmed_detalii="";

(!empty($_POST['manevre_descarcerare_1']))?$this->manevre_descarcerare_1=1:$this->manevre_descarcerare_1='';
(!empty($_POST['manevre_descarcerare_2']))?$this->manevre_descarcerare_2=1:$this->manevre_descarcerare_2='';
(!empty($_POST['manevre_descarcerare_3']))?$this->manevre_descarcerare_3=1:$this->manevre_descarcerare_3='';
(!empty($_POST['manevre_descarcerare_4']))?$this->manevre_descarcerare_4=1:$this->manevre_descarcerare_4='';
(!empty($_POST['manevre_descarcerare_5']))?$this->manevre_descarcerare_5=1:$this->manevre_descarcerare_5='';
(!empty($_POST['manevre_descarcerare_6']))?$this->manevre_descarcerare_6=1:$this->manevre_descarcerare_6='';
(!empty($_POST['manevre_descarcerare_7']))?$this->manevre_descarcerare_7=1:$this->manevre_descarcerare_7='';
(!empty($_POST['manevre_descarcerare_8']))?$this->manevre_descarcerare_8=1:$this->manevre_descarcerare_8='';
(!empty($_POST['manevre_descarcerare_9']))?$this->manevre_descarcerare_9=1:$this->manevre_descarcerare_9='';
(!empty($_POST['manevre_descarcerare_10']))?$this->manevre_descarcerare_10=1:$this->manevre_descarcerare_10='';
(!empty($_POST['manevre_descarcerare_11']))?$this->manevre_descarcerare_11=1:$this->manevre_descarcerare_11='';
(!empty($_POST['manevre_descarcerare_12']))?$this->manevre_descarcerare_12=1:$this->manevre_descarcerare_12='';
(!empty($_POST['manevre_descarcerare_13']))?$this->manevre_descarcerare_13=1:$this->manevre_descarcerare_13='';

(!empty($_POST['stare_pacient_constient']))?$this->stare_pacient_constient=1:$this->stare_pacient_constient='';
(!empty($_POST['stare_pacient_decedat']))?$this->stare_pacient_decedat=1:$this->stare_pacient_decedat='';
(!empty($_POST['stare_pacient_inconstient']))?$this->stare_pacient_inconstient=1:$this->stare_pacient_inconstient='';
(!empty($_POST['stare_pacient_trauma']))?$this->stare_pacient_trauma=1:$this->stare_pacient_trauma='';
(!empty($_POST['checkscr']))?$this->checkscr=1:$this->checkscr='';
(!empty($_POST['checkResuscitare']))?$this->checkResuscitare=1:$this->checkResuscitare='';
(!empty($_POST['checkSCR_reusit']))?$this->checkSCR_reusit=1:$this->checkSCR_reusit='';
(!empty($_POST['checkSCR_nereusit']))?$this->checkSCR_nereusit=1:$this->checkSCR_nereusit='';

(!empty($_POST['palide']))?$this->palide=1:$this->palide='';
(!empty($_POST['cianotice']))?$this->cianotice=1:$this->cianotice='';
(!empty($_POST['calde']))?$this->calde=1:$this->calde='';
(!empty($_POST['reci']))?$this->reci=1:$this->reci='';
(!empty($_POST['uscate']))?$this->uscate=1:$this->uscate='';
(!empty($_POST['umede']))?$this->umede=1:$this->umede='';
(!empty($_POST['normale']))?$this->normale=1:$this->normale='';
(!empty($_POST['icterice']))?$this->icterice=1:$this->icterice='';

(!empty($_POST['greturi']))?$this->greturi=1:$this->greturi='';
(!empty($_POST['varsaturi']))?$this->varsaturi=1:$this->varsaturi='';
(!empty($_POST['transpiratii']))?$this->transpiratii=1:$this->transpiratii='';
(!empty($_POST['ameteli']))?$this->ameteli=1:$this->ameteli='';
(!empty($_POST['convulsii']))?$this->convulsii=1:$this->convulsii='';
(!empty($_POST['dureri']))?$this->dureri=1:$this->dureri='';

(!empty($_POST['plaga']))?$this->plaga=1:$this->plaga='';
(!empty($_POST['contuzie']))?$this->contuzie=1:$this->contuzie='';
(!empty($_POST['frinchisa']))?$this->frinchisa=1:$this->frinchisa='';
(!empty($_POST['frdeschis']))?$this->frdeschis=1:$this->frdeschis='';
(!empty($_POST['arsura']))?$this->arsura=1:$this->arsura='';
(!empty($_POST['hipotermie']))?$this->hipotermie=1:$this->hipotermie='';
(!empty($_POST['inec']))?$this->inec=1:$this->inec='';


(!empty($_POST['ars_cr']))?$this->ars_cr=1:$this->ars_cr='';
(!empty($_POST['ars_facara']))?$this->ars_facara=1:$this->ars_facara='';
(!empty($_POST['ars_solid']))?$this->ars_solid=1:$this->ars_solid='';
(!empty($_POST['ars_lichid']))?$this->ars_lichid=1:$this->ars_lichid='';
(!empty($_POST['ars_vapori']))?$this->ars_vapori=1:$this->ars_vapori='';
(!empty($_POST['ars_chimic']))?$this->ars_chimic=1:$this->ars_chimic='';

(!empty($_POST['cresp_deschidere_manuala']))?$this->cresp_deschidere_manuala=1:$this->cresp_deschidere_manuala='';
(!empty($_POST['cresp_aspiratie']))?$this->cresp_aspiratie=1:$this->cresp_aspiratie='';
(!empty($_POST['cresp_pipag']))?$this->cresp_pipag=1:$this->cresp_pipag='';
(!empty($_POST['cresp_oxigen']))?$this->cresp_oxigen=1:$this->cresp_oxigen='';


(!empty($_POST['intubatie_cu_inductie']))?$this->intubatie_cu_inductie=1:$this->intubatie_cu_inductie='';
(!empty($_POST['intubatie_fara_inductie']))?$this->intubatie_fara_inductie=1:$this->intubatie_fara_inductie='';

(!empty($_POST['vent_balon']))?$this->vent_balon=1:$this->vent_balon='';
(!empty($_POST['vent_masca']))?$this->vent_masca=1:$this->vent_masca='';

(!empty($_POST['resuscitare_compres']))?$this->resuscitare_compres=1:$this->resuscitare_compres='';
(!empty($_POST['resuscitare_intrav']))?$this->resuscitare_intrav=1:$this->resuscitare_intrav='';
(!empty($_POST['resuscitare_defibrib']))?$this->resuscitare_defibrib=1:$this->resuscitare_defibrib='';
(!empty($_POST['resuscitare_socuri']))?$this->resuscitare_socuri=1:$this->resuscitare_socuri='';

(!empty($_POST['transport_prelata']))?$this->transport_prelata=1:$this->transport_prelata='';
(!empty($_POST['transport_scaun']))?$this->transport_scaun=1:$this->transport_scaun='';
(!empty($_POST['transport_targa']))?$this->transport_targa=1:$this->transport_targa='';

(!empty($_POST['apld']))?$this->apld=1:$this->apld='';
(!empty($_POST['apln']))?$this->apln=1:$this->apln='';


(!empty($_POST['mataj_desc']))?$this->mataj_desc=1:$this->mataj_desc='';
(!empty($_POST['mataj_guler']))?$this->mataj_guler=1:$this->mataj_guler='';
(!empty($_POST['mataj_saltea']))?$this->mataj_saltea=1:$this->mataj_saltea='';
(!empty($_POST['mataj_targa']))?$this->mataj_targa=1:$this->mataj_targa='';
(!empty($_POST['mataj_ked']))?$this->mataj_ked=1:$this->mataj_ked='';
(!empty($_POST['mataj_alte']))?$this->mataj_alte=1:$this->mataj_alte='';

(!empty($_POST['pupile_normal_stanga']))?$this->pupile_normal_stanga=1:$this->pupile_normal_stanga='';
(!empty($_POST['pupile_normal_dreapta']))?$this->pupile_normal_dreapta=1:$this->pupile_normal_dreapta='';
(!empty($_POST['pupile_reactive_stanga']))?$this->pupile_reactive_stanga=1:$this->pupile_reactive_stanga='';
(!empty($_POST['pupile_reactive_dreapta']))?$this->pupile_reactive_dreapta=1:$this->pupile_reactive_dreapta='';
(!empty($_POST['pupile_nereactive_stanga']))?$this->pupile_nereactive_stanga=1:$this->pupile_nereactive_stanga='';
(!empty($_POST['pupile_nereactive_dreapta']))?$this->pupile_nereactive_dreapta=1:$this->pupile_nereactive_dreapta='';
(!empty($_POST['pupile_midriaza_stanga']))?$this->pupile_midriaza_stanga=1:$this->pupile_midriaza_stanga='';
(!empty($_POST['pupile_midriaza_dreapta']))?$this->pupile_midriaza_dreapta=1:$this->pupile_midriaza_dreapta='';
(!empty($_POST['pupile_mioza_stanga']))?$this->pupile_mioza_stanga=1:$this->pupile_mioza_stanga='';
(!empty($_POST['pupile_mioza_dreapta']))?$this->pupile_mioza_dreapta=1:$this->pupile_mioza_dreapta='';

(!empty($_POST['intvmed_pans']))?$this->intvmed_pans=1:$this->intvmed_pans='';
(!empty($_POST['intvmed_folie']))?$this->intvmed_folie=1:$this->intvmed_folie='';
(!empty($_POST['intvmed_hemo']))?$this->intvmed_hemo=1:$this->intvmed_hemo='';
(!empty($_POST['intvmed_plagi']))?$this->intvmed_plagi=1:$this->intvmed_plagi='';
(!empty($_POST['intvmed_alte']))?$this->intvmed_alte=1:$this->intvmed_alte='';

(!empty($_POST['intravilan']))?$this->intravilan=1:$this->intravilan='';
(!empty($_POST['extravilan']))?$this->extravilan=1:$this->extravilan='';

(!empty($_POST['cr_deschise']))?$this->cr_deschise=1:$this->cr_deschise='';
(!empty($_POST['cr_obstruct']))?$this->cr_obstruct=1:$this->cr_obstruct='';
(!empty($_POST['cr_preluat']))?$this->cr_preluat=1:$this->cr_preluat='';


(!empty($_POST['resp_normala']))?$this->resp_normala=1:$this->resp_normala='';
(!empty($_POST['resp_absent']))?$this->resp_absent=1:$this->resp_absent='';
(!empty($_POST['resp_dispnee']))?$this->resp_dispnee=1:$this->resp_dispnee='';
(!empty($_POST['resp_balon']))?$this->resp_balon=1:$this->resp_balon='';

(!empty($_POST['stare_predare_agitat']))?$this->stare_predare_agitat=1:$this->stare_predare_agitat='';
(!empty($_POST['stare_predare_agrav']))?$this->stare_predare_agrav=1:$this->stare_predare_agrav='';
(!empty($_POST['stare_predare_ameliorat']))?$this->stare_predare_ameliorat=1:$this->stare_predare_ameliorat='';
(!empty($_POST['stare_predare_cooperant']))?$this->stare_predare_cooperant=1:$this->stare_predare_cooperant='';


(!empty($_POST['deces_laloculsol']))?$this->deces_laloculsol=1:$this->deces_laloculsol='';
(!empty($_POST['deces_intrans']))?$this->deces_intrans=1:$this->deces_intrans='';

(!empty($_POST['stare_predare_inres']))?$this->stare_predare_inres=1:$this->stare_predare_inres='';
(!empty($_POST['stare_predare_necoop']))?$this->stare_predare_necoop=1:$this->stare_predare_necoop='';
(!empty($_POST['stare_predare_nuecazul']))?$this->stare_predare_nuecazul=1:$this->stare_predare_nuecazul='';
(!empty($_POST['stare_predare_ostil']))?$this->stare_predare_ostil=1:$this->stare_predare_ostil='';
(!empty($_POST['stare_predare_stationar']))?$this->stare_predare_stationar=1:$this->stare_predare_stationar='';


(!empty($_POST['refuz_examin']))?$this->refuz_examin=1:$this->refuz_examin='';
(!empty($_POST['refuz_trans']))?$this->refuz_trans=1:$this->refuz_trans='';
(!empty($_POST['refuz_tratament']))?$this->refuz_tratament=1:$this->refuz_tratament='';

(!empty($_POST['puls_prezent']))?$this->puls_prezent=1:$this->puls_prezent='';
(!empty($_POST['puls_absent']))?$this->puls_absent=1:$this->puls_absent='';
(!empty($_POST['puls_plin']))?$this->puls_plin=1:$this->puls_plin='';
(!empty($_POST['puls_filiform']))?$this->puls_filiform=1:$this->puls_filiform='';
(!empty($_POST['puls_ritmic']))?$this->puls_ritmic=1:$this->puls_ritmic='';
(!empty($_POST['puls_aritmic']))?$this->puls_aritmic=1:$this->puls_aritmic='';

(!empty($_POST['ekg_bradicardie']))?$this->ekg_bradicardie=1:$this->ekg_bradicardie='';
(!empty($_POST['ekg_tahicardie']))?$this->ekg_tahicardie=1:$this->ekg_tahicardie='';
(!empty($_POST['ekg_defib']))?$this->ekg_defib=1:$this->ekg_defib='';
(!empty($_POST['ekg_nedefib']))?$this->ekg_nedefib=1:$this->ekg_nedefib='';
(!empty($_POST['ekg_fa']))?$this->ekg_fa=1:$this->ekg_fa='';
(!empty($_POST['ekg_regulat']))?$this->ekg_regulat=1:$this->ekg_regulat='';
(!empty($_POST['ekg_nereg']))?$this->ekg_nereg=1:$this->ekg_nereg='';
(!empty($_POST['ekg_prezent']))?$this->ekg_prezent=1:$this->ekg_prezent='';
(!empty($_POST['ekg_abs']))?$this->ekg_abs=1:$this->ekg_abs='';
(!empty($_POST['ekg_largi']))?$this->ekg_largi=1:$this->ekg_largi='';
(!empty($_POST['ekg_inguste']))?$this->ekg_inguste=1:$this->ekg_inguste='';

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
	$stmt = $connection->prepare('INSERT INTO intSmurd (struct, igsu, isu, subunit, participanti, tipsubunitate, codsubunit, categ_interv, tip_interv, cod_interv, alertare, cod_alertare, solicitare, cod_solicit, destinatie, cod_destinatie, predare, cod_predare, nume_victima, prenume_victima, denumire_persoana_nume, denumire_persoana_prenume, varsta_victima, tara, judet, localitati, sat, adresa, latitude, longitude, km, plecare, anunt, sosire, producere, retragere, spital, eliberare, monitorizare, imprimare, resuscitare, scr_reusit, scr_nereusit, descriere, date_suplimentare, asistate_adulti, chimic_adulti, radiologic_adulti, asistate_copii, chimic_copii, radiologic_copii, nr_socuri, animale_salvate_mari, animale_salvate_mici, animale_salvate_pasari, echip_eba_b2, echip_pma1, echip_desc, echip_pma2, echip_asasd, echip_elicop, echip_timc1, echip_eisi, echip_timnn, echip_scaf, echip_mu, echip_alte, echip_atpvm, echip_saj, echip_moto, echip_sap, mataj_alte_detalii, intvmed_detalii, manevre_descarcerare_1, manevre_descarcerare_2, manevre_descarcerare_3, manevre_descarcerare_4, manevre_descarcerare_5, manevre_descarcerare_6, manevre_descarcerare_7, manevre_descarcerare_8, manevre_descarcerare_9, manevre_descarcerare_10, manevre_descarcerare_11, manevre_descarcerare_12, manevre_descarcerare_13, stare_pacient_constient, stare_pacient_decedat, stare_pacient_inconstient, stare_pacient_trauma, checkscr, checkResuscitare, checkSCR_reusit, checkSCR_nereusit, palide, cianotice, calde, reci, uscate, umede, normale, icterice, greturi, varsaturi, transpiratii, ameteli, convulsii, dureri, plaga, contuzie, frinchisa, frdeschis, arsura, hipotermie, inec, ars_cr, ars_facara, ars_solid, ars_lichid, ars_vapori, ars_chimic, cresp_deschidere_manuala, cresp_aspiratie, cresp_pipag, cresp_oxigen, intubatie_cu_inductie, intubatie_fara_inductie, vent_balon, vent_masca, resuscitare_compres, resuscitare_intrav, resuscitare_defibrib, resuscitare_socuri, transport_prelata, transport_scaun, transport_targa, apld, apln, mataj_desc, mataj_guler, mataj_saltea, mataj_targa, mataj_ked, mataj_alte, pupile_normal_stanga, pupile_normal_dreapta, pupile_reactive_stanga, pupile_reactive_dreapta, pupile_nereactive_stanga, pupile_nereactive_dreapta, pupile_midriaza_stanga, pupile_midriaza_dreapta, pupile_mioza_stanga, pupile_mioza_dreapta, intvmed_pans, intvmed_folie, intvmed_hemo, intvmed_plagi, intvmed_alte, intravilan, extravilan, cr_deschise, cr_obstruct, cr_preluat, resp_normala, resp_absent, resp_dispnee, resp_balon, stare_predare_agitat, stare_predare_agrav, stare_predare_ameliorat, stare_predare_cooperant, deces_laloculsol, deces_intrans, stare_predare_inres, stare_predare_necoop, stare_predare_nuecazul, stare_predare_ostil, stare_predare_stationar, refuz_examin, refuz_trans, refuz_tratament, puls_prezent, puls_absent, puls_plin, puls_filiform, puls_ritmic, puls_aritmic, ekg_bradicardie, ekg_tahicardie, ekg_defib, ekg_nedefib, ekg_fa, ekg_regulat, ekg_nereg, ekg_prezent, ekg_abs, ekg_largi, ekg_inguste, inserttime) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	$stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', $_SESSION['acces'],$this->esalon1,$this->esalon2,$this->esalon3,$this->participanti, $_SESSION['tipsubunitate'], $_SESSION['codsubunitate'], $this->categ_interv, $this->tip_interv, $this->cod_interv, $this->alertare, $this->cod_alert, $this->solicitare, $this->cod_solicit, $this->destinatie, $this->cod_dest, $this->predare, $this->cod_predare, $this->nume_victima, $this->prenume_victima, $this->denumire_persoana_nume, $this->denumire_persoana_prenume, $this->varsta_victima, $this->tara, $this->judet, $this->localitati, $this->sate, $this->adresa, $this->laty, $this->longx, $this->distanta_km, $this->plecare, $this->anunt, $this->sosire, $this->producere, $this->retragere, $this->spital, $this->eliberare, $this->monitorizare, $this->imprimare, $this->resuscitare, $this->scr_reusit, $this->scr_nereusit, $this->introduceti_descriere, $this->date_suplimentare, $this->asistate_adulti, $this->chimic_adulti, $this->radiologic_adulti, $this->asistate_copii, $this->chimic_copii, $this->radiologic_copii, $this->nr_socuri, $this->animale_salvate_mari, $this->animale_salvate_mici, $this->animale_salvate_pasari, $this->echip_eba_b2, $this->echip_pma1, $this->echip_desc, $this->echip_pma2, $this->echip_asasd, $this->echip_elicop, $this->echip_timc1, $this->echip_eisi, $this->echip_timnn, $this->echip_scaf, $this->echip_mu, $this->echip_alte, $this->echip_atpvm, $this->echip_saj, $this->echip_moto, $this->echip_sap, $this->mataj_alte_detalii, $this->intvmed_detalii, $this->manevre_descarcerare_1, $this->manevre_descarcerare_2, $this->manevre_descarcerare_3, $this->manevre_descarcerare_4, $this->manevre_descarcerare_5, $this->manevre_descarcerare_6, $this->manevre_descarcerare_7, $this->manevre_descarcerare_8, $this->manevre_descarcerare_9, $this->manevre_descarcerare_10, $this->manevre_descarcerare_11, $this->manevre_descarcerare_12, $this->manevre_descarcerare_13, $this->stare_pacient_constient, $this->stare_pacient_decedat, $this->stare_pacient_inconstient, $this->stare_pacient_trauma, $this->checkscr, $this->checkResuscitare, $this->checkSCR_reusit, $this->checkSCR_nereusit, $this->palide, $this->cianotice, $this->calde, $this->reci, $this->uscate, $this->umede, $this->normale, $this->icterice, $this->greturi, $this->varsaturi, $this->transpiratii, $this->ameteli, $this->convulsii, $this->dureri, $this->plaga, $this->contuzie, $this->frinchisa, $this->frdeschis, $this->arsura, $this->hipotermie, $this->inec, $this->ars_cr, $this->ars_facara, $this->ars_solid, $this->ars_lichid, $this->ars_vapori, $this->ars_chimic, $this->cresp_deschidere_manuala, $this->cresp_aspiratie, $this->cresp_pipag, $this->cresp_oxigen, $this->intubatie_cu_inductie, $this->intubatie_fara_inductie, $this->vent_balon, $this->vent_masca, $this->resuscitare_compres, $this->resuscitare_intrav, $this->resuscitare_defibrib, $this->resuscitare_socuri, $this->transport_prelata, $this->transport_scaun, $this->transport_targa, $this->apld, $this->apln, $this->mataj_desc, $this->mataj_guler, $this->mataj_saltea, $this->mataj_targa, $this->mataj_ked, $this->mataj_alte, $this->pupile_normal_stanga, $this->pupile_normal_dreapta, $this->pupile_reactive_stanga, $this->pupile_reactive_dreapta, $this->pupile_nereactive_stanga, $this->pupile_nereactive_dreapta, $this->pupile_midriaza_stanga, $this->pupile_midriaza_dreapta, $this->pupile_mioza_stanga, $this->pupile_mioza_dreapta, $this->intvmed_pans, $this->intvmed_folie, $this->intvmed_hemo, $this->intvmed_plagi, $this->intvmed_alte, $this->intravilan, $this->extravilan, $this->cr_deschise, $this->cr_obstruct, $this->cr_preluat, $this->resp_normala, $this->resp_absent, $this->resp_dispnee, $this->resp_balon, $this->stare_predare_agitat, $this->stare_predare_agrav, $this->stare_predare_ameliorat, $this->stare_predare_cooperant, $this->deces_laloculsol, $this->deces_intrans, $this->stare_predare_inres, $this->stare_predare_necoop, $this->stare_predare_nuecazul, $this->stare_predare_ostil, $this->stare_predare_stationar, $this->refuz_examin, $this->refuz_trans, $this->refuz_tratament, $this->puls_prezent, $this->puls_absent, $this->puls_plin, $this->puls_filiform, $this->puls_ritmic, $this->puls_aritmic, $this->ekg_bradicardie, $this->ekg_tahicardie, $this->ekg_defib, $this->ekg_nedefib, $this->ekg_fa, $this->ekg_regulat, $this->ekg_nereg, $this->ekg_prezent, $this->ekg_abs, $this->ekg_largi, $this->ekg_inguste, $this->inserttime);
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
			$verif=$verifyid->verifySmurd($connection,$this->idofpost);
			if($verif)
			{

			$stmt = $connection->prepare('UPDATE intSmurd SET participanti=?, categ_interv=?, tip_interv=?, cod_interv=?, alertare=?, cod_alertare=?, solicitare=?, cod_solicit=?, destinatie=?, cod_destinatie=?, predare=?, cod_predare=?, nume_victima=?, prenume_victima=?, denumire_persoana_nume=?, denumire_persoana_prenume=?, varsta_victima=?, tara=?, judet=?, localitati=?, sat=?, adresa=?, latitude=?, longitude=?, km=?, plecare=?, anunt=?, sosire=?, producere=?, retragere=?, spital=?, eliberare=?, monitorizare=?, imprimare=?, resuscitare=?, scr_reusit=?, scr_nereusit=?, descriere=?, date_suplimentare=?, asistate_adulti=?, chimic_adulti=?, radiologic_adulti=?, asistate_copii=?, chimic_copii=?, radiologic_copii=?, nr_socuri=?, animale_salvate_mari=?, animale_salvate_mici=?, animale_salvate_pasari=?, echip_eba_b2=?, echip_pma1=?, echip_desc=?, echip_pma2=?, echip_asasd=?, echip_elicop=?, echip_timc1=?, echip_eisi=?, echip_timnn=?, echip_scaf=?, echip_mu=?, echip_alte=?, echip_atpvm=?, echip_saj=?, echip_moto=?, echip_sap=?, mataj_alte_detalii=?, intvmed_detalii=?, manevre_descarcerare_1=?, manevre_descarcerare_2=?, manevre_descarcerare_3=?, manevre_descarcerare_4=?, manevre_descarcerare_5=?, manevre_descarcerare_6=?, manevre_descarcerare_7=?, manevre_descarcerare_8=?, manevre_descarcerare_9=?, manevre_descarcerare_10=?, manevre_descarcerare_11=?, manevre_descarcerare_12=?, manevre_descarcerare_13=?, stare_pacient_constient=?, stare_pacient_decedat=?, stare_pacient_inconstient=?, stare_pacient_trauma=?, checkscr=?, checkResuscitare=?, checkSCR_reusit=?, checkSCR_nereusit=?, palide=?, cianotice=?, calde=?, reci=?, uscate=?, umede=?, normale=?, icterice=?, greturi=?, varsaturi=?, transpiratii=?, ameteli=?, convulsii=?, dureri=?, plaga=?, contuzie=?, frinchisa=?, frdeschis=?, arsura=?, hipotermie=?, inec=?, ars_cr=?, ars_facara=?, ars_solid=?, ars_lichid=?, ars_vapori=?, ars_chimic=?, cresp_deschidere_manuala=?, cresp_aspiratie=?, cresp_pipag=?, cresp_oxigen=?, intubatie_cu_inductie=?, intubatie_fara_inductie=?, vent_balon=?, vent_masca=?, resuscitare_compres=?, resuscitare_intrav=?, resuscitare_defibrib=?, resuscitare_socuri=?, transport_prelata=?, transport_scaun=?, transport_targa=?, apld=?, apln=?, mataj_desc=?, mataj_guler=?, mataj_saltea=?, mataj_targa=?, mataj_ked=?, mataj_alte=?, pupile_normal_stanga=?, pupile_normal_dreapta=?, pupile_reactive_stanga=?, pupile_reactive_dreapta=?, pupile_nereactive_stanga=?, pupile_nereactive_dreapta=?, pupile_midriaza_stanga=?, pupile_midriaza_dreapta=?, pupile_mioza_stanga=?, pupile_mioza_dreapta=?, intvmed_pans=?, intvmed_folie=?, intvmed_hemo=?, intvmed_plagi=?, intvmed_alte=?, intravilan=?, extravilan=?, cr_deschise=?, cr_obstruct=?, cr_preluat=?, resp_normala=?, resp_absent=?, resp_dispnee=?, resp_balon=?, stare_predare_agitat=?, stare_predare_agrav=?, stare_predare_ameliorat=?, stare_predare_cooperant=?, deces_laloculsol=?, deces_intrans=?, stare_predare_inres=?, stare_predare_necoop=?, stare_predare_nuecazul=?, stare_predare_ostil=?, stare_predare_stationar=?, refuz_examin=?, refuz_trans=?, refuz_tratament=?, puls_prezent=?, puls_absent=?, puls_plin=?, puls_filiform=?, puls_ritmic=?, puls_aritmic=?, ekg_bradicardie=?, ekg_tahicardie=?, ekg_defib=?, ekg_nedefib=?, ekg_fa=?, ekg_regulat=?, ekg_nereg=?, ekg_prezent=?, ekg_abs=?, ekg_largi=?, ekg_inguste=? WHERE id=? AND struct=?');
	$stmt->bind_param('sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', $this->participanti, $this->categ_interv, $this->tip_interv, $this->cod_interv, $this->alertare, $this->cod_alert, $this->solicitare, $this->cod_solicit, $this->destinatie, $this->cod_dest, $this->predare, $this->cod_predare, $this->nume_victima, $this->prenume_victima, $this->denumire_persoana_nume, $this->denumire_persoana_prenume, $this->varsta_victima, $this->tara, $this->judet, $this->localitati, $this->sate, $this->adresa, $this->laty, $this->longx, $this->distanta_km, $this->plecare, $this->anunt, $this->sosire, $this->producere, $this->retragere, $this->spital, $this->eliberare, $this->monitorizare, $this->imprimare, $this->resuscitare, $this->scr_reusit, $this->scr_nereusit, $this->introduceti_descriere, $this->date_suplimentare, $this->asistate_adulti, $this->chimic_adulti, $this->radiologic_adulti, $this->asistate_copii, $this->chimic_copii, $this->radiologic_copii, $this->nr_socuri, $this->animale_salvate_mari, $this->animale_salvate_mici, $this->animale_salvate_pasari, $this->echip_eba_b2, $this->echip_pma1, $this->echip_desc, $this->echip_pma2, $this->echip_asasd, $this->echip_elicop, $this->echip_timc1, $this->echip_eisi, $this->echip_timnn, $this->echip_scaf, $this->echip_mu, $this->echip_alte, $this->echip_atpvm, $this->echip_saj, $this->echip_moto, $this->echip_sap, $this->mataj_alte_detalii, $this->intvmed_detalii, $this->manevre_descarcerare_1, $this->manevre_descarcerare_2, $this->manevre_descarcerare_3, $this->manevre_descarcerare_4, $this->manevre_descarcerare_5, $this->manevre_descarcerare_6, $this->manevre_descarcerare_7, $this->manevre_descarcerare_8, $this->manevre_descarcerare_9, $this->manevre_descarcerare_10, $this->manevre_descarcerare_11, $this->manevre_descarcerare_12, $this->manevre_descarcerare_13, $this->stare_pacient_constient, $this->stare_pacient_decedat, $this->stare_pacient_inconstient, $this->stare_pacient_trauma, $this->checkscr, $this->checkResuscitare, $this->checkSCR_reusit, $this->checkSCR_nereusit, $this->palide, $this->cianotice, $this->calde, $this->reci, $this->uscate, $this->umede, $this->normale, $this->icterice, $this->greturi, $this->varsaturi, $this->transpiratii, $this->ameteli, $this->convulsii, $this->dureri, $this->plaga, $this->contuzie, $this->frinchisa, $this->frdeschis, $this->arsura, $this->hipotermie, $this->inec, $this->ars_cr, $this->ars_facara, $this->ars_solid, $this->ars_lichid, $this->ars_vapori, $this->ars_chimic, $this->cresp_deschidere_manuala, $this->cresp_aspiratie, $this->cresp_pipag, $this->cresp_oxigen, $this->intubatie_cu_inductie, $this->intubatie_fara_inductie, $this->vent_balon, $this->vent_masca, $this->resuscitare_compres, $this->resuscitare_intrav, $this->resuscitare_defibrib, $this->resuscitare_socuri, $this->transport_prelata, $this->transport_scaun, $this->transport_targa, $this->apld, $this->apln, $this->mataj_desc, $this->mataj_guler, $this->mataj_saltea, $this->mataj_targa, $this->mataj_ked, $this->mataj_alte, $this->pupile_normal_stanga, $this->pupile_normal_dreapta, $this->pupile_reactive_stanga, $this->pupile_reactive_dreapta, $this->pupile_nereactive_stanga, $this->pupile_nereactive_dreapta, $this->pupile_midriaza_stanga, $this->pupile_midriaza_dreapta, $this->pupile_mioza_stanga, $this->pupile_mioza_dreapta, $this->intvmed_pans, $this->intvmed_folie, $this->intvmed_hemo, $this->intvmed_plagi, $this->intvmed_alte, $this->intravilan, $this->extravilan, $this->cr_deschise, $this->cr_obstruct, $this->cr_preluat, $this->resp_normala, $this->resp_absent, $this->resp_dispnee, $this->resp_balon, $this->stare_predare_agitat, $this->stare_predare_agrav, $this->stare_predare_ameliorat, $this->stare_predare_cooperant, $this->deces_laloculsol, $this->deces_intrans, $this->stare_predare_inres, $this->stare_predare_necoop, $this->stare_predare_nuecazul, $this->stare_predare_ostil, $this->stare_predare_stationar, $this->refuz_examin, $this->refuz_trans, $this->refuz_tratament, $this->puls_prezent, $this->puls_absent, $this->puls_plin, $this->puls_filiform, $this->puls_ritmic, $this->puls_aritmic, $this->ekg_bradicardie, $this->ekg_tahicardie, $this->ekg_defib, $this->ekg_nedefib, $this->ekg_fa, $this->ekg_regulat, $this->ekg_nereg, $this->ekg_prezent, $this->ekg_abs, $this->ekg_largi, $this->ekg_inguste, $this->idofpost, $_SESSION['acces']);
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
