<?php
echo <<<_PAGINATIE
  <p class="whitespace">
  <a onclick="FiltruSmurd.runFilter('pagina', '{$cautareRapoarteSmurd->getPrevpage()}')" class="buttonnew">&lt;&lt; </a>{$cautareRapoarteSmurd->getPagina()} / {$cautareRapoarteSmurd->getPagini()}
  <a onclick="FiltruSmurd.runFilter('pagina', '{$cautareRapoarteSmurd->getNextpage()}')" class="buttonnew">&gt;&gt;</a>&nbsp;Mergeți la pagina:<input type="text" id="pagina" name="pagina" size="1" onblur="FiltruSmurd.runtimeFilter(this.id, this.value)" onkeydown="FiltruSmurd.enterFilter(this.id, this.value)">
  <a onclick="FiltruSmurd.runSubmit()" class="buttonnew">Salt &gt;</a></p>
_PAGINATIE;
?>
