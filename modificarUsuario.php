<!DOCTYPE html>

<html lang="es">
<head>
        <title>Blog Registro</title>
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="LogForm.js"></script>
        <script src="gertaerak.js"></script>
        <script src="UsuConfig.js"></script>
        <script src="Elecciones.js"></script>

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
                        if(isset($_GET["codigo"])){
                            if($_GET!=0){
                            $usuCod=$_GET["codigo"];
                             }
                                
                             
                        }else{
                            echo "no ta";
                        }
                
                          $VARI="openForm()";
                      /*-----------------------OBTENER SESSION------*/
                  
                          $sql = "SELECT * FROM informazioa";
                          foreach ($konexioa->query($sql) as $row) {
                              array_push($indes,$row["COD"]);
                              array_push($infos,$row["TITULO"]);
                  
                          }
                          session_start();
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
                    <?php if( $_SESSION['LOG'] == TRUE){;?>
            <button onclick="location.href = 'Loggout.php?pag=<?php echo $_SERVER['PHP_SELF'] ?>';">loggout</button>
            <?php }?>
           
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
              <button id="close" type="submit" class="btn cancel" >Close</button>
            </form>

          </div>
    </header>
    <body>
    <div class="container">
         <nav id="navegador" class="navbar navbar-expand-lg navbar-light" >
         <a class="navbar-brand" href="hasieraLog.php">hasiera</a>

                <?php if(isset($_SESSION['ADM'])){
                    ?><a class="navbar-brand" href="crearNoticia.php?">Albiste berria</a>
                        <a class="navbar-brand" href="perfil.php">Konfigurazioa</a>

                <?php
                   if($_SESSION['ADM']==1){
                   ?>
               <a class="navbar-brand" href="eliminarComentario.php?">Iruzkin ezabatu</a>
               <a class="navbar-brand" href="eliminarNoticia.php">Albistea ezabatu</a>
               <a class="navbar-brand" href="tablaUsuarios.php">Erabiltzaileen taula</a>

                <?php  } 
            }?>
         </nav>
        </div>

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
     
        $HOLA="HOLA";
            #Salir si alguno de los datos no está presente
            if(!isset($usuCod)) exit();
            #Si todo va bien, se ejecuta esta parte del código...
            include_once "konexioa.php";
            $COD = $usuCod;
            $exist=comprobarUsuario($konexioa, $COD);
            	if($exist==true){
                    $admin=comprobarAdmin($konexioa, $COD);
                    if($admin==false){

                    ?>
                    <form method="POST">
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
                        echo "<p class='mensajeError'> $COD --  Administratzaileak ezin dira modifikatu </p>";
    
                    }
            	}else{
                    echo "<p class='mensajeError'> $COD --  Erabiltzaile kode hau es dago datu basean </p>";

                }

            function comprobarAdmin($konexioa, $COD){
                $sql= "SELECT ADM FROM usuarios WHERE COD='$COD'";
                foreach($konexioa->query($sql) as $row){
                    if($row["ADM"]==1){
                        return true;
                    }
                }
                return false;
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

      
            ?>
        <form method="POST" action="hasieraLog.php">
            <input type="submit" value="Atzera">
        </form>

        
            
    </body>

</html>