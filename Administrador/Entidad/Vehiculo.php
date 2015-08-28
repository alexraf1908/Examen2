<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehiculo
 *
 * @author Alex
 */
class Vehiculo {
    //put your code here
    
    private $idvehiculo;
    private $descripcion;
    private $placa;
    private $limitepeso;
    private $estado;
    
    function __construct($idvehiculo, $descripcion, $placa, $limitepeso, $estado) {
        $this->idvehiculo = $idvehiculo;
        $this->descripcion = $descripcion;
        $this->placa = $placa;
        $this->limitepeso = $limitepeso;
        $this->estado = $estado;
    }

    public function getIdvehiculo() {
        return $this->idvehiculo;
    }

    public function setIdvehiculo($idvehiculo) {
        $this->idvehiculo = $idvehiculo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function getLimitepeso() {
        return $this->limitepeso;
    }

    public function setLimitepeso($limitepeso) {
        $this->limitepeso = $limitepeso;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


    
    
}

?>
