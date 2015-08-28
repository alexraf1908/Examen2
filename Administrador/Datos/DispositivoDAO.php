
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
class DispositivoDAO {
    //put your code here
    
       public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
      
      
            function listarDispositivo(){ //un ejemplo de una consulta a la base de datos
           
           $this->conexion->consultar("select * from dispositivo");  

            
                $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("imei" => $row[0],"descri" => $row[1],"estado"=>$row[2],"idvehiculo"=>$row[3]);
            
                     }
                     return $array;
         
      }
       
       public function insertarDispositivo($dispositivo){ 
           
          $imei = $dispositivo->getImei();
          $descri= $dispositivo->getDescripcion();
          $estad = trim($dispositivo->getEstado());
          $idvehi = $dispositivo->getIdvehiculo();

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("INSERT INTO dispositivo (imei, descripcion,estado,idvehiculo) VALUES ('$imei', '$descri','$estad', '$idvehi')")or die('Error. '.mysql_error());  
                    
            //$this->conexion->desconectar();
      }
      
      public function actualizaDispositivo($dispositivo){ 
          
       $imei = $dispositivo->getImei();
          $descri= $dispositivo->getDescripcion();
          $estado = $dispositivo->getEstado();
          $idvehi = $dispositivo->getIdvehiculo();

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("UPDATE `transporte`.`dispositivo` SET `imei`='$imei', `descripcion`='$descri', `estado`='$estado' WHERE `imei`='$imei';")or die('Error. '.mysql_error());  
                  
           
            //$this->conexion->desconectar();
      }
      
      
            function buscarDispositivo($imei){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("SELECT * from dispositivo where imei='$imei'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
               $vehiculo=array();
               
                  while($row=$this->conexion->obtener_consulta()){
                      
                    $vehiculo[] = array("imei" => $row[0],"descri" => $row[1],"estado"=>$row[2],
                        "codvehiculo"=>$row[3]);

                  }
           
                  
                  return $vehiculo;
                   
           // $this->conexion->desconectar();
      }
      
      
      function eliminarDispositivo($imei){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("delete from dispositivo where imei='$imei'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                             
           // $this->conexion->desconectar();
                 }
     
                 function QuitarAsignacion($imei){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("UPDATE `transporte`.`dispositivo` SET `idvehiculo`='0' WHERE `imei`= $imei;");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                             
           // $this->conexion->desconectar();
                 }
                 
                 function AsignarVehiculo($imei,$idvehiculo){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("UPDATE `transporte`.`dispositivo` SET `idvehiculo`='$idvehiculo' WHERE `imei`= $imei;");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                             
           // $this->conexion->desconectar();
                 }
}

?>
