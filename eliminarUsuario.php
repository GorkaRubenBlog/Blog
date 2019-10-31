<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Blog Registro</title>
        <script src="konfirmazioa.js"></script>
        <link rel='stylesheet' href='Blog.css' type='text/css'>

    </head>
    <body>
       
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
            <p>Codigo de usuario:</p>
            <input required id="COD" name="COD" type="number" min="1"  placeholder="Idatzi kodigoa...">
            <br><br>
            <p id="mensajeError" class="mensajeError"></p>
            <input type="submit" id="ezabatu" value="Ezabatu">

            <input type="reset" value="Borrar" id="borrar" />
        </form>
        <form method="POST" action="hasieraLog.php">
            <input type="submit" value="Atzera">
        </form>

        <?php
            #Salir si alguno de los datos no está presente
            if(!isset($_POST["COD"])) exit();
            #Si todo va bien, se ejecuta esta parte del código...
            include_once "konexioa.php";
            $COD = $_POST["COD"];
            $exist=comprobarUsuario($konexioa, $COD);
            	if($exist==true){
            		$delete=eliminarUsuario($COD, $konexioa);
            	}else{
                    echo "<p class='mensajeError'> $COD --  Erabiltzaile kode hau es dago datu basean </p>";

                }

            function comprobarUsuario($konexioa, $COD){

                $sql= "SELECT * FROM usuarios WHERE COD='$COD'";
                foreach($konexioa->query($sql) as $row){
                    return true;
                }
                return false;
            }

            function eliminarUsuario($COD, $konexioa){
            	$sentencia = $konexioa->prepare("DELETE FROM usuarios WHERE COD= (?) ;");
                $resultado = $sentencia->execute([$COD]); # Pasar en el mismo orden de los ?

            	if($resultado === TRUE) echo "<p class='mensajeCorrecto'>Eliminado correctamente</p>";
            	else echo "<p class='mensajeError'>Algo salió mal. Por favor verifica que la tabla exista</p>";
            }
            ?>
            
    </body>

</html>