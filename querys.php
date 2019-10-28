<?php
if(!isset($_POST["NOMB"]) || !isset($_POST["CORR"]) || !isset($_POST["CONT"])|| !isset($_POST["CONT2"] || !isset($_POST["INFO"] )) exit();
include_once "konexioa.php";
$NOMB = $_POST["NOMB"];
$CORR = $_POST["CORR"];
$CONT = $_POST["CONT"];
$CONT2 = $_POST["CONT2"];


function usuarioBerri(){
    if($CONT == $CONT2){
        $CONT=password_hash($CONT, PASSWORD_DEFAULT);
    $sentencia = $konexioa->prepare("INSERT INTO usuarios(CORR, NOMB, CONT) VALUES (?, ?, ?);");
    $resultado = $sentencia->execute([$CORR, $NOMB, $CONT]); # Pasar en el mismo orden de los ? 
    if($resultado === TRUE) echo "Insertado correctamente";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }else{
	echo "Pasahitzak ez dira berdina";
}
}
function  infoBerri(){
    $CONT=password_hash($CONT, PASSWORD_DEFAULT);
    $sentencia = $konexioa->prepare("INSERT INTO informazioa(INFO_INFO) VALUES (?, ?);");
    $resultado = $sentencia->execute([$CORR, $NOMB, $CONT]); # Pasar en el mismo orden de los ? 
    if($resultado === TRUE) echo "Insertado correctamente";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }else{
	echo "Pasahitzak ez dira berdina";
}
}
?>