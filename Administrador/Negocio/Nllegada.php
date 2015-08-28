<?php
include_once 'ruta.php';

include_once ('Datos/LlegadaDAO.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nsalida
 *
 * @author Alex
 */
class Nllegada{
    //put your code here
    
    public $llegada;
            
    function __construct() {
        
        $this->llegada = new LlegadaDAO();
        
        
    }
    
    function insertar($idguia){
        
        $this->llegada->insertarr($idguia);
        
    }
    
    function listar(){
        
        $salida=$this->llegada->listar();
        return $salida;
        
    }
}
?>