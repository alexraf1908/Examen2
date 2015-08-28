<?php
include_once 'ruta.php';

include_once ("Datos/ClienteDAO.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ncliente
 *
 * @author Alex
 */



class Ncliente {
    //put your code here
    
    public $cliente;
    
    function __construct() {
        
        $this->cliente = new ClienteDAO();
        
    }

    
    function buscarCliente($idcliente){
        
        $cliente=$this->cliente->buscarCliente($idcliente);
        
        
        return $cliente;
        
    }
    
    function mostrarCombo(){
        
        $cliente=$this->cliente->mostrarCombo();
        
        
        return $cliente;
        
    }
    
function insertar($cliente){
    
    
    $this->cliente->insertar($cliente);
    
}

function listarCliente(){
        
        $cliente=$this->cliente->listarCliente();
        
        
        return $cliente;
        
    }
    
    function clienteSinMovimiento($idcliente){
        
        $cliente=$this->cliente->clienteSinMovimiento($idcliente);
        
        
        return $cliente;
        
    }
    
    function eliminar($idcliente){
    
    
    $this->cliente->eliminarCliente($idcliente);
    
}

function actualizar($cliente){
    
    
    $this->cliente->actualiza($cliente);
    
}

function login($usuario, $clave){
    
    
    $cliente=$this->cliente->login($usuario, $clave);
    
    return $cliente;
    
}
}


?>
