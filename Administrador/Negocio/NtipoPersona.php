<?php

include_once 'ruta.php';
include_once ("Datos/TipoPersonaDAO.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NtipoPersona
 *
 * @author Alex
 */
class NtipoPersona {
    //put your code here
    
     public $tipoPersona;
  
  function __construct() {
      
      $this->tipoPersona = new TipoPersonaDAO();
      
  }
    
     public function listar(){
         
         $tipo = $this->tipoPersona->listar();
         
         return $tipo;
         
     }
}

?>
