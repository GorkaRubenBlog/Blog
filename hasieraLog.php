
                
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
<<<<<<< HEAD
        $indes=array();

        $sql = "SELECT * FROM informazioa";
        foreach ($konexioa->query($sql) as $row) {
            array_push($indes,$row["COD"]);
=======
        $sql = "SELECT TITULO FROM informazioa";
        foreach ($konexioa->query($sql) as $row) {
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
            array_push($infos,$row["TITULO"]);
                     }   
            #Si todo va bien, se ejecuta esta parte del código...
            $CORR = "";
            $CONT = "";
            $LOGGED = FALSE;
            $LOG = "login";
            $VARI ="openForm()";
            if(!isset($_POST["CORR"])||!isset($_POST["CONT"])){}else{
<<<<<<< HEAD
                
=======
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
            $CORR = $_POST["CORR"];
            $CONT = $_POST["CONT"];
            echo $LOGGED;
            if($LOGGED==FALSE){
                        #Salir si alguno de los datos no está presente
<<<<<<< HEAD
=======
                $CONT=password_hash($CONT, PASSWORD_DEFAULT);
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
                $sql = "SELECT * FROM usuarios WHERE CORR='$CORR' AND CONT='$CONT'";
                echo $sql;
                foreach ($konexioa->query($sql) as $row) {
                       $LOGGED = TRUE;
                       $user = $row["NOMB"];
                       $VARI = "";
                       $LOG = $user;
<<<<<<< HEAD
                             }  
                            }
                        }
               if(!isset($_POST["USER"])){}else{
                    $LOG = $_POST["USER"];
                    $LOGGED = TRUE;
                    $VARI = "";
                }
=======
                                }   
                            }
                        }
               
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
?>
        <!-- Logo Eta izena-->
        <!-- Logo-->
        <!-- izena-->
        <section id="logo">        
            <H1>BLOG IZENA</H1>
        </section>
        <!-- Login-->
<<<<<<< HEAD
        <section id="login">
            <button onclick=<?php echo $VARI?>><?php echo $LOG?></button>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <button type="submit" onclic="<?php  $user=""; $LOG="login"  ?>">loggout</button>
                </form>
        </section>
        <!--Pop-Up----->
=======
        <section id=login>
            <button onclick=<?php echo $VARI?>><?php echo $LOG?></button>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-container">
                <button type="submit" onclic="<?php  $user=""; $LOG="login"  ?>">loggout</button>
            </form>
        </section>
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
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
        <?php for($i=0;$i<sizeof($infos);$i++){ ?>
            <div class="Def-1">
                <form method="POST" action="informazioaIkusi.php">
                <input type="hidden" value="<?php echo $indes[$i]?>" name="IND">
                <input type="hidden" value="<?php echo $LOG?>" name="LOG">
               <p><?php echo $infos[$i];?></p> 
                <input type="submit">
                </form>
            </div>
         <?php }?>
           
            
=======
            <div class="Def-1">
               <p><?php echo $infos[$i];$i++?></p> 
            </div>
            <div class="Def-2">
                <p><?php echo $infos[$i];$i++?></p> 
            </div>
            <div class="Def-3">
                <p><?php echo $infos[$i];$i++?></p> 
            </div>
            <div class="Def-4">
                <p><?php echo $infos[$i];$i++?></p> 
            </div>
            <div class="Def-5">
                <p><?php echo $infos[$i];$i++?></p> 
            </div>
            <div class="Def-6">
                <p><?php echo $infos[$i];$i++?></p> 
            </div> 
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
        </div>
  
        <footer>
            
        </footer>
    </body>

</html>                
<<<<<<< HEAD
=======
<!---------IR A OTRA PAJINA------>
<!-------------"POST" MANDAR COMO INPUT INVISIBLE $user--------------->
>>>>>>> 7dcd1c873f81a8dd49e3f13c42c65a2f16c9a127
