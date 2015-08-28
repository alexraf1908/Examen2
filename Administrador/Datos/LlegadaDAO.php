<?php
include_once("Conexion.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacturaDAO
 *
 * @author Alex
 */
class LlegadaDAO {
    //put your code here
    public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
 
      public function insertarr($idguia){ 
     


//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into llegada (fecha,estado,idguia) values (now(),'1','$idguia')") or die('Error. '.mysql_error());  
         
          
            //$this->conexion->desconectar();
      }
      
      public function listar(){
          
        $this->conexion->consultar("select g.idguia,CONCAT(serie,' -- ',nroGuia) nro,ll.fecha,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,' ',p.apellidos) nombres,concat(v.descripcion,' Placa/',v.placa) vehiculo from guia_remision g
,cliente c,persona p, vehiculo v,llegada ll where g.idcliente=c.idcliente and p.idpersona=p.idpersona and v.idvehiculo = g.idvehiculo and ll.idguia=g.idguia group by g.idguia");  
                      
       $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idguia" => $row[0],"nro" => $row[1],"fechaSalida"=>$row[2],"razonSocial"=>$row[3],"ppartida"=>$row[4]
                    
                    ,"razonSocial"=>$row[5],"pLlegada"=>$row[6],"nombres"=>$row[7],"vehiculo"=>$row[8]);
            
                   }
                   
            
                return $array;
}
}