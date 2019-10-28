<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Blog Registro</title>
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="LogForm.js"></script>

        <!-- CSS de w3schools -->
        <!-- <link rel='stylesheet' href='Blog.css' type='text/css'> -->
        <!--link rel='shortcut icon' type='image/x-icon' href='logoBlack.png' />-->
    </head>
    <header>
        <?php 
        if(!isset($_POST["IND"]))exit();    
       
        $LOG = $_POST["LOG"];
        echo $LOG;

        include_once "konexioa.php";
        $i=0;
        $infos=array();
        $indes=array();

        $sql = "SELECT * FROM informazioa";
        foreach ($konexioa->query($sql) as $row) {
            array_push($indes,$row["COD"]);
            array_push($infos,$row["TITULO"]);
                     }   
            #Si todo va bien, se ejecuta esta parte del código...
            $CORR = "";
            $CONT = "";
            $LOGGED = FALSE;
            $LOG = $_POST["LOG"];
            $VARI ="openForm()";
            $IND = $_POST["IND"];
            if(!isset($_POST["LOG"])){}else{
                  $LOG = $_POST["LOG"];
                    $LOGGED = TRUE;
                    $VARI = "";
            }
            if(!isset($_POST["CORR"])||!isset($_POST["CONT"])){}else{
                
            $CORR = $_POST["CORR"];
            $CONT = $_POST["CONT"];
        

            echo $LOGGED;
            if($LOGGED==FALSE){
                        #Salir si alguno de los datos no está presente
                $sql = "SELECT * FROM usuarios WHERE CORR='$CORR' AND CONT='$CONT'";
                echo $sql;
                foreach ($konexioa->query($sql) as $row) {
                       $LOGGED = TRUE;
                       $user = $row["NOMB"];
                       $VARI = "";
                       $LOG = $user;
                             }  
                            }
                        }
                  
                        
                           
                           
                        
?>
        <!-- Logo Eta izena-->
        <!-- Logo-->
        <!-- izena-->

        <section id="logo">        
            <H1>BLOG IZENA</H1>
        </section>
        <!-- Login-->
        <section id="login">
            <button onclick=<?php echo $VARI?>><?php echo $LOG?></button>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <button type="submit" onclic="<?php  $user=""; $LOG="login"  ?>">loggout</button>
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
    <?php
    $comen=array();
    include_once "konexioa.php";
    $sql= "SELECT COMEN_INFO FROM comentarios WHERE INFO_COD=$IND";
    foreach ($konexioa->query($sql) as $row) {
       array_push($comen, $row["COMEN_INFO"]);
    }
    $reves= array_reverse($comen);
?>
    <nav>
            <a>hasiera</a>
            <a>perfil</a>
            <a>egileak</a>
        </nav>

        <h1><?php
            include_once "konexioa.php";
            $COD=1;
            $sql= "SELECT TITULO FROM informazioa WHERE COD=$IND";
            foreach ($konexioa->query($sql) as $row) {
                echo $row["TITULO"];
            }
        ?>
         </h1>
        <br><br>
        <div class="texto">
        <?php
            include_once "konexioa.php";
            $COD=1;
            $sql= "SELECT INFO_INFO FROM informazioa WHERE COD=$IND";
            foreach ($konexioa->query($sql) as $row) {
                echo "<p>" . $row["INFO_INFO"] . "<p>";
            }
        ?>
        
        </div>
        <br><br><br>
        <form method="POST" action="hasieraLog.php">
            <input type="submit" value="Atzera">
        </form>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
            <p>Sartu komentario bat:</p>
                <input required id="komentarioak" name="komentarioak" type="text" placeholder="Idatzi komentaroa...">
                <input type="submit" id="sortu" onClick="setTimeout(function(){location.reload();}, 100);" value="Sortu">
                <input type="hidden" value="<?php echo $IND?>" name="IND">
                <input type="hidden" value="<?php echo $LOG?>" name="LOG">
        <form>
       
            <h3>Komentarioak</h3>
        <?php
            for($i=0;$i<sizeof($reves);$i++){
                echo "<p class='comentariosContainer'>" . $reves[$i] . "<p><br/>";}
        ?>
        <?php
            if(!isset($_POST["komentarioak"]))exit();

            include_once "konexioa.php";
            $COMEN_INFO = $_POST["komentarioak"];

            $sentencia = $konexioa->prepare("INSERT INTO comentarios(INFO_COD, COMEN_INFO) VALUES (?, ?);");
            $resultado = $sentencia->execute([$IND, $COMEN_INFO]); # Pasar en el mismo orden de los ?
            
            	if($resultado === TRUE) ;
            	else echo "<p class='mensajeError'>ERROR EN EL COMENTARIIO. Algo salió mal. Por favor verifica que la tabla exista</p>";
        ?>

    </body>

</html>