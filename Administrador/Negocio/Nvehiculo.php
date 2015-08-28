<?php
include_once 'ruta.php';

include_once ('Datos/VehiculoDAO.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nvehiculo
 *
 * @author Alex
 */
class Nvehiculo {
    //put your code here
    
  public $vehiculo;
  
  function __construct() {
      
      $this->vehiculo = new VehiculoDAO();
      
  }
  
  function listarVehiculo(){
      
      
      $array = $this->vehiculo->listarVehiculo();
      
      return $array;
      
  }

  function mostrarComboVehiculo(){
      
      
      $array = $this->vehiculo->mostrarCombo();
      
      return $array;
      
  }
  
  function actualizarEstado($idvehiculo, $estado){
      
      
       $this->vehiculo->actualizarEstado($idvehiculo, $estado);
       
      
  }
  
  function insertar($vehiculo){
      
      $this->vehiculo->insertar($vehiculo);
      
  }
  function actualizar($vehiculo){
      
      $this->vehiculo->actualiza($vehiculo);
      
  }
  
  function buscarVehiculo($idvehiculo){
      
      $vehiculo = $this->vehiculo->buscarVehiculo($idvehiculo);
      
      return $vehiculo;
      
  }
  
  function listarVehiculoMan(){
      
      $vehiculo = $this->vehiculo->listarVehiculoMan();
      
      return $vehiculo;
  }
  
  function eliminarVehiculo($idvehiculo){
      
      $this->vehiculo->eliminarVehiculo($idvehiculo);
  }
  
 function listarVehiculoSinAsignacion(){
      
      $vehiculo = $this->vehiculo->listarVehiculoSinAsignacion();
      
      return $vehiculo;
      
  }
  
}

?>
