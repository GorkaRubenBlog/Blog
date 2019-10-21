<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COD, NOMB FROM usuarios";
$result = $conn->query($sql);
echo mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row =  $result->fetch_assoc()) {
        echo "bai";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>

<?php

    //header("Location: ../index.html");
    
    #Salir si alguno de los datos no está presente
    if(!isset($_POST["nombre"]) || !isset($_POST["apellido"])|| !isset($_POST["usuario"])|| !isset($_POST["correo"])|| !isset($_POST["contraseña"])) exit();

    #Si todo va bien, se ejecuta esta parte del código...
    include_once "../BD/conexionBD.php";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nombre_usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $pss = $_POST["contraseña"];
    $pss2 = $_POST["contraseña_confirm"];
  

    // COMPROBACIONES DB
    if($pss == $pss2){
        $exist = comprobarUsuario();

        if($exist == false){
            $insert = insertarUsuario();

            
        }

       
    
    } else{
        echo "<h3>Las contraseñas no coinciden</h3>";
    }

    function comprobarUsuario(){
        $sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz='$nombre_usuario'";
        foreach ($conexionBD->query($sql) as $row) {
            echo "<h3>Nombre de usuario -- $nombre_usuario -- ya existe</h3>";
            return true;
        }
        return false;
    }

    function comprobarUsuario(){
        $passHash = password_hash($pss, PASSWORD_DEFAULT);
        $sentencia = $conexionBD-> prepare("INSERT INTO erabiltzailea(izena, abizena, erabiltzaile_iz, email, pasahitza) VALUES (?, ?, ?, ?, ?);");
        $resultado = $sentencia-> execute([$nombre, $apellido, $nombre_usuario, $correo, $passHash]); 
        
        if($resultado == true){
            echo "<h3>Usuario insertado correctamente</h3>";
        } else{
            echo "<h3>ERROR AL INSERTAR</h3>";
        }     
    }
   
?>
