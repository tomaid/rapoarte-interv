class ActivitateEconomica {
	async cautaCategorie(id=0, dest="",invalid=""){
	this.codinvalid = document.getElementById(invalid);
	    var subcat=[];
	    let getSubc = await fetch(`async/get_domeniuactiv.php?subcat=`+id);
	    subcat = await getSubc.json();
	    if(subcat==0){
	    			this.codinvalid.style.visibility = "visible"; 
				this.codinvalid.style.opacity = "1";
	    }
	    else{
	    			this.codinvalid.style.visibility = "hidden"; 
				this.codinvalid.style.opacity = "0";
	    }
  }
}
