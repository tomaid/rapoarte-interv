class StopCardio{
        Bifa() {
  		this.scr = document.getElementById("checkscr");
  		this.resuscitare = document.getElementById("checkResuscitare");
  		this.scr_reusit = document.getElementById("checkSCR_reusit");
  		this.scr_nereusit = document.getElementById("checkSCR_nereusit");
  		this.resuscitare_zi = document.getElementById("resuscitare_zi");
  		this.resuscitare_luna = document.getElementById("resuscitare_luna");
  		this.resuscitare_an = document.getElementById("resuscitare_an");
  		this.resuscitare_ora = document.getElementById("resuscitare_ora");
  		this.resuscitare_min = document.getElementById("resuscitare_min");
  		this.scr_reusit_zi = document.getElementById("scr_reusit_zi");
  		this.scr_reusit_luna = document.getElementById("scr_reusit_luna");
  		this.scr_reusit_an = document.getElementById("scr_reusit_an");
  		this.scr_reusit_ora = document.getElementById("scr_reusit_ora");
  		this.scr_reusit_min = document.getElementById("scr_reusit_min");
  		this.scr_nereusit_zi = document.getElementById("scr_nereusit_zi");
  		this.scr_nereusit_luna = document.getElementById("scr_nereusit_luna");
  		this.scr_nereusit_an = document.getElementById("scr_nereusit_an");
  		this.scr_nereusit_ora = document.getElementById("scr_nereusit_ora");
  		this.scr_nereusit_min = document.getElementById("scr_nereusit_min");

  		if(this.scr.checked==true)
            	{
		    	this.resuscitare.disabled=false;
	  		this.scr_reusit.disabled=false;
	  		this.scr_nereusit.disabled=false;
	  		this.resuscitare_zi.disabled=false;
	  		this.resuscitare_luna.disabled=false;
	  		this.resuscitare_an.disabled=false;
	  		this.resuscitare_ora.disabled=false;
	  		this.resuscitare_min.disabled=false;
	  		this.scr_reusit_zi.disabled=false;
	  		this.scr_reusit_luna.disabled=false;
	  		this.scr_reusit_an.disabled=false;
	  		this.scr_reusit_ora.disabled=false;
	  		this.scr_reusit_min.disabled=false;
	  		this.scr_nereusit_zi.disabled=false;
	  		this.scr_nereusit_luna.disabled=false;
	  		this.scr_nereusit_an.disabled=false;
	  		this.scr_nereusit_ora.disabled=false;
	  		this.scr_nereusit_min.disabled=false;
            	}
            	else
            	{
	  		this.resuscitare_zi.value="";
	  		this.resuscitare_luna.value="";
	  		this.resuscitare_an.value="";
	  		this.resuscitare_ora.value="";
	  		this.resuscitare_min.value="";
	  		this.scr_reusit_zi.value="";
	  		this.scr_reusit_luna.value="";
	  		this.scr_reusit_an.value="";
	  		this.scr_reusit_ora.value="";
	  		this.scr_reusit_min.value="";
	  		this.scr_nereusit_zi.value="";
	  		this.scr_nereusit_luna.value="";
	  		this.scr_nereusit_an.value="";
	  		this.scr_nereusit_ora.value="";
	  		this.scr_nereusit_min.value="";
		    	this.resuscitare.checked=false;
	  		this.scr_reusit.checked=false;
	  		this.scr_nereusit.checked=false;
	  		this.resuscitare.disabled=true;
	  		this.scr_reusit.disabled=true;
	  		this.scr_nereusit.disabled=true;
	  		this.resuscitare_zi.disabled=true;
	  		this.resuscitare_luna.disabled=true;
	  		this.resuscitare_an.disabled=true;
	  		this.resuscitare_ora.disabled=true;
	  		this.resuscitare_min.disabled=true;
	  		this.scr_reusit_zi.disabled=true;
	  		this.scr_reusit_luna.disabled=true;
	  		this.scr_reusit_an.disabled=true;
	  		this.scr_reusit_ora.disabled=true;
	  		this.scr_reusit_min.disabled=true;
	  		this.scr_nereusit_zi.disabled=true;
	  		this.scr_nereusit_luna.disabled=true;
	  		this.scr_nereusit_an.disabled=true;
	  		this.scr_nereusit_ora.disabled=true;
	  		this.scr_nereusit_min.disabled=true;
            	}
	}
}
