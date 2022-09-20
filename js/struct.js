class Structura {
  constructor() {
  } 
  async cautastructura(struct){
    var structura=[];
    var structur = document.getElementById('structura');
    let structura_get = await fetch(`async/get_struc.php?acces=`+struct);
    structura = await structura_get.json();
    structur.innerHTML="";
    var o;
    for (o = 0; o < structura.length; o++) {
      var opt = document.createElement('option');
      opt.innerText = structura[o][2];
      opt.value= structura[o][0];
      if (o==0)opt.innerText="<- Înapoi";
      structur.appendChild(opt);
    }
  }
  structonEnter(struct)
  {
    var structur = document.getElementById('structura');
      if(event.keyCode == 13){
            this.cautastructura(struct);
      }
    }

}
