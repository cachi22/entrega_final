<?php
$usuario = $_POST ["user"];
$contrasenia =  $_POST["pass"]; 


$ckuser = "admin";
$ckpass = "123456";

if ($usuario == $ckuser && $contrasenia == $ckpass) {
   header("location: index.html"); //echo  "<h1>Acceso Correcto</h1>";
} else{
   header ("location: ERROR.html"); //echo   "<h1>Usuario o Contraseña incorrecta</h1>";
}



?>