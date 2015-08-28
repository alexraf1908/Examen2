<?php

include_once 'ruta.php';

include_once ('Datos/DispositivoDAO.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nvehiculo
 *
 * @author Alex
 */
class Ndispositivo {
    //put your code here
    
  public $dispositivo;
  
  function __construct() {
      
      $this->dispositivo = new DispositivoDAO();
      
  }
  
  function listarDispositivo(){
      
    $dispositivo = $this->dispositivo->listarDispositivo();
      
      return $dispositivo;
      
  }
  
  function insertarDispositivo($dispositivo){
      
  $this->dispositivo->insertarDispositivo($dispositivo);
  
  }
  
  function actualizarDispositivo($dispositivo){
      
  $this->dispositivo->actualizaDispositivo($dispositivo);
  
  }
  
  function eliminarDispositivo($imei){
      
      $this->dispositivo->eliminarDispositivo($imei);
      
  }
  
  function buscarDispositivo($imei){
      
      $dispositivo = $this->dispositivo->buscarDispositivo($imei);
      
      return $dispositivo;
      
  }
  
   function QuitarAsignacion($imei){
       
       
       $this->dispositivo->QuitarAsignacion($imei);
              
   }
  function AsignarVehiculo($imei,$idvehiculo){
      
      $this->dispositivo->AsignarVehiculo($imei, $idvehiculo);
      
  }
}
  
?>
