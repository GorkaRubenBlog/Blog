
                
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Wiki Proiektua</title>
        
        <!-- CSS de w3schools -->
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        
        <script src="LogForm.js"></script>
        <script src="gertaerak.js"></script>
        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
  
    </head>
    <header>
        <?php      
            include_once "konexioa.php";
        $i=0;
        $infos=array();
        $indes=array();
        $VARI="openForm()";
        if(isset($_GET["Session"])){
            if($_GET!=0){
            session_start();
            $_SESSION['ID']=$_GET["Session"];
             }
        }

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
         <a class="navbar-brand" href="hasieraLog.php?Session=<?php if(isset($_SESSION['ID'])){
                   echo $_SESSION['ID'];
                }else{echo 0 ;}?>">hasiera</a>
               <?php if(isset($_SESSION['ADM'])){
                   if($_SESSION['ADM']=1){
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
                <p>Kolorea:</p>
                <select name="select">
                    <option value="value1">Default</option> 
                    <option value="white" selected>Zuria</option>
                    <option value="black">Beltza</option>
                </select>            
                <br><br>
                <p>Nav-Colore:</p>
                <select name="select">
                    <option value="white" selected>Zuria</option>
                    <option value="red">Gorria</option>
                </select> 
                <br><br>
                <p>Icon:</p>
                <input required id="CONT" name="CONT" type="password" placeholder="Idatzi pasahitza...">
                <br><br>jaiotxe data</p>
                <input required id="CONT" name="CONT" type="password" placeholder="Idatzi pasahitza...">
                <br><br>
                <input type="submit" id="sortu" value="Sortu">
                <input type="reset" value="Borrar" id="borrar" />
            </form>
        </div>
  
        <footer>
            
        </footer>
    </body>

</html>                
