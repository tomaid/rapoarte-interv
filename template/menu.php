<?php

  //   <a onclick=\"adaugarepersFunction()\" ><span class='icon-user-plus'>Adăugare persoană</span></a> |
echo <<<_MENU
  <div class='meniufix'>
  <div class='left container1'>
  <a href='smurd.php'><span class='icon-plus'>Rapoarte SMURD</span></a> |
  <a href='stingere.php'><span class='icon-flag'>Rapoarte stingere</span></a>
  </div><div  class='right container3'>
  <a href='#'><span class='icon-pie-chart'></span>Statistică SMURD</a> | <a href='#'><span class='icon-stats-bars'></span>Statistică stingere</a> | Utilizator: $user |<a href='logout.php'><span class='icon-switch'> </span></a>
    </div>
      <div  class='center container2 font-numesubt'>
      {$subunitatenume}
      </div></div>
_MENU;


?>
