<?php
include_once 'ruta.php';

include_once ('Datos/SalidaDAO.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nsalida
 *
 * @author Alex
 */
class Nsalida{
    //put your code here
    
    public $salida;
            
    function __construct() {
        
        $this->salida = new SalidaDAO();
        
        
    }
    
    function insertar($idguia){
        
        $this->salida->insertarr($idguia);
        
    }
    
    function listar(){
        
        $salida=$this->salida->listar();
        return $salida;
        
    }
}
?>
