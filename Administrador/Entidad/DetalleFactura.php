<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class DetalleFactura{
    
    private $codFactura;
    private $codGuia;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $subtotal;
    
    function __construct($codFactura, $codGuia, $descripcion, $cantidad, $precio, $subtotal) {
        $this->codFactura = $codFactura;
        $this->codGuia = $codGuia;
        $this->descripcion = $descripcion;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->subtotal = $subtotal;
    }

    public function getCodFactura() {
        return $this->codFactura;
    }

    public function setCodFactura($codFactura) {
        $this->codFactura = $codFactura;
    }

    public function getCodGuia() {
        return $this->codGuia;
    }

    public function setCodGuia($codGuia) {
        $this->codGuia = $codGuia;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }


}

?>
