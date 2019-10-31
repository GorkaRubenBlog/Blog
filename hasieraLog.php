
                
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
<<<<<<< HEAD
=======

>>>>>>> d2a03876c7e3c007f638e26cec0bda0daadc2240
        <section id="login">
            <button onclick=<?php echo $VARI?>><?php if(!isset($_SESSION["USU"])){echo "loggin";}
                else{echo $_SESSION["USU"];}?></button>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <button type="submit" onClick="<?php  
                    unset( $_SESSION["USU"]) ;
                    unset( $_SESSION["USU"]) ;

                    session_destroy(); ?>">loggout</button>
                </form>
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
              <button class="btn"><a href='registro.php'>registratu</a></button>
              <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </form>

          </div>
    </header>
    <body>
        
        <nav>
    
                <button type="submit">hasiera</button>
                <button type="submit">hasiera</button>    
                <button type="submit">hasiera</button>
        </nav>
        <div class="grid-contenedor">
<<<<<<< HEAD
=======

>>>>>>> d2a03876c7e3c007f638e26cec0bda0daadc2240
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
<<<<<<< HEAD
           
            
=======
>>>>>>> d2a03876c7e3c007f638e26cec0bda0daadc2240
        </div>
  
        <footer>
            
        </footer>
    </body>

</html>                
