<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GuiaRemision
 *
 * @author Alex
 */
class GuiaRemision {
    //put your code here
    
  private $serie;
  private $numeroguia;
  private $fechaemision;
  private $fechatraslado;
  private $puntopartida;
  private $puntollegada;
  private $pesototal;
  private $impreso;
  private $estado;
  private $codcliente;
  private $codvehiculo;
  private $codpersona;
  private $destinatario;
  
  function GuiaRemision(){
      
  }
  
                  
                  function __construct($serie, $numeroguia, $fechaemision, $fechatraslado, $puntopartida, $puntollegada, $pesototal, $impreso, $estado, $codcliente, $codvehiculo, $codpersona, $destinatario) {
                      $this->serie = $serie;
                      $this->numeroguia = $numeroguia;
                      $this->fechaemision = $fechaemision;
                      $this->fechatraslado = $fechatraslado;
                      $this->puntopartida = $puntopartida;
                      $this->puntollegada = $puntollegada;
                      $this->pesototal = $pesototal;
                      $this->impreso = $impreso;
                      $this->estado = $estado;
                      $this->codcliente = $codcliente;
                      $this->codvehiculo = $codvehiculo;
                      $this->codpersona = $codpersona;
                      $this->destinatario = $destinatario;
                  }
                  public function getSerie() {
                      return $this->serie;
                  }

                  public function setSerie($serie) {
                      $this->serie = $serie;
                      
                  }

                  public function getNumeroguia() {
                      return $this->numeroguia;
                  }

                  public function setNumeroguia($numeroguia) {
                      $this->numeroguia = $numeroguia;
                     
                  }

                  public function getFechaemision() {
                      return $this->fechaemision;
                  }

                  public function setFechaemision($fechaemision) {
                      $this->fechaemision = $fechaemision;
                      
                  }

                  public function getFechatraslado() {
                      return $this->fechatraslado;
                  }

                  public function setFechatraslado($fechatraslado) {
                      $this->fechatraslado = $fechatraslado;
                      
                  }

                  public function getPuntopartida() {
                      return $this->puntopartida;
                  }

                  public function setPuntopartida($puntopartida) {
                      $this->puntopartida = $puntopartida;
                   
                  }

                  public function getPuntollegada() {
                      return $this->puntollegada;
                  }

                  public function setPuntollegada($puntollegada) {
                      $this->puntollegada = $puntollegada;
                      
                  }

                  public function getPesototal() {
                      return $this->pesototal;
                  }

                  public function setPesototal($pesototal) {
                      $this->pesototal = $pesototal;
                     
                  }

                  public function getImpreso() {
                      return $this->impreso;
                  }

                  public function setImpreso($impreso) {
                      $this->impreso = $impreso;
                     
                  }

                  public function getEstado() {
                      return $this->estado;
                  }

                  public function setEstado($estado) {
                      $this->estado = $estado;
                      
                  }

                  public function getCodcliente() {
                      return $this->codcliente;
                  }

                  public function setCodcliente($codcliente) {
                      $this->codcliente = $codcliente;
                      ;
                  }

                  public function getCodvehiculo() {
                      return $this->codvehiculo;
                  }

                  public function setCodvehiculo($codvehiculo) {
                      $this->codvehiculo = $codvehiculo;
                     
                  }

                  public function getCodpersona() {
                      return $this->codpersona;
                  }

                  public function setCodpersona($codpersona) {
                      $this->codpersona = $codpersona;
                      
                  }

                  public function getDestinatario() {
                      return $this->destinatario;
                  }

                  public function setDestinatario($destinatario) {
                      $this->destinatario = $destinatario;
                     
                  }



}

?>
