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
class FacturaDAO {
    //put your code here
    public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
 
      public function insertar($fac){ 
     
          $serie    =$fac->getSerie();
          $nro      =$fac->getNrofactura();
          $fecha    =$fac->getFechaEmision();
          $total    =$fac->getImporteTotal();
          $impreso  =$fac->getImpreso();
          $igv      =$fac->getIgv();
          $subtotal =$fac->getSubtotaligv();
          $estado   =$fac->getEstado();

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into factura (serie,nrofactura,fechaEmision,importeTotal,impreso,igv,subtotaligv,estado) VALUES ('$serie','$nro','$fecha','$total','$impreso','$igv','$subtotal','$estado')") or die('Error. '.mysql_error());  
         
          
            //$this->conexion->desconectar();
      }
 
      
            public function ultimaFactura(){
          
        $consulta = $this->conexion->consultar("SELECT MAX(f.idfactura) AS id FROM factura f");  
                      
            
            if($consulta == true){
        
                 $row=$this->conexion->obtener_consulta();
                      
                        RETURN trim($row[0]);
                   
            }  
            }
            
            public function listarFactura(){
          
        $this->conexion->consultar("select distinct f.idfactura,concat(f.serie,' -- ',f.nroFactura) nro,c.razonSocial,c.ruc,f.fechaEmision,f.importeTotal,f.impreso,f.igv,f.subtotaligv,f.estado 
from factura f,detalle_factura df,guia_remision g, cliente c where f.estado ='PENDIENTE' and f.idfactura=df.idfactura and
df.idguia=g.idguia  and g.idcliente=c.idcliente");  
                      
            
        $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idfactura" => $row[0],"nro"=>$row[1],"razon"=>$row[2],"ruc"=>$row[3],"fecha"=>$row[4],"importe"=>$row[5]
                    
                    ,"impreso"=>$row[6],"igv"=>$row[7],"subTotalIgv"=>$row[8],"estado"=>$row[9]); }
                   
            
                return $array;
            
      
            }
            
            public function listarXFechas($fecha1,$fecha2){
          
        $this->conexion->consultar("select distinct f.idfactura,concat(f.serie,' -- ',f.nroFactura) nro,c.razonSocial,c.ruc,f.fechaEmision,f.importeTotal,f.impreso,f.igv,f.subtotaligv,f.estado 
from factura f,detalle_factura df,guia_remision g, cliente c where f.estado ='PENDIENTE' and f.idfactura=df.idfactura and
df.idguia=g.idguia  and g.idcliente=c.idcliente and f.fechaEmision BETWEEN '$fecha1' AND '$fecha2'");  
                      
            
        $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idfactura" => $row[0],"nro"=>$row[1],"razon"=>$row[2],"ruc"=>$row[3],"fecha"=>$row[4],"importe"=>$row[5]
                    
                    ,"impreso"=>$row[6],"igv"=>$row[7],"subTotalIgv"=>$row[8],"estado"=>$row[9]); }
                   
            
                return $array;
            
      
            }
            
              public function actualizarEstado($idfactura,$estado){ 

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("UPDATE factura SET estado='$estado' WHERE idfactura ='$idfactura'");  
                           
            //$this->conexion->desconectar();
      }

    
}

?>
