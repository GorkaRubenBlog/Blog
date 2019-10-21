<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Blog Registro</title>
        <!-- CSS de w3schools -->
        <!-- <link rel='stylesheet' href='Blog.css' type='text/css'> -->
        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
    </head>
    <body>
<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["NOMB"]) || !isset($_POST["CORR"]) || !isset($_POST["CONT"])|| !isset($_POST["CONT2"])) exit();
#Si todo va bien, se ejecuta esta parte del código...

include_once "konexioa.php";
$NOMB = $_POST["NOMB"];
$CORR = $_POST["CORR"];
$CONT = $_POST["CONT"];
$CONT2 = $_POST["CONT2"];

/*
	Al incluir el archivo "base_de_datos.php", todas sus variables están
	a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
	copiado y pegado el código
*/
if($CONT == $CONT2){
	$CONT=password_hash($CONT, PASSWORD_DEFAULT);
$sentencia = $konexioa->prepare("INSERT INTO usuarios(CORR, NOMB, CONT) VALUES (?, ?, ?);");
$resultado = $sentencia->execute([$CORR, $NOMB, $CONT]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
if($resultado === TRUE) echo "Insertado correctamente";
else echo "Algo salió mal. Por favor verifica que la tabla exista";
}else{
	echo "Pasahitzak ez dira berdina";
}





?>
		<form method="POST" action="Hasiera.html">
            <input type="submit" value="Atzera">
		</form>        
		<footer>
            
		</footer>
		</body>
	
	</html>