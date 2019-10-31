window.onload = iniciar;

function iniciar() {
    document.getElementById("ezabatu").addEventListener('click', balidatuKodigoa , false);
}
function kodigoaBalidatu() {
    var elemento = document.getElementById("COD");
    if(elemento.value==""){
        error2(elemento, "Debe introducir un numero");
        return false;
    }
    return true;
    
}

function balidatuKodigoa(e) {
    borrarError();
    if (kodigoaBalidatu() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
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
