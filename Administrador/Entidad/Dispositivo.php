<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dispositivo
 *
 * @author Alex
 */
class Dispositivo {
    //put your code here
    
    private $imei;
    private $descripcion;
    private $estado;
    private $idvehiculo;
    
    function __construct($imei, $descripcion, $estado, $idvehiculo) {
        $this->imei = $imei;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->idvehiculo = $idvehiculo;
    }
    
    public function getImei() {
        return $this->imei;
    }

    public function setImei($imei) {
        $this->imei = $imei;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getIdvehiculo() {
        return $this->idvehiculo;
    }

    public function setIdvehiculo($idvehiculo) {
        $this->idvehiculo = $idvehiculo;
    }



}

?>
