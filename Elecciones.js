window.addEventListener("load", inicio);


function inicio(){
    document.body.style.background  = localStorage.getItem('BG');
    console.log(localStorage.getItem('NBG'));
    document.getElementById('navegador').style.backgroundColor =localStorage.getItem('NBG')

}
function f1(){
var izen = document.getElementById("IZEN").value;
var bg = document.getElementById("BG").value;
var nbg = document.getElementById("NBG").value;

var Elecc =new UsuConfig();
Elecc.setBackg(bg);
Elecc.setIzen(izen);
Elecc.setNavBackg(nbg);


localStorage.setItem('IZEN', Elecc.getIzen());
localStorage.setItem('BG', Elecc.getBackg());
localStorage.setItem('NBG', Elecc.getNavBackg());


}
