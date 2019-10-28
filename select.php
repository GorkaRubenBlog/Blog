<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["NOMB"])) exit();
#Si todo va bien, se ejecuta esta parte del código...
include_once "konexioa.php";
$NOMB = $_POST["NOMB"];
;

$sql = "SELECT * FROM usuarios WHERE NOMB='$NOMB'";
echo "nopeppee";
foreach ($konexioa->query($sql) as $row) {
	echo "<h3>Nombre de usuario -- $NOMB -- ya existe</h3>";
	return true;
}
echo "NOPE";
return false;

?>
