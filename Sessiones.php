

<?php
    session_start();
    $_SESSION['LOG'] = FALSE;
   if(isset($_POST["cod"])){
    $_SESSION['LOG']=TRUE;
    $_SESSION['ID'] = $_POST["cod"];
    echo "log enttador";
        }
    if(isset($_POST["IND"])){
        echo "hola";
        $_SESSION['index'] = $_POST["IND"];

    }
if(!isset($_POST["CORR"])||!isset($_POST["CONT"])){}else{
    $CORR = $_POST["CORR"];
    $CONT = $_POST["CONT"];
        $sql = "SELECT * FROM usuarios WHERE CORR='$CORR' AND CONT='$CONT'";    
foreach ($konexioa->query($sql) as $row) {
$_SESSION['LOG'] = TRUE;
$_SESSION['USU'] = $row["NOMB"];
$_SESSION['ID'] =$row["COD"];
$VARI ="";
}
}
if($_SESSION['LOG']==TRUE){
    $sql = "SELECT * FROM usuarios WHERE COD='$_SESSION[ID]'";  
    foreach ($konexioa->query($sql) as $row) {
        $VARI="";
    $_SESSION['USU'] = $row["NOMB"];
    }
}
?>
