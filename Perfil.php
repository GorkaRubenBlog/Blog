
                
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Wiki Proiektua</title>
        
        <!-- CSS de w3schools -->
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        
        <script src="LogForm.js"></script>
        <script src="gertaerak.js"></script>
        <script src="UsuConfig.js"></script>
        <script src="Elecciones.js"></script>

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
            <button id="NombLog"onclick=<?php echo $VARI?>><?php if(!isset($_SESSION["USU"])){echo "loggin";}
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
              <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </form>

          </div>
    </header>
    <body>
        
        <div class="container">
         <nav id="navetzaile"class="navbar navbar-expand-lg navbar-light";>
         <a class="navbar-brand" href="hasieraLog.php">hasiera</a>
               <?php if(isset($_SESSION['ADM'])){
                   if($_SESSION['ADM']=1){
                   ?>
                    <a class="navbar-brand" href="eliminarComentario.php">Iruzkin ezabatu</a>
                    <a class="navbar-brand" href="eliminarNoticia.php">Albistea ezabatu</a>
                    <a class="navbar-brand" href="eliminarUsuario.php">Erabiltzailea ezabatu</a>
                    <a class="navbar-brand" href="modificarUsuario.php">Erabiltzailea aldatu</a>
                    <a class="navbar-brand" href="eliminarComentario.php">Komentarioa Ezabatu</a>

                <?php  } 
            }?>
         </nav>
        </div>
             <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
                <input id="IZEN" type="hidden" value="<?php echo $_SESSION["USU"] ?>">
                <p>Kolorea:</p>
                <select id="BG" name="select">
                    <option value="default">Default</option> 
                    <option value="white" >Zuria</option>
                    <option value="black">Beltza</option>
                </select>            
                <br><br>
                <p>Nav-Colore:</p>
                <select id="NBG"name="NBG">
                    <option value="white" >Zuria</option>
                    <option value="red">Gorria</option>
                </select> 
                <br><br>
            </form>
            <button onclick="f1()">Amaitu</button>
        </div>
  
        <footer>
            
        </footer>
    </body>

</html>                
