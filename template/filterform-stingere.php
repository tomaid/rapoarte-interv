<?php
echo <<<_INIT
<form name="filtre" id="filtre" action="{$_SERVER['PHP_SELF']}" method="get">
<input type="hidden" name="cautare_nrigsu" id="cautare_nrigsu_hid" value="{$sanitizefiltrustingere->getNRigsu()}">
<input type="hidden" name="cautare_data_int_zi" id="cautare_data_int_zi_hid" value="{$sanitizefiltrustingere->getZi()}">
<input type="hidden" name="cautare_data_int_luna" id="cautare_data_int_luna_hid" value="{$sanitizefiltrustingere->getLuna()}">
<input type="hidden" name="cautare_data_int_an" id="cautare_data_int_an_hid" value="{$sanitizefiltrustingere->getAn()}">
<input type="hidden" name="cautare_nume" id="cautare_nume_hid" value="{$sanitizefiltrustingere->getNume()}">
<input type="hidden" name="cautare_prenume" id="cautare_prenume_hid" value="{$sanitizefiltrustingere->getPrenume()}">
<input type="hidden" name="cautare_judet" id="cautare_judet_hid" value="{$sanitizefiltrustingere->getJudet()}">
<input type="hidden" name="cautare_localitati" id="cautare_localitati_hid" value="{$sanitizefiltrustingere->getLcalitate()}">
<input type="hidden" name="cautare_structura" id="cautare_structura_hid" value="{$sanitizefiltrustingere->getStructura()}">
<input type="hidden" name="cautare_subunit" id="cautare_subunit_hid" value="{$sanitizefiltrustingere->getSubunit()}">
<input type="hidden" name="cautare_s" id="cautare_s_hid" value="{$sanitizefiltrustingere->getS()}">
<input type="hidden" name="pagina" id="pagina_hid" value="{$sanitizefiltrustingere->getPagina()}">
<input type="hidden" name="descarcare" id="descarcare_hid" value="{$sanitizefiltrustingere->getDescarcare()}">
</form>
<script type="text/javascript">
Cautareselect =  new Cautareselect();
</script>
_INIT;
?>
