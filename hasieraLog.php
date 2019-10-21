
                
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
            #Si todo va bien, se ejecuta esta parte del código...
            if(!isset($_POST["CORR"])||!isset($_POST["CONT"]));
            include_once "konexioa.php";
            $CORR = $_POST["CORR"];
            $CONT = $_POST["CONT"];
            $LOGGED = FALSE;
            $LOG = "login";
            $VARI ="openForm()";
               #Salir si alguno de los datos no está presente
               $sql = "SELECT * FROM usuarios WHERE CORR='$CORR' AND CONT='$CONT'";
               foreach ($konexioa->query($sql) as $row) {
                       $LOGGED = TRUE;
                       echo $LOGGED;
                       $LOG = "Logged";
                       $VARI = "";
               }
?>
        <!-- Logo Eta izena-->
        <!-- Logo-->
        <!-- izena-->
        <section id="logo">        
            <H1>BLOG IZENA</H1>
        </section>
        <!-- Login-->
        <section id=login>
            <button onclick=<?php echo $VARI?>><?php echo $LOG?></button>
        </section>
        <div class="form-popup" id="myForm">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-container">
              <h1>Login</h1>
          
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="CORR" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="CONT" required>
          
              <button type="submit" class="btn">Login</button>
              <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </form>

          </div>
    </header>
    <body>
        
        <nav>
            <a>hasiera</a>
            <a>perfil</a>
            <a>egileak</a>
        </nav>
        <div class="grid-contenedor">
            <div class="Def-1">
               <p>GORRIA</p> 
            </div>
            <div class="Def-2">
                <p>GORRIA</p> 
            </div>
            <div class="Def-3">
                <p>GORRIA</p> 
            </div>
            <div class="Def-4">
                <p>GORRIA</p> 
            </div>
            <div class="Def-5">
                <p>GORRIA</p> 
            </div>
            <div class="Def-6">
                <p>GORRIA</p> 
            </div> 
        </div>
  
        <footer>
            
        </footer>
    </body>

</html>                
