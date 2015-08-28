<?php
include_once("Conexion.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehiculo
 *
 * @author Alex
 */
class VehiculoDAO {
    //put your code here
    
       public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
      
       function mostrarCombo(){ //un ejemplo de una consulta a la base de datos
           
          $consulta = $this->conexion->consultar("select idvehiculo,concat(descripcion,' Placa:',placa) from vehiculo where estado='0'");  
                     
          if($consulta == true){
            
                
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $arraycombo[] = array("codigo" => $row[0],"nombre"=>$row[1]);
            
                     }
                     return $arraycombo;
            }else{
                  echo "error consulta";
            }
      }
      
       public function insertarLocalizacion($imei,$latitud,$longitud,$fecha,$precision,$direccion,$proveedor){ 
        


//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into localizacion (imei,latitud,longitud,fecha,precisionn,direccion,proveedor) values ('$imei','$latitud','$longitud','$fecha','$precision','$direccion','$proveedor')");  
                  
           
            //$this->conexion->desconectar();
      }
      
      
      function listarVehiculo(){ //un ejemplo de una consulta a la base de datos
           
           $this->conexion->consultar("select v.idvehiculo,v.descripcion,v.placa,d.imei,d.descripcion FROM vehiculo v,dispositivo d where v.idvehiculo=d.idvehiculo");  

            
                $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("codVehi" => $row[0],"descri" => $row[1],"placa"=>$row[2],"imei"=>$row[3],"dispo"=>$row[4]);
            
                     }
                     return $array;
           
      }
      
      public function actualizarEstado($idvehiculo,$estado){ 

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("UPDATE vehiculo SET estado='$estado' WHERE idvehiculo ='$idvehiculo'");  
                           
            //$this->conexion->desconectar();
      }
      
      
       public function insertar($vehiculo){ 
               
          $descri = $vehiculo->getDescripcion();
          $placa= $vehiculo->getPlaca();
          $limite = $vehiculo->getLimitepeso();
          $estado = $vehiculo->getEstado();
         

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into vehiculo (descripcion,placa,limitepeso,estado) values ('$descri','$placa','$limite','$estado')")or die('Error. '.mysql_error());  
                  
           
            //$this->conexion->desconectar();
      }
      
      public function actualiza($vehiculo){ 
          
          $idvehi = $vehiculo->getIdvehiculo();
          $descri = $vehiculo->getDescripcion();
          $placa= $vehiculo->getPlaca();
          $limite = $vehiculo->getLimitepeso();
          $estado = $vehiculo->getEstado();;

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("UPDATE `transporte`.`vehiculo` SET `descripcion`='$descri', `placa`='$placa', `limitepeso`='$limite', `estado`='$estado'
 WHERE idvehiculo ='$idvehi'")or die('Error. '.mysql_error());  
                  
           
            //$this->conexion->desconectar();
      }
      
      
            function buscarVehiculo($idvehiculo){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("SELECT * from vehiculo where idvehiculo='$idvehiculo'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
               $vehiculo=array();
               
                  while($row=$this->conexion->obtener_consulta()){
                      
                    $vehiculo[] = array("idvehi" => $row[0],"descri" => $row[1],"placa"=>$row[2],
                        "limitepeso"=>$row[3],"estado"=>$row[4]);

                  }
           
                  
                  return $vehiculo;
                   
           // $this->conexion->desconectar();
      }
      
      function listarVehiculoMan(){ //un ejemplo de una consulta a la base de datos
           
           $this->conexion->consultar("select * from vehiculo");  

            
                $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("idvehi" => $row[0],"descri" => $row[1],"placa"=>$row[2],"limitepeso"=>$row[3],"estado"=>$row[4]);
            
                     }
                     return $array;
           
      }
      
      function eliminarVehiculo($idvehiculo){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("delete from vehiculo where idvehiculo='$idvehiculo'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                             
           // $this->conexion->desconectar();
                 }
      
function listarVehiculoSinAsignacion(){ //un ejemplo de una consulta a la base de datos
           
           $this->conexion->consultar("SELECT * from vehiculo v where idvehiculo not in (select idvehiculo from dispositivo)");  

            
                $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("idvehi" => $row[0],"descri" => $row[1],"placa"=>$row[2],"limitepeso"=>$row[3],"estado"=>$row[4]);
            
                     }
                     return $array;
           
      }
}

?>
