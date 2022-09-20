<?php
echo <<<_PAGINATIE
  <p class="whitespace">
  <a onclick="FiltruStingere.runFilter('pagina', '{$cautareRapoarteStingere->getPrevpage()}')" class="buttonnew">&lt;&lt; </a>{$cautareRapoarteStingere->getPagina()} / {$cautareRapoarteStingere->getPagini()}
  <a onclick="FiltruStingere.runFilter('pagina', '{$cautareRapoarteStingere->getNextpage()}')" class="buttonnew">&gt;&gt;</a>&nbsp;Mergeți la pagina:<input type="text" id="pagina" name="pagina" size="1" onblur="FiltruStingere.runtimeFilter(this.id, this.value)" onkeydown="FiltruStingere.enterFilter(this.id, this.value)">
  <a onclick="FiltruStingere.runSubmit()" class="buttonnew">Salt &gt;</a></p>
_PAGINATIE;
?>
