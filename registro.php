<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Blog Registro</title>
        <script src="konfirmazioa.js"></script>
        <link rel='stylesheet' href='Blog.css' type='text/css'>

        <!-- CSS de w3schools -->
        <!-- <link rel='stylesheet' href='Blog.css' type='text/css'> -->
        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
    </head>
    <body>
       
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
            <p>Izena:</p>
            <input required id="NOMB" name="NOMB" type="text" pattern="[A-Za-z]{1,20}" placeholder="Idatzi izena...">
            <br><br>
            <p>Email:</p>
            <input required id="CORR" name="CORR" type="text" pattern="[A-Za-z0-9-_.]{1,20}[@]{1}[A-Za-z]{1,20}[.]{1}[A-Za-z]{2,3}" placeholder="Idatzi Emaila...">
            <br><br>
            <p>Pasahitza:</p>
            <input required id="CONT" name="CONT" type="password" placeholder="Idatzi pasahitza...">
            <br><br>
            <p>Konfirmatu Pasahitza:</p>
            <input required id="CONT2" name="CONT2" type="password" placeholder="Idatzi berriro pasahitza...">
            <br><br>
            <p id="mensajeError" class="mensajeError"></p>
            <input type="submit" id="sortu" value="Sortu">

            <input type="reset" value="Borrar" id="borrar" />
        </form>
        <form method="POST" action="Hasiera.html">
            <input type="submit" value="Atzera">
        </form>

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
            	$exist=comprobarEmail($konexioa, $CORR);
            	if($exist==false){
            		$insert=insertarUsuario($CONT, $CORR, $NOMB, $konexioa);
            	}
            #execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
            #Con eso podemos evaluar
            
            }else{
            	echo "<p class='mensajeError'>Pasahitzak ez dira berdina</p>";
            }

            function comprobarEmail($konexioa, $CORR){
            	$sql = "SELECT * FROM usuarios WHERE CORR='$CORR'";
                    foreach ($konexioa->query($sql) as $row) {
                        echo "<p class='mensajeError'> $CORR --  Email hau badago </p>";
                        return true;
                    }
                    return false;
            }
            function insertarUsuario($CONT, $CORR, $NOMB, $konexioa){
            	$CONT=password_hash($CONT, PASSWORD_DEFAULT);
            	$sentencia = $konexioa->prepare("INSERT INTO usuarios(CORR, NOMB, CONT) VALUES (?, ?, ?);");
            	$resultado = $sentencia->execute([$CORR, $NOMB, $CONT]); # Pasar en el mismo orden de los ?
            
            	if($resultado === TRUE) echo "<p class='mensajeCorrecto'>Insertado correctamente</p>";
            	else echo "<p class='mensajeError'>Algo salió mal. Por favor verifica que la tabla exista</p>";
            }



            ?>
    </body>

</html>