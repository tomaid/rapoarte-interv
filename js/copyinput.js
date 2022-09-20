class copyField {
    	set(firstfield,tofield){
		this.f = document.getElementById(firstfield);
		this.t = document.getElementById(tofield);
        	if((this.t.value==="")&&(this.f.value!==""))
		{
		    this.t.value=this.f.value;
		}
  	}
}
