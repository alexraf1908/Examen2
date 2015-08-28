<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GuiaRemisionDAO
 *
 * @author Alex
 */
include_once("Conexion.php");

class GuiaRemisionDAO {
    //put your code here
    
     public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de dato
           
      }
 
      public function insertar($guia){ 
                     
          $serie    =$guia->getSerie();     
          $numguia  =$guia->getNumeroguia();
          $fechaemi =$guia->getFechaemision();
          $fechatras=$guia->getFechatraslado();
          $puntopar =$guia->getPuntopartida();
          $puntolle =$guia->getPuntollegada();
          $pesoto   =$guia->getPesototal();
          $impreso  =$guia->getImpreso();
          $estado   =$guia->getEstado();
          $codcliente   =$guia->getCodcliente();
          $codvehiculo  =$guia->getCodvehiculo();
          $codpersona   =$guia->getCodpersona();
          $desti        =$guia->getDestinatario();
//un ejemplo de una consulta a la base de datos
       $this->conexion->consultar("INSERT INTO guia_remision (serie, nroGuia, fechaEmision, fechaTraslado, puntoPartida, puntoLlegada, pesoTotal, impreso, estado,idvehiculo,idcliente,idpersona, destinatario) VALUES ('$serie','$numguia','$fechaemi','$fechatras','$puntopar','$puntolle','$pesoto','$impreso','$estado','$codvehiculo','$codcliente','$codpersona','$desti')") or die('Error. '.mysql_error());  
     
          
            //$this->conexion->desconectar();
      }
      
            function mostrar($nuevaCarga){ //un ejemplo de una consulta a la base de datos
            $consulta = $this->conexion->consultar("select c.razonSocial,p.descripcion,d.cantidad_pro,d.peso,(d.cantidad_pro * d.peso) sub_PesoTotal,d.puntoPartida,d.puntoLlegada,d.destinatario from detalle_carga d,producto p, cliente c where d.idproducto=p.idproducto and d.idcliente=c.idcliente and d.idcarga='$nuevaCarga'")or die('Error. '.mysql_error());  
                      
            
            if($consulta == true){
             echo '<table>
            <tr>
                <td>Cliente</td>
                <td>Producto</td>
                <td>Cant.</td>
                <td>Peso-Uni</td>
                <td>Sub-TotPeso</td>
                <td>PuntoPart.</td>
                <td>Destinatario</td>
                <td>PuntoLleg.</td>

            </tr>'
         
        ;
                
                  while($row=$this->conexion->obtener_consulta()){
                      
                        echo '
            <tr>
                <td>'.$row[0].'</td>
                 <td>'.$row[1].'</td>
                  <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                     <td>'.$row[4].'</td>
                      <td>'.$row[5].'</td>
                       <td>'.$row[7].'</td>
                           <td>'.$row[6].'</td>
               
            </tr>';
                                    
                     }
                     '</table>';
            }else{
                  echo "error consulta";
            }
            //$this->conexion->desconectar();
      }
    
      
      
            public function ultimaGuia(){
          
        $consulta = $this->conexion->consultar("SELECT MAX(g.idguia) AS id FROM guia_remision g")or die('Error. '.mysql_error());
                      
            
            if($consulta == true){
        
                 $row=$this->conexion->obtener_consulta();
                      
                        RETURN trim($row[0]);
                   
            }   
      }
      
           public function enviarIdCliente($idguia){
          
        $consulta = $this->conexion->consultar("select * from guia_remision where idguia='$idguia'")or die('Error. '.mysql_error());  
                      
            
            if($consulta == true){
        
                 $row=$this->conexion->obtener_consulta();
                      
                        RETURN trim($row['idcliente']);
                   
            } 
            
            
      }
 
            
      function listaFiltro($fecha,$razon){ //un ejemplo de una consulta a la base de datos
            $consulta = $this->conexion->consultar("
select idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,'',p.apellidos) nombres,impreso from guia_remision
,cliente c,persona p where cliente_idcliente=c.idcliente and persona_idpersona=p.idpersona and fechaEmision like '$fecha%' and razonSocial like '$razon%'")or die('Error. '.mysql_error());
                      
            
            if($consulta == true){
             echo '<table>
            <tr>
                <td>Codigo</td>
                <td>Nro</td>
                <td>Fecha</td>
                <td>Razon-Social</td>
                <td>Punto-Partida</td>
                <td>Destinatario</td>
                <td>Punto-Llegada</td>
                <td>Chofer</td>
                <td>Impreso</td>
                     
            </tr>'
          
        ;
                                        //<a href=formGuiaRemision.php?codcliente='.$row[0].'&razon='.$row[1].'>selecionar</a>
                             //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                  while($row=$this->conexion->obtener_consulta()){
                      
                        echo '
            <tr>
                        
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[0].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[1].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[2].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[3].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[4].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[5].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[6].'</a></td>
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[7].'</a></td> 
     <td><a style= "cursor:pointer;" onclick="devuelveCliente('.$row[0].')">'.$row[8].'</a></td> 
            </tr>';
                                    
                     }
                     '</table>';
            }else{
                  echo "error consulta";
            }
            $this->conexion->desconectar();
      }
      
      function lista(){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,'',p.apellidos) nombres,impreso,g.estado from guia_remision g
,cliente c,persona p where g.idcliente=c.idcliente and p.idpersona=p.idpersona group by g.idguia")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row['idguia'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombres"=>$row['nombres'],"impreso"=>$row['impreso'],"estado"=>$row['estado']);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
      
      function listaGuiaXEstado($fecha1,$fecha2,$estado){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,'',p.apellidos) nombres,impreso,g.estado from guia_remision g
,cliente c,persona p where g.idcliente=c.idcliente and p.idpersona=p.idpersona and g.estado='$estado' and g.fechaEmision between '$fecha1' and '$fecha2' group by g.idguia")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row['idguia'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombre"=>$row['nombres'],"impreso"=>$row['impreso'],"estado"=>$row['estado']);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
      
      function listaSinSalida(){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,' ',p.apellidos) nombres,impreso,g.estado,concat(v.descripcion,' Placa/',v.placa) vehiculo from guia_remision g
,cliente c,persona p, vehiculo v where g.idcliente=c.idcliente and p.idpersona=p.idpersona and v.idvehiculo = g.idvehiculo and g.idguia not in (select idguia from salida) group by g.idguia order by idguia
")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row['idguia'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombres"=>$row['nombres'],"impreso"=>$row['impreso'],"estado"=>$row['estado'],"vehiculo"=>$row['vehiculo']);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
      
      function listaSinLlegada(){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select g.idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,' ',p.apellidos) nombres,impreso,g.estado,concat(v.descripcion,' Placa/',v.placa) vehiculo from 
guia_remision g,cliente c,persona p, vehiculo v, salida sa
 where g.idcliente=c.idcliente and p.idpersona=p.idpersona and v.idvehiculo = g.idvehiculo and sa.idguia=g.idguia and g.idguia not in (select idguia from llegada ll) group by g.idguia order by g.idguia
")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row['idguia'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombres"=>$row['nombres'],"impreso"=>$row['impreso'],"estado"=>$row['estado'],"vehiculo"=>$row['vehiculo']);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
       function listaSinLlegadaPorCliente($idcliente){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select g.idguia,CONCAT(serie,' -- ',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,' ',p.apellidos) nombres,impreso,g.estado,concat(v.descripcion,' Placa/',v.placa) vehiculo from 
guia_remision g,cliente c,persona p, vehiculo v, salida sa
 where g.idcliente=c.idcliente and p.idpersona=p.idpersona and v.idvehiculo = g.idvehiculo and sa.idguia=g.idguia and g.idcliente= '$idcliente' and g.idguia not in (select idguia from llegada ll) order by g.idguia
")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row['idguia'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombres"=>$row['nombres'],"impreso"=>$row['impreso'],"estado"=>$row['estado'],"vehiculo"=>$row['vehiculo']);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
      function listaSinLlegadaCliente($idcliente){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select g.idvehiculo,CONCAT(serie,'-',nroGuia) nro,fechaEmision,c.razonSocial,puntoPartida,c.razonSocial,puntoLlegada,concat(p.nombres,' ',p.apellidos) nombres,concat(v.descripcion,' Placa/',v.placa) vehiculo from 
guia_remision g,cliente c,persona p, vehiculo v, salida sa
 where g.idcliente=c.idcliente and p.idpersona=p.idpersona and v.idvehiculo = g.idvehiculo and sa.idguia=g.idguia and g.idguia not in (select idguia from llegada ll) and g.idcliente='$idcliente' group by g.idguia ")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idvehiculo" => $row['idvehiculo'],"nro" => $row['nro'],"fechaEmision"=>$row['fechaEmision'],"razonSocial"=>$row['razonSocial'],"ppartida"=>$row['puntoPartida']
                    
                    ,"razonSocial"=>$row['razonSocial'],"pLlegada"=>$row['puntoLlegada'],"nombres"=>$row['nombres'],"vehiculo"=>$row['vehiculo']);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
      
      function ActualizaEstado($idGuia,$estado){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("UPDATE guia_remision SET estado = '$estado' WHERE idguia='$idGuia';")or die('Error. '.mysql_error());
       
                  
           // $this->conexion->desconectar();
      }
      
      function buscarGuia($idguia){ //un ejemplo de una consulta a la base de datos
            $this->conexion->consultar("select idguia,idvehiculo,idcliente,idpersona from guia_remision where idguia = '$idguia'")or die('Error. '.mysql_error());
                      

           $arrayguia=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $arrayguia[] = array("idguia" => $row[0],"idvehiculo" => $row[1],"idcliente"=>$row[2],"idpersona"=>$row[3]);
            
                   }
                   
            
                return $arrayguia;
                  
           // $this->conexion->desconectar();
      }
      
}


?>
