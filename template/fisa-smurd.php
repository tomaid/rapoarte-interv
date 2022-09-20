<?php
$folderinst=FOLER_INSTALARE;
echo <<<_SMURD

<div class="paddingtop"></div>
<div class="diveachpage">
<form method="post" id="form" action="{$_SERVER['PHP_SELF']}"  onsubmit="return Validareforma.validateForm();">
<input id="validated" name="validated" type="hidden" value="">
{$hiddeninputs}
<table class="prezenta">
<tr class="prezenta">
<td class="prezentatd padleft10" colspan="6"><h2>{$formpagebutton} raport SMURD <span id="nrsmurdsubunitate"></span></h2></td>
<td class="prezentatd padleft10" colspan="5"><p class='error' id='messagefrom'>{$messagefrom}</p></td>
<td class="prezentatd"><p><a href="{$folderinst}" class="buttonnew"><span class="icon-cross">Închidere</span></a></p></td>
</tr>
{$getablerow}
<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft" colspan="3">IDENTIFICARE</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft">Mod<br>alertare:<br>(Anexa 8)</td>
<td class="prezentatdfisaw  prezentatdfisatop" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="cod_alert_invalid">Codul nu este valid!</span><select name="alertare" id="alertare" style="width: 140px;" onchange="CodAlert.setCode(this.value,'cod_alert','cod_alert_invalid')" tabindex="36">
{$alertare}
  </select>
  <input name="cod_alert"  id="cod_alert" tabindex="37" type="text" style="width: 25px;" maxlength="1" autocomplete="off" placeholder="cod" onblur="CodAlert.getCode(this.value,'alertare','cod_alert_invalid')" onclick="this.setSelectionRange(0, this.value.length)" class="input-set" value="9">
  </div></td>
<td class="prezentatdfisa  prezentatdfisatop prezentatdfisaleft" colspan="2">DATE PACIENT/VICTIMĂ</td>
<td class="prezentatdfisa  prezentatdfisatop prezentatdfisaleft">Tegumente</td>
<td class="prezentatdfisa  prezentatdfisatop prezentatdfisaleft">Simptome</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft">Traumă</td>
<td class="prezentatdfisa  prezentatdfisatop prezentatdfisaleft prezentatdfisaright">Arsuri</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Data/oră plecare</td>
<td class="prezentatdfisaw" colspan="2"><input class="nou" type="text" maxlength="2" placeholder="zz" name="plecare_zi" id="plecare_zi" onclick="currentDate.sendId('plecare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_luna');"  onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="1"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="plecare_luna" id="plecare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_an');" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="2"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="plecare_an" id="plecare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_ora');" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="3"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="plecare_ora" id="plecare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_min');" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="4"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="plecare_min" id="plecare_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="5"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Lat(Y)</td>
<td class="prezentatdfisaw" colspan="2"><input name="laty"  id="laty" tabindex="38" type="text" maxlength="10" autocomplete="off" class="input-set" ></td>
<td class="prezentatdfisaw prezentatdfisaleft">Nume</td>
<td class="prezentatdfisaw"><input name="nume_victima"  id="nume_victima" tabindex="90" type="text" maxlength="30" autocomplete="off" class="input-set" ></td>
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="5">
<input type="checkbox" id="palide" tabindex="152" name="palide" value="1" class="radioforte"> palide<br>
<input type="checkbox" id="cianotice" tabindex="153" name="cianotice" value="1" class="radioforte"> cianotice<br>
<input type="checkbox" id="calde" tabindex="154" name="calde" value="1" class="radioforte"> calde<br>
<input type="checkbox" id="reci" tabindex="155" name="reci" value="1" class="radioforte"> reci<br>
<input type="checkbox" id="uscate" tabindex="156" name="uscate" value="1" class="radioforte"> uscate<br>
<input type="checkbox" id="umede" tabindex="157" name="umede" value="1" class="radioforte"> umede<br>
<input type="checkbox" id="normale" tabindex="158" name="normale" value="1" class="radioforte"> normale<br>
<input type="checkbox" id="icterice" tabindex="159" name="icterice" value="1" class="radioforte"> icterice
</td>
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="5">
<input type="checkbox" id="greturi" tabindex="160" name="greturi" value="1" class="radioforte"> grețuri<br>
<input type="checkbox" id="varsaturi" tabindex="161" name="varsaturi" value="1" class="radioforte"> vărsături<br>
<input type="checkbox" id="transpiratii" tabindex="162" name="transpiratii" value="1" class="radioforte"> transpirații<br>
<input type="checkbox" id="ameteli" tabindex="163" name="ameteli" value="1" class="radioforte"> amețeli<br>
<input type="checkbox" id="convulsii" tabindex="164" name="convulsii" value="1" class="radioforte"> convulsii<br>
<input type="checkbox" id="dureri" tabindex="165" name="dureri" value="1" class="radioforte"> dureri<br><br><br><br>
</td>
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="5">
<input type="checkbox" id="plaga" tabindex="166" name="plaga" value="1" class="radioforte"> plagă<br>
<input type="checkbox" id="contuzie" tabindex="167" name="contuzie" value="1" class="radioforte"> contuzie<br>
<input type="checkbox" id="frinchisa" tabindex="168" name="frinchisa" value="1" class="radioforte"> fr. inchisă<br>
<input type="checkbox" id="frdeschis" tabindex="169" name="frdeschis" value="1" class="radioforte"> fr. deschis<br>
<input type="checkbox" id="arsura" tabindex="170" name="arsura" value="1" class="radioforte"> arsură<br>
<input type="checkbox" id="hipotermie" tabindex="171" name="hipotermie" value="1" class="radioforte"> hipotermie<br>
<input type="checkbox" id="inec" tabindex="172" name="inec" value="1" class="radioforte"> înec<br><br>
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright" rowspan="5">
<input type="checkbox" id="ars_cr" tabindex="173" name="ars_cr" value="1" class="radioforte"> căi respiratorii<br>
<input type="checkbox" id="ars_facara" tabindex="174" name="ars_facara" value="1" class="radioforte"> flacără<br>
<input type="checkbox" id="ars_solid" tabindex="175" name="ars_solid" value="1" class="radioforte"> solid<br>
<input type="checkbox" id="ars_lichid" tabindex="176" name="ars_lichid" value="1" class="radioforte"> lichid<br>
<input type="checkbox" id="ars_vapori" tabindex="177" name="ars_vapori" value="1" class="radioforte"> vapori/gaz<br>
<input type="checkbox" id="ars_chimic" tabindex="178" name="ars_chimic" value="1" class="radioforte"> chimic<br><br><br><br><br>
</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Participanti(cod)</td>
<td class="prezentatdfisaw" colspan="2">
  <select name="participanti" id="participanti" style="width: 150px;" onchange="tipInterventie.Resetcateg();tipInterventie.Cauta('categorie_interventie','participanti');" tabindex="6">
  {$participanti}
  </select>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Long(X)</td>
<td class="prezentatdfisaw" colspan="2"><input name="longx"  id="longx" tabindex="39" type="text" maxlength="10" autocomplete="off" class="input-set"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Prenume</td>
<td class="prezentatdfisaw"><input name="prenume_victima"  id="prenume_victima" tabindex="91" type="text" maxlength="30" autocomplete="off" class="input-set"></td>

</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Cod subunitate/<br>Nr. ordine</td>
<td class="prezentatdfisa"><span id="tipsubunitate">{$_SESSION['tipsubunitate']}</span>.-<span id="codsubunit">{$codsubunit}</span></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisabold"><span id="nrordine"></span></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Moment intervenție</td>
<td class="prezentatdfisaw prezentatdfisaleft">Vârsta</td>
<td class="prezentatdfisaw"><input name="varsta_victima"  id="varsta_victima" tabindex="92" type="text" maxlength="3" autocomplete="off" class="input-set" ></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Categorie<br>interventie</td>
<td class="prezentatdfisaw" colspan="2"> <select name="categorie_interventie" id="categorie_interventie" onchange="tipInterventie.Cauta('categorie_interventie','participanti');" style="width: 150px;" tabindex="7"><option value="">Selectați</option>
{$categorie_interventie}
  </select></td>
<td class="prezentatdfisaw prezentatdfisaleft">Anunțare</td>
<td class="prezentatdfisaw" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="plecare_mesaj">Timpul anunțării este mai mare decât timpul plecării!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="anunt_zi" id="anunt_zi" onclick="currentDate.sendId('anunt_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_luna');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="40"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="anunt_luna" id="anunt_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_an');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="41"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="anunt_an" id="anunt_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_ora');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="42"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="anunt_ora" id="anunt_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_min');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="43"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="anunt_min" id="anunt_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="44">
	</div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Motiv<br>solicitare</td>
<td class="prezentatdfisaw">
  <div class="tooltiptimpi"><span class="tooltimpi" id="cod_solicit_invalid">Codul nu este valid!</span><select name="solicitare" id="solicitare" style="width: 150px;" onchange="CodSolicit.setCode(this.value,'cod_solicit','cod_solicit_invalid')"  tabindex="93">
{$solicitare}
  </select>
  <input name="cod_solicit"  id="cod_solicit" tabindex="94" type="text" style="width: 30px;" maxlength="2" autocomplete="off" value="0" placeholder="cod" onblur="CodSolicit.getCode(this.value,'solicitare','cod_solicit_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Tip<br>interventie</td>
<td class="prezentatdfisaw" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="cod_invalid">Codul nu este valid!</span><select name="tip_interventie" id="tip_interventie" style="width: 100px;" onchange="CodInterventie.setCode(this.value)" tabindex="8"><option value="">Selectați</option>
  </select>
  <input name="cod_interventie"  id="cod_interventie" type="text" size="1" maxlength="4" autocomplete="off" placeholder="cod" onblur="CodInterventie.getCode(this.value,'tip_interventie','categorie_interventie','participanti')" onclick="this.setSelectionRange(0, this.value.length)" tabindex="9">
  </div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Sosire</td>
<td class="prezentatdfisaw" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="sosire_mesaj">Timpul sosirii este mai mic decât timpul plecării!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="sosire_zi" id="sosire_zi" onclick="currentDate.calculZi('plecare_','sosire_');currentDate.sendId('sosire_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_luna');" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="45"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="sosire_luna" id="sosire_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_an');" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="46"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="sosire_an" id="sosire_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_ora');" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="47"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="sosire_ora" id="sosire_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_min');" tabindex="48" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="sosire_min" id="sosire_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="49"></div></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="2">Stare pacient la sosire</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Data/oră producere</td>
<td class="prezentatdfisaw" colspan="2"><input class="nou" type="text" maxlength="2" placeholder="zz" name="producere_zi" id="producere_zi" onclick="currentDate.calculZi('plecare_','producere_');currentDate.sendId('producere_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_luna');" tabindex="10"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="producere_luna" id="producere_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_an');" tabindex="11"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="producere_an" id="producere_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_ora');" tabindex="12"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="producere_ora" id="producere_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_min');" tabindex="13"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="producere_min" id="producere_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="14"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Retragere</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="retragere_mesaj">Timpul retragerii este mai mic decât timpul sosirii la caz!</span>
<input class="nou" type="text" maxlength="2" placeholder="zz" name="retragere_zi" id="retragere_zi" onclick="currentDate.calculZi('sosire_','retragere_');currentDate.sendId('retragere_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_luna');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="50"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="retragere_luna" id="retragere_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_an');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="51"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="retragere_an" id="retragere_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_ora');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="52"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="retragere_ora" id="retragere_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_min');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="53"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="retragere_min" id="retragere_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="54"></div></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2">
<input type="checkbox" id="stare_pacient_constient" tabindex="95" name="stare_pacient_constient" value="1" class="radioforte" onclick="jumpNext.resetOther('stare_pacient_inconstient')"> Conștient | 
<input type="checkbox" id="stare_pacient_decedat" tabindex="96" name="stare_pacient_decedat" value="1" class="radioforte"> Decedat<br>
<input type="checkbox" id="stare_pacient_inconstient" tabindex="97" name="stare_pacient_inconstient" value="1" class="radioforte" onclick="jumpNext.resetOther('stare_pacient_constient')"> Inconștient | 
<input type="checkbox" id="stare_pacient_trauma" tabindex="98" name="stare_pacient_trauma" value="1" class="radioforte"> Traumă<br>
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="4">Manevre efectuate</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Denumire persoană</td>
<td class="prezentatdfisaw" colspan="2">
<input name="denumire_persoana_nume"  id="denumire_persoana_nume" tabindex="15" type="text" size="1" maxlength="30" autocomplete="off" class="semi-input-set" placeholder="nume" onblur="copyField.set(this.id,'nume_victima')">  <input name="denumire_persoana_prenume"  id="denumire_persoana_prenume" tabindex="16" type="text" size="1" maxlength="30" autocomplete="off" class="semi-input-set" placeholder="prenume" onblur="copyField.set(this.id,'prenume_victima')">
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Spital</td>
<td class="prezentatdfisaw" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="spital_mesaj">Timpul sosirii la spital este mai mic decât timpul retragerii de la caz!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="spital_zi" id="spital_zi" onclick="currentDate.calculZi('retragere_','spital_');currentDate.sendId('spital_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_luna');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="55"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="spital_luna" id="spital_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_an');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="56"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="spital_an" id="spital_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_ora');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="57"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="spital_ora" id="spital_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_min');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="58"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="spital_min" id="spital_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="59"></div></td>    
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="2">
<label for="checkscr"><input type="checkbox" id="checkscr" tabindex="99" name="checkscr" value="1" class="radioforte" onclick="StopCardio.Bifa();">Stop cardio-respirator (SCR)
</label>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Căi respiratorii</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="3">
<input type="checkbox" id="cresp_deschidere_manuala" tabindex="179" name="cresp_deschidere_manuala" value="1" class="radioforte"> Deschidere manuală  
<input type="checkbox" id="cresp_aspiratie" tabindex="180" name="cresp_aspiratie" value="1" class="radioforte"> Aspirație <br>
<input type="checkbox" id="cresp_pipag" tabindex="181" name="cresp_pipag" value="1" class="radioforte"> Pipă Guidel  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="cresp_oxigen" tabindex="182" name="cresp_oxigen" value="1" class="radioforte"> Oxigen 
</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Destinație(Anexa 7)</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_dest_invalid">Codul nu este valid!</span><select name="destinatie" id="destinatie" style="width: 100px;" onchange="CodDest.setCode(this.value,'cod_dest','cod_dest_invalid')" tabindex="17">
{$destinatieOpt}
  </select>
  <input name="cod_dest"  id="cod_dest" tabindex="18" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="cod" onblur="CodDest.getCode(this.value,'destinatie','cod_dest_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>	
<td class="prezentatdfisaw prezentatdfisaleft">Eliberare</td>
<td class="prezentatdfisaw" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="eliberare_mesaj">Timpul eliberării este mai mic decât timpul retragerii!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="eliberare_zi" id="eliberare_zi" onclick="currentDate.calculZi('retragere_','eliberare_');currentDate.sendId('eliberare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_luna');" onblur="currentDate.verificareDate('retragere_','eliberare_')" tabindex="60"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="eliberare_luna" id="eliberare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_an');" onblur="currentDate.verificareDate('retragere_','eliberare_')" tabindex="61"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="eliberare_an" id="eliberare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_ora');" onblur="currentDate.verificareDate('retragere_','eliberare_')" tabindex="62"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="eliberare_ora" id="eliberare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_min');" onblur="currentDate.verificareDate('retragere_','eliberare_')" tabindex="63"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="eliberare_min" id="eliberare_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('retragere_','eliberare_')" tabindex="64"></div></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2" rowspan="4">
<div class="pleft">
 <input type="checkbox" id="checkResuscitare" tabindex="100" name="checkResuscitare" value="1" class="radioforte" onclick="currentDate.calculZi('sosire_','resuscitare_');currentDate.sendId('resuscitare_');jumpNext.jumpfocus('resuscitare_');" disabled>Resuscitare:</div>
 <div class="pright">
 <input class="nou" type="text" maxlength="2" placeholder="zz" name="resuscitare_zi" id="resuscitare_zi" onclick="currentDate.sendId('resuscitare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'resuscitare_luna');" tabindex="101" disabled><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="resuscitare_luna" id="resuscitare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'resuscitare_an');" tabindex="102" disabled><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="resuscitare_an" id="resuscitare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'resuscitare_ora');" tabindex="103" disabled><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="resuscitare_ora" id="resuscitare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'resuscitare_min');" tabindex="104" disabled><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="resuscitare_min" id="resuscitare_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="105" disabled></div><hr>
<div class="pleft">
 <input type="checkbox" id="checkSCR_reusit" tabindex="106" name="checkSCR_reusit" value="1" class="radioforte" onclick="currentDate.calculZi('resuscitare_','scr_reusit_');currentDate.sendId('scr_reusit_');jumpNext.jumpfocus('scr_reusit_');" disabled> Reușit SCR:</div>
 <div class="pright">
 <input class="nou" type="text" maxlength="2" placeholder="zz" name="scr_reusit_zi" id="scr_reusit_zi" onclick="currentDate.calculZi('resuscitare_','scr_reusit_');currentDate.sendId('scr_reusit_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_reusit_luna');" tabindex="107" disabled><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="scr_reusit_luna" id="scr_reusit_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_reusit_an');" tabindex="108" disabled><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="scr_reusit_an" id="scr_reusit_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_reusit_ora');" tabindex="109" disabled><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="scr_reusit_ora" id="scr_reusit_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_reusit_min');" tabindex="110" disabled><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="scr_reusit_min" id="scr_reusit_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="111" disabled></div><hr>
 <div class="pleft">
 <input type="checkbox" id="checkSCR_nereusit" tabindex="112" name="checkSCR_nereusit" value="1" class="radioforte" onclick="currentDate.calculZi('resuscitare_','scr_nereusit_');currentDate.sendId('scr_nereusit_');jumpNext.jumpfocus('scr_nereusit_');" disabled> Nereușit SCR</div>
 <div class="pright">
 <input class="nou" type="text" maxlength="2" placeholder="zz" name="scr_nereusit_zi" id="scr_nereusit_zi" onclick="currentDate.calculZi('resuscitare_','scr_nereusit_');currentDate.sendId('scr_nereusit_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_nereusit_luna');" tabindex="113" disabled><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="scr_nereusit_luna" id="scr_nereusit_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_nereusit_an');" tabindex="114" disabled><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="scr_nereusit_an" id="scr_nereusit_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_nereusit_ora');" tabindex="115" disabled><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="scr_nereusit_ora" id="scr_nereusit_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'scr_nereusit_min');" tabindex="116" disabled><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="scr_nereusit_min" id="scr_nereusit_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="117" disabled></div>
  </td>
<td class="prezentatdfisaw prezentatdfisaleft">Intubație</td>
<td class="prezentatdfisaw">
<input type="checkbox" id="intubatie_cu_inductie" tabindex="183" name="intubatie_cu_inductie" value="1" class="radioforte"> Cu inducție<br>
<input type="checkbox" id="intubatie_fara_inductie" tabindex="184" name="intubatie_fara_inductie" value="1" class="radioforte"> Fără inducție
</td>
<td class="prezentatdfisaw">Ventilație</td>
<td class="prezentatdfisaw prezentatdfisaright">
<input type="checkbox" id="vent_balon" tabindex="185" name="vent_balon" value="1" class="radioforte"> Cu balon<br> 
<input type="checkbox" id="vent_masca" tabindex="186" name="vent_masca" value="1" class="radioforte"> Cu mască
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Descriere date suplimentare<br>pentru destinație</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">Persoane</td>
<td class="prezentatdfisa prezentatdfisatop">Adulți</td>
<td class="prezentatdfisa prezentatdfisatop">Copii</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="4">EKG</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3" rowspan="2">
<textarea name="introduceti_descriere" id="introduceti_descriere" rows="3" cols="35" maxlength="254" placeholder="Introduceți descriere" tabindex="19" ></textarea>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Asistate</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="asistate_adulti"  id="asistate_adulti" tabindex="65" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="asistate_copii"  id="asistate_copii" tabindex="66" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2" rowspan="2">
Monitorizare
<input class="nou" type="text" maxlength="2" placeholder="zz" name="monitorizare_zi" id="monitorizare_zi" onclick="currentDate.calculZi('sosire_','monitorizare_');currentDate.sendId('monitorizare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_luna');" tabindex="187"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="monitorizare_luna" id="monitorizare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_an');" tabindex="188"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="monitorizare_an" id="monitorizare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_ora');" tabindex="189"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="monitorizare_ora" id="monitorizare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_min');" tabindex="190"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="monitorizare_min" id="monitorizare_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="191">
</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="2" rowspan="2">
Imprimare
<input class="nou" type="text" maxlength="2" placeholder="zz" name="imprimare_zi" id="imprimare_zi" onclick="currentDate.calculZi('monitorizare_','imprimare_');currentDate.sendId('imprimare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_luna');" tabindex="193"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="imprimare_luna" id="imprimare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_an');" tabindex="194"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="imprimare_an" id="imprimare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_ora');" tabindex="195"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="imprimare_ora" id="imprimare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_min');" tabindex="196"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="imprimare_min" id="imprimare_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="197">
</td>

</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Contaminate<br>chimic</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="chimic_adulti"  id="chimic_adulti" tabindex="67" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="chimic_copii"  id="chimic_copii" tabindex="68" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Descriere date suplimentare<br>despre intervenție</td>
<td class="prezentatdfisaw prezentatdfisaleft">Contaminate<br>radiologic</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="radiologic_adulti"  id="radiologic_adulti" tabindex="69" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="radiologic_copii"  id="radiologic_copii" tabindex="70" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="2">Funcții vitale la sosire</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" rowspan="2">Resuscitare</td>
<td class="prezentatdfisaw prezentatdfisaright prezentatdfisatop" colspan="3" rowspan="2">
<input type="checkbox" id="resuscitare_compres" tabindex="198" name="resuscitare_compres" value="1" class="radioforte"> Compresiuni toracice &nbsp;&nbsp;
<input type="checkbox" id="resuscitare_intrav" tabindex="199" name="resuscitare_intrav" value="1" class="radioforte"> Acces intravenos<br> 
<input type="checkbox" id="resuscitare_defibrib" tabindex="200" name="resuscitare_defibrib" value="1" class="radioforte"> Defibrilator semiautomat&nbsp;&nbsp;
<input type="checkbox" id="resuscitare_socuri" tabindex="201" name="resuscitare_socuri" value="1" class="radioforte"> Nr. șocuri 
<input name="nr_socuri"  id="nr_socuri" tabindex="202" type="text" style="width:15px;" maxlength="1" autocomplete="off">
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3" rowspan="2">
<textarea name="date_suplimentare" id="date_suplimentare" rows="3" cols="35" maxlength="254" placeholder="Introduceți date suplimentare" tabindex="20" ></textarea></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Animale salvate</td>
<td class="prezentatdfisa prezentatdfisaleft" colspan="2">Pupile</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft">Mari</td>
<td class="prezentatdfisaw prezentatdfisacenter">Mici</td>
<td class="prezentatdfisaw prezentatdfisacenter">Păsări</td>
<td class="prezentatdfisaw prezentatdfisaleft">Normal</td>
<td class="prezentatdfisaw "><input type="checkbox" id="pupile_normal_stanga" tabindex="118" name="pupile_normal_stanga" value="1" class="radioforte">Stânga <input type="checkbox" id="pupile_normal_dreapta" tabindex="119" name="pupile_normal_dreapta" value="1" class="radioforte">Dreapta</td>
<td class="prezentatdfisaw prezentatdfisaleft">Transport</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="3"><input type="checkbox" id="transport_prelata" tabindex="203" name="transport_prelata" value="1" class="radioforte"> Prelată transport <input type="checkbox" id="transport_scaun" tabindex="204" name="transport_scaun" value="1" class="radioforte"> Scaun <input type="checkbox" id="transport_targa" tabindex="205" name="transport_targa" value="1" class="radioforte"> Targă</td>
</tr>

<tr class="prezentatrfisa">
    <td class="prezentatdfisaw prezentatdfisabold prezentatdfisaleft prezentatdfisatop" colspan="2" rowspan="2">Activare Plan Roșu<br>de Intervenție</td>
<td class="prezentatdfisaw prezentatdfisatop" rowspan="2"><input type="checkbox" id="apld" tabindex="21" name="apld" value="1" class="radioforte" onclick="jumpNext.resetOther('apln')"> Da<br><input type="checkbox" id="apln" tabindex="22" name="apln" value="1" onclick="jumpNext.resetOther('apld')" class="radioforte"> Nu</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="animale_salvate_mari"  id="animale_salvate_mari" tabindex="71" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="animale_salvate_mici"  id="animale_salvate_mici" tabindex="72" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="animale_salvate_pasari"  id="animale_salvate_pasari" tabindex="73" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Reactive</td>
<td class="prezentatdfisaw "><input type="checkbox" id="pupile_reactive_stanga" tabindex="120" name="pupile_reactive_stanga" value="1" class="radioforte">Stânga <input type="checkbox" id="pupile_reactive_dreapta" tabindex="121" name="pupile_reactive_dreapta" value="1" class="radioforte">Dreapta</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" rowspan="2">Materiale<br>ajutătoare</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaright" colspan="3" rowspan="2">
<input type="checkbox" id="mataj_desc" tabindex="206" name="mataj_desc" value="1" class="radioforte"> Descarcerat
<input type="checkbox" id="mataj_guler" tabindex="207" name="mataj_guler" value="1" class="radioforte"> Guler cervical
<input type="checkbox" id="mataj_saltea" tabindex="208" name="mataj_saltea" value="1" class="radioforte"> Saltea vacuum<br> 
<input type="checkbox" id="mataj_targa" tabindex="209" name="mataj_targa" value="1" class="radioforte"> Targă lopată
<input type="checkbox" id="mataj_ked" tabindex="210" name="mataj_ked" value="1" class="radioforte"> KED
<input type="checkbox" id="mataj_alte" tabindex="211" name="mataj_alte" value="1" class="radioforte"> Altele
<input name="mataj_alte_detalii"  id="mataj_alte_detalii" tabindex="212" type="text" style="width:100px;" maxlength="100" autocomplete="off" placeholder="detaliați">
</td>

</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="2">Număr de echipaje</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" rowspan="3"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Nereactive</td>
<td class="prezentatdfisaw "><input type="checkbox" id="pupile_nereactive_stanga" tabindex="122" name="pupile_nereactive_stanga" value="1" class="radioforte">Stânga <input type="checkbox" id="pupile_nereactive_dreapta" tabindex="123" name="pupile_nereactive_dreapta" value="1" class="radioforte">Dreapta</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Localizare</td>
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">EBA B2</div><div class="pright"><input name="echip_eba_b2"  id="echip_eba_b2" tabindex="74" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">PMA 1</div><div class="pright"><input name="echip_pma1"  id="echip_pma1" tabindex="75" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Midriază</td>
<td class="prezentatdfisaw "><input type="checkbox" id="pupile_midriaza_stanga" tabindex="124" name="pupile_midriaza_stanga" value="1" class="radioforte">Stânga <input type="checkbox" id="pupile_midriaza_dreapta" tabindex="125" name="pupile_midriaza_dreapta" value="1" class="radioforte">Dreapta</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="4">Intervenții medicale</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft" rowspan="2">Țara<br> <select name="tara" id="tara" style="width: 100px;" tabindex="23">
{$tari}
  </select></td>
<td class="prezentatdfisaw prezentatdfisacenter" rowspan="2" colspan="2">Județul<br> <select name="judet" id="judet" style="width: 100px;" onchange="Localitati.cautaLocalitate(this.value);Sate.cautaSat();" bindex="24">><option value="">Selectați</option>
{$judete}
  </select></td>

<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">DESC</div><div class="pright"><input name="echip_desc"  id="echip_desc" tabindex="76" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">PMA 2</div><div class="pright"><input name="echip_pma2"  id="echip_pma2" tabindex="77" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Mioză</td>
<td class="prezentatdfisaw "><input type="checkbox" id="pupile_mioza_stanga" tabindex="126" name="pupile_mioza_stanga" value="1" class="radioforte">Stânga <input type="checkbox" id="pupile_mioza_dreapta" tabindex="127" name="pupile_mioza_dreapta" value="1" class="radioforte">Dreapta</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright" colspan="4" rowspan="2">
<input type="checkbox" id="intvmed_pans" tabindex="213" name="intvmed_pans" value="1" class="radioforte">pans. metalină    &nbsp;&nbsp;
<input type="checkbox" id="intvmed_folie" tabindex="214" name="intvmed_folie" value="1" class="radioforte">folie izot.    &nbsp;&nbsp;
<input type="checkbox" id="intvmed_hemo" tabindex="215" name="intvmed_hemo" value="1" class="radioforte">hemostază    &nbsp;&nbsp;
<input type="checkbox" id="intvmed_plagi" tabindex="216" name="intvmed_plagi" value="1" class="radioforte">pans. plăgi<br>   
<input type="checkbox" id="intvmed_alte" tabindex="217" name="intvmed_alte" value="1" class="radioforte">altele: <input name="intvmed_detalii"  id="intvmed_detalii" tabindex="218" type="text" style="width:300px;" maxlength="100" autocomplete="off">
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">ASAS D</div><div class="pright"><input name="echip_asasd"  id="echip_asasd" tabindex="78" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">ELICOP</div><div class="pright"><input name="echip_elicop"  id="echip_elicop" tabindex="79" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="2">Căi<br>respiratorii</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">Respirația</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="2"><input type="checkbox" id="intravilan" tabindex="25" name="intravilan" value="1" class="radioforte" onclick="jumpNext.resetOther('extravilan')">Intravilan</td>
<td class="prezentatdfisaw" rowspan="2" colspan="2"><input type="checkbox" id="extravilan" tabindex="26" name="extravilan" value="1" class="radioforte" onclick="jumpNext.resetOther('intravilan')">Extravilan</td>
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">TIM C1</div><div class="pright"><input name="echip_timc1"  id="echip_timc1" tabindex="80" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">EISI</div><div class="pright"><input name="echip_eisi"  id="echip_eisi" tabindex="81" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2"><input type="checkbox" id="cr_deschise" tabindex="128" name="cr_deschise" value="1" class="radioforte">Deschise</td>
<td class="prezentatdfisaw prezentatdfisaleft"><input type="checkbox" id="resp_normala" tabindex="131" name="resp_normala" value="1" class="radioforte">Normală</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="4">Predare pacient la:<div class="tooltiptimpi"><span class="tooltimpi" id="cod_predare_invalid">Codul nu este valid!</span><select name="predare" id="predare" style="width: 200px;" onchange="CodDest.setCode(this.value,'cod_predare','cod_predare_invalid')" tabindex="219">
{$predare}
  </select>
  <input name="cod_predare"  id="cod_predare" tabindex="220" type="text" size="1" maxlength="4" autocomplete="off" placeholder="cod" onblur="CodDest.getCode(this.value,'predare','cod_predare_invalid')" onclick="this.setSelectionRange(0, this.value.length)" value="0">
  </div>
</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">TIM NN</div><div class="pright"><input name="echip_timnn"  id="echip_timnn" tabindex="82" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">SCAF</div><div class="pright"><input name="echip_scaf"  id="echip_scaf" tabindex="83" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2"><input type="checkbox" id="cr_obstruct" tabindex="129" name="cr_obstruct" value="1" class="radioforte">Obstrucționate</td>
<td class="prezentatdfisaw prezentatdfisaleft"><input type="checkbox" id="resp_absent" tabindex="132" name="resp_absent" value="1" class="radioforte">Absent</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft" rowspan="3">Stare la<br>predare</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaright" colspan="3">
<input type="checkbox" id="stare_predare_agitat" tabindex="221" name="stare_predare_agitat" value="1" class="radioforte">agitat 
<input type="checkbox" id="stare_predare_agrav" tabindex="222" name="stare_predare_agrav" value="1" class="radioforte">agravat 
<input type="checkbox" id="stare_predare_ameliorat" tabindex="223" name="stare_predare_ameliorat" value="1" class="radioforte">ameliorat 
<input type="checkbox" id="stare_predare_cooperant" tabindex="224" name="stare_predare_cooperant" value="1" class="radioforte">cooperant 
</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">U.A.T.
</td>
<td class="prezentatdfisaw" colspan="2"><select name="localitati" id="localitati" style="width: 150px;" onchange="Sate.cautaSat(this.value);" tabindex="27">
{$localitati}
  </select>

</td>
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">MU</div><div class="pright"><input name="echip_mu"  id="echip_mu" tabindex="84" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">ALTE</div><div class="pright"><input name="echip_alte"  id="echip_alte" tabindex="85" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2"><input type="checkbox" id="cr_preluat" tabindex="130" name="cr_preluat" value="1" class="radioforte">Preluat IOT</td>
<td class="prezentatdfisaw prezentatdfisaleft"><input type="checkbox" id="resp_dispnee" tabindex="133" name="resp_dispnee" value="1" class="radioforte">Dispnee</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="3"><b>Decedat:</b>
<input type="checkbox" id="deces_laloculsol" tabindex="225" name="deces_laloculsol" value="1" class="radioforte" onclick="jumpNext.resetOther('deces_intrans')">la locul solicitării 
<input type="checkbox" id="deces_intrans" tabindex="226" name="deces_intrans" value="1" class="radioforte" onclick="jumpNext.resetOther('deces_laloculsol')">în timpul transport.
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Satul
</td>
<td class="prezentatdfisaw" colspan="2"><select name="sate" id="sate" style="width: 150px;" tabindex="28"><option value="">Selectați</option>
{$sate}
  </select>

</td>
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">ATPVM</div><div class="pright"><input name="echip_atpvm"  id="echip_atpvm" tabindex="86" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">SAJ</div><div class="pright"><input name="echip_saj"  id="echip_saj" tabindex="87" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="2"></td>
<td class="prezentatdfisaw prezentatdfisaleft"><input type="checkbox" id="resp_balon" tabindex="134" name="resp_balon" value="1" class="radioforte">VM/balon</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="3">
<input type="checkbox" id="stare_predare_inres" tabindex="227" name="stare_predare_inres" value="1" class="radioforte">în curs de resuscitare 
<input type="checkbox" id="stare_predare_necoop" tabindex="228" name="stare_predare_necoop" value="1" class="radioforte">necooperant<br>
<input type="checkbox" id="stare_predare_nuecazul" tabindex="229" name="stare_predare_nuecazul" value="1" class="radioforte">nu este cazul
<input type="checkbox" id="stare_predare_ostil" tabindex="230" name="stare_predare_ostil" value="1" class="radioforte">ostil
<input type="checkbox" id="stare_predare_stationar" tabindex="231" name="stare_predare_stationar" value="1" class="radioforte">staționar
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Strada
</td>
<td class="prezentatdfisaw" colspan="2"><input name="adresa_strada"  id="adresa_strada" tabindex="29" type="text"  class="input-set" maxlength="20" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisaleft"><div class="pleftpad">MOTO</div><div class="pright"><input name="echip_moto"  id="echip_moto" tabindex="88" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisaw"><div class="pleftpad">SAP</div><div class="pright"><input name="echip_sap"  id="echip_sap" tabindex="89" type="text" class="noup" maxlength="2" autocomplete="off"></div>
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="2"> Puls perif.</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">EKG</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">Refuz</td>
<td class="prezentatdfisaw prezentatdfisaright prezentatdfisatop" colspan="3">
<input type="checkbox" id="refuz_examin" tabindex="232" name="refuz_examin" value="1" class="radioforte">examinare
<input type="checkbox" id="refuz_trans" tabindex="233" name="refuz_trans" value="1" class="radioforte">transport
<input type="checkbox" id="refuz_tratament" tabindex="234" name="refuz_tratament" value="1" class="radioforte">tratament
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Număr <input name="adresa_nr"  id="adresa_nr" tabindex="30" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> bl. <input name="adresa_bl"  id="adresa_bl" tabindex="31" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> sc. <input name="adresa_sc"  id="adresa_sc" tabindex="32" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> ap. <input name="adresa_ap"  id="adresa_ap" tabindex="33" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> et. <input name="adresa_et"  id="adresa_et" tabindex="34" type="text"  style="width: 18px;" maxlength="2" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft" colspan="2" rowspan="3">
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisabottom" colspan="2" rowspan="3">
<input type="checkbox" id="puls_prezent" tabindex="135" name="puls_prezent" value="1" class="radioforte">prezent<br>
<input type="checkbox" id="puls_absent" tabindex="136" name="puls_absent" value="1" class="radioforte">absent<br>
<input type="checkbox" id="puls_plin" tabindex="137" name="puls_plin" value="1" class="radioforte">plin<br>
<input type="checkbox" id="puls_filiform" tabindex="138" name="puls_filiform" value="1" class="radioforte">filiform<br>
<input type="checkbox" id="puls_ritmic" tabindex="139" name="puls_ritmic" value="1" class="radioforte">ritmic<br>
<input type="checkbox" id="puls_aritmic" tabindex="140" name="puls_aritmic" value="1" class="radioforte">aritmic
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisabottom" rowspan="3">
<input type="checkbox" id="ekg_bradicardie" tabindex="141" name="ekg_bradicardie" value="1" class="radioforte">bradicardie 
<input type="checkbox" id="ekg_tahicardie" tabindex="142" name="ekg_tahicardie" value="1" class="radioforte">tahicardie<br>
<b>RITM:</b><input type="checkbox" id="ekg_defib" tabindex="143" name="ekg_defib" value="1" class="radioforte">defib.
<input type="checkbox" id="ekg_nedefib" tabindex="144" name="ekg_nedefib" value="1" class="radioforte">nedefib.<br>
<input type="checkbox" id="ekg_fa" tabindex="145" name="ekg_fa" value="1" class="radioforte">F.A.<br>
<b>RITM:</b><input type="checkbox" id="ekg_regulat" tabindex="146" name="ekg_regulat" value="1" class="radioforte">regulat
<input type="checkbox" id="ekg_nereg" tabindex="147" name="ekg_nereg" value="1" class="radioforte">nereg.<br>
<b>Unde P:</b><input type="checkbox" id="ekg_prezent" tabindex="148" name="ekg_prezent" value="1" class="radioforte">prezent
<input type="checkbox" id="ekg_abs" tabindex="149" name="ekg_abs" value="1" class="radioforte">abs.<br>
<b>QRS:</b><input type="checkbox" id="ekg_largi" tabindex="150" name="ekg_largi" value="1" class="radioforte">largi
<input type="checkbox" id="ekg_inguste" tabindex="151" name="ekg_inguste" value="1" class="radioforte">înguste<br>
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">Manevre<br>descarcerare</td>
<td class="prezentatdfisaw prezentatdfisaright prezentatdfisatop" colspan="3">
<div class="tooltipinterventii"><input name="manevre_descarcerare_1" id="manevre_descarcerare_1" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="1" value="" readonly="readonly" size="" tabindex="235">
<span class="tooltiptextint">Asigurare acces rapid către victimă</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_2" id="manevre_descarcerare_2" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="2" value="" readonly="readonly" size="" tabindex="236">
<span class="tooltiptextint">Decapotare partială/totală</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_3" id="manevre_descarcerare_3" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="3" value="" readonly="readonly" size="" tabindex="237">
<span class="tooltiptextint">Deschidere forțată de uși</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_4" id="manevre_descarcerare_4" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="4" value="" readonly="readonly" size="" tabindex="238">
<span class="tooltiptextint">Stabilizare</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_5" id="manevre_descarcerare_5" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="5" value="" readonly="readonly" size="" tabindex="239">
<span class="tooltiptextint">Deconectare baterie</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_6" id="manevre_descarcerare_6" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="6" value="" readonly="readonly" size="" tabindex="240">
<span class="tooltiptextint">Iluminare</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_7" id="manevre_descarcerare_7" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="7" value="" readonly="readonly" size="" tabindex="241">
<span class="tooltiptextint">Ridicare cu perne</span></div><br>
<div class="tooltipinterventii"><input name="manevre_descarcerare_8" id="manevre_descarcerare_8" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="8" value="" readonly="readonly" size="" tabindex="242">
<span class="tooltiptextint">Îndepărtare cu telescop hidraulic</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_9" id="manevre_descarcerare_9" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="9" value="" readonly="readonly" size="" tabindex="243">
<span class="tooltiptextint">Tăiere pedale/volan</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_10" id="manevre_descarcerare_10" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="10" value="" readonly="readonly" size="" tabindex="244">
<span class="tooltiptextint">Utilizare aparat stingere cu apă pulverizată</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_11" id="manevre_descarcerare_11" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="11" value="" readonly="readonly" size="" tabindex="245">
<span class="tooltiptextint">Utilizare stingător</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_12" id="manevre_descarcerare_12" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="12" value="" readonly="readonly" size="" tabindex="246">
<span class="tooltiptextint">Utilizare KED (atelă specială de extragere a victimei)</span></div>
<div class="tooltipinterventii"><input name="manevre_descarcerare_13" id="manevre_descarcerare_13" class="pointer" type="text" onclick="verificaManevre.Descarcerare(this.id)" placeholder="13" value="" readonly="readonly" size="" tabindex="247">
<span class="tooltiptextint">Alte manevre privind descarcerarea</span></div>
</td>
</tr>
  

  <tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisabottom" colspan="3" rowspan="2">Distanța parcursă [km] <input name="distanta_km"  id="distanta_km" tabindex="35" type="text"  style="width: 50px;" maxlength="5" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="4" rowspan="2">
</td>
</tr>
<tr class="prezenta"></tr>

<tr class="prezenta">
<td class="prezentatd prezentatdfisacenter" colspan="12"><button type="submit" name="{$formpagebutton}" value="{$formpagebutton}" class="buttonnew"><span class="icon-checkmark"><span id="formaadbuttonmass"></span>{$formpagebutton}</button>
<a href="{$folderinst}" class="buttonnew"><span class="icon-cross">Închidere</span></a>
</td>
</tr>

</table>
</form>
{$getjs}

_SMURD;
?>

