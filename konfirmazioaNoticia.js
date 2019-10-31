window.onload = iniciar;

function iniciar() {
    document.getElementById("sortuAlbistea").addEventListener('click', balidatuAlbistea , false);
}
function tituluaBalidatu() {
    var elemento = document.getElementById("TITULO");
    // if(elemento.value==""){
    //     error2(elemento, "Debe introducir un nombre");
    // }
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un nombre");
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "El nombre debe de ser solo letras y maximo 50");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function testuaBalidatu() {
    var elemento = document.getElementById("INFO_INFO");
    if(elemento.value==""){
        error2(elemento, "Debe introducir un texto");
        return false;
    }
    return true;
}

function balidatuAlbistea(e) {
    borrarError();
    if (tituluaBalidatu() && testuaBalidatu() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
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
