<?php  
session_start(); 
	include_once("../../Datos/UsuarioDAO.php");
	//Recibo las variables provenientes de inde.php
	$user=$_POST["t1"];
	$clave=$_POST["t2"];	
        
        $login= new UsuarioDAO();

          $arrayLogin = $login->validaUsuario($user, $clave);
          
          if(isset($arrayLogin)){
              
              $_SESSION['usuario']=$arrayLogin[0]['usuario'];
              //$_SESSION['usuario']='SI';
             //echo $arrayLogin[0]['codigo'];
             
              header("LOCATION:../../Vista/bienvenido.php");
          }
          
          else {
		// Si no existe, llamo a la pagina index.php y le envio el codigo de error 1(usuario o Clave Incorrectos)
		header("LOCATION:../../../formLogin.php?iderror=1");
	}
             
?>