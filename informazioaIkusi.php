<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Blog Registro</title>
        <link rel='stylesheet' href='Blog.css' type='text/css'>
        <script src="LogForm.js"></script>
        <script src="gertaerak.js"></script>


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
                          $IND=$_SESSION["index"];

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
                <input type="hidden" value="<?php echo $IND?>" name="IND">

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

         <a class="navbar-brand" href="crearNoticia.php?Session=<?php if(isset($_SESSION['ID'])){
                   echo $_SESSION['ID'];
                }else{
                       echo 0 ;}?>">albiste zortu</a>
               <a class="navbar-brand"  href="hasieraLog.php?Session=<?php if(isset($_SESSION['ID'])){
                   echo $_SESSION['ID'];
                }else{
                       echo 0 ;}?>">albiste zortu</a>

               <?php if(isset($_SESSION['ADM'])){
                   if($_SESSION['ADM']=1){
                   ?>
               <a class="navbar-brand" href="eliminarComentario.php?Session=<?php echo $_SESSION['ID']?>" value>Iruzkin ezabatu</a>
               <a class="navbar-brand" href="eliminarNoticia.php?Session=<?php echo $_SESSION['ID']?>">Albistea ezabatu</a>
               <a class="navbar-brand" href="eliminarUsuario.php?Session=<?php echo $_SESSION['ID']?>">Erabiltzailea ezabatu</a>
               <a class="navbar-brand" href="modificaUsuario.php?Session=<?php echo $_SESSION['ID']?>">Erabiltzailea aldatu</a>
               <a class="navbar-brand" href="eliminarComentario.php?Session=<?php echo $_SESSION['ID']?>">Komentarioa Ezabatu</a>

                <?php  } 
            }?>
         </nav>
        </div>

    <?php
    $comen=array();
    include_once "konexioa.php";
    $sql= "SELECT COMEN_INFO FROM comentarios WHERE INFO_COD=$IND";
    foreach ($konexioa->query($sql) as $row) {
       array_push($comen, $row["COMEN_INFO"]);
    }
    $reves= array_reverse($comen);
?>

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
                <input type="submit" id="sortu" onclick="setTimeout(function(){location.reload();}, 100);" value="Sortu">
                <input type="hidden" value="<?php echo $IND?>" name="IND">
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