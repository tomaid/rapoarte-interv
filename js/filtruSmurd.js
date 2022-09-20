class FiltruSmurd{
    runFilter(camp, vall)
    {
       document.getElementById(camp+"_hid").value=vall;
       document.filtre.submit();
    }

    runFilterDescarcare()
    {
       this.runtimeFilter('descarcare',1);
       this.runtimeFilter('pagina','');
       document.filtre.action = "descarcare-smurd.php";
       document.filtre.submit();
       this.runtimeFilter('descarcare',0);
       document.filtre.action = document.URL;
    }

    runSubmit(){
       document.filtre.submit();
    }

    enterFilter(camp,vall){
        if(event.keyCode == 13){
           this.runFilter(camp,vall);
        }
    }

    runtimeFilter(camp,vall){
       document.getElementById(camp+"_hid").value=vall;
    }

    runtimeFilterLuna(){
       document.getElementById("cautare_nrigsu_hid").value="";
       document.getElementById("cautare_data_int_zi_hid").value="";
       document.getElementById("cautare_nume_hid").value="";
       document.getElementById("cautare_prenume_hid").value="";
       document.getElementById("pagina_hid").value="0";
    }

    sFilter(vall){
       document.getElementById("cautare_s_hid").value=vall;
    }

   	runcheckedFilter(camp,vall){
       if(document.getElementById(camp+"_hid").value==1)
           {
       document.getElementById(camp+"_hid").value="";
       document.filtre.submit();
       }
       else
           {
           document.getElementById(camp+"_hid").value="1";
           document.filtre.submit(); 
           }
    }
}
