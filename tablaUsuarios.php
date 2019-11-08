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
         <nav id="navegador" class="navbar navbar-expand-lg navbar-light">
         <a class="navbar-brand" href="hasieraLog.php?Session=<?php if(isset($_SESSION['ID'])){
                   echo $_SESSION['ID'];
                }else{echo 0 ;}?>">hasiera</a>

                <?php if(isset($_SESSION['ADM'])){
                    ?><a class="navbar-brand" href="crearNoticia.php?Session=<?php echo $_SESSION['ID']?>">Albiste berria</a>
                <?php
                   if($_SESSION['ADM']==1){
                   ?>
               <a class="navbar-brand" href="eliminarComentario.php?Session=<?php echo $_SESSION['ID']?>">Iruzkin ezabatu</a>
               <a class="navbar-brand" href="eliminarNoticia.php?Session=<?php echo $_SESSION['ID']?>">Albistea ezabatu</a>
               <a class="navbar-brand" href="tablaUsuarios.php?Session=<?php echo $_SESSION['ID']?>">Erabiltzaileen taula</a>

                <?php  } 
            }?>
         </nav>
        </div>
    <table class="tabla" >
  	
		<thead >
		    <tr>
		    	<th>ID</th>
		    	<th>CORREO</th>
		    	<th>NOMBRE</th>
                <th>CONTRASEÑA</th>
                <th>ADMIN</th>
                <th>EGUNERATU</th>
                <th>EZABATU</th>


            
		    </tr>
		</thead>
        <?php foreach ($konexioa->query('SELECT * from usuarios') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
            <tr>
	            <td><?php echo $row['COD'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
                <td><?php echo $row['CORR'] ?></td>
                <td><?php echo $row['NOMB'] ?></td>
                <td>***************</td>
                <td><?php echo $row['ADM'] ?></td>
                <td><a class="navbar-brand" href="modificarUsuario.php?Session=<?php echo $_SESSION['ID']?>&codigo=<?php echo $row['COD']?> ">
                <img class="logos" src="update.jpg" alt="Eguneratu"></a></td>
                <td><a class="navbar-brand" href="modificarUsuario.php?Session=<?php echo $_SESSION['ID']?>&codigo=<?php echo $row['COD']?>">
                <img class="logos" src="logoDelete.png" alt="Ezabatu"></a></td>

            </tr>
        <?php
        	}
        ?>
    </table>


        
            
    </body>

</html>