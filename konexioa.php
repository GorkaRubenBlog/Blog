<?php
/*
	CRUD con MySQL y PHP
	@author parzibyte
	@date 2018-02-12
*/
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "blog";
try{
	$konexioa = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	echo "BIEN";
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>