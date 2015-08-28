<?php

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];


include_once '../../Negocio/Ncliente.php';
   
$cliente= new Ncliente();
        $clie=$cliente->login($usuario,$clave);
    //echo $usuario;
    
        
echo json_encode($clie);
        
        ?>
