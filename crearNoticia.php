
                
<!DOCTYPE html>
<html lang="es">
<head>
        <title>Blog Registro</title>
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="LogForm.js"></script>
        <script src="gertaerak.js"></script>
        <script src="konfirmazioa.js"></script>


        <!-- CSS de w3schools -->
        <!-- <link rel='stylesheet' href='Blog.css' type='text/css'> -->
        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
   
    </head>
    <header>
        <?php 
          
    /*-----------------------OBTENER SESSION------*/
                       
                          include_once "konexioa.php";
                          $i=0;
                          $infos=array();
                          $indes=array();
                          if(isset($_GET["Session"])){
                            if($_GET!=0){
                            session_start();
                            $_SESSION['ID']=$_GET["Session"];
                             }
                        }
                
                          $VARI="openForm()";
                      /*-----------------------OBTENER SESSION------*/
                  
                          $sql = "SELECT * FROM informazioa";
                          foreach ($konexioa->query($sql) as $row) {
                              array_push($indes,$row["COD"]);
                              array_push($infos,$row["TITULO"]);
                  
                          }
                          include("Sessiones.php");

?>
        <!-- Logo Eta izena-->
        <!-- Logo-->
        <!-- izena-->

        <section id="logo">        
            <H1>BLOG IZENA</H1>
        </section>
        <!-- Login-->
        <section id="login">
            <button onclick=<?php echo $VARI?>><?php if(!isset($_SESSION["USU"])){echo "loggin";}
                else{echo $_SESSION["USU"];}?></button>
               <?php if(isset($_SESSION["USU"])){ ?>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <button type="submit" onClick="<?php  
                    unset( $_SESSION["USU"]) ;

                    session_destroy(); ?>">loggout</button>
                </form>
                <?php } ?>
        </section>
        <!--Pop-Up----->
        <div class="form-popup" id="myForm">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-container">
              <h1>Login</h1>
          
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="CORR" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="CONT" required>
          
              <button type="submit" class="btn">Login</button>

              <a  class="btn" href='registro.php'>registratu</a>
              <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </form>

          </div>
    </header>
    <body>
    
    <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light" style="background-color: red";>
         <a class="navbar-brand" href="hasieraLog.php?Session=<?php if(isset($_SESSION['ID'])){
                   echo $_SESSION['ID'];
                }else{echo 0 ;}?>">hasiera</a>
               <?php if(isset($_SESSION['ADM'])){
                   if($_SESSION['ADM']==1){
                   ?>
               <a class="navbar-brand" href="eliminarComentario.php?Session=<?php echo $_SESSION['ID']?>">Iruzkin ezabatu</a>
               <a class="navbar-brand" href="eliminarNoticia.php?Session=<?php echo $_SESSION['ID']?>">Albistea ezabatu</a>
               <a class="navbar-brand" href="eliminarUsuario.php?Session=<?php echo $_SESSION['ID']?>">Erabiltzailea ezabatu</a>
               <a class="navbar-brand" href="modificarUsuario.php?Session=<?php echo $_SESSION['ID']?>">Erabiltzailea aldatu</a>
               <a class="navbar-brand" href="eliminarComentario.php?Session=<?php echo $_SESSION['ID']?>">Komentarioa Ezabatu</a>

                <?php  } 
            }?>
         </nav>
        </div>

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
