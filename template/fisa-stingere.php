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
<td class="prezentatd padleft10" colspan="5"><h2>{$formpagebutton} raport stingere <span id="nrsmurdsubunitate"></span></h2></td>
<td class="prezentatd padleft10" colspan="4"><p class='error' id='messagefrom'>{$messagefrom}</p></td>
<td class="prezentatd" colspan="4"><p><button type="submit" name="{$formpagebutton}" value="{$formpagebutton}" class="buttonnew"><span class="icon-checkmark"><span id="formaadbuttonmass"></span>{$formpagebutton}</button><a href="stingere.php" class="buttonnew"><span class="icon-cross">Închidere</span></a></p></td>
</tr>
{$getablerow}
<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaleft" colspan="3">IDENTIFICARE</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft">Strada
</td>
<td class="prezentatdfisaw prezentatdfisatop" colspan="2"><input name="adresa_strada"  id="adresa_strada" tabindex="34" type="text" class="input-set" maxlength="20" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft" colspan="2">ISU
</td>
<td class="prezentatdfisaw prezentatdfisatop" colspan="2">CLSU
</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaright" colspan="2">Altele
</td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Data/oră plecare</td>
<td class="prezentatdfisaw" colspan="2"><input class="nou" type="text" maxlength="2" placeholder="zz" name="plecare_zi" id="plecare_zi" onclick="currentDate.sendId('plecare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_luna');"  onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="1"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="plecare_luna" id="plecare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_an');" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="2"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="plecare_an" id="plecare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_ora');" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="3"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="plecare_ora" id="plecare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'plecare_min');" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="4"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="plecare_min" id="plecare_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.calculMinus('plecare_','anunt_');currentDate.verificareDate('anunt_','plecare_');currentDate.verificareDate('plecare_','sosire_');" tabindex="5"></td>

<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Număr <input name="adresa_nr"  id="adresa_nr" tabindex="35" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> bl. <input name="adresa_bl"  id="adresa_bl" tabindex="36" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> sc. <input name="adresa_sc"  id="adresa_sc" tabindex="37" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> ap. <input name="adresa_ap"  id="adresa_ap" tabindex="38" type="text"  style="width: 18px;" maxlength="4" autocomplete="off"> et. <input name="adresa_et"  id="adresa_et" tabindex="39" type="text"  style="width: 18px;" maxlength="2" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Ofițeri</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_of"  id="pers_of" tabindex="108" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Primar</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_prim"  id="pers_prim" tabindex="112" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Poliție</td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="pers_pol"  id="pers_pol" tabindex="117" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Participanti(cod)</td>
<td class="prezentatdfisaw" colspan="2">
  <select name="participanti" id="participanti" style="width: 150px;" onchange="tipInterventie.Resetcateg();tipInterventie.Cauta('categorie_interventie','participanti');" tabindex="6">
  {$participanti}
  </select>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Telefon</td>
<td class="prezentatdfisaw" colspan="2"><input name="telefon"  id="telefon" tabindex="40" type="text" maxlength="15" autocomplete="off" class="input-set"></td>
<td class="prezentatdfisaw prezentatdfisaleft">MM</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_mm"  id="pers_mm" tabindex="109" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Vice</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_vice"  id="pers_vice" tabindex="113" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Jandarmi</td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="pers_jandarmi"  id="pers_jandarmi" tabindex="118" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Cod subunitate/<br>Nr. ordine</td>
<td class="prezentatdfisa"><span id="tipsubunitate">{$_SESSION['tipsubunitate']}</span>.-<span id="codsubunit">{$codsubunit}</span></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisabold"><span id="nrordine"></span></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Long(X):<input name="longx"  id="longx" tabindex="41" type="text" maxlength="12" autocomplete="off" class="input-set">&nbsp;&nbsp;Lat(Y):<input name="laty"  id="laty" tabindex="42" type="text" maxlength="12" autocomplete="off" class="input-set"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Subofițeri</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_subof"  id="pers_subof" tabindex="110" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Secretar</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_secret"  id="pers_secret" tabindex="114" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Frontieră</td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="pers_front"  id="pers_front" tabindex="119" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">SVSU/SPSU/Alte</td>
<td class="prezentatdfisaw" colspan="2"><input name="svsu_spsu"  id="svsu_spsu" tabindex="7" type="text" maxlength="60" autocomplete="off" class="input-set"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">MOMENTE DESFĂȘURARE INTERVENȚIE</td>
<td class="prezentatdfisaw prezentatdfisaleft">Voluntari</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_volunt"  id="pers_volunt" tabindex="111" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">SVSU</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_svsu"  id="pers_svsu" tabindex="115" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Armată</td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="pers_armata"  id="pers_armata" tabindex="120" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Categorie<br>interventie</td>
<td class="prezentatdfisaw" colspan="2"> <select name="categorie_interventie" id="categorie_interventie" onchange="tipInterventie.Cauta('categorie_interventie','participanti');" style="width: 150px;" tabindex="8"><option value="">Selectați</option>
{$categorie_interventie}
  </select></td>

<td class="prezentatdfisaw prezentatdfisaleft">Anunțare</td>
<td class="prezentatdfisaw"><div class="tooltiptimpi"><span class="tooltimpi" id="plecare_mesaj">Timpul anunțării este mai mare decât timpul plecării!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="anunt_zi" id="anunt_zi" onclick="currentDate.sendId('anunt_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_luna');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="43"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="anunt_luna" id="anunt_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_an');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="44"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="anunt_an" id="anunt_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_ora');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="45"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="anunt_ora" id="anunt_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'anunt_min');" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="46"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="anunt_min" id="anunt_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('anunt_','plecare_')" tabindex="47">
  </div>
</td>
<td class="prezentatdfisa prezentatdfisaleft">Mod alertare</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2"></td>
<td class="prezentatdfisaw">SPSU</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="pers_spsu"  id="pers_spsu" tabindex="116" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Centățeni</td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="pers_cet"  id="pers_cet" tabindex="121" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Tip<br>interventie</td>
<td class="prezentatdfisaw" colspan="2"><div class="tooltiptimpi"><span class="tooltimpi" id="cod_invalid">Codul nu este valid!</span><select name="tip_interventie" id="tip_interventie" style="width: 100px;" onchange="CodInterventie.setCode(this.value)" tabindex="9"><option value="">Selectați</option>
  </select>
  <input name="cod_interventie"  id="cod_interventie" type="text" size="1" maxlength="4" autocomplete="off" placeholder="cod" onblur="CodInterventie.getCode(this.value,'tip_interventie','categorie_interventie','participanti')" onclick="this.setSelectionRange(0, this.value.length)" tabindex="10">
  </div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Sosire</td>
<td class="prezentatdfisaw"><div class="tooltiptimpi"><span class="tooltimpi" id="sosire_mesaj">Timpul sosirii este mai mic decât timpul plecării!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="sosire_zi" id="sosire_zi" onclick="currentDate.calculZi('plecare_','sosire_');currentDate.sendId('sosire_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_luna');" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="48"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="sosire_luna" id="sosire_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_an');" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="49"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="sosire_an" id="sosire_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_ora');" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="50"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="sosire_ora" id="sosire_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'sosire_min');" tabindex="51" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="sosire_min" id="sosire_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('plecare_','sosire_');currentDate.verificareDate('sosire_','retragere_');" tabindex="52"></div></td>
<td class="prezentatdfisaw prezentatdfisaleft lineh" rowspan="6">
<input type="checkbox" id="modalert0" tabindex="78" name="modalert" value="0" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Nu este cazul<br>
<input type="checkbox" id="modalert1" tabindex="79" name="modalert" value="1" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Verbal<br>
<input type="checkbox" id="modalert2" tabindex="80" name="modalert" value="2" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Observare directă<br>
<input type="checkbox" id="modalert3" tabindex="81" name="modalert" value="3" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Tel. direct (cu ISU)<br>
<input type="checkbox" id="modalert4" tabindex="82" name="modalert" value="4" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Tel. urban<br>
<input type="checkbox" id="modalert5" tabindex="83" name="modalert" value="5" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Tel. interurban<br>
<input type="checkbox" id="modalert6" tabindex="84" name="modalert" value="6" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Sistem de observare<br>alertare automată<br>
<input type="checkbox" id="modalert7" tabindex="85" name="modalert" value="7" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Alt mod de alertare<br>
<input type="checkbox" id="modalert8" tabindex="86" name="modalert" value="8" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Telefon mobil<br>
<input type="checkbox" id="modalert9" tabindex="87" name="modalert" value="9" class="radioforte" onclick="jumpNext.resetAnunt(this.value)">Apel unic 112
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Nr. mijloace<br>stingere</td>
<td class="prezentatdfisa prezentatdfisatop">ISU</td>
<td class="prezentatdfisa prezentatdfisatop">SVSU</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaright">SPSU</td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Data/oră producere</td>
<td class="prezentatdfisaw" colspan="2"><input class="nou" type="text" maxlength="2" placeholder="zz" name="producere_zi" id="producere_zi" onclick="currentDate.calculZi('plecare_','producere_');currentDate.sendId('producere_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_luna');" tabindex="11"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="producere_luna" id="producere_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_an');" tabindex="12"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="producere_an" id="producere_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_ora');" tabindex="13"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="producere_ora" id="producere_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'producere_min');" tabindex="14"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="producere_min" id="producere_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="15"></td>

<td class="prezentatdfisaw prezentatdfisaleft">Localizare</td>
<td class="prezentatdfisaw">
<div class="tooltiptimpi"><span class="tooltimpi" id="retragere_mesaj">Timpul localizării este mai mic decât timpul sosirii la caz!</span>
<input class="nou" type="text" maxlength="2" placeholder="zz" name="retragere_zi" id="retragere_zi" onclick="currentDate.calculZi('sosire_','retragere_');currentDate.sendId('retragere_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_luna');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="53"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="retragere_luna" id="retragere_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_an');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="54"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="retragere_an" id="retragere_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_ora');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="55"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="retragere_ora" id="retragere_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'retragere_min');" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="56"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="retragere_min" id="retragere_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('sosire_','retragere_');currentDate.verificareDate('retragere_','spital_')" tabindex="57"></div></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Mijloace de primă<br>intervenție (cifre)</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu"  id="mijstingere_isu" tabindex="122" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu"  id="mijstingere_svsu" tabindex="129" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu"  id="mijstingere_spsu" tabindex="138" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Denumire persoană</td>
<td class="prezentatdfisaw" colspan="2">
<input name="denumire_persoana"  id="denumire_persoana" tabindex="16" type="text" size="1" maxlength="60" autocomplete="off" class="input-set" placeholder="nume prenume" >
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Lichidare</td>
<td class="prezentatdfisaw"><div class="tooltiptimpi"><span class="tooltimpi" id="spital_mesaj">Timpul lichidării este mai mic decât timpul localizării!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="spital_zi" id="spital_zi" onclick="currentDate.calculZi('retragere_','spital_');currentDate.sendId('spital_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_luna');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="58"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="spital_luna" id="spital_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_an');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="59"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="spital_an" id="spital_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_ora');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="60"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="spital_ora" id="spital_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'spital_min');" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="61"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="spital_min" id="spital_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('retragere_','spital_');currentDate.verificareDate('spital_','eliberare_');" tabindex="62"></div></td> 
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2" rowspan="3">Țeavă de refulare</td>
<td class="prezentatdfisaw">tip B</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu_tipb"  id="mijstingere_isu_tipb" tabindex="123" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu_tipb"  id="mijstingere_svsu_tipb" tabindex="130" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu_tipb"  id="mijstingere_spsu_tipb" tabindex="139" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Organ tutelar(Anexa 3)</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_organ_tutelar_invalid">Codul nu este valid!</span><select name="organ_tutelar" id="organ_tutelar" style="width: 100px;" onchange="OrganTutelar.setCode(this.value,'cod_organ_tutelar','cod_organ_tutelar_invalid')" tabindex="17">
{$organTutelarOpt}
  </select>
  <input name="cod_organ_tutelar"  id="cod_organ_tutelar" tabindex="18" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="organ tutelar" onblur="OrganTutelar.getCode(this.value,'organ_tutelar','cod_organ_tutelar_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td> 
<td class="prezentatdfisaw prezentatdfisaleft">Retragere</td>
<td class="prezentatdfisaw"><div class="tooltiptimpi"><span class="tooltimpi" id="eliberare_mesaj">Timpul retragerii este mai mic decât timpul anunțării!</span><input class="nou" type="text" maxlength="2" placeholder="zz" name="eliberare_zi" id="eliberare_zi" onclick="currentDate.calculZi('anunt_','eliberare_');currentDate.sendId('eliberare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_luna');" onblur="currentDate.verificareDate('anunt_','eliberare_')" tabindex="63"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="eliberare_luna" id="eliberare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_an');" onblur="currentDate.verificareDate('anunt_','eliberare_')" tabindex="64"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="eliberare_an" id="eliberare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_ora');" onblur="currentDate.verificareDate('anunt_','eliberare_')" tabindex="65"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="eliberare_ora" id="eliberare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'eliberare_min');" onblur="currentDate.verificareDate('anunt_','eliberare_')" tabindex="66"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="eliberare_min" id="eliberare_min" onclick="this.setSelectionRange(0, this.value.length)" onblur="currentDate.verificareDate('anunt_','eliberare_')" tabindex="67"></div></td>
<td class="prezentatdfisaw">tip C</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu_tipc"  id="mijstingere_isu_tipc" tabindex="124" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu_tipc"  id="mijstingere_svsu_tipc" tabindex="131" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu_tipc" id="mijstingere_spsu_tipc" tabindex="140" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Tip proprietate(Anexa 4)</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_tip_proprietate_invalid">Codul nu este valid!</span><select name="tip_proprietate" id="tip_proprietate" style="width: 100px;" onchange="TipProprietate.setCode(this.value,'cod_tip_proprietate','cod_tip_proprietate_invalid')" tabindex="19">
{$tipProprietateOpt}
  </select>
  <input name="cod_tip_proprietate"  id="cod_tip_proprietate" tabindex="20" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="tip proprietate" onblur="TipProprietate.getCode(this.value,'tip_proprietate','cod_tip_proprietate_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>

<td class="prezentatdfisa prezentatdfisaleft">Sosire<br>SVSU</td>
<td class="prezentatdfisaw"><input class="nou" type="text" maxlength="2" placeholder="zz" name="monitorizare_zi" id="monitorizare_zi" onclick="currentDate.calculZi('sosire_','monitorizare_');currentDate.sendId('monitorizare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_luna');" tabindex="68"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="monitorizare_luna" id="monitorizare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_an');" tabindex="69"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="monitorizare_an" id="monitorizare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_ora');" tabindex="70"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="monitorizare_ora" id="monitorizare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'monitorizare_min');" tabindex="71"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="monitorizare_min" id="monitorizare_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="72"></td>
<td class="prezentatdfisaw">tip D</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu_tipd"  id="mijstingere_isu_tipd" tabindex="125" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu_tipd"  id="mijstingere_svsu_tipd" tabindex="133" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu_tipd"  id="mijstingere_spsu_tipd" tabindex="141" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>

</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Activitate economică<br>(Anexa 5)
</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_activitate_economica_invalid">Codul nu este valid!</span>
  <input name="cod_activitate_economica"  id="cod_activitate_economica" tabindex="21" type="text" size="10" maxlength="4" autocomplete="off" placeholder="activitate economica" onblur="ActivitateEconomica.cautaCategorie(this.value,'activitate_economica','cod_activitate_economica_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>
<td class="prezentatdfisa prezentatdfisaleft">Sosire<br>SPSU</td>
<td class="prezentatdfisaw prezentatdfisaleft"><input class="nou" type="text" maxlength="2" placeholder="zz" name="imprimare_zi" id="imprimare_zi" onclick="currentDate.calculZi('monitorizare_','imprimare_');currentDate.sendId('imprimare_');this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_luna');" tabindex="73"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="imprimare_luna" id="imprimare_luna" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_an');" tabindex="74"><p class="in">.</p><input class="nou2c" type="text" maxlength="4" placeholder="aaaa" name="imprimare_an" id="imprimare_an" onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_ora');" tabindex="75"><p class="in">   </p><input class="nou1" type="text" maxlength="2" placeholder="hh" name="imprimare_ora" id="imprimare_ora" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'imprimare_min');" tabindex="76"><p class="in">:</p><input class="nou3" type="text" maxlength="2" placeholder="mm" name="imprimare_min" id="imprimare_min" onclick="this.setSelectionRange(0, this.value.length)" tabindex="77"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Țevi generatoare/lans. spumă</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu_tevigen"  id="mijstingere_isu_tevigen" tabindex="126" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu_tevigen"  id="mijstingere_svsu_tevigen" tabindex="134" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu_tevigen"  id="mijstingere_spsu_tevigen" tabindex="142" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Tip Obiectiv(Anexa 6)
</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_tip_obiectiv_invalid">Codul nu este valid!</span><select name="tip_obiectiv" id="tip_obiectiv" style="width: 100px;" onchange="TipProprietate.setCode(this.value,'cod_tip_obiectiv','cod_tip_obiectiv_invalid')" tabindex="22">
{$tipObiectivOpt}
  </select>
  <input name="cod_tip_obiectiv"  id="cod_tip_obiectiv" tabindex="23" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="tip obiectiv" onblur="TipProprietate.getCode(this.value,'tip_obiectiv','cod_tip_obiectiv_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>

<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">DATE DESFĂȘURARE INTERVENȚIE</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Capete refulare pulberi</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu_refpulb"  id="mijstingere_isu_refpulb" tabindex="127" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu_refpulb"  id="mijstingere_svsu_refpulb" tabindex="135" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu_refpulb"  id="mijstingere_spsu_refpulb" tabindex="143" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Destinație(Anexa 7)</td>
<td class="prezentatdfisaw" colspan="2">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_dest_invalid">Codul nu este valid!</span><select name="destinatie" id="destinatie" style="width: 100px;" onchange="CodDest.setCode(this.value,'cod_dest','cod_dest_invalid')" tabindex="24">
{$destinatieOpt}
  </select>
  <input name="cod_dest"  id="cod_dest" tabindex="25" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="cod" onblur="CodDest.getCode(this.value,'destinatie','cod_dest_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td> 

<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisabottom" colspan="2">Distanța parcursă [km] <input name="distanta_km"  id="distanta_km" tabindex="88" type="text"  style="width: 50px;" maxlength="5" autocomplete="off">
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">Forțe în sprijin<br>(Anexa 9)</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Instalații automate de stingere</td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_isu_autosting"  id="mijstingere_isu_autosting" tabindex="128" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw"><input name="mijstingere_svsu_autosting"  id="mijstingere_svsu_autosting" tabindex="137" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisacenter prezentatdfisaw prezentatdfisaright"><input name="mijstingere_spsu_autosting"  id="mijstingere_spsu_autosting" tabindex="144" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Are coș de fum: 
<input type="checkbox" id="cos_fum1" tabindex="26" name="cos_fum" value="1" onclick="jumpNext.resetOther2('cos_fum2','cos_fum0')" class="radioforte">Da&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="cos_fum2" tabindex="27" name="cos_fum" value="2" onclick="jumpNext.resetOther2('cos_fum1','cos_fum0')" class="radioforte">Nu&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="cos_fum0" tabindex="28" name="cos_fum" value="0" onclick="jumpNext.resetOther2('cos_fum2','cos_fum1')" class="radioforte">Nu este cazul</td>

<td class="prezentatdfisaw prezentatdfisaleft lineh" colspan="3" rowspan="2">
<b>Forța din urgență:</b>
<input type="checkbox" id="fortaurg1" tabindex="89" name="fortaurg" value="1" class="radioforte" onclick="jumpNext.resetForte(this.value)">I&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="fortaurg2" tabindex="90" name="fortaurg" value="2" class="radioforte" onclick="jumpNext.resetForte(this.value)">II&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="fortaurg3" tabindex="91" name="fortaurg" value="3" class="radioforte" onclick="jumpNext.resetForte(this.value)">III&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="fortaurg4" tabindex="92" name="fortaurg" value="4" class="radioforte" onclick="jumpNext.resetForte(this.value)">IV<br>
<input type="checkbox" id="fortaurg5" tabindex="93" name="fortaurg" value="5" class="radioforte" onclick="jumpNext.resetForte(this.value)">Alte forțe(Jandarmi, frontieră, MApN)
<input type="checkbox" id="fortaurg0" tabindex="94" name="fortaurg" value="0" class="radioforte" onclick="jumpNext.resetForte(this.value)">Nu este cazul
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">TIP/URGENȚĂ</td>
<td class="prezentatdfisa prezentatdfisatop">I</td>
<td class="prezentatdfisa prezentatdfisatop">II</td>
<td class="prezentatdfisa prezentatdfisatop">III</td>
<td class="prezentatdfisa prezentatdfisatop">IV</td>
<td class="prezentatdfisa prezentatdfisatop">SVSU</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisaright">SPSU</td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">Localizare</td>

<td class="prezentatdfisaw prezentatdfisaleft">Multirisc</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_multirisc_1"  id="tipurgenta_multirisc_1" tabindex="145" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_multirisc_2"  id="tipurgenta_multirisc_2" tabindex="146" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_multirisc_3"  id="tipurgenta_multirisc_3" tabindex="147" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_multirisc_4"  id="tipurgenta_multirisc_4" tabindex="148" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_multirisc_svsu"  id="tipurgenta_multirisc_svsu" tabindex="149" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_multirisc_spsu"  id="tipurgenta_multirisc_spsu" tabindex="150" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
    <td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft" rowspan="2">Țara<br> <select name="tara" id="tara" style="width: 100px;" tabindex="29">
{$tari}
  </select></td>
<td class="prezentatdfisaw prezentatdfisacenter" rowspan="2" colspan="2">Județul<br> <select name="judet" id="judet" style="width: 100px;" onchange="Localitati.cautaLocalitate(this.value);Sate.cautaSat();" tabindex="29">><option value="">Selectați</option>
{$judete}
  </select></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="3">PROCEDEE DE ÎNTRERUPERE A ARDERII</td>
<td class="prezentatdfisaw prezentatdfisaleft">PMA 2</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma2_1"  id="tipurgenta_pma2_1" tabindex="151" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma2_2"  id="tipurgenta_pma2_2" tabindex="152" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma2_3"  id="tipurgenta_pma2_3" tabindex="153" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma2_4"  id="tipurgenta_pma2_4" tabindex="154" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma2_svsu"  id="tipurgenta_pma2_svsu" tabindex="155" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_pma2_spsu"  id="tipurgenta_pma2_spsu" tabindex="156" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft lineh" colspan="3" rowspan="4">
<input type="checkbox" id="procintr1" tabindex="95" name="procintr" value="1" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Răcirea zonei de ardere<br>
<input type="checkbox" id="procintr2" tabindex="96" name="procintr" value="2" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Izolarea mat./subst. combust. de aerul atmosferic<br>
<input type="checkbox" id="procintr3" tabindex="97" name="procintr" value="3" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Introd. de inhibitori în spaţiile cu reacţii de ardere<br>
<input type="checkbox" id="procintr4" tabindex="98" name="procintr" value="4" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Îndepărtarea subst. combustibile din zonele de ardere<br>
<input type="checkbox" id="procintr5" tabindex="99" name="procintr" value="5" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Reducerea conţinutului minim de oxigen<br>
<input type="checkbox" id="procintr6" tabindex="100" name="procintr" value="6" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Alte procedee<br>
<input type="checkbox" id="procintr0" tabindex="101" name="procintr" value="0" class="radioforte" onclick="jumpNext.resetProceeIntrerupere(this.value)">Nu este cazul
</td>
<td class="prezentatdfisaw prezentatdfisaleft">PMA 1</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma1_1"  id="tipurgenta_pma1_1" tabindex="157" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma1_2"  id="tipurgenta_pma1_2" tabindex="158" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma1_3"  id="tipurgenta_pma1_3" tabindex="159" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma1_4"  id="tipurgenta_pma1_4" tabindex="160" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_pma1_svsu"  id="tipurgenta_pma1_svsu" tabindex="161" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_pma1_spsu"  id="tipurgenta_pma1_spsu" tabindex="162" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft"><input type="checkbox" id="intravilan1" tabindex="30" name="intravilan" value="1" class="radioforte" onclick="jumpNext.resetOther('intravilan2')">Intravilan</td>
<td class="prezentatdfisaw" colspan="2"><input type="checkbox" id="intravilan2" tabindex="31" name="intravilan" value="2" class="radioforte" onclick="jumpNext.resetOther('intravilan1')">Extravilan</td>
<td class="prezentatdfisaw prezentatdfisaleft">ASAS Mare</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmare_1"  id="tipurgenta_asasmare_1" tabindex="163" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmare_2"  id="tipurgenta_asasmare_2" tabindex="164" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmare_3"  id="tipurgenta_asasmare_3" tabindex="165" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmare_4"  id="tipurgenta_asasmare_4" tabindex="166" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmare_svsu"  id="tipurgenta_asasmare_svsu" tabindex="167" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_asasmare_spsu"  id="tipurgenta_asasmare_spsu" tabindex="168" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">U.A.T.
</td>
<td class="prezentatdfisaw" colspan="2"><select name="localitati" id="localitati" style="width: 150px;" onchange="Sate.cautaSat(this.value);" tabindex="32">
{$localitati}
  </select>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">ASAS Medie</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmedie_1"  id="tipurgenta_asasmedie_1" tabindex="169" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmedie_2"  id="tipurgenta_asasmedie_2" tabindex="170" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmedie_3"  id="tipurgenta_asasmedie_3" tabindex="171" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmedie_4"  id="tipurgenta_asasmedie_4" tabindex="172" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmedie_svsu"  id="tipurgenta_asasmedie_svsu" tabindex="173" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_asasmedie_spsu"  id="tipurgenta_asasmedie_spsu" tabindex="174" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Satul
</td>
<td class="prezentatdfisaw" colspan="2"><select name="sate" id="sate" style="width: 150px;" tabindex="33"><option value="">Selectați</option>
{$sate}
  </select>

</td>

<td class="prezentatdfisaw prezentatdfisaleft">ASAS Mică</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmica_1"  id="tipurgenta_asasmica_1" tabindex="175" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmica_2"  id="tipurgenta_asasmica_2" tabindex="176" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmica_3"  id="tipurgenta_asasmica_3" tabindex="177" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmica_4"  id="tipurgenta_asasmica_4" tabindex="178" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asasmica_svsu"  id="tipurgenta_asasmica_svsu" tabindex="179" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_asasmica_spsu"  id="tipurgenta_asasmica_spsu" tabindex="180" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3" rowspan="3">
</td>
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="2">
Cdt. acțiune<br>(Anx. 11)
</td>
<td class="prezentatdfisaw" rowspan="2">
<input type="checkbox" id="cdtac1" tabindex="102" name="cdtac" value="1" class="radioforte" onclick="jumpNext.resetOther2('cdtac2', 'cdtac3')">Insp. șef/înlocuitor legal<br>
<input type="checkbox" id="cdtac2" tabindex="103" name="cdtac" value="2" class="radioforte" onclick="jumpNext.resetOther2('cdtac3', 'cdtac1')">Șef DSU<br>
<input type="checkbox" id="cdtac3" tabindex="104" name="cdtac" value="3" class="radioforte" onclick="jumpNext.resetOther2('cdtac1', 'cdtac2')">Altă persoană desemnată
</td>
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="2">
<span class="pleft"><b>Cdt. interv.<br>(Anexa 12)</b>:</span>
<span class="pright"><input name="cdtint"  id="cdtint" tabindex="105" type="text"  style="width: 55px;" maxlength="2" autocomplete="off"></span>
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Alte ASAS</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteasas_1"  id="tipurgenta_alteasas_1" tabindex="181" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteasas_2"  id="tipurgenta_alteasas_2" tabindex="182" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteasas_3"  id="tipurgenta_alteasas_3" tabindex="183" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteasas_4"  id="tipurgenta_alteasas_4" tabindex="184" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteasas_svsu"  id="tipurgenta_alteasas_svsu" tabindex="185" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_alteasas_spsu"  id="tipurgenta_alteasas_spsu" tabindex="186" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">AISI</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aisi_1"  id="tipurgenta_aisi_1" tabindex="187" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aisi_2"  id="tipurgenta_aisi_2" tabindex="188" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aisi_3"  id="tipurgenta_aisi_3" tabindex="189" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aisi_4"  id="tipurgenta_aisi_4" tabindex="189" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aisi_svsu"  id="tipurgenta_aisi_svsu" tabindex="191" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_aisi_spsu"  id="tipurgenta_aisi_spsu" tabindex="192" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">
Creștere capacitate operațională: <input type="checkbox" id="ccapop1" tabindex="106" name="ccapop" value="1" class="radioforte" onclick="jumpNext.resetOther('ccapop0')">DA&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="ccapop0" tabindex="107" name="ccapop" value="0" class="radioforte" onclick="jumpNext.resetOther('ccapop1')">NU
</td>
<td class="prezentatdfisaw prezentatdfisaleft">Asp FGI</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspfgi_1"  id="tipurgenta_aspfgi_1" tabindex="193" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspfgi_2"  id="tipurgenta_aspfgi_2" tabindex="194" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspfgi_3"  id="tipurgenta_aspfgi_3" tabindex="195" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspfgi_4"  id="tipurgenta_aspfgi_4" tabindex="196" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspfgi_svsu"  id="tipurgenta_aspfgi_svsu" tabindex="197" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_aspfgi_spsu"  id="tipurgenta_aspfgi_spsu" tabindex="198" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="6" rowspan="11">
</td>
<td class="prezentatdfisaw prezentatdfisaleft">AServ/AMOP</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aservamop_1"  id="tipurgenta_aservamop_1" tabindex="199" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aservamop_2"  id="tipurgenta_aservamop_2" tabindex="200" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aservamop_3"  id="tipurgenta_aservamop_3" tabindex="201" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aservamop_4"  id="tipurgenta_aservamop_4" tabindex="202" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aservamop_svsu"  id="tipurgenta_aservamop_svsu" tabindex="203" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_aservamop_spsu"  id="tipurgenta_aservamop_spsu" tabindex="204" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">CBRN/ADP</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_crbnadp_1"  id="tipurgenta_crbnadp_1" tabindex="205" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_crbnadp_2"  id="tipurgenta_crbnadp_2" tabindex="206" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_crbnadp_3"  id="tipurgenta_crbnadp_3" tabindex="207" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_crbnadp_4"  id="tipurgenta_crbnadp_4" tabindex="208" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_crbnadp_svsu"  id="tipurgenta_crbnadp_svsu" tabindex="209" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_crbnadp_spsu"  id="tipurgenta_crbnadp_spsu" tabindex="210" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">ACI</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aci_1"  id="tipurgenta_aci_1" tabindex="211" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aci_2"  id="tipurgenta_aci_2" tabindex="212" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aci_3"  id="tipurgenta_aci_3" tabindex="213" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aci_4"  id="tipurgenta_aci_4" tabindex="214" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aci_svsu"  id="tipurgenta_aci_svsu" tabindex="215" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_aci_spsu"  id="tipurgenta_aci_spsu" tabindex="216" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Asp scafandri</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspscaf_1"  id="tipurgenta_aspscaf_1" tabindex="217" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspscaf_2"  id="tipurgenta_aspscaf_2" tabindex="218" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspscaf_3"  id="tipurgenta_aspscaf_3" tabindex="219" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspscaf_4"  id="tipurgenta_aspscaf_4" tabindex="220" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_aspscaf_svsu"  id="tipurgenta_aspscaf_svsu" tabindex="221" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_aspscaf_spsu"  id="tipurgenta_aspscaf_spsu" tabindex="222" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Bărci/Șalupe</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_barcisalupe_1"  id="tipurgenta_barcisalupe_1" tabindex="223" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_barcisalupe_2"  id="tipurgenta_barcisalupe_2" tabindex="224" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_barcisalupe_3"  id="tipurgenta_barcisalupe_3" tabindex="225" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_barcisalupe_4"  id="tipurgenta_barcisalupe_4" tabindex="226" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_barcisalupe_svsu"  id="tipurgenta_barcisalupe_svsu" tabindex="227" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_barcisalupe_spsu"  id="tipurgenta_barcisalupe_spsu" tabindex="228" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">AFZM</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_afzm_1"  id="tipurgenta_afzm_1" tabindex="229" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_afzm_2"  id="tipurgenta_afzm_2" tabindex="230" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_afzm_3"  id="tipurgenta_afzm_3" tabindex="231" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_afzm_4"  id="tipurgenta_afzm_4" tabindex="232" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_afzm_svsu"  id="tipurgenta_afzm_svsu" tabindex="233" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_afzm_spsu"  id="tipurgenta_afzm_spsu" tabindex="234" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Ambulanțe</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_ambulante_1"  id="tipurgenta_ambulante_1" tabindex="235" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_ambulante_2"  id="tipurgenta_ambulante_2" tabindex="236" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_ambulante_3"  id="tipurgenta_ambulante_3" tabindex="247" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_ambulante_4"  id="tipurgenta_ambulante_4" tabindex="238" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_ambulante_svsu"  id="tipurgenta_ambulante_svsu" tabindex="239" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_ambulante_spsu"  id="tipurgenta_ambulante_spsu" tabindex="240" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">DESC</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_descarc_1"  id="tipurgenta_descarc_1" tabindex="241" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_descarc_2"  id="tipurgenta_descarc_2" tabindex="242" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_descarc_3"  id="tipurgenta_descarc_3" tabindex="243" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_descarc_4"  id="tipurgenta_descarc_4" tabindex="244" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_descarc_svsu"  id="tipurgenta_descarc_svsu" tabindex="245" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_descarc_spsu"  id="tipurgenta_descarc_spsu" tabindex="246" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Asp transp.<br>apă</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asptransportapa_1"  id="tipurgenta_asptransportapa_1" tabindex="247" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asptransportapa_2"  id="tipurgenta_asptransportapa_2" tabindex="248" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asptransportapa_3"  id="tipurgenta_asptransportapa_3" tabindex="249" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asptransportapa_4"  id="tipurgenta_asptransportapa_4" tabindex="250" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_asptransportapa_svsu"  id="tipurgenta_asptransportapa_svsu" tabindex="251" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_asptransportapa_spsu"  id="tipurgenta_asptransportapa_spsu" tabindex="252" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">MPT/MPR</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_mptmpr_1"  id="tipurgenta_mptmpr_1" tabindex="253" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_mptmpr_2"  id="tipurgenta_mptmpr_2" tabindex="254" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_mptmpr_3"  id="tipurgenta_mptmpr_3" tabindex="255" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_mptmpr_4"  id="tipurgenta_mptmpr_4" tabindex="256" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_mptmpr_svsu"  id="tipurgenta_mptmpr_svsu" tabindex="257" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_mptmpr_spsu"  id="tipurgenta_mptmpr_spsu" tabindex="258" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Alte<br>autospeciale</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteautospeciale_1"  id="tipurgenta_alteautospeciale_1" tabindex="259" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteautospeciale_2"  id="tipurgenta_alteautospeciale_2" tabindex="260" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteautospeciale_3"  id="tipurgenta_alteautospeciale_3" tabindex="261" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteautospeciale_4"  id="tipurgenta_alteautospeciale_4" tabindex="262" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="tipurgenta_alteautospeciale_svsu"  id="tipurgenta_alteautospeciale_svsu" tabindex="263" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="tipurgenta_alteautospeciale_spsu"  id="tipurgenta_alteautospeciale_spsu" tabindex="264" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td></td>
<td class="prezentatd"></td>
</tr>
</table>


<table class="prezenta">
<tr class="prezenta">
<td class="prezentatd padleft10" colspan="24"><h2>Partea a II-a (pe verso)</h2></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisacenter prezentatdfisaleft prezentatdfisatop" colspan="9">PERSOANE/ANIMALE/VALORI</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisacenter prezentatdfisaleft" colspan="6">FELUL MUNIȚIEI ASANATE</td>
<td class="prezentatdfisa prezentatdfisatop prezentatdfisacenter prezentatdfisaright prezentatdfisaleft" colspan="9">Contramăsuri pe termen lung</td>
<td class="prezentatd"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="5">Persoane salvate</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="4">Persoane evacuate</td>
<td class="prezentatdfisaw prezentatdfisaleft">Tip muniție</td>
<td class="prezentatdfisaw">Cant.</td>
<td class="prezentatdfisaw">Tip muniție</td>
<td class="prezentatdfisaw">Cant.</td>
<td class="prezentatdfisaw">Tip muniție</td>
<td class="prezentatdfisaw">Cant.</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright prezentatdfisacenter" colspan="9" rowspan="2">
<textarea name="introduceti_contramasuri" id="introduceti_contramasuri" rows="3" cols="50" maxlength="254" placeholder="Introduceți contramăsuri" tabindex="398" ></textarea>
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Adulți</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="pers_salvate_adulti"  id="pers_salvate_adulti" tabindex="265" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Copii</td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="pers_salvate_copii"  id="pers_salvate_copii" tabindex="266" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Adulți</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="pers_evacuate_adulti"  id="pers_evacuate_adulti" tabindex="267" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Copii</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="pers_evacuate_copii"  id="pers_evacuate_copii" tabindex="268" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Proiectile</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="munitie_asanat_proiectil"  id="munitie_asanat_proiectil" tabindex="353" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Bombe<br>aviație</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="bombe_aviatie"  id="bombe_aviatie" tabindex="357" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Aruncător<br>grenade</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="aruncator_gren"  id="aruncator_gren" tabindex="361" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" rowspan="2">Victime</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft prezentatdfisatop" colspan="2">Pers. ISU</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft prezentatdfisatop" colspan="2">SVSU/SPSU</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft prezentatdfisatop" colspan="2">Alte pers</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft prezentatdfisatop" colspan="2">Copii</td>
<td class="prezentatdfisaw prezentatdfisaleft">Gr. ofensive</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="munitie_asanat_grenade"  id="munitie_asanat_grenade" tabindex="354" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Mine<br>antitanc</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="mine_antitanc"  id="mine_antitanc" tabindex="358" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw" rowspan="2">Muniție<br>infanterie<br>și elemente<br>de muniție</td>
<td class="prezentatdfisaw prezentatdfisacenter" rowspan="2"><input name="muninfanterie"  id="muninfanterie" tabindex="362" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Doză acumulată (µSv)</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright" colspan="6"><input name="dozaacumulata"  id="dozaacumulata" tabindex="399" type="text" style="width:100px;" maxlength="10" autocomplete="off"></td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft">Deced.</td>
<td class="prezentatdfisaw prezentatdfisacenter">Rănit</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft">Deced.</td>
<td class="prezentatdfisaw prezentatdfisacenter">Rănit</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft">Deced.</td>
<td class="prezentatdfisaw prezentatdfisacenter">Rănit</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft">Deced.</td>
<td class="prezentatdfisaw prezentatdfisacenter">Rănit</td>
<td class="prezentatdfisaw prezentatdfisaleft">Gr. defensive</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="munitie_asanat_grenade_defens"  id="munitie_asanat_grenade_defens" tabindex="355" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Mine<br>antipers.</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="mine_antipers"  id="mine_antipers" tabindex="359" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>

<td class="prezentatdfisaw prezentatdfisaleft">Distanța</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta1"  id="distanta1" tabindex="400" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta2"  id="distanta2" tabindex="402" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta3"  id="distanta3" tabindex="404" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta4"  id="distanta4" tabindex="406" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta5"  id="distanta5" tabindex="408" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta6"  id="distanta6" tabindex="410" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="distanta7"  id="distanta7" tabindex="412" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="distanta8"  id="distanta8" tabindex="414" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Arși</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_ars_isu"  id="deces_ars_isu" tabindex="269" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_ars_isu"  id="ranit_ars_isu" tabindex="272" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_ars_svsu"  id="deces_ars_svsu" tabindex="275" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_ars_svsu"  id="ranit_ars_svsu" tabindex="278" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_ars_altep"  id="deces_ars_altep" tabindex="281" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_ars_altep"  id="ranit_ars_altep" tabindex="284" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_ars_copii"  id="deces_ars_copii" tabindex="287" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_ars_copii"  id="ranit_ars_copii" tabindex="290" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Bombe<br>artilerie</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="munitie_asanat_bombe_artilerie"  id="munitie_asanat_bombe_artilerie" tabindex="356" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Mine<br>marine/flv.</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="mine_marine"  id="mine_marine" tabindex="360" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">Alte muniții</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="alte_munitii"  id="alte_munitii" tabindex="363" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft">Doza</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza1"  id="doza1" tabindex="401" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza2"  id="doza2" tabindex="403" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza3"  id="doza3" tabindex="405" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza4"  id="doza4" tabindex="407" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza5"  id="doza5" tabindex="409" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza6"  id="doza6" tabindex="411" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza7"  id="doza7" tabindex="413" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="doza8"  id="doza8" tabindex="415" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Asfixiați</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_asfix_isu"  id="deces_asfix_isu" tabindex="270" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_asfix_isu"  id="ranit_asfix_isu" tabindex="273" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_asfix_svsu"  id="deces_asfix_svsu" tabindex="276" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_asfix_svsu"  id="ranit_asfix_svsu" tabindex="279" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_asfix_altep"  id="deces_asfix_altep" tabindex="282" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_asfix_altep"  id="ranit_asfix_altep" tabindex="285" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_asfix_copii"  id="deces_asfix_copii" tabindex="288" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_asfix_copii"  id="ranit_asfix_copii" tabindex="291" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="6">ACCIDENTE CBRN</td>
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="2" colspan="2">Grad.contamin<br>[Bq/mp]</td>
<td class="prezentatdfisaw prezentatdfisacenter"  rowspan="2"><input name="gradcontamin"  id="gradcontamin" tabindex="416" type="text" style="width:15px;" maxlength="5" autocomplete="off"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisaright prezentatdfisatop" colspan="6">Doza integrată pe perioade:</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft">Alte<br>situații</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_altesit_isu"  id="deces_altesit_isu" tabindex="271" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_altesit_isu"  id="ranit_altesit_isu" tabindex="274" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_altesit_svsu"  id="deces_altesit_svsu" tabindex="277" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_altesit_svsu"  id="ranit_altesit_svsu" tabindex="280" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_altesit_altep"  id="deces_altesit_altep" tabindex="283" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_altesit_altep" id="ranit_altesit_altep" tabindex="286" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft"><input name="deces_altesit_copii"  id="deces_altesit_copii" tabindex="289" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="ranit_altesit_copii"  id="ranit_altesit_copii" tabindex="292" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisacenter" colspan="2">Cod substanță</td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2">Nume substanță</td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2">Cod pericol</td>
<td class="prezentatdfisaw prezentatdfisaleft">zi</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza_int_zi"  id="doza_int_zi" tabindex="417" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">sapt.</td>
<td class="prezentatdfisaw prezentatdfisacenter"><input name="doza_int_sapt"  id="doza_int_sapt" tabindex="418" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw">lună</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaright"><input name="doza_int_luna"  id="doza_int_luna" tabindex="419" type="text" style="width:15px;" maxlength="4" autocomplete="off"></td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop">Grupe</td>
<td class="prezentatdfisaw prezentatdfisatop">Deced.</td>
<td class="prezentatdfisaw prezentatdfisatop">Rănit</td>
<td class="prezentatdfisaw prezentatdfisatop">Contam</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft">Animale</td>
<td class="prezentatdfisaw prezentatdfisatop">Moarte</td>
<td class="prezentatdfisaw prezentatdfisatop">Rănite</td>
<td class="prezentatdfisaw prezentatdfisatop" colspan="2">Contamin.</td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft" colspan="2"><input name="codsubst1"  id="codsubst1" tabindex="364" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="numesubst1"  id="numesubst1" tabindex="365" type="text" style="width:140px;" maxlength="30" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="codpericol1"  id="codpericol1" tabindex="366" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisaright" colspan="9">Anticiparea severității</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter">0-6</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="deced06"  id="deced06" tabindex="294" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="ranit06"  id="ranit06" tabindex="300" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="contam06"  id="contam06" tabindex="306" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft">mari</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="anim_mari_moarte"  id="anim_mari_moarte" tabindex="312" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="anim_mari_ranite"  id="anim_mari_ranite" tabindex="315" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter" colspan="2"><input name="anim_mari_contam"  id="anim_mari_contam" tabindex="319" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft" colspan="2"><input name="codsubst2"  id="codsubst2" tabindex="367" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="numesubst2"  id="numesubst2" tabindex="368" type="text" style="width:140px;" maxlength="30" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="codpericol2"  id="codpericol2" tabindex="369" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright prezentatdfisacenter" colspan="9" rowspan="2">
<textarea name="introduceti_anticip_sever" id="introduceti_anticip_sever" rows="3" cols="50" maxlength="254" placeholder="Introduceți date despre anticiparea severității" tabindex="420" ></textarea>
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter">7-14</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="deced714"  id="deced714" tabindex="295" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="ranit714"  id="ranit714" tabindex="301" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="contam714"  id="contam714" tabindex="307" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft">mici</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="anim_mici_moarte"  id="anim_mici_moarte" tabindex="313" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="anim_mici_ranite"  id="anim_mici_ranite" tabindex="317" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter" colspan="2"><input name="anim_mici_contam"  id="anim_mici_contam" tabindex="320" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft" colspan="2"><input name="codsubst3"  id="codsubst3" tabindex="370" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="numesubst3"  id="numesubst3" tabindex="371" type="text" style="width:140px;" maxlength="30" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="codpericol3"  id="codpericol3" tabindex="372" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter">15-25</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="deced25"  id="deced25" tabindex="296" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="ranit25"  id="ranit25" tabindex="302" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="contam25"  id="contam25" tabindex="308" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft">păsări</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="anim_pasari_moarte"  id="anim_pasari_moarte" tabindex="314" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="anim_pasari_ranite"  id="anim_pasari_ranite" tabindex="318" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter" colspan="2"><input name="anim_pasari_contam"  id="anim_pasari_contam" tabindex="321" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter prezentatdfisaleft" colspan="2"><input name="codsubst4"  id="codsubst4" tabindex="373" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="numesubst4"  id="numesubst4" tabindex="374" type="text" style="width:140px;" maxlength="30" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisacenter" colspan="2"><input name="codpericol4"  id="codpericol4" tabindex="375" type="text" style="width:60px;" maxlength="8" autocomplete="off"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisaright" colspan="9">Evoluția incidentului</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter">26-55</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="deced55"  id="deced55" tabindex="297" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="ranit55"  id="ranit55" tabindex="303" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="contam55"  id="contam55" tabindex="309" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="5">VALOARE BUNURI<br>[lei fără zecimale]</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="2">Mediul în care s-a<br>eliberat substanța</td>
<td class="prezentatdfisaw prezentatdfisatop" colspan="4">
<input type="checkbox" id="elib_subst_apa" tabindex="376" name="elib_subst_apa" value="1" class="radioforte">Apă&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="elib_subst_aer" tabindex="377" name="elib_subst_aer" value="1" class="radioforte">Aer&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="elib_subst_sol" tabindex="378" name="elib_subst_sol" value="1"  class="radioforte">Sol
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright prezentatdfisacenter" colspan="9" rowspan="2">
<textarea name="introduceti_evol_inciden" id="introduceti_evol_inciden" rows="3" cols="50" maxlength="254" placeholder="Introduceți date despre evoluția incidentului" tabindex="421"></textarea>
</td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter">56-70</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="deced70"  id="deced70" tabindex="298" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="ranit70"  id="ranit70" tabindex="304" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="contam70"  id="contam70" tabindex="310" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2">Distruse</td>
<td class="prezentatdfisaw" colspan="3"><input name="val_distr" id="val_distr" tabindex="322" type="text" style="width:120px;" maxlength="10" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2">Tip radionuclid</td>
<td class="prezentatdfisaw" colspan="4"><input name="tip_radionuclid" id="tip_radionuclid" tabindex="379" type="text" style="width:150px;" maxlength="100" autocomplete="off">
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter">&gt;70ani</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="deced71"  id="deced71" tabindex="299" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="ranit71"  id="ranit71" tabindex="305" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="contam71"  id="contam71" tabindex="311" type="text" style="width:15px;" maxlength="3" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2">Salvate</td>
<td class="prezentatdfisaw" colspan="3"><input name="val_salv" id="val_salv" tabindex="323" type="text" style="width:120px;" maxlength="10" autocomplete="off"></td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="1">Activitatea<br>sursei [Bq]</td>
<td class="prezentatdfisaw" colspan="2"><input name="act_sursei" id="act_sursei" tabindex="380" type="text" style="width:100px;" maxlength="10" autocomplete="off">
<td class="prezentatdfisaw" colspan="1">Debit de<br>doză</td>
<td class="prezentatdfisaw" colspan="2"><input name="debit_doza" id="debit_doza" tabindex="381" type="text" style="width:100px;" maxlength="20" autocomplete="off">
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisaright" colspan="9">Efecte</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisacenter" colspan="9">CARACTERISTICI FOCAR INIȚIAL (ANEXELE 13-16)</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisacenter prezentatdfisatop" colspan="6">Caracteristici sursă</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="4">Suprafață afectată[mp]</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="5"><input name="suprafata_afectata" id="suprafata_afectata" tabindex="422" type="text" style="width:150px;" maxlength="10" autocomplete="off">
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Sursă probabilă</td>
<td class="prezentatdfisaw" colspan="6">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_sursa_probabila_invalid">Codul nu este valid!</span><select name="sursa_probabila" id="sursa_probabila" style="width: 200px;" onchange="TipProprietate.setCode(this.value,'cod_sursa_probabila','cod_sursa_probabila_invalid')" tabindex="324">
{$sursaProbabilaOpt}
  </select>
  <input name="cod_sursa_probabila"  id="cod_sursa_probabila" tabindex="325" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="sursă probabilă" onblur="TipProprietate.getCode(this.value,'sursa_probabila','cod_sursa_probabila_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>

<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisacenter" colspan="6" rowspan="2">
<textarea name="introduceti_caract_sursa" id="introduceti_caract_sursa" rows="3" cols="50" maxlength="254" placeholder="Introduceți caracteristici sursă" tabindex="383"></textarea>
</td>
<td class="prezentatdfisaw prezentatdfisaleft" colspan="2">Expl.mun.<br>(Anx.17)</td>
<td class="prezentatdfisaw" colspan="1"><input name="expl_mun" id="expl_mun" tabindex="423" type="text" style="width:30px;" maxlength="2" autocomplete="off">
</td>
<td class="prezentatdfisaw" colspan="2">Număr<br>gospod.</td>
<td class="prezentatdfisaw" colspan="1"><input name="nr_gospodarii" id="nr_gospodarii" tabindex="425" type="text" style="width:30px;" maxlength="6" autocomplete="off">
</td>
<td class="prezentatdfisaw" colspan="2">Asist. spec.<br>(Anx 19)</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="1"><input name="asist_spec" id="asist_spec" tabindex="428" type="text" style="width:30px;" maxlength="2" autocomplete="off">
</td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Mijloc producere</td>
<td class="prezentatdfisaw" colspan="6">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_mijloc_producere_invalid">Codul nu este valid!</span><select name="mijloc_producere" id="mijloc_producere" style="width: 200px;" onchange="TipProprietate.setCode(this.value,'cod_mijloc_producere','cod_mijloc_producere_invalid')" tabindex="326">
{$mijlocAprindereOpt}
  </select>
  <input name="cod_mijloc_producere"  id="cod_mijloc_producere" tabindex="327" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="mijloc producere" onblur="TipProprietate.getCode(this.value,'mijloc_producere','cod_mijloc_producere_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>

<td class="prezentatdfisaw prezentatdfisaleft" colspan="2">Zonă afect.<br>(Anx.18)</td>
<td class="prezentatdfisaw" colspan="1"><input name="zona_afect" id="zona_afect" tabindex="424" type="text" style="width:30px;" maxlength="2" autocomplete="off">
</td>
<td class="prezentatdfisaw" colspan="2">Poluare<br>transfront.</td>
<td class="prezentatdfisaw" colspan="1">
<input type="checkbox" id="poluaretransf1" tabindex="426" name="poluaretransf" value="1" class="radioforte" onclick="jumpNext.resetOther('poluaretransf2')">Da<br>
<input type="checkbox" id="poluaretransf2" tabindex="427" name="poluaretransf" value="2" class="radioforte" onclick="jumpNext.resetOther('poluaretransf1')">Nu
</td>
<td class="prezentatdfisaw" colspan="2">Măs.SU<br>(Anx.20)</td>
<td class="prezentatdfisaw prezentatdfisaright" colspan="1"><input name="masuri_su" id="masuri_su" tabindex="428" type="text" style="width:30px;" maxlength="2" autocomplete="off">
</td>
</tr>


<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Primul material ars</td>
<td class="prezentatdfisaw" colspan="6">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_primul_mat_ars_invalid">Codul nu este valid!</span><select name="primul_mat_ars" id="primul_mat_ars" style="width: 200px;" onchange="TipProprietate.setCode(this.value,'cod_primul_mat_ars','cod_primul_mat_ars_invalid')" tabindex="328">
{$primulmaterialOpt}
  </select>
  <input name="cod_primul_mat_ars"  id="cod_primul_mat_ars" tabindex="329" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="mijloc producere" onblur="TipProprietate.getCode(this.value,'primul_mat_ars','cod_primul_mat_ars_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="2">Zona de<br>mortalitate[mp]</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="zonademortalitate" id="zonademortalitate" tabindex="384" type="text" style="width:30px;" maxlength="6" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft" colspan="2">Distanța de<br>adăpostire[mp]</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="distanta_adapostire" id="distanta_adapostire" tabindex="385" type="text" style="width:30px;" maxlength="6" autocomplete="off">
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="9">Consecințe</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="3">Împrejur. determin.</td>
<td class="prezentatdfisaw" colspan="6">
<div class="tooltiptimpi"><span class="tooltimpi" id="cod_imprejur_determ_invalid">Codul nu este valid!</span><select name="imprejur_determ" id="imprejur_determ" style="width: 200px;" onchange="TipProprietate.setCode(this.value,'cod_imprejur_determ','cod_imprejur_determ_invalid')" tabindex="330">
{$imprejDetermOpt}
  </select>
  <input name="cod_imprejur_determ"  id="cod_imprejur_determ" tabindex="331" type="text" size="1" maxlength="4" value="0" autocomplete="off" placeholder="mijloc producere" onblur="TipProprietate.getCode(this.value,'imprejur_determ','cod_imprejur_determ_invalid')" onclick="this.setSelectionRange(0, this.value.length)">
  </div>
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="2">Zona de<br>intoxicație[mp]</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="zonadeintoxicatie" id="zonadeintoxicatie" tabindex="386" type="text" style="width:30px;" maxlength="6" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisaleft" colspan="2">Distanța de<br>evacuare[mp]</td>
<td class="prezentatdfisaw prezentatdfisatop prezentatdfisacenter"><input name="distanta_evacuare" id="distanta_evacuare" tabindex="387" type="text" style="width:30px;" maxlength="6" autocomplete="off">
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright prezentatdfisacenter" colspan="9" rowspan="2">
<textarea name="introduceti_consecinte_even" id="introduceti_consecinte_even" rows="3" cols="50" maxlength="254" placeholder="Introduceți consecinte" tabindex="429"></textarea>
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="9">DESPRE OBIECTIV</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="6">Profilaxia cu iod: <input type="checkbox" id="profilaxiacuiod1" tabindex="388" name="profilaxiacuiod" value="1" class="radioforte" onclick="jumpNext.resetOther('profilaxiacuiod2')">DA&nbsp;&nbsp;&nbsp;<input type="checkbox" id="profilaxiacuiod2" tabindex="389" name="profilaxiacuiod" value="2" class="radioforte" onclick="jumpNext.resetOther('profilaxiacuiod1')">NU
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="5">Are aviz/autorizație dpdv al SI</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob1_1" tabindex="332" name="despreob1" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob1_0', 'despreob1_2')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob1_2" tabindex="333" name="despreob1" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob1_1', 'despreob1_0')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob1_0" tabindex="334" name="despreob1" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob1_2', 'despreob1_1')">N.E.C.
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop" colspan="6">Alte măsuri protecctive</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="9">Verificare raport: 
<input type="checkbox" id="verific_raport0" tabindex="429" name="verific_raport" value="0" class="radioforte" onclick="jumpNext.resetOther2('verific_raport1', 'verific_raport2')">Nu e cazul&nbsp;&nbsp;
<input type="checkbox" id="verific_raport1" tabindex="430" name="verific_raport" value="1" class="radioforte" onclick="jumpNext.resetOther2('verific_raport0', 'verific_raport2')">Șef COp&nbsp;&nbsp;
<input type="checkbox" id="verific_raport2" tabindex="431" name="verific_raport" value="2" class="radioforte" onclick="jumpNext.resetOther2('verific_raport0', 'verific_raport1')">Cdt. subunitate
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="5">Obiectivul este asigurat</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob2_1" tabindex="335" name="despreob2" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob2_2', 'despreob2_0')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob2_2" tabindex="336" name="despreob2" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob2_0', 'despreob2_1')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob2_0" tabindex="337" name="despreob2" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob2_1', 'despreob2_2')">N.E.C.
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisacenter" colspan="6" rowspan="2">
<textarea name="alte_masuri_protective" id="alte_masuri_protective" rows="3" cols="50" maxlength="254" placeholder="Introduceți măsuri protective" tabindex="390"></textarea>
</td>
<td class="prezentatdfisa prezentatdfisaleft prezentatdfisatop prezentatdfisaright" colspan="9">Date suplimentare</td>
</td>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" rowspan="3" colspan="2">Dotat cu<br>instalație</td>
<td class="prezentatdfisaw" colspan="3">de detecție/<br>semnalizare</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob3_1" tabindex="338" name="despreob3" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob3_2', 'despreob3_0')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob3_2" tabindex="339" name="despreob3" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob3_0', 'despreob3_1')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob3_0" tabindex="340" name="despreob3" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob3_1', 'despreob3_2')">N.E.C.
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisaright prezentatdfisacenter" colspan="9" rowspan="2">
<textarea name="introduceti_date_suplimentare" id="introduceti_date_suplimentare" rows="3" cols="50" maxlength="254" placeholder="Introduceți date suplimentare" tabindex="432"></textarea>
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw" colspan="3">de stingere</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob4_1" tabindex="341" name="despreob4" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob4_2', 'despreob4_0')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob4_2" tabindex="342" name="despreob4" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob4_0', 'despreob4_1')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob4_0" tabindex="343" name="despreob4" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob4_1', 'despreob4_2')">N.E.C.
</td>

<td class="prezentatdfisaw prezentatdfisaleft" rowspan="2">Restricții<br>alimente</td>
<td class="prezentatdfisaw" colspan="5" rowspan="2">
<input type="checkbox" id="restrictiialimente1" tabindex="391" name="restrictiialimente1" value="1" class="radioforte">Altele
<input type="checkbox" id="restrictiialimente2" tabindex="392" name="restrictiialimente2" value="1" class="radioforte">Apă din surse deschise
<input type="checkbox" id="restrictiialimente3" tabindex="393" name="restrictiialimente3" value="1" class="radioforte">Cereale<br>
<input type="checkbox" id="restrictiialimente4" tabindex="394" name="restrictiialimente4" value="1" class="radioforte">Lactate
<input type="checkbox" id="restrictiialimente5" tabindex="395" name="restrictiialimente5" value="1" class="radioforte">Legume
<input type="checkbox" id="restrictiialimente6" tabindex="396" name="restrictiialimente6" value="1" class="radioforte">Rădăcinoase
</td>
</tr>

<tr class="prezentatrfisa">
<td class="prezentatdfisaw" colspan="3">de desfumare</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob5_1" tabindex="344" name="despreob5" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob5_2', 'despreob5_0')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob5_2" tabindex="345" name="despreob5" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob5_0', 'despreob5_1')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob5_0" tabindex="346" name="despreob5" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob5_1', 'despreob5_2')">N.E.C.
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop" colspan="9" rowspan="3"></td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="5">Instalația de protecție a funcționat</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob6_1" tabindex="347" name="despreob6" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob6_2', 'despreob6_0')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob6_2" tabindex="348" name="despreob6" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob6_0', 'despreob6_1')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob6_0" tabindex="349" name="despreob6" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob6_1', 'despreob6_2')">N.E.C.
</td>
<td class="prezentatdfisaw prezentatdfisaleft prezentatdfisatop prezentatdfisacenter" colspan="6" rowspan="2">
<textarea name="introduceti_contramasuri_scurt" id="introduceti_contramasuri_scurt" rows="3" cols="50" maxlength="254" placeholder="Introduceți contramăsuri pe termen scurt" tabindex="397" ></textarea>
</td>
</tr>
<tr class="prezentatrfisa">
<td class="prezentatdfisaw prezentatdfisaleft" colspan="5">A fost controlat de IP în anul curent</td>
<td class="prezentatdfisaw" colspan="4">
<input type="checkbox" id="despreob7_1" tabindex="350" name="despreob7" value="1" class="radioforte" onclick="jumpNext.resetOther2('despreob7_2', 'despreob7_0')">DA&nbsp;&nbsp;
<input type="checkbox" id="despreob7_2" tabindex="351" name="despreob7" value="2" class="radioforte" onclick="jumpNext.resetOther2('despreob7_0', 'despreob7_1')">NU&nbsp;&nbsp;
<input type="checkbox" id="despreob7_0" tabindex="352" name="despreob7" value="0" class="radioforte" onclick="jumpNext.resetOther2('despreob7_1', 'despreob7_2')">N.E.C.
</td>
</tr>
</table>

<table class="prezenta">
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

