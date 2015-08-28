<?php
include_once 'ruta.php';

include_once ("Datos/DetalleGuiaDAO.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NdetalleGuia
 *
 * @author Alex
 */
class NdetalleGuia {
    //put your code here
    
    public $objetoDetalleGuia;
    
    function __construct() {
        $this->objetoDetalleGuia = new DetalleGuiaDAO();
    }

    function insertar($detalleGuia){
     
        $this->objetoDetalleGuia->insertar($detalleGuia);
        
        
    }
    
    function listarDetalle($idguia){
     
       $detalleGuia = $this->objetoDetalleGuia->listarDetalleGuia($idguia);
       
       return $detalleGuia;
 
    }
    
    
    
}

?>
