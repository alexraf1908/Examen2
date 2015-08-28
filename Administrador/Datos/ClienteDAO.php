<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("Conexion.php");

class ClienteDAO {
    //put your code here
    
         public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
 
      public function insertar($cliente){ 
          
          $razon = $cliente->getRazonSocial();
          $ruc = $cliente->getRuc();
          $direccion= $cliente->getDireccion();
          $correo = $cliente->getCorreo();
          $telefono = $cliente->getTelefono();
          $repre = $cliente->getRepresentante();
          $usuario = $cliente->getUsuario();
          $clave = $cliente->getClave();
          $estado = $cliente->getEstado();

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("INSERT INTO cliente (razonSocial,ruc,direccion,correo,telefono,representante,usuario,clave,estado)
VALUES ('$razon','$ruc','$direccion','$correo','$telefono','$repre','$usuario','$clave','$estado')");  
                  
           
            //$this->conexion->desconectar();
      }
      
      public function actualiza($cliente){ 
          
          $idcli = $cliente->getIdcliente();
          $razon = $cliente->getRazonSocial();
          $ruc = $cliente->getRuc();
          $direccion= $cliente->getDireccion();
          $correo = $cliente->getCorreo();
          $telefono = $cliente->getTelefono();
          $repre = $cliente->getRepresentante();
          $usuario = $cliente->getUsuario();
          $clave = $cliente->getClave();
          $estado = $cliente->getEstado();

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar(" UPDATE cliente SET razonSocial ='$razon', ruc='$ruc', direccion='$direccion', correo='$correo', telefono='$telefono',representante ='$repre' ,usuario='$usuario',clave='$clave',estado='$estado' 
              WHERE idcliente ='$idcli'");  
                  
           
            //$this->conexion->desconectar();
      }
      
            function listaFiltro($razon,$ruc){ //un ejemplo de una consulta a la base de datos
            $consulta = $this->conexion->consultar("
select c.idcliente,c.razonSocial,c.ruc,c.direccion,c.correo,c.telefono from cliente c where c.razonSocial like '$razon%' and c.ruc like '$ruc%'");  
                      
            
            if($consulta == true){
             echo '<table>
            <tr>
                <td>Razon-Social</td>
                <td>Ruc</td>
                <td>Direccion</td>
                <td>Correo</td>
                <td>Telefono</td>
                <td>seleccionar</td>
                     
            </tr>'
          
        ;
                                        //<a href=formGuiaRemision.php?codcliente='.$row[0].'&razon='.$row[1].'>selecionar</a>
                             //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                  while($row=$this->conexion->obtener_consulta()){
                      
                        echo '
            <tr>
                <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                        <td>'.$row[3].'</td>
                        <td>'.$row[4].'</td>
                        <td>'.$row[5].'</td>
                        <td> 
                        <a style= "text-decoration:underline;cursor:pointer;" 
                    onclick="devuelveCliente('.$row[0].')">Seleccionar</a> 
   
                        </td>    
                
            </tr>';
                                    
                     }
                     '</table>';
            }else{
                  echo "error consulta";
            }
            $this->conexion->desconectar();
      }
      
            
      function mostrarCombo(){ //un ejemplo de una consulta a la base de datos
           
          $consulta = $this->conexion->consultar("select c.idcliente,c.razonSocial from cliente c ");  
                     
          if($consulta == true){
            
                
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $arraycombo[] = array("codigo" => $row[0],"razon"=>$row[1]);
            
                     }
                     return $arraycombo;
            }else{
                  echo "error consulta";
            }
      }
      
         function clienteSinMovimiento($idcliente){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("select distinct g.idcliente from guia_remision g,cliente c where g.idcliente =  c.idcliente and g.idcliente='$idcliente'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
               
                  $row=$this->conexion->obtener_consulta();

                  return $row[0];
                   
           // $this->conexion->desconectar();
      }
      
      function buscarCliente($idCliente){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("SELECT idcliente,razonSocial,ruc,direccion,correo,telefono,representante,usuario,clave,estado FROM cliente where idcliente='$idCliente'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
               $cliente=array();
               
                  while($row=$this->conexion->obtener_consulta()){
                      
                    $cliente[] = array("idcli" => $row[0],"razon" => $row[1],"ruc"=>$row[2],
                        "direccion"=>$row[3],"correo"=>$row[4],"telefono"=>$row[5],"repre"=>$row[6],
                        "usuario"=>$row[7],"clave"=>$row[8],"estado"=>$row[9]);

                  }
           
                  
                  return $cliente;
                   
           // $this->conexion->desconectar();
      }
      
      function listarCliente(){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("SELECT idcliente,razonSocial,ruc,direccion,correo,telefono,representante,usuario,clave,estado FROM cliente");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
               $cliente=array();
                  while($row=$this->conexion->obtener_consulta()){
                      
                    $cliente[] = array("idcli" => $row[0],"razon" => $row[1],"ruc"=>$row[2],
                        "direccion"=>$row[3],"correo"=>$row[4],"telefono"=>$row[5],"repre"=>$row[6],"usuario"=>$row[7],"clave"=>$row[8],"estado"=>$row[9]);

                  }
           
                  
                  return $cliente;
                   
           // $this->conexion->desconectar();
      }
      
      
      function eliminarCliente($idcliente){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("delete from cliente where idcliente='$idcliente'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
                             
           // $this->conexion->desconectar();
                 }

function login($usuario,$clave){ //un ejemplo de una consulta a la base de datos
             $this->conexion->consultar("SELECT idcliente,razonSocial,ruc,direccion,correo,telefono,representante,usuario,clave,estado FROM cliente where usuario='$usuario' and clave='$clave'");  
                      
                     //<a href=formguiaRemision.php?codcliente='.$row[0].'>eliminar</a>  
               $cliente=array();
               
                  while($row=$this->conexion->obtener_consulta()){
                      
                    $cliente[] = $row;

                  }
           
                  
                  return $cliente;
                   
           // $this->conexion->desconectar();
      }
}



?>
