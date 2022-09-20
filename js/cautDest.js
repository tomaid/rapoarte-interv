class CodDest {
	getCode(codinserted="", dest="",invalid="")
	{
	this.destinatie=document.getElementById(dest);
	this.codinvalid = document.getElementById(invalid);
	this.w = 0;
	var i;
		for (i = 0; i < this.destinatie.length; i++) {
			if(this.destinatie.options[i].value == codinserted)
			{
				this.destinatie.selectedIndex=codinserted;
				this.codinvalid.style.visibility = "hidden"; 
				this.codinvalid.style.opacity = "0";
				this.w = 1;
			}
		}
		if(this.w==0)
		{
			this.codinvalid.style.visibility = "visible"; 
			this.codinvalid.style.opacity = "1";	
		}

	}
	setCode(codselect="",cod_dest,cod_inv)
	{
		this.cod = document.getElementById(cod_dest);
		this.invalid = document.getElementById(cod_inv);
		this.cod.value=codselect;
		this.invalid.style.visibility = "hidden";
		this.invalid.style.opacity = "0";
	}
}
