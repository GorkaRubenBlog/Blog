window.addEventListener("load", inicio);
var x = "Cookies Enabled: " + navigator.cookieEnabled;
console.log(x);
    Usu = new UsuConfig();
    var izen= document.forms["IZEN"].value;
    var Backg = document.forms["BG"].value;
    var navBackg = document.forms["NBG"].value;

    Usu.setAll(izen,Backg,navBackg);
window.localStorage.setItem("Config",Usu);

