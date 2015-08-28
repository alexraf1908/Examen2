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
class LocalizacionDAO {
    //put your code here
    
       public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
      
       public function insertarLocalizacion($imei,$latitud,$longitud,$fecha,$precision,$direccion,$proveedor){ 
        


//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into localizacion (imei,latitud,longitud,fecha,precisionn,direccion,proveedor) values ('$imei','$latitud','$longitud','$fecha','$precision','$direccion','$proveedor')");  
                  
           
            //$this->conexion->desconectar();
      }
      
       public function consultaLocalizacion($idVehiculo){ 
        
//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("select v.idvehiculo,v.descripcion,l.imei,l.latitud,l.longitud,l.fecha,l.precisionn,l.direccion,d.descripcion,l.proveedor
 from localizacion l, dispositivo d,vehiculo v where d.imei = l.imei and v.idvehiculo=d.idvehiculo and v.idvehiculo='$idVehiculo' order by l.idlocalizacion desc limit 1")or die('Error. '.mysql_error()); 
                  
           $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idVehi" => $row[0],"descri" => $row[1],"imei"=>$row[2],"latitud"=>$row[3],"longitud"=>$row[4]
                    
                    ,"fecha"=>$row[5],"presicionn"=>$row[6],"direccion"=>$row[7],"dispo"=>$row[8],"provee"=>$row[9]);
            
                   }
                   
            
                return $array;
            //$this->conexion->desconectar();
      }
      
      public function listaLocalizacion($placa,$fechaini,$fechafin){ 
        
//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("select v.idvehiculo,v.descripcion,l.imei,l.latitud,l.longitud,l.fecha,l.precisionn,l.direccion,d.descripcion,l.proveedor
 from localizacion l, dispositivo d,vehiculo v where l.fecha between '$fechaini' and '$fechafin' and d.imei = l.imei 
 and v.idvehiculo=d.idvehiculo and v.placa='$placa'")or die('Error. '.mysql_error()); 
                  
           $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idVehi" => $row[0],"descri" => $row[1],"imei"=>$row[2],"latitud"=>$row[3],"longitud"=>$row[4]
                    
                    ,"fecha"=>$row[5],"presicionn"=>$row[6],"direccion"=>$row[7],"dispo"=>$row[8],"provee"=>$row[9]);
            
                   }
                   
            
                return $array;
            //$this->conexion->desconectar();
      }
      //2015-02-18
      
      //2-18-5--20
      
      function cambioFormatoFecha($cambio){ 
        $ano=substr($cambio, 0, 4); 
        $mes=substr($cambio, 5, 2); 
        $dia=substr($cambio, 8, 2); 
        $resul = ($dia."-".$mes."-".$ano); 
        return $resul; 
        //return $dia;
    }
      
      
}



?>
