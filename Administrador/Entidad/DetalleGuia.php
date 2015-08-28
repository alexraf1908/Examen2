<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Alex
 */
class DetalleGuia {
    //put your code here
    private $codguia;
     private $descripcion;
      private $pesounitario;
       private $cantidad;
        private $subpesototal;
         
        function __construct($codguia, $descripcion, $pesounitario, $cantidad, $subpesototal) {
            $this->codguia = $codguia;
            $this->descripcion = $descripcion;
            $this->pesounitario = $pesounitario;
            $this->cantidad = $cantidad;
            $this->subpesototal = $subpesototal;
        }

        public function getCodguia() {
            return $this->codguia;
        }

        public function setCodguia($codguia) {
            $this->codguia = $codguia;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getPesounitario() {
            return $this->pesounitario;
        }

        public function setPesounitario($pesounitario) {
            $this->pesounitario = $pesounitario;
        }

        public function getCantidad() {
            return $this->cantidad;
        }

        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }

        public function getSubpesototal() {
            return $this->subpesototal;
        }

        public function setSubpesototal($subpesototal) {
            $this->subpesototal = $subpesototal;
        }


    
}

?>
