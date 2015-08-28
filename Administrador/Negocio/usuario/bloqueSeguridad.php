<?php
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if (!isset($_SESSION["usuario"])) {
//si no existe, va a la página de autenticacion
 
header("LOCATION:../../formLogin.php?iderror=2");

//salimos de este script
exit();
}

?>