<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Blog Registro</title>
        <script src="konfirmazioa.js"></script>
        <link rel='stylesheet' href='Blog.css' type='text/css'>

    </head>
    <body>
    <?php
                    #Salir si alguno de los datos no está presente
                    if(!isset($_POST["NOMB"])|| !isset($_POST["CORR"])|| !isset($_POST["CONT"])||!isset($_POST["CONT2"])|| !isset($_POST["COD"])){}else{
                        include_once "konexioa.php";
                        $NOMB = $_POST["NOMB"];
                        $CORR = $_POST["CORR"];
                        $CONT = $_POST["CONT"];
                        $CONT2 = $_POST["CONT2"];
                        $COD = $_POST["COD"];

                        if($CONT == $CONT2){
                            $exist=comprobarEmail($konexioa, $CORR);
                            if($exist==false){
                                $update=updateUsuario($CONT, $CORR, $NOMB, $konexioa, $COD);
                            }
                        }
                    }
                    ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
            <p>Codigo de usuario:</p>
            <input required id="COD" name="COD" type="number" min="1"  placeholder="Idatzi kodigoa...">
            <br><br>
            <p id="mensajeError" class="mensajeError"></p>
            <input type="submit" id="hautatu" value="Hautatu">
        </form>
        <?php
            #Salir si alguno de los datos no está presente
            if(!isset($_POST["COD"])) exit();
            #Si todo va bien, se ejecuta esta parte del código...
            include_once "konexioa.php";
            $COD = $_POST["COD"];
            $exist=comprobarUsuario($konexioa, $COD);
            	if($exist==true){
                    ?>
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
                    <p>Nombre de usuario:</p>
                    <input required id="NOMB" name="NOMB" pattern="[A-Za-z]{1,20}" type="text" placeholder="Sartu erabiltzailearen izena" value="
<?php
                        $sql= "SELECT NOMB FROM usuarios WHERE COD='$COD'";
                        foreach($konexioa->query($sql) as $row){
                            echo $row["NOMB"];
                        }
                        
?>">
                    <br><br>
                    <p>Correo del usuario:</p>
                    <input required id="CORR" name="CORR" type="text" pattern="[A-Za-z0-9-_.]{1,20}[@]{1}[A-Za-z]{1,20}[.]{1}[A-Za-z]{2,3}" placeholder="Sartu erabiltzailearen korreoa" value="
<?php
                    $sql= "SELECT CORR FROM usuarios WHERE COD='$COD'";
                    foreach($konexioa->query($sql) as $row){
                    echo $row["CORR"];
                    }
?>">
                    <br><br>
                    <p>Contraseña del usuario:</p>
                    <input required id="CONT" name="CONT" type="password" placeholder="Sartu erabiltzailearen pasahitza" >
                    <br><br>
                    <p>Confirmar contraseña del usuario:</p>
                    <input required id="CONT2" name="CONT2" type="password" placeholder="Sartu erabiltzailearen pasahitza" >
                    <br><br>
                    <input type="hidden" name="COD" id="COD" value="<?php echo "$COD";?>">
                    <input type="submit" id="gorde" value="Gorde">
                  </form>
                    

                    <?php
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
            function comprobarEmail($konexioa, $CORR){
            	$sql = "SELECT * FROM usuarios WHERE CORR='$CORR'";
                    foreach ($konexioa->query($sql) as $row) {
                        echo "<p class='mensajeError'> $CORR --  Email hau badago </p>";
                        return true;
                }
                return false;
            }
            function updateUsuario($CONT, $CORR, $NOMB, $konexioa, $COD){
                $CONT_HASH=hash("sha256", $CONT);
            	$sentencia = $konexioa->prepare("UPDATE usuarios SET CORR=(?), NOMB= (?), CONT=(?) WHERE COD='$COD';");
            	$resultado = $sentencia->execute([$CORR, $NOMB, $CONT_HASH]); # Pasar en el mismo orden de los ?
            
            	if($resultado === TRUE) echo "<p class='mensajeCorrecto'>Modificado correctamente</p>";
            	else echo "<p class='mensajeError'>Algo salió mal. Por favor verifica que la tabla exista</p>";
            }

            // function eliminarUsuario($COD, $konexioa){
            // 	$sentencia = $konexioa->prepare("DELETE FROM usuarios WHERE COD= (?) ;");
            //     $resultado = $sentencia->execute([$COD]); # Pasar en el mismo orden de los ?

            // 	if($resultado === TRUE) echo "<p class='mensajeCorrecto'>Eliminado correctamente</p>";
            // 	else echo "<p class='mensajeError'>Algo salió mal. Por favor verifica que la tabla exista</p>";
            // }
            ?>
        <form method="POST" action="hasieraLog.php">
            <input type="submit" value="Atzera">
        </form>

        
            
    </body>

</html>