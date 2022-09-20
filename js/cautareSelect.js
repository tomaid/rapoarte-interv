class Cautareselect{
  constructor()
  { 
    var lunac = document.getElementById("cautare_data_int_luna_hid");
    var anc = document.getElementById("cautare_data_int_an_hid");
    var lunatot = document.getElementById("cautare_total_luna");
    var antot = document.getElementById("cautare_total_an");
    if(lunac.value){
      for (var i = 0; i < lunatot.options.length; i++){
        if(lunatot.options[i].value == lunac.value){
          lunatot.selectedIndex=i;
        }
      }
    }
    if(anc.value){
      for (var i = 0; i < antot.options.length; i++){
        if(antot.options[i].value == anc.value){
          antot.selectedIndex=i;
        }
      }
    }
  }
}