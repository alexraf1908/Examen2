<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factura
 *
 * @author Alex
 */
class Factura {
    //put your code here
     private $serie;
     private $nrofactura;
     private $fechaEmision;
     private $importeTotal;   
     private $impreso;
     private $igv;
     private $subtotaligv;
     private $estado;
         
     function __construct($serie, $nrofactura, $fechaEmision, $importeTotal, $impreso, $igv, $subtotaligv, $estado) {
         $this->serie = $serie;
         $this->nrofactura = $nrofactura;
         $this->fechaEmision = $fechaEmision;
         $this->importeTotal = $importeTotal;
         $this->impreso = $impreso;
         $this->igv = $igv;
         $this->subtotaligv = $subtotaligv;
         $this->estado = $estado;
     }

     public function getSerie() {
         return $this->serie;
     }

     public function setSerie($serie) {
         $this->serie = $serie;
     }

     public function getNrofactura() {
         return $this->nrofactura;
     }

     public function setNrofactura($nrofactura) {
         $this->nrofactura = $nrofactura;
     }

     public function getFechaEmision() {
         return $this->fechaEmision;
     }

     public function setFechaEmision($fechaEmision) {
         $this->fechaEmision = $fechaEmision;
     }

     public function getImporteTotal() {
         return $this->importeTotal;
     }

     public function setImporteTotal($importeTotal) {
         $this->importeTotal = $importeTotal;
     }

     public function getImpreso() {
         return $this->impreso;
     }

     public function setImpreso($impreso) {
         $this->impreso = $impreso;
     }

     public function getIgv() {
         return $this->igv;
     }

     public function setIgv($igv) {
         $this->igv = $igv;
     }

     public function getSubtotaligv() {
         return $this->subtotaligv;
     }

     public function setSubtotaligv($subtotaligv) {
         $this->subtotaligv = $subtotaligv;
     }

     public function getEstado() {
         return $this->estado;
     }

     public function setEstado($estado) {
         $this->estado = $estado;
     }

       
    
}

?>
