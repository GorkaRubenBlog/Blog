window.addEventListener("load", inicio);
var x = "Cookies Enabled: " + navigator.cookieEnabled;
console.log(x);
function inicio(){

var Usu = document.getElementById("NombLog").textContent;
if(Usu!="loggin"){

    window.localStorage.setItem("Usuario",Usu);
}
}

function getInfo(){
    
}
function getUsu(){
    return window.localStorage.getItem("Usuario");

}