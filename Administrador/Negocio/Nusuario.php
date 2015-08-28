<?php
include_once 'ruta.php';

include_once ("Datos/UsuarioDAO.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nusuario
 *
 * @author Alex
 */
class Nusuario {
    //put your code here
    
      public $usuario;
  
  function __construct() {
      
      $this->usuario = new UsuarioDAO();
      
  }
    
    public function inserta($usuario){
        
        $this->usuario->inserta($usuario);
        
        
    }
    
     function verificaUsuario($idpersona){
         
         $usuario = $this->usuario->verificaUsuario($idpersona);
         return $usuario;
     }
     
       function listarUsuario(){
           
      $usuario = $this->usuario->listarUsuario();
         return $usuario;
}

         public function actualiza($usuario){
             
             $this->usuario->actualiza($usuario);  
             
             
         }
         
          function eliminarUsuario($idusuario){ 
              
              
              $this->usuario->eliminarUsuario($idusuario);
          }
          
          function usuarioPerfil($usuario){ 
              
             $usuario = $this->usuario->usuarioPerfil($usuario);
         return $usuario; 
              
              
              
          }
          
         

}
?>
