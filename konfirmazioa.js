window.onload = iniciar;

function iniciar() {
    document.getElementById("sortu").addEventListener('click', balidatu , false);
}
function izenaBalidatu() {
    var elemento = document.getElementById("NOMB");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un nombre");
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "El nombre debe de ser solo letras y maximo 20");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function emailBalidatu() {
    var elemento = document.getElementById("CORR");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe de tener un formato de email Ej.:aaaa@aaaa.com");
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "Debe de tener un formato de email Ej.:aaaa@aaaa.com");
        }
        //error(elemento);
        return false;
    }
    return true;
}


function balidatu(e) {
    borrarError();
    if (izenaBalidatu() && emailBalidatu() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
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
