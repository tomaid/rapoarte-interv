class CodInterventie {
	constructor() {
	} 
	async getCode(codinterv="", tip_interventie="",categorie_interventie="",participanti="")
	{
		var i;
		var tipinterv=[];
		var tipInterven = document.getElementById(tip_interventie);
		var cod_invalid = document.getElementById("cod_invalid");
		var categinterventie = document.getElementById(categorie_interventie);
		categinterventie.selectedIndex=0;
		var participanti = document.getElementById(participanti);
		participanti.selectedIndex=0;
		let getInfo = await fetch(`async/get_codInterventie.php?code=` + codinterv);
		tipinterv = await getInfo.json();
		if(tipinterv[1]){
			for (i = 0; i < participanti.options.length; i++) {
				if(participanti.options[i].value == tipinterv[1])
				{
					participanti.selectedIndex=i;
				}
			}
		}
		if(tipinterv[0]){
			for (i = 0; i < categinterventie.options.length; i++) {
				if(categinterventie.options[i].value == tipinterv[0])
				{
					categinterventie.selectedIndex=i;
				}
			}
		}

		await tipInterventie.Cauta('categorie_interventie','participanti', 1);
		// ^ FUNCTIA/METODA TREBUIE SA TERMINE EXECUTIA INAINTEA RULARII URMATOAREI LINII
		for (i = 0; i < tipInterven.options.length; i++) {
			if(tipInterven.options[i].value == codinterv)
			{
				tipInterven.selectedIndex=i;
			}
		}
		if(tipinterv[0]===null)
		{
			cod_invalid.style.visibility = "visible";
			cod_invalid.style.opacity = "1";
		}
		else
		{	
			cod_invalid.style.visibility = "hidden"; 
			cod_invalid.style.opacity = "0";
		}
	}
	setCode(codselect="")
	{
		var cod_interventie = document.getElementById("cod_interventie");
		cod_interventie.value=codselect;
		cod_invalid.style.visibility = "hidden"; 
		cod_invalid.style.opacity = "0";
		
	}
}
