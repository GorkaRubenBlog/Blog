<!DOCTYPE html>

<html lang="es">
<head>
        <title>Blog Registro</title>
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="LogForm.js"></script>
        <script src="gertaerak.js"></script>
        <script src="konfirmazioa.js"></script>
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
                    ?><a class="navbar-brand" href="crearNoticia.php">Albiste berria</a>
                        <a class="navbar-brand" href="perfil.php">Konfigurazioa</a>

                <?php
                   if($_SESSION['ADM']==1){
                   ?>
               <a class="navbar-brand" href="eliminarComentario.php">Iruzkin ezabatu</a>
               <a class="navbar-brand" href="eliminarNoticia.php">Albistea ezabatu</a>
               <a class="navbar-brand" href="tablaUsuarios.php">Erabiltzaileen taula</a>

                <?php  } 
            }?>
         </nav>
        </div>
        <table class="tabla" >
  	
      <thead >
          <tr>
              <th>ID</th>
              <th>TITULUA</th>
              <th>IRUZKINA</th>

          </tr>
      </thead>
      <?php foreach ($konexioa->query('SELECT * from comentarios') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
          <tr>
              <td><?php echo $row['COD'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
              <td><?php echo $row['INFO_COD'] ?></td>
              <td><?php echo $row['COMEN_INFO'] ?></td>
             
              
          </tr>
      <?php
          }
      ?>
  </table>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
            <p>Codigo del Comentario:</p>
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
            $exist=comprobarComentario($konexioa, $COD);
            	if($exist==true){
            		$delete=eliminarComentario($COD, $konexioa);
            	}else{
                    echo "<p class='mensajeError'> $COD --  Komentario kode hau ez dago datu basean </p>";

                }

            function comprobarComentario($konexioa, $COD){

                $sql= "SELECT * FROM comentarios WHERE COD='$COD'";
                foreach($konexioa->query($sql) as $row){
                    return true;
                }
                return false;
            }

            function eliminarComentario($COD, $konexioa){
            	$sentencia = $konexioa->prepare("DELETE FROM comentarios WHERE COD= (?) ;");
                $resultado = $sentencia->execute([$COD]); # Pasar en el mismo orden de los ?

            	if($resultado === TRUE) echo "<p class='mensajeCorrecto'>Eliminado correctamente</p>";
            	else echo "<p class='mensajeError'>Algo salió mal. Por favor verifica que la tabla exista</p>";
            }
            ?>
            
    </body>

</html>