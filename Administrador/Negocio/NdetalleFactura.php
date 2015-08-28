<?php
include_once 'ruta.php';

include_once ("Datos/DetalleFacturaDAO.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NdetalleFactura
 *
 * @author Alex
 */
class NdetalleFactura {
    //put your code here
    public $detalleFact;
            
    function __construct() {
        
        $this->detalleFact = new DetalleFacturaDAO();
        
    }

    function insertar($detalleFactura){
        
        $this->detalleFact->insertar($detalleFactura);
        
    }
    
    function lista(){
        
        $detalleFac= $this->detalleFact->lista();
        
        return $detalleFac;
    }
    
     function listaDetalleMoviXCliente(){
         $detalleFac= $this->detalleFact->listaDetalleMoviXCliente();
        
        return $detalleFac;
         
     }
}

?>
