class Validareforma {
           validateForm() {
            var cod = document.getElementById("cod_interventie").value;
            var cod_invalid = document.getElementById("cod_invalid");
            var mesaj = document.getElementById("messagefrom");
            if ((cod == ""))
            {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0;
                mesaj.innerHTML="Aveți erori în introducerea datelor";
                cod_invalid.style.visibility = "visible";
                cod_invalid.style.opacity = "1";
                event.preventDefault();
                return false;

            }

        }
}
