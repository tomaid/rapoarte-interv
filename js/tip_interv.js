class tipInterventie {
  constructor() {
  } 
  async Cauta(catinterv="", particip="", flag=""){
    var tipinterv=[];
    var tipInterventie = document.getElementById("tip_interventie");
    if(flag!=1)document.getElementById("cod_interventie").value="";
    var catinterv = document.getElementById(catinterv).value;
    var particip = document.getElementById(particip).value;
    let getInterv = await fetch(`async/get_tipInterventie.php?tip=` + catinterv + `&participanti=` + particip);
    tipinterv = await getInterv.json();
    tipInterventie.innerHTML="";
    var o;
    for (o = 0; o < tipinterv.length; o++) {
      var opt = document.createElement("option");
      opt.innerText = tipinterv[o][1] + " (" + tipinterv[o][0] + ")";
      if(o==0)
      {
      	opt.innerText = tipinterv[o][1];
      }
      opt.value= tipinterv[o][0];
      tipInterventie.appendChild(opt);
    }
  }
    Resetcateg(){
    	document.getElementById("categorie_interventie").selectedIndex="";
    }
}
