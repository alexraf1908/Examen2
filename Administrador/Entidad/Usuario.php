<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Alex
 */
class Usuario {
    //put your code here
    
    private $idusuario;
    private $usuario;
    private $clave;
    private $estado;
    private $idpersona;
    
    function __construct($idusuario, $usuario, $clave, $estado, $idpersona) {
        $this->idusuario = $idusuario;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->estado = $estado;
        $this->idpersona = $idpersona;
    }

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
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

    public function getIdpersona() {
        return $this->idpersona;
    }

    public function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }


 
}

?>
