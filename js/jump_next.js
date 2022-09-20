class jumpNext {
	jump(inputId,inputValue, nextField){
		this.inputid = inputId;
		this.inputvalue = inputValue;
		this.nextfield = nextField;
	  	if ((this.inputvalue.length==this.inputid.maxLength)&&(event.keyCode != 9)){
		      this.nextFieldid = document.getElementById(this.nextfield);
		      this.nextFieldid.focus();
		      this.nextFieldid.setSelectionRange(0,this.nextFieldid.value.length);
		  }
	}
	jumpfocus(inputval){
	this.inputid = document.getElementById(inputval+"zi");
		      this.inputid.focus();
		      this.inputid.setSelectionRange(0,this.inputid.value.length);
	}
	resetOther(other){
	document.getElementById(other).checked=false;
	}
	resetOther2(other,other1){
	document.getElementById(other).checked=false;
	document.getElementById(other1).checked=false;
	}
	resetAnunt(other){
	for(var i=0;i<10;i++)
	if(i!=other)
		document.getElementById("modalert"+i).checked=false;	
	}
	resetForte(other){
	for(var i=0;i<6;i++)
	if(i!=other)
		document.getElementById("fortaurg"+i).checked=false;
	}
	resetProceeIntrerupere(other){
	for(var i=0;i<7;i++)
	if(i!=other)
		document.getElementById("procintr"+i).checked=false;
	}
  
}
