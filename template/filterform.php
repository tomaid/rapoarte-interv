<?php
echo <<<_INIT
<form name="filtre" id="filtre" action="{$_SERVER['PHP_SELF']}" method="get">
<input type="hidden" name="cautare_nrigsu" id="cautare_nrigsu_hid" value="{$sanitizefiltrusmurd->getNRigsu()}">
<input type="hidden" name="cautare_data_int_zi" id="cautare_data_int_zi_hid" value="{$sanitizefiltrusmurd->getZi()}">
<input type="hidden" name="cautare_data_int_luna" id="cautare_data_int_luna_hid" value="{$sanitizefiltrusmurd->getLuna()}">
<input type="hidden" name="cautare_data_int_an" id="cautare_data_int_an_hid" value="{$sanitizefiltrusmurd->getAn()}">
<input type="hidden" name="cautare_nume" id="cautare_nume_hid" value="{$sanitizefiltrusmurd->getNume()}">
<input type="hidden" name="cautare_prenume" id="cautare_prenume_hid" value="{$sanitizefiltrusmurd->getPrenume()}">
<input type="hidden" name="cautare_judet" id="cautare_judet_hid" value="{$sanitizefiltrusmurd->getJudet()}">
<input type="hidden" name="cautare_localitati" id="cautare_localitati_hid" value="{$sanitizefiltrusmurd->getLcalitate()}">
<input type="hidden" name="cautare_structura" id="cautare_structura_hid" value="{$sanitizefiltrusmurd->getStructura()}">
<input type="hidden" name="cautare_subunit" id="cautare_subunit_hid" value="{$sanitizefiltrusmurd->getSubunit()}">
<input type="hidden" name="cautare_s" id="cautare_s_hid" value="{$sanitizefiltrusmurd->getS()}">
<input type="hidden" name="pagina" id="pagina_hid" value="{$sanitizefiltrusmurd->getPagina()}">
<input type="hidden" name="descarcare" id="descarcare_hid" value="{$sanitizefiltrusmurd->getDescarcare()}">
</form>
<script type="text/javascript">
Cautareselect =  new Cautareselect();
</script>
_INIT;
?>
