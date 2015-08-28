<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Alex
 */
class Cliente {
    //put your code here
    private $idcliente;
    private $razonSocial;
    private $ruc;
    private $direccion;
    private $correo;
    private $telefono;
    private $representante;
    private $usuario;
    private $clave;
    private $estado;
    
    function __construct($idcliente, $razonSocial, $ruc, $direccion, $correo, $telefono, $representante, $usuario, $clave, $estado) {
        $this->idcliente = $idcliente;
        $this->razonSocial = $razonSocial;
        $this->ruc = $ruc;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->representante = $representante;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->estado = $estado;
    }
    public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function getRazonSocial() {
        return $this->razonSocial;
    }

    public function setRazonSocial($razonSocial) {
        $this->razonSocial = $razonSocial;
    }

    public function getRuc() {
        return $this->ruc;
    }

    public function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getRepresentante() {
        return $this->representante;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


    


}

?>
