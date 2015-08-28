<?php
include_once("Conexion.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoPersonaDAO
 *
 * @author Alex
 */
class TipoPersonaDAO {
    //put your code here
    
      public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
      
      public function listar(){
          
        $this->conexion->consultar("select * from tipopersona");  
                      
       $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idtipo" => $row[0],"descri" => $row[1],"estado"=>$row[2]);
            
                   }
                 
            
                return $array;
}
      
}

?>
