class Localitati {
  constructor() {
  } 
  async cautaLocalitate(judet){
    var localitati=[];
    var struct_localitati = document.getElementById('localitati');
    let getLocalitati = await fetch(`async/get_localitati.php?judet=`+judet);
    localitati = await getLocalitati.json();
    struct_localitati.innerHTML="";
    var o;
    for (o = 0; o < localitati.length; o++) {
      var opt = document.createElement('option');
      opt.innerText = localitati[o][1];
      opt.value= localitati[o][0];
      struct_localitati.appendChild(opt);
    }
  }
}
