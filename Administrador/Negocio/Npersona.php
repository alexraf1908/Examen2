<?php
include_once 'ruta.php';

include_once ('Datos/PersonaDAO.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nvehiculo
 *
 * @author Alex
 */
class Npersona {
    //put your code here
    
  public $persona;
  
  function __construct() {
      
      $this->persona = new PersonaDAO();
      
  }
  
  function mostrarComboPersonaChofer(){
      
      
      $array = $this->persona->mostrarCombo();
      
      return $array;
      
  }
  
    function actualizarEstado($idpersona, $estado){
      
      
       $this->persona->actualizarEstado($idpersona, $estado);
      
      
      
  }
  
  public function insertar($persona){ 
      
      
      $this->persona->insertar($persona);
  }
  
    public function actualizar($persona){ 
      
      
      $this->persona->actualizar($persona);
  }
  
  
  function listarPersonal(){
            
      $persona =  $this->persona->listarPersonal();
      
      return $persona;
      
  }
  
  function buscarPersonal($idpersonal){
      
     $persona =  $this->persona->buscarPersonal($idpersonal);
      
      return $persona; 
      
  }
  
  function eliminarPersonal($idpersonal){
  
      $this->persona->eliminarPersonal($idpersonal);
      
  }
  
  function listarPersonalSinAcceso(){
      
      $persona =  $this->persona->listarPersonalSinAcceso();
      
      return $persona; 
      
  }

}

?>