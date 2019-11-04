
                
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Wiki Proiektua</title>
        <!-- CSS de w3schools -->
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="LogForm.js"></script>


        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
  
    </head>
    <header>
        <?php      
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
            <button id="NombLog"onclick=<?php echo $VARI?>><?php if(!isset($_SESSION["USU"])){echo "loggin";}
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
               <a class="navbar-brand" href="crearNoticia.php">albiste zortu</a>
               <?php if(isset($_SESSION['ADM'])){
                   if($_SESSION['ADM']=1){
                   ?>
               <a class="navbar-brand" href="eliminarComentario.php">Iruzkin ezabatu</a>
               <a class="navbar-brand" href="eliminarNoticia.php">Albistea ezabatu</a>
               <a class="navbar-brand" href="eliminarUsuario.php">Erabiltzailea ezabatu</a>
               <a class="navbar-brand" href="modificaUsuario.php">Erabiltzailea aldatu</a>

                <?php  } 
            }?>
         </nav>
        </div>

        <div class="grid-contenedor">
        <?php for($i=0;$i<sizeof($infos);$i++){ ?>
            <div class="Def-1">
                <form method="POST" action="informazioaIkusi.php">
                <input type="hidden" value="<?php echo $indes[$i]?>" name="IND">
                <input type="hidden" value="<?php echo $_SESSION['ID']?>"name="cod">

               <p><?php echo $infos[$i];?></p> 
                <input type="submit">
                </form>
            </div>
         <?php }?>
        </div>
  
        <footer>
            
        </footer>
    </body>

</html>                
