 <?php
 class FisaSmurd {
	private $id;
	public function __construct($connection=null, $id="") {
        require_once "verifyid.class.php"; // verifica daca userul poate modifica interventia cu id-ul
        $verifyid = new Verifyid($connection);
        $verif=$verifyid->verifySmurd($connection,$id);
        if(!$verif)exit();
        $parameters[] = $id;
  		  foreach($_SESSION['subunit_acces'] as $cod){
        	$conditions[] = 's.struct = ? ';
        	$parameters[] = $cod;
        }
    		$sqll = implode(" OR ", $conditions);
    		$sqlstat = 'SELECT s.struct, s.igsu, s.isu, s.subunit, s.participanti, s.tipsubunitate , s.codsubunit, s.categ_interv, s.tip_interv, s.cod_interv, s.alertare, s.cod_alertare, s.solicitare, s.cod_solicit, s.destinatie, s.cod_destinatie, s.predare, s.cod_predare, s.nume_victima, s.prenume_victima, s.denumire_persoana_nume, s.denumire_persoana_prenume, s.varsta_victima, s.tara, s.judet, s.localitati, s.sat, s.adresa, s.latitude, s.longitude, s.km, s.plecare, s.anunt, s.sosire, s.producere, s.retragere, s.spital, s.eliberare, s.monitorizare, s.imprimare, s.resuscitare, s.scr_reusit, s.scr_nereusit, s.descriere, s.date_suplimentare, s.asistate_adulti, s.chimic_adulti, s.radiologic_adulti, s.asistate_copii, s.chimic_copii, s.radiologic_copii, s.nr_socuri, s.animale_salvate_mari, s.animale_salvate_mici, s.animale_salvate_pasari, s.echip_eba_b2, s.echip_pma1, s.echip_desc, s.echip_pma2, s.echip_asasd, s.echip_elicop, s.echip_timc1, s.echip_eisi, s.echip_timnn, s.echip_scaf, s.echip_mu, s.echip_alte, s.echip_atpvm, s.echip_saj, s.echip_moto, s.echip_sap, s.mataj_alte_detalii, s.intvmed_detalii, s.manevre_descarcerare_1, s.manevre_descarcerare_2, s.manevre_descarcerare_3, s.manevre_descarcerare_4, s.manevre_descarcerare_5, s.manevre_descarcerare_6, s.manevre_descarcerare_7, s.manevre_descarcerare_8, s.manevre_descarcerare_9, s.manevre_descarcerare_10, s.manevre_descarcerare_11, s.manevre_descarcerare_12, s.manevre_descarcerare_13, s.stare_pacient_constient, s.stare_pacient_decedat, s.stare_pacient_inconstient, s.stare_pacient_trauma, s.checkscr, s.checkResuscitare, s.checkSCR_reusit, s.checkSCR_nereusit, s.palide, s.cianotice, s.calde, s.reci, s.uscate, s.umede, s.normale, s.icterice, s.greturi, s.varsaturi, s.transpiratii, s.ameteli, s.convulsii, s.dureri, s.plaga, s.contuzie, s.frinchisa, s.frdeschis, s.arsura, s.hipotermie, s.inec, s.ars_cr, s.ars_facara, s.ars_solid, s.ars_lichid, s.ars_vapori, s.ars_chimic, s.cresp_deschidere_manuala, s.cresp_aspiratie, s.cresp_pipag, s.cresp_oxigen, s.intubatie_cu_inductie, s.intubatie_fara_inductie, s.vent_balon, s.vent_masca, s.resuscitare_compres, s.resuscitare_intrav, s.resuscitare_defibrib, s.resuscitare_socuri, s.transport_prelata, s.transport_scaun, s.transport_targa, s.apld, s.apln, s.mataj_desc, s.mataj_guler, s.mataj_saltea, s.mataj_targa, s.mataj_ked, s.mataj_alte, s.pupile_normal_stanga, s.pupile_normal_dreapta, s.pupile_reactive_stanga, s.pupile_reactive_dreapta, s.pupile_nereactive_stanga, s.pupile_nereactive_dreapta, s.pupile_midriaza_stanga, s.pupile_midriaza_dreapta, s.pupile_mioza_stanga, s.pupile_mioza_dreapta, s.intvmed_pans, s.intvmed_folie, s.intvmed_hemo, s.intvmed_plagi, s.intvmed_alte, s.intravilan, s.extravilan, s.cr_deschise, s.cr_obstruct, s.cr_preluat, s.resp_normala, s.resp_absent, s.resp_dispnee, s.resp_balon, s.stare_predare_agitat, s.stare_predare_agrav, s.stare_predare_ameliorat, s.stare_predare_cooperant, s.deces_laloculsol, s.deces_intrans, s.stare_predare_inres, s.stare_predare_necoop, s.stare_predare_nuecazul, s.stare_predare_ostil, s.stare_predare_stationar, s.refuz_examin, s.refuz_trans, s.refuz_tratament, s.puls_prezent, s.puls_absent, s.puls_plin, s.puls_filiform, s.puls_ritmic, s.puls_aritmic, s.ekg_bradicardie, s.ekg_tahicardie, s.ekg_defib, s.ekg_nedefib, s.ekg_fa, s.ekg_regulat, s.ekg_nereg, s.ekg_prezent, s.ekg_abs, s.ekg_largi, s.ekg_inguste FROM intSmurd s WHERE s.id = ? AND ('.$sqll.') LIMIT 1';
  $stmt = $connection->prepare($sqlstat);
  $stmt->bind_param(str_repeat("s", count($parameters)), ...$parameters);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($struct, $igsu, $isu, $subunit, $participanti, $tipsubunitate , $codsubunit, $categ_interv, $tip_interv, $cod_interv, $alertare, $cod_alertare, $solicitare, $cod_solicit, $destinatie, $cod_destinatie, $predare, $cod_predare, $nume_victima, $prenume_victima, $denumire_persoana_nume, $denumire_persoana_prenume, $varsta_victima, $tara, $judet, $localitati, $sat, $adresa, $latitude, $longitude, $km, $plecare, $anunt, $sosire, $producere, $retragere, $spital, $eliberare, $monitorizare, $imprimare, $resuscitare, $scr_reusit, $scr_nereusit, $descriere, $date_suplimentare, $asistate_adulti, $chimic_adulti, $radiologic_adulti, $asistate_copii, $chimic_copii, $radiologic_copii, $nr_socuri, $animale_salvate_mari, $animale_salvate_mici, $animale_salvate_pasari, $echip_eba_b2, $echip_pma1, $echip_desc, $echip_pma2, $echip_asasd, $echip_elicop, $echip_timc1, $echip_eisi, $echip_timnn, $echip_scaf, $echip_mu, $echip_alte, $echip_atpvm, $echip_saj, $echip_moto, $echip_sap, $mataj_alte_detalii, $intvmed_detalii, $manevre_descarcerare_1, $manevre_descarcerare_2, $manevre_descarcerare_3, $manevre_descarcerare_4, $manevre_descarcerare_5, $manevre_descarcerare_6, $manevre_descarcerare_7, $manevre_descarcerare_8, $manevre_descarcerare_9, $manevre_descarcerare_10, $manevre_descarcerare_11, $manevre_descarcerare_12, $manevre_descarcerare_13, $stare_pacient_constient, $stare_pacient_decedat, $stare_pacient_inconstient, $stare_pacient_trauma, $checkscr, $checkResuscitare, $checkSCR_reusit, $checkSCR_nereusit, $palide, $cianotice, $calde, $reci, $uscate, $umede, $normale, $icterice, $greturi, $varsaturi, $transpiratii, $ameteli, $convulsii, $dureri, $plaga, $contuzie, $frinchisa, $frdeschis, $arsura, $hipotermie, $inec, $ars_cr, $ars_facara, $ars_solid, $ars_lichid, $ars_vapori, $ars_chimic, $cresp_deschidere_manuala, $cresp_aspiratie, $cresp_pipag, $cresp_oxigen, $intubatie_cu_inductie, $intubatie_fara_inductie, $vent_balon, $vent_masca, $resuscitare_compres, $resuscitare_intrav, $resuscitare_defibrib, $resuscitare_socuri, $transport_prelata, $transport_scaun, $transport_targa, $apld, $apln, $mataj_desc, $mataj_guler, $mataj_saltea, $mataj_targa, $mataj_ked, $mataj_alte, $pupile_normal_stanga, $pupile_normal_dreapta, $pupile_reactive_stanga, $pupile_reactive_dreapta, $pupile_nereactive_stanga, $pupile_nereactive_dreapta, $pupile_midriaza_stanga, $pupile_midriaza_dreapta, $pupile_mioza_stanga, $pupile_mioza_dreapta, $intvmed_pans, $intvmed_folie, $intvmed_hemo, $intvmed_plagi, $intvmed_alte, $intravilan, $extravilan, $cr_deschise, $cr_obstruct, $cr_preluat, $resp_normala, $resp_absent, $resp_dispnee, $resp_balon, $stare_predare_agitat, $stare_predare_agrav, $stare_predare_ameliorat, $stare_predare_cooperant, $deces_laloculsol, $deces_intrans, $stare_predare_inres, $stare_predare_necoop, $stare_predare_nuecazul, $stare_predare_ostil, $stare_predare_stationar, $refuz_examin, $refuz_trans, $refuz_tratament, $puls_prezent, $puls_absent, $puls_plin, $puls_filiform, $puls_ritmic, $puls_aritmic, $ekg_bradicardie, $ekg_tahicardie, $ekg_defib, $ekg_nedefib, $ekg_fa, $ekg_regulat, $ekg_nereg, $ekg_prezent, $ekg_abs, $ekg_largi, $ekg_inguste);
  $stmt->fetch();
    $this->resultarray = array($struct, $igsu, $isu, $subunit, $participanti, $tipsubunitate , $codsubunit, $categ_interv, $tip_interv, $cod_interv, $alertare, $cod_alertare, $solicitare, $cod_solicit, $destinatie, $cod_destinatie, $predare, $cod_predare, $nume_victima, $prenume_victima, $denumire_persoana_nume, $denumire_persoana_prenume, $varsta_victima, $tara, $judet, $localitati, $sat, $adresa, $latitude, $longitude, $km, $plecare, $anunt, $sosire, $producere, $retragere, $spital, $eliberare, $monitorizare, $imprimare, $resuscitare, $scr_reusit, $scr_nereusit, $descriere, $date_suplimentare, $asistate_adulti, $chimic_adulti, $radiologic_adulti, $asistate_copii, $chimic_copii, $radiologic_copii, $nr_socuri, $animale_salvate_mari, $animale_salvate_mici, $animale_salvate_pasari, $echip_eba_b2, $echip_pma1, $echip_desc, $echip_pma2, $echip_asasd, $echip_elicop, $echip_timc1, $echip_eisi, $echip_timnn, $echip_scaf, $echip_mu, $echip_alte, $echip_atpvm, $echip_saj, $echip_moto, $echip_sap, $mataj_alte_detalii, $intvmed_detalii, $manevre_descarcerare_1, $manevre_descarcerare_2, $manevre_descarcerare_3, $manevre_descarcerare_4, $manevre_descarcerare_5, $manevre_descarcerare_6, $manevre_descarcerare_7, $manevre_descarcerare_8, $manevre_descarcerare_9, $manevre_descarcerare_10, $manevre_descarcerare_11, $manevre_descarcerare_12, $manevre_descarcerare_13, $stare_pacient_constient, $stare_pacient_decedat, $stare_pacient_inconstient, $stare_pacient_trauma, $checkscr, $checkResuscitare, $checkSCR_reusit, $checkSCR_nereusit, $palide, $cianotice, $calde, $reci, $uscate, $umede, $normale, $icterice, $greturi, $varsaturi, $transpiratii, $ameteli, $convulsii, $dureri, $plaga, $contuzie, $frinchisa, $frdeschis, $arsura, $hipotermie, $inec, $ars_cr, $ars_facara, $ars_solid, $ars_lichid, $ars_vapori, $ars_chimic, $cresp_deschidere_manuala, $cresp_aspiratie, $cresp_pipag, $cresp_oxigen, $intubatie_cu_inductie, $intubatie_fara_inductie, $vent_balon, $vent_masca, $resuscitare_compres, $resuscitare_intrav, $resuscitare_defibrib, $resuscitare_socuri, $transport_prelata, $transport_scaun, $transport_targa, $apld, $apln, $mataj_desc, $mataj_guler, $mataj_saltea, $mataj_targa, $mataj_ked, $mataj_alte, $pupile_normal_stanga, $pupile_normal_dreapta, $pupile_reactive_stanga, $pupile_reactive_dreapta, $pupile_nereactive_stanga, $pupile_nereactive_dreapta, $pupile_midriaza_stanga, $pupile_midriaza_dreapta, $pupile_mioza_stanga, $pupile_mioza_dreapta, $intvmed_pans, $intvmed_folie, $intvmed_hemo, $intvmed_plagi, $intvmed_alte, $intravilan, $extravilan, $cr_deschise, $cr_obstruct, $cr_preluat, $resp_normala, $resp_absent, $resp_dispnee, $resp_balon, $stare_predare_agitat, $stare_predare_agrav, $stare_predare_ameliorat, $stare_predare_cooperant, $deces_laloculsol, $deces_intrans, $stare_predare_inres, $stare_predare_necoop, $stare_predare_nuecazul, $stare_predare_ostil, $stare_predare_stationar, $refuz_examin, $refuz_trans, $refuz_tratament, $puls_prezent, $puls_absent, $puls_plin, $puls_filiform, $puls_ritmic, $puls_aritmic, $ekg_bradicardie, $ekg_tahicardie, $ekg_defib, $ekg_nedefib, $ekg_fa, $ekg_regulat, $ekg_nereg, $ekg_prezent, $ekg_abs, $ekg_largi, $ekg_inguste);
  $stmt->close();
  }

	public function getFisa(){
	      return $this->resultarray;
	}
}
?>