<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pago
 *
 * @author Alex
 */
class Pago {
    //put your code here
    
     private $fecha;
     private $monto;
     private $estado;
      private $idfactura;
      
      function __construct($fecha, $monto, $estado, $idfactura) {
          $this->fecha = $fecha;
          $this->monto = $monto;
          $this->estado = $estado;
          $this->idfactura = $idfactura;
      }
      
      
      public function getFecha() {
          return $this->fecha;
      }

      public function setFecha($fecha) {
          $this->fecha = $fecha;
      }

      public function getMonto() {
          return $this->monto;
      }

      public function setMonto($monto) {
          $this->monto = $monto;
      }

      public function getEstado() {
          return $this->estado;
      }

      public function setEstado($estado) {
          $this->estado = $estado;
      }

      public function getIdfactura() {
          return $this->idfactura;
      }

      public function setIdfactura($idfactura) {
          $this->idfactura = $idfactura;
      }


   
    
}

?>
