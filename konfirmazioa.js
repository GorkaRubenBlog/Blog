window.onload = iniciar;

function iniciar() {
    if (document.getElementById("sortu"))
        document.getElementById("sortu").addEventListener('click', balidatu , false);
    if (document.getElementById("ezabatu"))
        document.getElementById("ezabatu").addEventListener('click', balidatuKodigoa , false);
    if (document.getElementById("sortuAlbistea"))
        document.getElementById("sortuAlbistea").addEventListener('click', balidatuAlbistea , false);


}
function izenaBalidatu() {
    var elemento = document.getElementById("NOMB");

    if (!elemento.checkValidity()){
        if (elemento.validity.valueMissing) {
            error2(elemento, "Izen bat sartu behar duzu");
         }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "Izena bakarrik letras osatuta egon behar da");
         }
        //error(elemento);
        return false;
        }
    return true;
    }

function emailBalidatu() {
    var elemento = document.getElementById("CORR");
    // if(elemento.value==""){
    //     error2(elemento, "Debe introducir un email");
    // }
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Emaila formatu hau euki behar du  Ej.:aaaa@aaaa.com");
            }
        if (elemento.validity.patternMismatch) {
               error2(elemento, "Emaila formatu hau euki behar du Ej.:aaaa@aaaa.com");
            }
        //error(elemento);
        return false;
         }
    return true;
    }

function kodigoaBalidatu() {
    var elemento = document.getElementById("COD");
    if(elemento.value==""){
        error2(elemento, "Kodigoa zenbakiz osatuta dago");
        return false;
    }
    return true;
    
}

function balidatuKodigoa(e) {
    borrarError();
    if (kodigoaBalidatu() && confirm("Kodigoa ondo satuta dago?")) {
        return true
    } else {
        e.preventDefault();
        return false;
    }
}

function balidatu(e) {
    borrarError();
    if (izenaBalidatu() && emailBalidatu() && confirm("Erabiltzailari datuak ondo sartu diozu?")) {
        return true
    } else {
        e.preventDefault();
        return false;
    }
}

function tituluaBalidatu() {
    var elemento = document.getElementById("TITULO");
    // if(elemento.value==""){
    //     error2(elemento, "Debe introducir un nombre");
    // }
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Titulu bat sartu behar duzu");
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "titulua letras osatuta egon behar da eta 50 karaktere baino txikiagoa izan behar da");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function testuaBalidatu() {
    var elemento = document.getElementById("INFO_INFO");
    if(elemento.value==""){
        error2(elemento, "Testu bar sartu behar duzu");
        return false;
    }
    return true;
}

function balidatuAlbistea(e) {
    borrarError();
    if (tituluaBalidatu() && testuaBalidatu() && confirm("Albistea sortu nahi duzu?")) {
        return true
    } else {
        e.preventDefault();
        return false;
    }
}

function error2(elemento, mensaje) {
    document.getElementById("mensajeError").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}

function borrarError() {
    var formulario = document.forms[0];
    for (var i = 0; i < formulario.elements.length; i++) {
        formulario.elements[i].className = "";
    }
}
