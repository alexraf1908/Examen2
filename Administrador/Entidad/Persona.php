<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author Alex
 */
class Persona {
    //put your code here
    
private  $idpersona;
private $nombres;
private $apellidos;
private $direccion;
private $dni;
private $correo;
private $telefono;
private $brevete;
private $estado;
private $idtipoPersona;
  
function __construct($idpersona, $nombres, $apellidos, $direccion, $dni, $correo, $telefono, $brevete, $estado, $idtipoPersona) {
    $this->idpersona = $idpersona;
    $this->nombres = $nombres;
    $this->apellidos = $apellidos;
    $this->direccion = $direccion;
    $this->dni = $dni;
    $this->correo = $correo;
    $this->telefono = $telefono;
    $this->brevete = $brevete;
    $this->estado = $estado;
    $this->idtipoPersona = $idtipoPersona;
}

public function getIdpersona() {
    return $this->idpersona;
}

public function setIdpersona($idpersona) {
    $this->idpersona = $idpersona;
}

public function getNombres() {
    return $this->nombres;
}

public function setNombres($nombres) {
    $this->nombres = $nombres;
}

public function getApellidos() {
    return $this->apellidos;
}

public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
}

public function getDireccion() {
    return $this->direccion;
}

public function setDireccion($direccion) {
    $this->direccion = $direccion;
}

public function getDni() {
    return $this->dni;
}

public function setDni($dni) {
    $this->dni = $dni;
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

public function getBrevete() {
    return $this->brevete;
}

public function setBrevete($brevete) {
    $this->brevete = $brevete;
}

public function getEstado() {
    return $this->estado;
}

public function setEstado($estado) {
    $this->estado = $estado;
}

public function getIdtipoPersona() {
    return $this->idtipoPersona;
}

public function setIdtipoPersona($idtipoPersona) {
    $this->idtipoPersona = $idtipoPersona;
}


    
}

?>
