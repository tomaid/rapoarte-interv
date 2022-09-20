class currentDate {
	constructor() {
	}
    	sendId(dateid){
    		this.inputfield = dateid;
		var zi = document.getElementById(this.inputfield+"zi");
		var luna = document.getElementById(this.inputfield+"luna");
		var an =  document.getElementById(this.inputfield+"an");
        	if(zi.value==="")
		{
		    this.data = new Date();
		    this.newdatavarzi = this.data.getDate();
		    if(this.newdatavarzi<10)this.newdatavarzi="0"+this.newdatavarzi;
		    zi.value = this.newdatavarzi;
		    this.newdatavarluna = this.data.getMonth()+1;
		    if(this.newdatavarluna<10)this.newdatavarluna="0"+this.newdatavarluna;
		    luna.value = this.newdatavarluna;
		    an.value = this.data.getFullYear();
		}
  	}
  	
	calculMinus(dataReper,dataModificata)
	{
	this.reper_zi   = document.getElementById(dataReper+"zi");
	this.reper_luna = document.getElementById(dataReper+"luna");
	this.reper_an   =  document.getElementById(dataReper+"an");
	this.reper_ora  = document.getElementById(dataReper+"ora");
	this.reper_min  = document.getElementById(dataReper+"min");
	
	
	this.mod_zi   = document.getElementById(dataModificata+"zi");
	this.mod_luna = document.getElementById(dataModificata+"luna");
	this.mod_an   =  document.getElementById(dataModificata+"an");
	this.mod_ora  = document.getElementById(dataModificata+"ora");
	this.mod_min  = document.getElementById(dataModificata+"min");
	
		if((this.reper_zi.value!=="")&&
		(this.reper_luna.value!=="")&&
		(this.reper_an.value!=="")&&
		(this.reper_ora.value!=="")&&
		(this.reper_min.value!=="")&&
		(this.mod_zi.value==="")&&
		(this.mod_luna.value==="")&&
		(this.mod_an.value==="")&&
		(this.mod_ora.value==="")&&
		(this.mod_min.value===""))
			{
			  this.reper_lunajs=this.reper_luna.value-1;
			  this.data1 = new Date(this.reper_an.value,this.reper_lunajs,this.reper_zi.value, this.reper_ora.value, this.reper_min.value);
			  this.data2 = this.data1.setDate(this.data1.getDate())-(2*60000);
			  this.data3=new Date(this.data2);
			  this.newday = this.data3.getDate();
			  if(this.newday<10)this.newday="0"+this.newday;
			  this.mod_zi.value = this.newday;
			  this.newmonth = this.data3.getMonth()+1;
			  if(this.newmonth<10)this.newmonth="0"+this.newmonth;
			  this.mod_luna.value = this.newmonth;
			  this.mod_an.value = this.data3.getFullYear();
			  this.newora = this.data3.getHours();
			  if(this.newora<10)this.newora="0"+this.newora;
			  this.mod_ora.value = this.newora;
			  this.newmin = this.data3.getMinutes();
			  if(this.newmin<10)this.newmin="0"+this.newmin;
			  this.mod_min.value = this.newmin;
			}
	}
	calculZi(dataReper,dataModificata)
	{
		this.reper_zi   = document.getElementById(dataReper+"zi");
		this.reper_luna = document.getElementById(dataReper+"luna");
		this.reper_an   =  document.getElementById(dataReper+"an");
		this.mod_zi   = document.getElementById(dataModificata+"zi");
		this.mod_luna = document.getElementById(dataModificata+"luna");
		this.mod_an   =  document.getElementById(dataModificata+"an");
		
			if((this.reper_zi.value!=="")&&
			(this.reper_luna.value!=="")&&
			(this.reper_an.value!=="")&&
			(this.mod_zi.value==="")&&
			(this.mod_luna.value==="")&&
			(this.mod_an.value===""))
				{
				  this.mod_zi.value = this.reper_zi.value;
				  this.mod_luna.value = this.reper_luna.value;
				  this.mod_an.value = this.reper_an.value;
				}
		}
	verificareDate(dataReper,dataComparata)
	{
		this.reper_zi   = document.getElementById(dataReper+"zi");
		this.reper_luna = document.getElementById(dataReper+"luna");
		this.reper_an   =  document.getElementById(dataReper+"an");
		this.reper_ora = document.getElementById(dataReper+"ora");
		this.reper_min   =  document.getElementById(dataReper+"min");
		this.mod_zi   = document.getElementById(dataComparata+"zi");
		this.mod_luna = document.getElementById(dataComparata+"luna");
		this.mod_an   =  document.getElementById(dataComparata+"an");
		this.mod_ora = document.getElementById(dataComparata+"ora");
		this.mod_min   =  document.getElementById(dataComparata+"min");
		this.mod_mesaj   =  document.getElementById(dataComparata+"mesaj");
		this.data1 = new Date(this.reper_an.value,this.reper_luna.value,this.reper_zi.value, this.reper_ora.value, this.reper_min.value);
		this.data2 = new Date(this.mod_an.value,this.mod_luna.value,this.mod_zi.value, this.mod_ora.value, this.mod_min.value);

		if((this.data2<this.data1)&&(this.data2>0))
		{
			this.mod_mesaj.style.visibility = "visible"; 
			this.mod_mesaj.style.opacity = "1";
			return false;
		}
		else
		{	
			this.mod_mesaj.style.visibility = "hidden"; 
			this.mod_mesaj.style.opacity = "0";
			return true;
		}
		
	}
  
}
