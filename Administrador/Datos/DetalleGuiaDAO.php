<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoDAO
 *
 * @author Alex
 */
include_once("Conexion.php");


class DetalleGuiaDAO {
    //put your code here



     //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
   
      }
 
      public function insertar($detalle){ 
        
          $codguia =$detalle->getCodguia();
          $descri =$detalle->getDescripcion();
          $pesouni  =$detalle->getPesounitario();
          $cant =$detalle->getCantidad();
          $sub =$detalle->getSubpesototal();
         
     
//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("INSERT INTO detalleguia (descripcion, pesoUnitario, cantidad, subTotalPeso, idguia) VALUES ('$descri','$pesouni','$cant','$sub','$codguia')")or die('Error. '.mysql_error());  

            //$this->conexion->desconectar();
      }
      
            function listarDetalleGuia($idguia){ //un ejemplo de una consulta a la base de datos
            $consulta = $this->conexion->consultar("select * from detalleguia where idguia='$idguia'");  
             
            if($consulta == true){
  
                  while($row=$this->conexion->obtener_consulta()){
                                     
                        $arrayProducto[] = array("idproducto" => $row[0],"descripcion" => $row[1],"pesoUnitario" => $row[2],"cantidad" => $row[3],"subTotalPeso" =>$row[4],"idGuia" => $row[5]);
            
                     }
                     return $arrayProducto;
            }else{
                  echo "error consulta";
            }
            
           
            //$this->conexion->desconectar();
      }
      
      

      

    
}

?>
