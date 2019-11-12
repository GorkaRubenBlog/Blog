<?php
echo "hola";
if(isset($_GET["pag"])){
    if($_GET!=0){
    $pag=$_GET["pag"];
     }
    }
// remove all session variables
session_start(); 

session_unset();

// destroy the session
session_destroy();

header("Location: $pag");
exit;

?>