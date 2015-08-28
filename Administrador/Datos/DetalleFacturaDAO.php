<?php
include_once("Conexion.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleFactura
 *
 * @author Alex
 */
class DetalleFacturaDAO {
    //put your code here
    
      public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
 
      public function insertar($detaFactura){ 
          
          $idfactura =$detaFactura->getCodFactura();
          $idguia =$detaFactura->getCodGuia();
          $des  =$detaFactura->getDescripcion();
          $can  =$detaFactura->getCantidad();
          $pre     =$detaFactura->getPrecio();
          $sub =$detaFactura->getSubtotal();
         
//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into detalle_factura (idfactura,idguia,descripcion,cantidad,precio,subtotal) values ('$idfactura','$idguia','$des','$can','$pre','$sub')") or die('Error. '.mysql_error());  
              
}

   function lista(){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("
select idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,'',p.apellidos) nombres,impreso from guia_remision
,cliente c,persona p where cliente_idcliente=c.idcliente and persona_idpersona=p.idpersona ");
                      

           $arrayguia=array();
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row['idguia'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombres"=>$row['nombres'],"impreso"=>$row['impreso']);
            
                   }
             return $arrayguia;
           // $this->conexion->desconectar();
      }
      
      
      function listaDetalleMoviXCliente(){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select c.idcliente,c.ruc,c.razonSocial,count(c.razonSocial) cantidad, sum(df.subtotal) total from factura f,detalle_factura df, guia_remision gr, cliente c
where f.idfactura=df.idfactura and df.idguia=gr.idguia and gr.idcliente=c.idcliente group by c.razonSocial order by cantidad desc
");
                      

           $array=array();
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("COD-CLIENTE" => $row[0],"RUC" => $row[1],"RAZON SOCIAL"=>$row[2],"CANT MOVIMIENT"=>$row[3],"TOTAL"=>$row[4]
                    
                    );
            
                   }
             return $array;
           // $this->conexion->desconectar();
      }

}
?>
