window.addEventListener("load", inicio);


function inicio(){
    document.getElementById("close").onclick =function() {closeForm()}; 
    document.getElementById("fisote").onclick =function() {f1()}; 

    var nav=document.getElementsByTagName("nav")[0];
    for(var i=0; i<nav.getElementsByTagName("a").length;i++){
        nav.getElementsByTagName("a")[i].addEventListener("mouseover", fondo);
        nav.getElementsByTagName("a")[i].addEventListener("mouseout", quitarFondo);

    }
    var boton=document.getElementsByTagName("html")[0];
    for(var i=0; i<nav.getElementsByTagName("button").length;i++){
        nav.getElementsByTagName("a")[i].addEventListener("mouseover", fondo);
        nav.getElementsByTagName("a")[i].addEventListener("mouseout", quitarFondo);

    }
  }
function fondo(e){
    e.target.style.backgroundColor= "white";
}

function quitarFondo(e){
    e.target.style.backgroundColor= "red";
}