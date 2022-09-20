class Getinputs {
  constructor(id) {
  	this.id = id;	
  }
  async Cauta(){
	let getInterv = await fetch(`async/get_Smurdid.php?id=` + this.id);
	let tipinterv = await getInterv.json();
	this.typeint = tipinterv;
  }
  convert09(number){
  if((number<10)&&(number=>0))
  	return "0"+number;
  return number;
  }
  
  setDate(unixdata,stare)
  {
	  var data = new Date(unixdata*1000);
	  document.getElementById(stare+"zi").value=this.convert09(data.getDate());
	  document.getElementById(stare+"luna").value=this.convert09(data.getMonth()+1);
	  document.getElementById(stare+"an").value=this.convert09(data.getFullYear());
	  document.getElementById(stare+"ora").value=this.convert09(data.getHours());
	  document.getElementById(stare+"min").value=this.convert09(data.getMinutes());
	  document.getElementById(stare+"zi").disabled=false;
	  document.getElementById(stare+"luna").disabled=false;
	  document.getElementById(stare+"an").disabled=false;
	  document.getElementById(stare+"ora").disabled=false;
	  document.getElementById(stare+"min").disabled=false;
  }
  searchOption(option, valoare)
  {
  	var i;
  	var valoption=document.getElementById(valoare);
  	if(valoption!=null){
    for (i = 0; i < valoption.options.length; i++) {
      if(valoption.options[i].value == option)
      {
        valoption.selectedIndex=i;
      }
    }
    }
  }
  async load(){
  	await this.Cauta();
  	// console.log(this.typeint);
  	if(this.typeint[1])
  		document.getElementById("nrigsu").innerHTML=this.typeint[1];
  	if(this.typeint[2])
  		document.getElementById("nrisu").innerHTML=this.typeint[2];
  	if(this.typeint[5])
  		document.getElementById("tipsubunitate").innerHTML=this.typeint[5];
  	if(this.typeint[6])
  		document.getElementById("codsubunit").innerHTML=this.convert09(this.typeint[6]);
  	if(this.typeint[3])
  	{
  		document.getElementById("nrsubunitate").innerHTML=this.typeint[3];
  		document.getElementById("nrsmurdsubunitate").innerHTML=" numărul "+this.typeint[3];
  		document.getElementById("nrsubunitate").innerHTML=this.typeint[3];
  		document.getElementById("nrordine").innerHTML=this.typeint[3];
  	}
  	if(this.typeint[4])
  		this.searchOption(this.typeint[4],"participanti");
  	if(this.typeint[7])
  		this.searchOption(this.typeint[7],"categorie_interventie");
  	if(this.typeint[8])
  	{
  		await tipInterventie.Cauta('categorie_interventie','participanti');
  		this.searchOption(this.typeint[8],"tip_interventie");
  	}
  	if(this.typeint[9])
  		document.getElementById("cod_interventie").value=this.typeint[9];
  	if(this.typeint[10])
  		this.searchOption(this.typeint[10],"alertare");
  	if(this.typeint[11])
  		document.getElementById("cod_alert").value=this.typeint[11];
  	if(this.typeint[12])
  		this.searchOption(this.typeint[12],"solicitare");
  	if(this.typeint[13])
  		document.getElementById("cod_solicit").value=this.typeint[13];
  	if(this.typeint[14])
  		this.searchOption(this.typeint[14],"destinatie");
  	if(this.typeint[15])
  		document.getElementById("cod_dest").value=this.typeint[15];
  	if(this.typeint[16])
  		this.searchOption(this.typeint[16],"predare");
  	if(this.typeint[17])
  		document.getElementById("cod_predare").value=this.typeint[17];
  	if(this.typeint[18])
  		document.getElementById("nume_victima").value=this.typeint[18];
  	if(this.typeint[19])
  		document.getElementById("prenume_victima").value=this.typeint[19];
  	if(this.typeint[20])
  		document.getElementById("denumire_persoana_nume").value=this.typeint[20];
  	if(this.typeint[21])
  		document.getElementById("denumire_persoana_prenume").value=this.typeint[21];
  	if(this.typeint[22])
  		document.getElementById("varsta_victima").value=this.typeint[22];
  	if(this.typeint[23])
  		this.searchOption(this.typeint[23],"tara");
  	if(this.typeint[24])
  		this.searchOption(this.typeint[24],"judet");
  	if(this.typeint[25])
  	{	await Localitati.cautaLocalitate(this.typeint[24]);
  		this.searchOption(this.typeint[25],"localitati");
  	}
  	if(this.typeint[26])
  	{	await Sate.cautaSat(this.typeint[25]);
  		this.searchOption(this.typeint[26],"sate");
  	}
  	if(this.typeint[27])
  	{
  		let adresa = JSON.parse(this.typeint[27]);
  		document.getElementById("adresa_strada").value=adresa[0];
		document.getElementById("adresa_nr").value=adresa[1];
		document.getElementById("adresa_bl").value=adresa[2];
		document.getElementById("adresa_sc").value=adresa[3];
		document.getElementById("adresa_ap").value=adresa[4];
		document.getElementById("adresa_et").value=adresa[5];
  	}
  	if(this.typeint[28])
  		document.getElementById("laty").value=this.typeint[28];
  	if(this.typeint[29])
  		document.getElementById("longx").value=this.typeint[29];
  	if(this.typeint[30])
  		document.getElementById("distanta_km").value=this.typeint[30];
  	if((this.typeint[31])&&(this.typeint[31]!=0))
  		this.setDate(this.typeint[31],"plecare_");
  	if((this.typeint[32])&&(this.typeint[32]!=0))
  		this.setDate(this.typeint[32],"anunt_");
  	if((this.typeint[33])&&(this.typeint[33]!=0))
  		this.setDate(this.typeint[33],"sosire_");
  	if((this.typeint[34])&&(this.typeint[34]!=0))
  		this.setDate(this.typeint[34],"producere_");
  	if((this.typeint[35])&&(this.typeint[35]!=0))
  		this.setDate(this.typeint[35],"retragere_");
  	if((this.typeint[36])&&(this.typeint[36]!=0))
  		this.setDate(this.typeint[36],"spital_");
  	if((this.typeint[37])&&(this.typeint[37]!=0))
  		this.setDate(this.typeint[37],"eliberare_");
  	if((this.typeint[38])&&(this.typeint[38]!=0))
  		this.setDate(this.typeint[38],"monitorizare_");
  	if((this.typeint[39])&&(this.typeint[39]!=0))
  		this.setDate(this.typeint[39],"imprimare_");
  	if((this.typeint[40])&&(this.typeint[40]!=0))
  		this.setDate(this.typeint[40],"resuscitare_");
  	if((this.typeint[41])&&(this.typeint[41]!=0))
  		this.setDate(this.typeint[41],"scr_reusit_");
  	if((this.typeint[42])&&(this.typeint[42]!=0))
  		this.setDate(this.typeint[42],"scr_nereusit_");
  	if(this.typeint[43])
  		document.getElementById("introduceti_descriere").value=this.typeint[43].replace(/(?:\\[rn])+/g, " ");
  	if(this.typeint[44])
  		document.getElementById("date_suplimentare").value=this.typeint[44].replace(/(?:\\[rn])+/g, " ");
  	if(this.typeint[45])
  		document.getElementById("asistate_adulti").value=this.typeint[45];
  	if(this.typeint[46])
  		document.getElementById("chimic_adulti").value=this.typeint[46];
  	if(this.typeint[47])
  		document.getElementById("radiologic_adulti").value=this.typeint[47];
  	if(this.typeint[48])
  		document.getElementById("asistate_copii").value=this.typeint[48];
  	if(this.typeint[49])
  		document.getElementById("chimic_copii").value=this.typeint[49];
  	if(this.typeint[50])
  		document.getElementById("radiologic_copii").value=this.typeint[50];
  	if(this.typeint[51])
  		document.getElementById("nr_socuri").value=this.typeint[51];
  	if(this.typeint[52])
  		document.getElementById("animale_salvate_mari").value=this.typeint[52];
  	if(this.typeint[53])
  		document.getElementById("animale_salvate_mici").value=this.typeint[53];
  	if(this.typeint[54])
  		document.getElementById("animale_salvate_pasari").value=this.typeint[54];
  	if(this.typeint[55])
  		document.getElementById("echip_eba_b2").value=this.typeint[55];
  	if(this.typeint[56])
  		document.getElementById("echip_pma1").value=this.typeint[56];
  	if(this.typeint[57])
  		document.getElementById("echip_desc").value=this.typeint[57];
  	if(this.typeint[58])
  		document.getElementById("echip_pma2").value=this.typeint[58];
  	if(this.typeint[59])
  		document.getElementById("echip_asasd").value=this.typeint[59];
  	if(this.typeint[60])
  		document.getElementById("echip_elicop").value=this.typeint[60];
  	if(this.typeint[61])
  		document.getElementById("echip_timc1").value=this.typeint[61];
  	if(this.typeint[62])
  		document.getElementById("echip_eisi").value=this.typeint[62];
  	if(this.typeint[63])
  		document.getElementById("echip_timnn").value=this.typeint[63];
  	if(this.typeint[64])
  		document.getElementById("echip_scaf").value=this.typeint[64];
  	if(this.typeint[65])
  		document.getElementById("echip_mu").value=this.typeint[65];
  	if(this.typeint[66])
  		document.getElementById("echip_alte").value=this.typeint[66];
  	if(this.typeint[67])
  		document.getElementById("echip_atpvm").value=this.typeint[67];
  	if(this.typeint[68])
  		document.getElementById("echip_saj").value=this.typeint[68];
  	if(this.typeint[69])
  		document.getElementById("echip_moto").value=this.typeint[69];
  	if(this.typeint[70])
  		document.getElementById("echip_sap").value=this.typeint[70];
  	if(this.typeint[71])
  		document.getElementById("mataj_alte_detalii").value=this.typeint[71];
  	if(this.typeint[72])
  		document.getElementById("intvmed_detalii").value=this.typeint[72];
  	if(this.typeint[73]==1)
  		document.getElementById("manevre_descarcerare_1").value="X";
  	if(this.typeint[74]==1)
  		document.getElementById("manevre_descarcerare_2").value="X";
  	if(this.typeint[75]==1)
  		document.getElementById("manevre_descarcerare_3").value="X";
  	if(this.typeint[76]==1)
  		document.getElementById("manevre_descarcerare_4").value="X";
  	if(this.typeint[77]==1)
  		document.getElementById("manevre_descarcerare_5").value="X";
  	if(this.typeint[78]==1)
  		document.getElementById("manevre_descarcerare_6").value="X";
  	if(this.typeint[79]==1)
  		document.getElementById("manevre_descarcerare_7").value="X";
  	if(this.typeint[80]==1)
  		document.getElementById("manevre_descarcerare_8").value="X";
  	if(this.typeint[81]==1)
  		document.getElementById("manevre_descarcerare_9").value="X";
  	if(this.typeint[82]==1)
  		document.getElementById("manevre_descarcerare_10").value="X";
  	if(this.typeint[83]==1)
  		document.getElementById("manevre_descarcerare_11").value="X";
  	if(this.typeint[84]==1)
  		document.getElementById("manevre_descarcerare_12").value="X";
  	if(this.typeint[85]==1)
  		document.getElementById("manevre_descarcerare_13").value="X";
  	if(this.typeint[86]==1)
  		document.getElementById("stare_pacient_constient").checked=true;
  	if(this.typeint[87]==1)
  		document.getElementById("stare_pacient_decedat").checked=true;
  	if(this.typeint[88]==1)
  		document.getElementById("stare_pacient_constient").checked=true;
  	if(this.typeint[89]==1)
  		document.getElementById("stare_pacient_trauma").checked=true;
  	if(this.typeint[90]==1)
  		document.getElementById("checkscr").checked=true;
  	if(this.typeint[91]==1)
  	{
  		document.getElementById("checkResuscitare").checked=true;
  		document.getElementById("checkResuscitare").disabled=false;
  	}
  	if(this.typeint[92]==1)
  	{
  		document.getElementById("checkSCR_reusit").checked=true;
  		document.getElementById("checkSCR_reusit").disabled=false;
  	}
  	if(this.typeint[93]==1)
  	{
  		document.getElementById("checkSCR_nereusit").checked=true;
  		document.getElementById("checkSCR_nereusit").disabled=false;
  	}
  	if(this.typeint[94]==1)
  		document.getElementById("palide").checked=true;
  	if(this.typeint[95]==1)
  		document.getElementById("cianotice").checked=true;
  	if(this.typeint[96]==1)
  		document.getElementById("calde").checked=true;
  	if(this.typeint[97]==1)
  		document.getElementById("reci").checked=true;
  	if(this.typeint[98]==1)
  		document.getElementById("uscate").checked=true;
  	if(this.typeint[99]==1)
  		document.getElementById("umede").checked=true;
  	if(this.typeint[100]==1)document.getElementById("normale").checked=true;
	if(this.typeint[101]==1)document.getElementById("icterice").checked=true;
	if(this.typeint[102]==1)document.getElementById("greturi").checked=true;
	if(this.typeint[103]==1)document.getElementById("varsaturi").checked=true;
	if(this.typeint[104]==1)document.getElementById("transpiratii").checked=true;
	if(this.typeint[105]==1)document.getElementById("ameteli").checked=true;
	if(this.typeint[106]==1)document.getElementById("convulsii").checked=true;
	if(this.typeint[107]==1)document.getElementById("dureri").checked=true;
	if(this.typeint[108]==1)document.getElementById("plaga").checked=true;
	if(this.typeint[109]==1)document.getElementById("contuzie").checked=true;
	if(this.typeint[110]==1)document.getElementById("frinchisa").checked=true;
	if(this.typeint[111]==1)document.getElementById("frdeschis").checked=true;
	if(this.typeint[112]==1)document.getElementById("arsura").checked=true;
	if(this.typeint[113]==1)document.getElementById("hipotermie").checked=true;
	if(this.typeint[114]==1)document.getElementById("inec").checked=true;
	if(this.typeint[115]==1)document.getElementById("ars_cr").checked=true;
	if(this.typeint[116]==1)document.getElementById("ars_facara").checked=true;
	if(this.typeint[117]==1)document.getElementById("ars_solid").checked=true;
	if(this.typeint[118]==1)document.getElementById("ars_lichid").checked=true;
	if(this.typeint[119]==1)document.getElementById("ars_vapori").checked=true;
	if(this.typeint[120]==1)document.getElementById("ars_chimic").checked=true;
	if(this.typeint[121]==1)document.getElementById("cresp_deschidere_manuala").checked=true;
	if(this.typeint[122]==1)document.getElementById("cresp_aspiratie").checked=true;
	if(this.typeint[123]==1)document.getElementById("cresp_pipag").checked=true;
	if(this.typeint[124]==1)document.getElementById("cresp_oxigen").checked=true;
	if(this.typeint[125]==1)document.getElementById("intubatie_cu_inductie").checked=true;
	if(this.typeint[126]==1)document.getElementById("intubatie_fara_inductie").checked=true;
	if(this.typeint[127]==1)document.getElementById("vent_balon").checked=true;
	if(this.typeint[128]==1)document.getElementById("vent_masca").checked=true;
	if(this.typeint[129]==1)document.getElementById("resuscitare_compres").checked=true;
	if(this.typeint[130]==1)document.getElementById("resuscitare_intrav").checked=true;
	if(this.typeint[131]==1)document.getElementById("resuscitare_defibrib").checked=true;
	if(this.typeint[132]==1)document.getElementById("resuscitare_socuri").checked=true;
	if(this.typeint[133]==1)document.getElementById("transport_prelata").checked=true;
	if(this.typeint[134]==1)document.getElementById("transport_scaun").checked=true;
	if(this.typeint[135]==1)document.getElementById("transport_targa").checked=true;
	if(this.typeint[136]==1)document.getElementById("apld").checked=true;
	if(this.typeint[137]==1)document.getElementById("apln").checked=true;
	if(this.typeint[138]==1)document.getElementById("mataj_desc").checked=true;
	if(this.typeint[139]==1)document.getElementById("mataj_guler").checked=true;
	if(this.typeint[140]==1)document.getElementById("mataj_saltea").checked=true;
	if(this.typeint[141]==1)document.getElementById("mataj_targa").checked=true;
	if(this.typeint[142]==1)document.getElementById("mataj_ked").checked=true;
	if(this.typeint[143]==1)document.getElementById("mataj_alte").checked=true;
	if(this.typeint[144]==1)document.getElementById("pupile_normal_stanga").checked=true;
	if(this.typeint[145]==1)document.getElementById("pupile_normal_dreapta").checked=true;
	if(this.typeint[146]==1)document.getElementById("pupile_reactive_stanga").checked=true;
	if(this.typeint[147]==1)document.getElementById("pupile_reactive_dreapta").checked=true;
	if(this.typeint[148]==1)document.getElementById("pupile_nereactive_stanga").checked=true;
	if(this.typeint[149]==1)document.getElementById("pupile_nereactive_dreapta").checked=true;
	if(this.typeint[150]==1)document.getElementById("pupile_midriaza_stanga").checked=true;
	if(this.typeint[151]==1)document.getElementById("pupile_midriaza_dreapta").checked=true;
	if(this.typeint[152]==1)document.getElementById("pupile_mioza_stanga").checked=true;
	if(this.typeint[153]==1)document.getElementById("pupile_mioza_dreapta").checked=true;
	if(this.typeint[154]==1)document.getElementById("intvmed_pans").checked=true;
	if(this.typeint[155]==1)document.getElementById("intvmed_folie").checked=true;
	if(this.typeint[156]==1)document.getElementById("intvmed_hemo").checked=true;
	if(this.typeint[157]==1)document.getElementById("intvmed_plagi").checked=true;
	if(this.typeint[158]==1)document.getElementById("intvmed_alte").checked=true;
	if(this.typeint[159]==1)document.getElementById("intravilan").checked=true;
	if(this.typeint[160]==1)document.getElementById("extravilan").checked=true;
	if(this.typeint[161]==1)document.getElementById("cr_deschise").checked=true;
	if(this.typeint[162]==1)document.getElementById("cr_obstruct").checked=true;
	if(this.typeint[163]==1)document.getElementById("cr_preluat").checked=true;
	if(this.typeint[164]==1)document.getElementById("resp_normala").checked=true;
	if(this.typeint[165]==1)document.getElementById("resp_absent").checked=true;
	if(this.typeint[166]==1)document.getElementById("resp_dispnee").checked=true;
	if(this.typeint[167]==1)document.getElementById("resp_balon").checked=true;
	if(this.typeint[168]==1)document.getElementById("stare_predare_agitat").checked=true;
	if(this.typeint[169]==1)document.getElementById("stare_predare_agrav").checked=true;
	if(this.typeint[170]==1)document.getElementById("stare_predare_ameliorat").checked=true;
	if(this.typeint[171]==1)document.getElementById("stare_predare_cooperant").checked=true;
	if(this.typeint[172]==1)document.getElementById("deces_laloculsol").checked=true;
	if(this.typeint[173]==1)document.getElementById("deces_intrans").checked=true;
	if(this.typeint[174]==1)document.getElementById("stare_predare_inres").checked=true;
	if(this.typeint[175]==1)document.getElementById("stare_predare_necoop").checked=true;
	if(this.typeint[176]==1)document.getElementById("stare_predare_nuecazul").checked=true;
	if(this.typeint[177]==1)document.getElementById("stare_predare_ostil").checked=true;
	if(this.typeint[178]==1)document.getElementById("stare_predare_stationar").checked=true;
	if(this.typeint[179]==1)document.getElementById("refuz_examin").checked=true;
	if(this.typeint[180]==1)document.getElementById("refuz_trans").checked=true;
	if(this.typeint[181]==1)document.getElementById("refuz_tratament").checked=true;
	if(this.typeint[182]==1)document.getElementById("puls_prezent").checked=true;
	if(this.typeint[183]==1)document.getElementById("puls_absent").checked=true;
	if(this.typeint[184]==1)document.getElementById("puls_plin").checked=true;
	if(this.typeint[185]==1)document.getElementById("puls_filiform").checked=true;
	if(this.typeint[186]==1)document.getElementById("puls_ritmic").checked=true;
	if(this.typeint[187]==1)document.getElementById("puls_aritmic").checked=true;
	if(this.typeint[188]==1)document.getElementById("ekg_bradicardie").checked=true;
	if(this.typeint[189]==1)document.getElementById("ekg_tahicardie").checked=true;
	if(this.typeint[190]==1)document.getElementById("ekg_defib").checked=true;
	if(this.typeint[191]==1)document.getElementById("ekg_nedefib").checked=true;
	if(this.typeint[192]==1)document.getElementById("ekg_fa").checked=true;
	if(this.typeint[193]==1)document.getElementById("ekg_regulat").checked=true;
	if(this.typeint[194]==1)document.getElementById("ekg_nereg").checked=true;
	if(this.typeint[195]==1)document.getElementById("ekg_prezent").checked=true;
	if(this.typeint[196]==1)document.getElementById("ekg_abs").checked=true;
	if(this.typeint[197]==1)document.getElementById("ekg_largi").checked=true;
	if(this.typeint[198]==1)document.getElementById("ekg_inguste").checked=true;

  	
  	
  		
  	
  	
  			
  
  		
  		
  		
  		
  		
  		
  		
  	
  }
}
