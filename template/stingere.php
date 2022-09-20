<?php
$folderinst=FOLER_INSTALARE;
echo <<<_STINGERE

<div class="paddingtop"></div>
<div class="diveachpagesmurd">
<table class="table-smurd" id="filtredate">
<tr class="prezenta">
<td class="prezentatd padleft10" colspan="6"><h2>Rapoarte Stingere</h2></td>
<td class="prezentatd" colspan="3"><div class="right"><a href="fisa-stingere.php" class="buttonnew"><span class="icon-plus">Introducere raport</span></a>
<a class="buttonnew" onclick="FiltruStingere.runFilterDescarcare()" ><span class="icon-folder-download">Salvare in Excel</span></a></div></td>
</tr>
<tr>
<th class="stickclasspersonal">
<label style="padding-bottom: 5px">NR. IGSU</label>
<input type="text" id="cautare_nrigsu" name="cautare_nrigsu" value="{$sanitizefiltrustingere->getNRigsu()}" size="1" placeholder="Filtrare" autocomplete="off" onClick="this.setSelectionRange(0, this.value.length)" onblur="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.runFilter(this.id, this.value)" onkeydown="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.enterFilter(this.id, this.value)" maxlength="12">
<th class="stickclasspersonal whitespace">
<label style="padding-bottom: 5px">Data intervenției</label><br>
<input class="nou" type="text" maxlength="2" placeholder="zz" name="cautare_data_int_zi" id="cautare_data_int_zi" value="{$sanitizefiltrustingere->getZi()}"  onclick="this.setSelectionRange(0, this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'cautare_data_int_luna');" onblur="FiltruStingere.runtimeFilter(this.id, this.value)"><p class="in">.</p><input class="nou1" type="text" maxlength="2" placeholder="ll" name="cautare_data_int_luna" id="cautare_data_int_luna" value="{$sanitizefiltrustingere->getLuna()}" onclick="this.setSelectionRange(0,this.value.length)" onkeyup="jumpNext.jump(this,this.value, 'cautare_data_int_an');" onblur="FiltruStingere.runtimeFilter(this.id, this.value)"><p class="in">.</p><input class="nou2" type="text" maxlength="4" placeholder="aaaa" name="cautare_data_int_an" id="cautare_data_int_an" value="{$sanitizefiltrustingere->getAn()}" onClick="this.setSelectionRange(0, this.value.length)" onblur="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.runFilter(this.id, this.value)" onkeydown="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.enterFilter(this.id, this.value)">
  </th>
  <th class="stickclasspersonal">
<label style="padding-bottom: 5px">Nume</label>
<input type="text" id="cautare_nume" name="cautare_nume" value="{$sanitizefiltrustingere->getNume()}" size="8" placeholder="Filtrare" autocomplete="off"  onblur="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.runFilter(this.id, this.value)" onkeydown="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.enterFilter(this.id, this.value)">
</th>
<th class="stickclasspersonal">
<label style="padding-bottom: 5px">Judet</label>
<select name="cautare_judet" id="cautare_judet" style="width: 100px;" onchange="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.runFilter(this.id, this.value)" tabindex="24">><option value="">Selectați</option>
{$judete}
  </select>
</th>
<th class="stickclasspersonal">
<label style="padding-bottom: 5px">U.A.T.</label>
<select name="cautare_localitati" id="cautare_localitati" style="width: 100px;" onchange="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.runFilter(this.id, this.value)" tabindex="27">
{$localitati}
  </select>
</th>
<th class="stickclasspersonal">
<label style="padding-bottom: 5px">Structura</label>
<select name="cautare_structura" id="cautare_structura" style="width: 150px;" tabindex="28" onchange="FiltruStingere.runtimeFilter('pagina', '0');FiltruStingere.sFilter(this.value);FiltruStingere.runFilter(this.id, this.value);">
{$structura}
  </select>
  {$subunitate}
</th>
<th class="stickclasspersonal" style="width: 140px;">
<label style="padding-bottom: 5px">Luna</label><select name="cautare_total_luna" id="cautare_total_luna" style="width: 80px;" tabindex="28" onchange="FiltruStingere.runtimeFilterLuna();FiltruStingere.runFilter('cautare_data_int_luna', this.value);">
<option value="">Alegeti</option>
<option value="01">Ianuarie</option>
<option value="02">Februarie</option>
<option value="03">Martie</option>
<option value="04">Aprilie</option>
<option value="05">Mai</option>
<option value="06">Iunie</option>
<option value="07">Iulie</option>
<option value="08">August</option>
<option value="09">Septembrie</option>
<option value="10">Octombrie</option>
<option value="11">Noiembrie</option>
<option value="12">Decembrie</option>
  </select>
<br>
<label style="padding-bottom: 5px">An</label> <select name="cautare_total_an" id="cautare_total_an" style="width: 80px;" tabindex="28" onchange="FiltruStingere.runtimeFilterLuna();FiltruStingere.runFilter('cautare_data_int_an', this.value);">
<option value="">Alegeti</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
  </select>
</th>
<th class="stickclasspersonal">
<label style="padding-bottom: 5px">Total: {$cautareRapoarteStingere->getTotalint()}</label>
<a href="{$folderinst}stingere.php" class="buttonnewsmall">Reset filtru</a></th>
</tr>
{$cautareRapoarteStingere->getTDrows()}
</table>
_STINGERE;
?>
