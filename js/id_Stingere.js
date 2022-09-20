class Getinputs {
  constructor(id) {
  	this.id = id;	
  }
  async Cauta(){
	let getInterv = await fetch(`async/get_Stingereid.php?id=` + this.id);
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
  setChecked(idin){
      document.getElementById(idin).checked=true;

  }
  setValue(idout,idvalue){
    document.getElementById(idout).value=idvalue;
  }
  setValueTXT(idout,idvalue){
    document.getElementById(idout).value=idvalue.replace(/(?:\\[rn])+/g, " ");
  }
  setInnerHTML(idout,idvalue){
    document.getElementById(idout).innerHTML=idvalue;
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
    if(this.typeint[1])this.setInnerHTML("nrigsu",this.typeint[1]);
    if(this.typeint[2])
      {
        this.setValue("nrisu",this.typeint[2]);
        this.setInnerHTML("nrisu",this.typeint[2]);
      }
    if(this.typeint[3])
    {
        this.setInnerHTML("nrsubunitate",this.typeint[3]);
        this.setInnerHTML("nrsmurdsubunitate", "numărul "+this.typeint[3]);
        this.setInnerHTML("nrsubunitate",this.typeint[3]);
        this.setInnerHTML("nrordine",this.typeint[3]);
    }
    if(this.typeint[5])this.setInnerHTML("tipsubunitate",this.typeint[5]);
    if(this.typeint[6])this.setInnerHTML("codsubunit",this.convert09(this.typeint[6]));
    if(this.typeint[4])
  		this.searchOption(this.typeint[4],"participanti");
  	if(this.typeint[7])
  		this.searchOption(this.typeint[7],"categorie_interventie");
  	if(this.typeint[8])
  	{
  		await tipInterventie.Cauta('categorie_interventie','participanti');
  		this.searchOption(this.typeint[8],"tip_interventie");
  	}
  	if(this.typeint[9])this.setValue("cod_interventie",this.typeint[9]);
    if(this.typeint[10]!=="")this.setChecked("modalert"+this.typeint[10]);
    if(this.typeint[11])this.setValue("denumire_persoana",this.typeint[11]);
    if(this.typeint[12])this.setValue("svsu_spsu",this.typeint[12]);
  	if(this.typeint[13])this.searchOption(this.typeint[13],"tara");
  	if(this.typeint[14])this.searchOption(this.typeint[14],"judet");
  	if(this.typeint[15])
  	{	await Localitati.cautaLocalitate(this.typeint[14]);
  		this.searchOption(this.typeint[15],"localitati");
  	}
  	if(this.typeint[16])
  	{	await Sate.cautaSat(this.typeint[15]);
  		this.searchOption(this.typeint[16],"sate");
  	}
  	if(this.typeint[17])
  	{
  		let adresa = JSON.parse(this.typeint[17]);
        this.setValue("adresa_strada", adresa[0]);
        this.setValue("adresa_nr", adresa[1]);
        this.setValue("adresa_bl", adresa[2]);
        this.setValue("adresa_sc", adresa[3]);
        this.setValue("adresa_ap", adresa[4]);
        this.setValue("adresa_et", adresa[5]);
  	}
    if((this.typeint[18])&&(this.typeint[18]!=0))this.setValue("laty", this.typeint[18]);
    if((this.typeint[19])&&(this.typeint[19]!=0))this.setValue("longx", this.typeint[19]);
    if(this.typeint[20])this.setValue("distanta_km", this.typeint[20]);

  	if((this.typeint[21])&&(this.typeint[21]!=0))
  		this.setDate(this.typeint[21],"plecare_");
  	if((this.typeint[22])&&(this.typeint[22]!=0))
  		this.setDate(this.typeint[22],"anunt_");
  	if((this.typeint[23])&&(this.typeint[23]!=0))
  		this.setDate(this.typeint[23],"sosire_");
  	if((this.typeint[24])&&(this.typeint[24]!=0))
  		this.setDate(this.typeint[24],"producere_");
  	if((this.typeint[25])&&(this.typeint[25]!=0))
  		this.setDate(this.typeint[25],"retragere_");
  	if((this.typeint[26])&&(this.typeint[26]!=0))
  		this.setDate(this.typeint[26],"spital_");
  	if((this.typeint[27])&&(this.typeint[27]!=0))
  		this.setDate(this.typeint[27],"eliberare_");
  	if((this.typeint[28])&&(this.typeint[28]!=0))
  		this.setDate(this.typeint[28],"monitorizare_");
  	if((this.typeint[29])&&(this.typeint[29]!=0))
  		this.setDate(this.typeint[29],"imprimare_");
    if(this.typeint[30])
      {
        this.searchOption(this.typeint[30],"organ_tutelar");
        this.setValue("cod_organ_tutelar", this.typeint[30]);
      }
    if(this.typeint[31])
      {
        this.searchOption(this.typeint[31],"tip_proprietate");
        this.setValue("cod_tip_proprietate", this.typeint[31]);
      }
    if(this.typeint[32])this.setValue("cod_activitate_economica", this.typeint[32]);
    if(this.typeint[33])
      {
        this.searchOption(this.typeint[33],"tip_obiectiv");
        this.setValue("cod_tip_obiectiv", this.typeint[33]);
      }
    if(this.typeint[34])
      {
        this.searchOption(this.typeint[34],"destinatie");
        this.setValue("cod_dest", this.typeint[34]);
      }
    if(this.typeint[35]!=="")this.setChecked("cos_fum"+this.typeint[35]);
    if(this.typeint[36]!=="")this.setChecked("fortaurg"+this.typeint[36]);
    if(this.typeint[37]!=="")this.setChecked("procintr"+this.typeint[37]);
    if(this.typeint[38])this.setChecked("cdtac"+this.typeint[38]);
    if(this.typeint[39])this.setValue("cdtint", this.typeint[39]);
    if(this.typeint[40]!=="")this.setChecked("ccapop"+this.typeint[40]);

    if((this.typeint[41])&&(this.typeint[41]!=0))this.setValue("pers_of", this.typeint[41]);
    if((this.typeint[42])&&(this.typeint[42]!=0))this.setValue("pers_mm", this.typeint[42]);
    if((this.typeint[43])&&(this.typeint[43]!=0))this.setValue("pers_subof", this.typeint[43]);
    if((this.typeint[44])&&(this.typeint[44]!=0))this.setValue("pers_volunt", this.typeint[44]);
    if((this.typeint[45])&&(this.typeint[45]!=0))this.setValue("pers_prim", this.typeint[45]);
    if((this.typeint[46])&&(this.typeint[46]!=0))this.setValue("pers_vice", this.typeint[46]);
    if((this.typeint[47])&&(this.typeint[47]!=0))this.setValue("pers_secret", this.typeint[47]);
    if((this.typeint[48])&&(this.typeint[48]!=0))this.setValue("pers_svsu", this.typeint[48]);
    if((this.typeint[49])&&(this.typeint[49]!=0))this.setValue("pers_spsu", this.typeint[49]);
    if((this.typeint[50])&&(this.typeint[50]!=0))this.setValue("pers_pol", this.typeint[50]);
    if((this.typeint[51])&&(this.typeint[51]!=0))this.setValue("pers_jandarmi", this.typeint[51]);
    if((this.typeint[52])&&(this.typeint[52]!=0))this.setValue("pers_front", this.typeint[52]);
    if((this.typeint[53])&&(this.typeint[53]!=0))this.setValue("pers_armata", this.typeint[53]);
    if((this.typeint[54])&&(this.typeint[54]!=0))this.setValue("pers_cet", this.typeint[54]);

    if((this.typeint[55])&&(this.typeint[55]!=0))this.setValue("mijstingere_isu", this.typeint[55]);
    if((this.typeint[56])&&(this.typeint[56]!=0))this.setValue("mijstingere_svsu", this.typeint[56]);
    if((this.typeint[57])&&(this.typeint[57]!=0))this.setValue("mijstingere_spsu", this.typeint[57]);
    if((this.typeint[58])&&(this.typeint[58]!=0))this.setValue("mijstingere_isu_tipb", this.typeint[58]);
    if((this.typeint[59])&&(this.typeint[59]!=0))this.setValue("mijstingere_svsu_tipb", this.typeint[59]);
    if((this.typeint[60])&&(this.typeint[60]!=0))this.setValue("mijstingere_spsu_tipb", this.typeint[60]);
    if((this.typeint[61])&&(this.typeint[61]!=0))this.setValue("mijstingere_isu_tipc", this.typeint[61]);
    if((this.typeint[62])&&(this.typeint[62]!=0))this.setValue("mijstingere_svsu_tipc", this.typeint[62]);
    if((this.typeint[63])&&(this.typeint[63]!=0))this.setValue("mijstingere_spsu_tipc", this.typeint[63]);
    if((this.typeint[64])&&(this.typeint[64]!=0))this.setValue("mijstingere_isu_tipd", this.typeint[64]);
    if((this.typeint[65])&&(this.typeint[65]!=0))this.setValue("mijstingere_svsu_tipd", this.typeint[65]);
    if((this.typeint[66])&&(this.typeint[66]!=0))this.setValue("mijstingere_spsu_tipd", this.typeint[66]);
    if((this.typeint[67])&&(this.typeint[67]!=0))this.setValue("mijstingere_isu_tevigen", this.typeint[67]);
    if((this.typeint[68])&&(this.typeint[68]!=0))this.setValue("mijstingere_svsu_tevigen", this.typeint[68]);
    if((this.typeint[69])&&(this.typeint[69]!=0))this.setValue("mijstingere_spsu_tevigen", this.typeint[69]);
    if((this.typeint[70])&&(this.typeint[70]!=0))this.setValue("mijstingere_isu_refpulb", this.typeint[70]);
    if((this.typeint[71])&&(this.typeint[71]!=0))this.setValue("mijstingere_svsu_refpulb", this.typeint[71]);
    if((this.typeint[72])&&(this.typeint[72]!=0))this.setValue("mijstingere_spsu_refpulb", this.typeint[72]);
    if((this.typeint[73])&&(this.typeint[73]!=0))this.setValue("mijstingere_isu_autosting", this.typeint[73]);
    if((this.typeint[74])&&(this.typeint[74]!=0))this.setValue("mijstingere_svsu_autosting", this.typeint[74]);
    if((this.typeint[75])&&(this.typeint[75]!=0))this.setValue("mijstingere_spsu_autosting", this.typeint[75]);


if((this.typeint[76])&&(this.typeint[76]!=0))this.setValue("tipurgenta_multirisc_1", this.typeint[76]);
if((this.typeint[77])&&(this.typeint[77]!=0))this.setValue("tipurgenta_multirisc_2", this.typeint[77]);
if((this.typeint[78])&&(this.typeint[78]!=0))this.setValue("tipurgenta_multirisc_3", this.typeint[78]);
if((this.typeint[79])&&(this.typeint[79]!=0))this.setValue("tipurgenta_multirisc_4", this.typeint[79]);
if((this.typeint[80])&&(this.typeint[80]!=0))this.setValue("tipurgenta_multirisc_svsu", this.typeint[80]);
if((this.typeint[81])&&(this.typeint[81]!=0))this.setValue("tipurgenta_multirisc_spsu", this.typeint[81]);
if((this.typeint[82])&&(this.typeint[82]!=0))this.setValue("tipurgenta_pma2_1", this.typeint[82]);
if((this.typeint[83])&&(this.typeint[83]!=0))this.setValue("tipurgenta_pma2_2", this.typeint[83]);
if((this.typeint[84])&&(this.typeint[84]!=0))this.setValue("tipurgenta_pma2_3", this.typeint[84]);
if((this.typeint[85])&&(this.typeint[85]!=0))this.setValue("tipurgenta_pma2_4", this.typeint[85]);
if((this.typeint[86])&&(this.typeint[86]!=0))this.setValue("tipurgenta_pma2_svsu", this.typeint[86]);
if((this.typeint[87])&&(this.typeint[87]!=0))this.setValue("tipurgenta_pma2_spsu", this.typeint[87]);
if((this.typeint[88])&&(this.typeint[88]!=0))this.setValue("tipurgenta_pma1_1", this.typeint[88]);
if((this.typeint[89])&&(this.typeint[89]!=0))this.setValue("tipurgenta_pma1_2", this.typeint[89]);
if((this.typeint[90])&&(this.typeint[90]!=0))this.setValue("tipurgenta_pma1_3", this.typeint[90]);
if((this.typeint[91])&&(this.typeint[91]!=0))this.setValue("tipurgenta_pma1_4", this.typeint[91]);
if((this.typeint[92])&&(this.typeint[92]!=0))this.setValue("tipurgenta_pma1_svsu", this.typeint[92]);
if((this.typeint[93])&&(this.typeint[93]!=0))this.setValue("tipurgenta_pma1_spsu", this.typeint[93]);
if((this.typeint[94])&&(this.typeint[94]!=0))this.setValue("tipurgenta_asasmare_1", this.typeint[94]);
if((this.typeint[95])&&(this.typeint[95]!=0))this.setValue("tipurgenta_asasmare_2", this.typeint[95]);
if((this.typeint[96])&&(this.typeint[96]!=0))this.setValue("tipurgenta_asasmare_3", this.typeint[96]);
if((this.typeint[97])&&(this.typeint[97]!=0))this.setValue("tipurgenta_asasmare_4", this.typeint[97]);
if((this.typeint[98])&&(this.typeint[98]!=0))this.setValue("tipurgenta_asasmare_svsu", this.typeint[98]);
if((this.typeint[99])&&(this.typeint[99]!=0))this.setValue("tipurgenta_asasmare_spsu", this.typeint[99]);
if((this.typeint[100])&&(this.typeint[100]!=0))this.setValue("tipurgenta_asasmedie_1", this.typeint[100]);
if((this.typeint[101])&&(this.typeint[101]!=0))this.setValue("tipurgenta_asasmedie_2", this.typeint[101]);
if((this.typeint[102])&&(this.typeint[102]!=0))this.setValue("tipurgenta_asasmedie_3", this.typeint[102]);
if((this.typeint[103])&&(this.typeint[103]!=0))this.setValue("tipurgenta_asasmedie_4", this.typeint[103]);
if((this.typeint[104])&&(this.typeint[104]!=0))this.setValue("tipurgenta_asasmedie_svsu", this.typeint[104]);
if((this.typeint[105])&&(this.typeint[105]!=0))this.setValue("tipurgenta_asasmedie_spsu", this.typeint[105]);
if((this.typeint[106])&&(this.typeint[106]!=0))this.setValue("tipurgenta_asasmica_1", this.typeint[106]);
if((this.typeint[107])&&(this.typeint[107]!=0))this.setValue("tipurgenta_asasmica_2", this.typeint[107]);
if((this.typeint[108])&&(this.typeint[108]!=0))this.setValue("tipurgenta_asasmica_3", this.typeint[108]);
if((this.typeint[109])&&(this.typeint[109]!=0))this.setValue("tipurgenta_asasmica_4", this.typeint[109]);
if((this.typeint[110])&&(this.typeint[110]!=0))this.setValue("tipurgenta_asasmica_svsu", this.typeint[110]);
if((this.typeint[111])&&(this.typeint[111]!=0))this.setValue("tipurgenta_asasmica_spsu", this.typeint[111]);
if((this.typeint[112])&&(this.typeint[112]!=0))this.setValue("tipurgenta_alteasas_1", this.typeint[112]);
if((this.typeint[113])&&(this.typeint[113]!=0))this.setValue("tipurgenta_alteasas_2", this.typeint[113]);
if((this.typeint[114])&&(this.typeint[114]!=0))this.setValue("tipurgenta_alteasas_3", this.typeint[114]);
if((this.typeint[115])&&(this.typeint[115]!=0))this.setValue("tipurgenta_alteasas_4", this.typeint[115]);
if((this.typeint[116])&&(this.typeint[116]!=0))this.setValue("tipurgenta_alteasas_svsu", this.typeint[116]);
if((this.typeint[117])&&(this.typeint[117]!=0))this.setValue("tipurgenta_alteasas_spsu", this.typeint[117]);
if((this.typeint[118])&&(this.typeint[118]!=0))this.setValue("tipurgenta_aisi_1", this.typeint[118]);
if((this.typeint[119])&&(this.typeint[119]!=0))this.setValue("tipurgenta_aisi_2", this.typeint[119]);
if((this.typeint[120])&&(this.typeint[120]!=0))this.setValue("tipurgenta_aisi_3", this.typeint[120]);
if((this.typeint[121])&&(this.typeint[121]!=0))this.setValue("tipurgenta_aisi_4", this.typeint[121]);
if((this.typeint[122])&&(this.typeint[122]!=0))this.setValue("tipurgenta_aisi_svsu", this.typeint[122]);
if((this.typeint[123])&&(this.typeint[123]!=0))this.setValue("tipurgenta_aisi_spsu", this.typeint[123]);
if((this.typeint[124])&&(this.typeint[124]!=0))this.setValue("tipurgenta_aspfgi_1", this.typeint[124]);
if((this.typeint[125])&&(this.typeint[125]!=0))this.setValue("tipurgenta_aspfgi_2", this.typeint[125]);
if((this.typeint[126])&&(this.typeint[126]!=0))this.setValue("tipurgenta_aspfgi_3", this.typeint[126]);
if((this.typeint[127])&&(this.typeint[127]!=0))this.setValue("tipurgenta_aspfgi_4", this.typeint[127]);
if((this.typeint[128])&&(this.typeint[128]!=0))this.setValue("tipurgenta_aspfgi_svsu", this.typeint[128]);
if((this.typeint[129])&&(this.typeint[129]!=0))this.setValue("tipurgenta_aspfgi_spsu", this.typeint[129]);
if((this.typeint[130])&&(this.typeint[130]!=0))this.setValue("tipurgenta_aservamop_1", this.typeint[130]);
if((this.typeint[131])&&(this.typeint[131]!=0))this.setValue("tipurgenta_aservamop_2", this.typeint[131]);
if((this.typeint[132])&&(this.typeint[132]!=0))this.setValue("tipurgenta_aservamop_3", this.typeint[132]);
if((this.typeint[133])&&(this.typeint[133]!=0))this.setValue("tipurgenta_aservamop_4", this.typeint[133]);
if((this.typeint[134])&&(this.typeint[134]!=0))this.setValue("tipurgenta_aservamop_svsu", this.typeint[134]);
if((this.typeint[135])&&(this.typeint[135]!=0))this.setValue("tipurgenta_aservamop_spsu", this.typeint[135]);
if((this.typeint[136])&&(this.typeint[136]!=0))this.setValue("tipurgenta_crbnadp_1", this.typeint[136]);
if((this.typeint[137])&&(this.typeint[137]!=0))this.setValue("tipurgenta_crbnadp_2", this.typeint[137]);
if((this.typeint[138])&&(this.typeint[138]!=0))this.setValue("tipurgenta_crbnadp_3", this.typeint[138]);
if((this.typeint[139])&&(this.typeint[139]!=0))this.setValue("tipurgenta_crbnadp_4", this.typeint[139]);
if((this.typeint[140])&&(this.typeint[140]!=0))this.setValue("tipurgenta_crbnadp_svsu", this.typeint[140]);
if((this.typeint[141])&&(this.typeint[141]!=0))this.setValue("tipurgenta_crbnadp_spsu", this.typeint[141]);
if((this.typeint[142])&&(this.typeint[142]!=0))this.setValue("tipurgenta_aci_1", this.typeint[142]);
if((this.typeint[143])&&(this.typeint[143]!=0))this.setValue("tipurgenta_aci_2", this.typeint[143]);
if((this.typeint[144])&&(this.typeint[144]!=0))this.setValue("tipurgenta_aci_3", this.typeint[144]);
if((this.typeint[145])&&(this.typeint[145]!=0))this.setValue("tipurgenta_aci_4", this.typeint[145]);
if((this.typeint[146])&&(this.typeint[146]!=0))this.setValue("tipurgenta_aci_svsu", this.typeint[146]);
if((this.typeint[147])&&(this.typeint[147]!=0))this.setValue("tipurgenta_aci_spsu", this.typeint[147]);
if((this.typeint[148])&&(this.typeint[148]!=0))this.setValue("tipurgenta_aspscaf_1", this.typeint[148]);
if((this.typeint[149])&&(this.typeint[149]!=0))this.setValue("tipurgenta_aspscaf_2", this.typeint[149]);
if((this.typeint[150])&&(this.typeint[150]!=0))this.setValue("tipurgenta_aspscaf_3", this.typeint[150]);
if((this.typeint[151])&&(this.typeint[151]!=0))this.setValue("tipurgenta_aspscaf_4", this.typeint[151]);
if((this.typeint[152])&&(this.typeint[152]!=0))this.setValue("tipurgenta_aspscaf_svsu", this.typeint[152]);
if((this.typeint[153])&&(this.typeint[153]!=0))this.setValue("tipurgenta_aspscaf_spsu", this.typeint[153]);
if((this.typeint[154])&&(this.typeint[154]!=0))this.setValue("tipurgenta_barcisalupe_1", this.typeint[154]);
if((this.typeint[155])&&(this.typeint[155]!=0))this.setValue("tipurgenta_barcisalupe_2", this.typeint[155]);
if((this.typeint[156])&&(this.typeint[156]!=0))this.setValue("tipurgenta_barcisalupe_3", this.typeint[156]);
if((this.typeint[157])&&(this.typeint[157]!=0))this.setValue("tipurgenta_barcisalupe_4", this.typeint[157]);
if((this.typeint[158])&&(this.typeint[158]!=0))this.setValue("tipurgenta_barcisalupe_svsu", this.typeint[158]);
if((this.typeint[159])&&(this.typeint[159]!=0))this.setValue("tipurgenta_barcisalupe_spsu", this.typeint[159]);
if((this.typeint[160])&&(this.typeint[160]!=0))this.setValue("tipurgenta_afzm_1", this.typeint[160]);
if((this.typeint[161])&&(this.typeint[161]!=0))this.setValue("tipurgenta_afzm_2", this.typeint[161]);
if((this.typeint[162])&&(this.typeint[162]!=0))this.setValue("tipurgenta_afzm_3", this.typeint[162]);
if((this.typeint[163])&&(this.typeint[163]!=0))this.setValue("tipurgenta_afzm_4", this.typeint[163]);
if((this.typeint[164])&&(this.typeint[164]!=0))this.setValue("tipurgenta_afzm_svsu", this.typeint[164]);
if((this.typeint[165])&&(this.typeint[165]!=0))this.setValue("tipurgenta_afzm_spsu", this.typeint[165]);
if((this.typeint[166])&&(this.typeint[166]!=0))this.setValue("tipurgenta_ambulante_1", this.typeint[166]);
if((this.typeint[167])&&(this.typeint[167]!=0))this.setValue("tipurgenta_ambulante_2", this.typeint[167]);
if((this.typeint[168])&&(this.typeint[168]!=0))this.setValue("tipurgenta_ambulante_3", this.typeint[168]);
if((this.typeint[169])&&(this.typeint[169]!=0))this.setValue("tipurgenta_ambulante_4", this.typeint[169]);
if((this.typeint[170])&&(this.typeint[170]!=0))this.setValue("tipurgenta_ambulante_svsu", this.typeint[170]);
if((this.typeint[171])&&(this.typeint[171]!=0))this.setValue("tipurgenta_ambulante_spsu", this.typeint[171]);
if((this.typeint[172])&&(this.typeint[172]!=0))this.setValue("tipurgenta_descarc_1", this.typeint[172]);
if((this.typeint[173])&&(this.typeint[173]!=0))this.setValue("tipurgenta_descarc_2", this.typeint[173]);
if((this.typeint[174])&&(this.typeint[174]!=0))this.setValue("tipurgenta_descarc_3", this.typeint[174]);
if((this.typeint[175])&&(this.typeint[175]!=0))this.setValue("tipurgenta_descarc_4", this.typeint[175]);
if((this.typeint[176])&&(this.typeint[176]!=0))this.setValue("tipurgenta_descarc_svsu", this.typeint[176]);
if((this.typeint[177])&&(this.typeint[177]!=0))this.setValue("tipurgenta_descarc_spsu", this.typeint[177]);
if((this.typeint[178])&&(this.typeint[178]!=0))this.setValue("tipurgenta_asptransportapa_1", this.typeint[178]);
if((this.typeint[179])&&(this.typeint[179]!=0))this.setValue("tipurgenta_asptransportapa_2", this.typeint[179]);
if((this.typeint[180])&&(this.typeint[180]!=0))this.setValue("tipurgenta_asptransportapa_3", this.typeint[180]);
if((this.typeint[181])&&(this.typeint[181]!=0))this.setValue("tipurgenta_asptransportapa_4", this.typeint[181]);
if((this.typeint[182])&&(this.typeint[182]!=0))this.setValue("tipurgenta_asptransportapa_svsu", this.typeint[182]);
if((this.typeint[183])&&(this.typeint[183]!=0))this.setValue("tipurgenta_asptransportapa_spsu", this.typeint[183]);
if((this.typeint[184])&&(this.typeint[184]!=0))this.setValue("tipurgenta_mptmpr_1", this.typeint[184]);
if((this.typeint[185])&&(this.typeint[185]!=0))this.setValue("tipurgenta_mptmpr_2", this.typeint[185]);
if((this.typeint[186])&&(this.typeint[186]!=0))this.setValue("tipurgenta_mptmpr_3", this.typeint[186]);
if((this.typeint[187])&&(this.typeint[187]!=0))this.setValue("tipurgenta_mptmpr_4", this.typeint[187]);
if((this.typeint[188])&&(this.typeint[188]!=0))this.setValue("tipurgenta_mptmpr_svsu", this.typeint[188]);
if((this.typeint[189])&&(this.typeint[189]!=0))this.setValue("tipurgenta_mptmpr_spsu", this.typeint[189]);
if((this.typeint[190])&&(this.typeint[190]!=0))this.setValue("tipurgenta_alteautospeciale_1", this.typeint[190]);
if((this.typeint[191])&&(this.typeint[191]!=0))this.setValue("tipurgenta_alteautospeciale_2", this.typeint[191]);
if((this.typeint[192])&&(this.typeint[192]!=0))this.setValue("tipurgenta_alteautospeciale_3", this.typeint[192]);
if((this.typeint[193])&&(this.typeint[193]!=0))this.setValue("tipurgenta_alteautospeciale_4", this.typeint[193]);
if((this.typeint[194])&&(this.typeint[194]!=0))this.setValue("tipurgenta_alteautospeciale_svsu", this.typeint[194]);
if((this.typeint[195])&&(this.typeint[195]!=0))this.setValue("tipurgenta_alteautospeciale_spsu", this.typeint[195]);
if((this.typeint[196])&&(this.typeint[196]!=0))this.setValue("pers_salvate_adulti", this.typeint[196]);
if((this.typeint[197])&&(this.typeint[197]!=0))this.setValue("pers_salvate_copii", this.typeint[197]);
if((this.typeint[198])&&(this.typeint[198]!=0))this.setValue("pers_evacuate_adulti", this.typeint[198]);
if((this.typeint[199])&&(this.typeint[199]!=0))this.setValue("pers_evacuate_copii", this.typeint[199]);
if((this.typeint[200])&&(this.typeint[200]!=0))this.setValue("deces_altesit_altep", this.typeint[200]);
if((this.typeint[201])&&(this.typeint[201]!=0))this.setValue("deces_altesit_copii", this.typeint[201]);
if((this.typeint[202])&&(this.typeint[202]!=0))this.setValue("deces_altesit_isu", this.typeint[202]);
if((this.typeint[203])&&(this.typeint[203]!=0))this.setValue("deces_altesit_svsu", this.typeint[203]);
if((this.typeint[204])&&(this.typeint[204]!=0))this.setValue("deces_ars_altep", this.typeint[204]);
if((this.typeint[205])&&(this.typeint[205]!=0))this.setValue("deces_ars_copii", this.typeint[205]);
if((this.typeint[206])&&(this.typeint[206]!=0))this.setValue("deces_ars_isu", this.typeint[206]);
if((this.typeint[207])&&(this.typeint[207]!=0))this.setValue("deces_ars_svsu", this.typeint[207]);
if((this.typeint[208])&&(this.typeint[208]!=0))this.setValue("deces_asfix_altep", this.typeint[208]);
if((this.typeint[209])&&(this.typeint[209]!=0))this.setValue("deces_asfix_copii", this.typeint[209]);
if((this.typeint[210])&&(this.typeint[210]!=0))this.setValue("deces_asfix_isu", this.typeint[210]);
if((this.typeint[211])&&(this.typeint[211]!=0))this.setValue("deces_asfix_svsu", this.typeint[211]);
if((this.typeint[212])&&(this.typeint[212]!=0))this.setValue("ranit_altesit_copii", this.typeint[212]);
if((this.typeint[213])&&(this.typeint[213]!=0))this.setValue("ranit_altesit_isu", this.typeint[213]);
if((this.typeint[214])&&(this.typeint[214]!=0))this.setValue("ranit_altesit_svsu", this.typeint[214]);
if((this.typeint[215])&&(this.typeint[215]!=0))this.setValue("ranit_altesit_altep", this.typeint[215]);
if((this.typeint[216])&&(this.typeint[216]!=0))this.setValue("ranit_ars_altep", this.typeint[216]);
if((this.typeint[217])&&(this.typeint[217]!=0))this.setValue("ranit_ars_copii", this.typeint[217]);
if((this.typeint[218])&&(this.typeint[218]!=0))this.setValue("ranit_ars_isu", this.typeint[218]);
if((this.typeint[219])&&(this.typeint[219]!=0))this.setValue("ranit_ars_svsu", this.typeint[219]);
if((this.typeint[220])&&(this.typeint[220]!=0))this.setValue("ranit_asfix_altep", this.typeint[220]);
if((this.typeint[221])&&(this.typeint[221]!=0))this.setValue("ranit_asfix_copii", this.typeint[221]);
if((this.typeint[222])&&(this.typeint[222]!=0))this.setValue("ranit_asfix_isu", this.typeint[222]);
if((this.typeint[223])&&(this.typeint[223]!=0))this.setValue("ranit_asfix_svsu", this.typeint[223]);
if((this.typeint[224])&&(this.typeint[224]!=0))this.setValue("deced06", this.typeint[224]);
if((this.typeint[225])&&(this.typeint[225]!=0))this.setValue("deced25", this.typeint[225]);
if((this.typeint[226])&&(this.typeint[226]!=0))this.setValue("deced55", this.typeint[226]);
if((this.typeint[227])&&(this.typeint[227]!=0))this.setValue("deced70", this.typeint[227]);
if((this.typeint[228])&&(this.typeint[228]!=0))this.setValue("deced71", this.typeint[228]);
if((this.typeint[229])&&(this.typeint[229]!=0))this.setValue("deced714", this.typeint[229]);
if((this.typeint[230])&&(this.typeint[230]!=0))this.setValue("ranit06", this.typeint[230]);
if((this.typeint[231])&&(this.typeint[231]!=0))this.setValue("ranit25", this.typeint[231]);
if((this.typeint[232])&&(this.typeint[232]!=0))this.setValue("ranit55", this.typeint[232]);
if((this.typeint[233])&&(this.typeint[233]!=0))this.setValue("ranit70", this.typeint[233]);
if((this.typeint[234])&&(this.typeint[234]!=0))this.setValue("ranit71", this.typeint[234]);
if((this.typeint[235])&&(this.typeint[235]!=0))this.setValue("ranit714", this.typeint[235]);
if((this.typeint[236])&&(this.typeint[236]!=0))this.setValue("contam06", this.typeint[236]);
if((this.typeint[237])&&(this.typeint[237]!=0))this.setValue("contam25", this.typeint[237]);
if((this.typeint[238])&&(this.typeint[238]!=0))this.setValue("contam55", this.typeint[238]);
if((this.typeint[239])&&(this.typeint[239]!=0))this.setValue("contam70", this.typeint[239]);
if((this.typeint[240])&&(this.typeint[240]!=0))this.setValue("contam71", this.typeint[240]);
if((this.typeint[241])&&(this.typeint[241]!=0))this.setValue("contam714", this.typeint[241]);
if((this.typeint[242])&&(this.typeint[242]!=0))this.setValue("anim_mari_contam", this.typeint[242]);
if((this.typeint[243])&&(this.typeint[243]!=0))this.setValue("anim_mari_moarte", this.typeint[243]);
if((this.typeint[244])&&(this.typeint[244]!=0))this.setValue("anim_mari_ranite", this.typeint[244]);
if((this.typeint[245])&&(this.typeint[245]!=0))this.setValue("anim_mici_contam", this.typeint[245]);
if((this.typeint[246])&&(this.typeint[246]!=0))this.setValue("anim_mici_moarte", this.typeint[246]);
if((this.typeint[247])&&(this.typeint[247]!=0))this.setValue("anim_mici_ranite", this.typeint[247]);
if((this.typeint[248])&&(this.typeint[248]!=0))this.setValue("anim_pasari_contam", this.typeint[248]);
if((this.typeint[249])&&(this.typeint[249]!=0))this.setValue("anim_pasari_moarte", this.typeint[249]);
if((this.typeint[250])&&(this.typeint[250]!=0))this.setValue("anim_pasari_ranite", this.typeint[250]);
if((this.typeint[251])&&(this.typeint[251]!=0))this.setValue("munitie_asanat_bombe_artilerie", this.typeint[251]);
if((this.typeint[252])&&(this.typeint[252]!=0))this.setValue("munitie_asanat_grenade", this.typeint[252]);
if((this.typeint[253])&&(this.typeint[253]!=0))this.setValue("munitie_asanat_grenade_defens", this.typeint[253]);
if((this.typeint[254])&&(this.typeint[254]!=0))this.setValue("munitie_asanat_proiectil", this.typeint[254]);
if((this.typeint[255])&&(this.typeint[255]!=0))this.setValue("bombe_aviatie", this.typeint[255]);
if((this.typeint[256])&&(this.typeint[256]!=0))this.setValue("mine_antitanc", this.typeint[256]);
if((this.typeint[257])&&(this.typeint[257]!=0))this.setValue("mine_antipers", this.typeint[257]);
if((this.typeint[258])&&(this.typeint[258]!=0))this.setValue("mine_marine", this.typeint[258]);
if((this.typeint[259])&&(this.typeint[259]!=0))this.setValue("aruncator_gren", this.typeint[259]);
if((this.typeint[260])&&(this.typeint[260]!=0))this.setValue("muninfanterie", this.typeint[260]);
if((this.typeint[261])&&(this.typeint[261]!=0))this.setValue("alte_munitii", this.typeint[261]);
if((this.typeint[262])&&(this.typeint[262]!=0))this.setValue("val_distr", this.typeint[262]);
if((this.typeint[263])&&(this.typeint[263]!=0))this.setValue("val_salv", this.typeint[263]);
if(this.typeint[264]){
        this.searchOption(this.typeint[264],"sursa_probabila");
        this.setValue("cod_sursa_probabila", this.typeint[264]);
      }
if(this.typeint[265]){
        this.searchOption(this.typeint[265],"mijloc_producere");
        this.setValue("cod_mijloc_producere", this.typeint[265]);
      }
if(this.typeint[266]){
        this.searchOption(this.typeint[266],"primul_mat_ars");
        this.setValue("cod_primul_mat_ars", this.typeint[266]);
      }
if(this.typeint[267]){
        this.searchOption(this.typeint[267],"imprejur_determ");
        this.setValue("cod_imprejur_determ", this.typeint[267]);
      }

if(this.typeint[268]!=="")this.setChecked("despreob1_"+this.typeint[268]);
if(this.typeint[269]!=="")this.setChecked("despreob2_"+this.typeint[269]);
if(this.typeint[270]!=="")this.setChecked("despreob3_"+this.typeint[270]);
if(this.typeint[271]!=="")this.setChecked("despreob4_"+this.typeint[271]);
if(this.typeint[272]!=="")this.setChecked("despreob5_"+this.typeint[272]);
if(this.typeint[273]!=="")this.setChecked("despreob6_"+this.typeint[273]);
if(this.typeint[274]!=="")this.setChecked("despreob7_"+this.typeint[274]);

if(this.typeint[275])this.setValue("codsubst1", this.typeint[275]);
if(this.typeint[276])this.setValue("codsubst2", this.typeint[276]);
if(this.typeint[277])this.setValue("codsubst3", this.typeint[277]);
if(this.typeint[278])this.setValue("codsubst4", this.typeint[278]);
if(this.typeint[279])this.setValue("numesubst1", this.typeint[279]);
if(this.typeint[280])this.setValue("numesubst2", this.typeint[280]);
if(this.typeint[281])this.setValue("numesubst3", this.typeint[281]);
if(this.typeint[282])this.setValue("numesubst4", this.typeint[282]);
if(this.typeint[283])this.setValue("codpericol1", this.typeint[283]);
if(this.typeint[284])this.setValue("codpericol2", this.typeint[284]);
if(this.typeint[285])this.setValue("codpericol3", this.typeint[285]);
if(this.typeint[286])this.setValue("codpericol4", this.typeint[286]);

if(this.typeint[287])this.setChecked("elib_subst_apa");
if(this.typeint[288])this.setChecked("elib_subst_aer");
if(this.typeint[289])this.setChecked("elib_subst_sol");
if(this.typeint[290])this.setValue("tip_radionuclid", this.typeint[290]);
if(this.typeint[291])this.setValue("act_sursei", this.typeint[291]);
if(this.typeint[292])this.setValue("debit_doza", this.typeint[292]);

if(this.typeint[293])this.setValueTXT("introduceti_caract_sursa", this.typeint[293]);
if(this.typeint[294])this.setValueTXT("alte_masuri_protective", this.typeint[294]);
if(this.typeint[295])this.setValueTXT("introduceti_contramasuri", this.typeint[295]);
if(this.typeint[296])this.setValueTXT("introduceti_contramasuri_scurt", this.typeint[296]);
if(this.typeint[297])this.setValueTXT("introduceti_anticip_sever", this.typeint[297]);
if(this.typeint[298])this.setValueTXT("introduceti_evol_inciden", this.typeint[298]);
if(this.typeint[299])this.setValueTXT("introduceti_consecinte_even", this.typeint[299]);
if(this.typeint[300])this.setValueTXT("introduceti_date_suplimentare", this.typeint[300]);


if((this.typeint[301])&&(this.typeint[301]!=0))this.setValue("zonademortalitate", this.typeint[301]);
if((this.typeint[302])&&(this.typeint[302]!=0))this.setValue("distanta_adapostire", this.typeint[302]);
if((this.typeint[303])&&(this.typeint[303]!=0))this.setValue("zonadeintoxicatie", this.typeint[303]);
if((this.typeint[304])&&(this.typeint[304]!=0))this.setValue("distanta_evacuare", this.typeint[304]);
if(this.typeint[305])this.setChecked("profilaxiacuiod"+this.typeint[305]);

if(this.typeint[306]==1)this.setChecked("restrictiialimente1");
if(this.typeint[307]==1)this.setChecked("restrictiialimente2");
if(this.typeint[308]==1)this.setChecked("restrictiialimente3");
if(this.typeint[309]==1)this.setChecked("restrictiialimente4");
if(this.typeint[310]==1)this.setChecked("restrictiialimente5");
if(this.typeint[311]==1)this.setChecked("restrictiialimente6");

if((this.typeint[312])&&(this.typeint[312]!=0))this.setValue("dozaacumulata", this.typeint[312]);
if((this.typeint[313])&&(this.typeint[313]!=0))this.setValue("distanta1", this.typeint[313]);
if((this.typeint[314])&&(this.typeint[314]!=0))this.setValue("distanta2", this.typeint[314]);
if((this.typeint[315])&&(this.typeint[315]!=0))this.setValue("distanta3", this.typeint[315]);
if((this.typeint[316])&&(this.typeint[316]!=0))this.setValue("distanta4", this.typeint[316]);
if((this.typeint[317])&&(this.typeint[317]!=0))this.setValue("distanta5", this.typeint[317]);
if((this.typeint[318])&&(this.typeint[318]!=0))this.setValue("distanta6", this.typeint[318]);
if((this.typeint[319])&&(this.typeint[319]!=0))this.setValue("distanta7", this.typeint[319]);
if((this.typeint[320])&&(this.typeint[320]!=0))this.setValue("distanta8", this.typeint[320]);
if((this.typeint[321])&&(this.typeint[321]!=0))this.setValue("doza1", this.typeint[321]);
if((this.typeint[322])&&(this.typeint[322]!=0))this.setValue("doza2", this.typeint[322]);
if((this.typeint[323])&&(this.typeint[323]!=0))this.setValue("doza3", this.typeint[323]);
if((this.typeint[324])&&(this.typeint[324]!=0))this.setValue("doza4", this.typeint[324]);
if((this.typeint[325])&&(this.typeint[325]!=0))this.setValue("doza5", this.typeint[325]);
if((this.typeint[326])&&(this.typeint[326]!=0))this.setValue("doza6", this.typeint[326]);
if((this.typeint[327])&&(this.typeint[327]!=0))this.setValue("doza7", this.typeint[327]);
if((this.typeint[328])&&(this.typeint[328]!=0))this.setValue("doza8", this.typeint[328]);
if((this.typeint[329])&&(this.typeint[329]!=0))this.setValue("doza_int_sapt", this.typeint[329]);
if((this.typeint[330])&&(this.typeint[330]!=0))this.setValue("doza_int_luna", this.typeint[330]);
if((this.typeint[331])&&(this.typeint[331]!=0))this.setValue("doza_int_zi", this.typeint[331]);

if((this.typeint[332])&&(this.typeint[332]!=0))this.setValue("suprafata_afectata", this.typeint[332]);
if((this.typeint[333])&&(this.typeint[333]!=0))this.setValue("expl_mun", this.typeint[333]);
if((this.typeint[334])&&(this.typeint[334]!=0))this.setValue("zona_afect", this.typeint[334]);
if((this.typeint[335])&&(this.typeint[335]!=0))this.setValue("nr_gospodarii", this.typeint[335]);
if((this.typeint[336])&&(this.typeint[336]!=0))this.setValue("asist_spec", this.typeint[336]);
if((this.typeint[337])&&(this.typeint[337]!=0))this.setValue("masuri_su", this.typeint[337]);
if(this.typeint[338])this.setChecked("poluaretransf"+this.typeint[338]);
if(this.typeint[339]!=="")this.setChecked("verific_raport"+this.typeint[339]);
if(this.typeint[340])this.setChecked("intravilan"+this.typeint[340]);
if((this.typeint[341])&&(this.typeint[341]!=0))this.setValue("gradcontamin", this.typeint[341]);
if(this.typeint[342])this.setValue("telefon", this.typeint[342]);
  }
}
