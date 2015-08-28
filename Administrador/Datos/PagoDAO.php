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
class PagoDAO {
    //put your code here
    public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
 
      public function insertarr($pago){ 
   
      
      $fecha = $pago->getFecha();
      $monto = $pago->getMonto();
      $estado = $pago->getEstado();
      $idfactura = $pago->getIdfactura();
//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into pago (fecha,monto,estado,idfactura) values ('$fecha','$monto','$estado','$idfactura')") or die('Error. '.mysql_error());  
         
          
            //$this->conexion->desconectar();
      }
      
      public function listar($fechaini,$fechafin){
          
        $this->conexion->consultar("select p.idPago,p.fecha,f.serie,f.nrofactura,p.monto from pago p,factura f where p.idfactura=f.idfactura and p.fecha between '$fechaini' AND '$fechafin' ");  
                      
       $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idpago" => $row[0],"fecha"=>$row[1],"serie"=>$row[2],"nro"=>$row[3]
                    
                    ,"monto"=>$row[4]);
            
                   }
                   
            
                return $array;
}


}