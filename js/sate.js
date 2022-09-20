class Sate {
  constructor() {
  } 
  async cautaSat(localitate=""){
    var sate=[];
    var struct_sate = document.getElementById("sate");
    let getSate = await fetch(`async/get_sate.php?localitate=`+localitate);
    sate = await getSate.json();
    struct_sate.innerHTML="";
    var o;
    for (o = 0; o < sate.length; o++) {
      var opt = document.createElement("option");
      opt.innerText = sate[o][1];
      opt.value= sate[o][0];
      struct_sate.appendChild(opt);
    }
  }
}
