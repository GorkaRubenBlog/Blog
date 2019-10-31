
                
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Wiki Proiektua</title>
        <!-- CSS de w3schools -->
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="konfirmazioa.js"></script>

        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
  
    </head>
    <body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <p>Titulua:</p>
        <input required id="TITULO" name="TITULO" type="text" pattern="[A-Za-z]{1,50}" placeholder="Idatzi Titulua...">
        <br><br>
        <p>Albistearen textua:</p>
        <input required id="INFO_INFO" name="INFO_INFO" type="textarea" placeholder="Idatzi albistearen textua...">
        <br><br>

        <p id="mensajeError" class="mensajeError"></p>
        <input type="submit" id="sortuAlbistea" value="Sortu Albistea">

        <input type="reset" value="Borrar" id="borrar" />
        </form>

        <form method="POST" action="hasieraLog.php">
            <input type="submit" value="Atzera">
        </form>

        <?php
            #Salir si alguno de los datos no está presente
            if(!isset($_POST["TITULO"]) || !isset($_POST["INFO_INFO"])) exit();
            #Si todo va bien, se ejecuta esta parte del código...

            include_once "konexioa.php";
            $TITULO = $_POST["TITULO"];
            $INFO_INFO = $_POST["INFO_INFO"];
            echo "Titulo : $TITULO";
            echo "Texto : $INFO_INFO";


            $exist=comprobarTitulo($konexioa, $TITULO);
            	if($exist==false){
            		$insert=insertarNoticia($TITULO, $INFO_INFO, $konexioa);
                }
                
            function comprobarTitulo($konexioa, $TITULO){
                $sql= "SELECT * FROM informazioa WHERE TITULO ='$TITULO'";

                foreach($konexioa->query($sql) as $row){
                    echo "<p class='mensajeError'> $TITULO --  Titulu hau badago, sartu beste bat </p>";
                    return true;
                }
                return false;
            }

            function insertarNoticia($TITULO, $INFO_INFO, $konexioa){
            	$sentencia = $konexioa->prepare("INSERT INTO informazioa(TITULO, INFO_INFO) VALUES (?, ?);");
            	$resultado = $sentencia->execute([$TITULO, $INFO_INFO]); # Pasar en el mismo orden de los ?
            
            	if($resultado === TRUE) echo "<p class='mensajeCorrecto'>Insertado correctamente</p>";
            	else echo "<p class='mensajeError'>Algo salió mal. Por favor verifica que la tabla exista</p>";
            }
        ?>
    </body>

</html>                
