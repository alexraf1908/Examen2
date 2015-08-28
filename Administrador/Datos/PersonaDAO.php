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
class PersonaDAO {
    //put your code here
    
       public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
      
       function mostrarCombo(){ //un ejemplo de una consulta a la base de datos
           
          $consulta = $this->conexion->consultar("select idpersona,concat(nombres,' ',apellidos,'/ Brevete: ',brevete) nombres from persona where idtipoPersona = '1' and estado ='0'");  
                     
          if($consulta == true){
            
                
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $arraycombo[] = array("codigo" => $row[0],"nombres"=>$row[1]);
            
                     }
                     return $arraycombo;
            }else{
                  echo "error consulta";
            }
      }
            public function actualizarEstado($idpersona,$estado){ 

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("UPDATE persona SET estado='$estado' WHERE idpersona ='$idpersona'");  
                           
            //$this->conexion->desconectar();
      }
      
       public function insertar($persona){ 
          
        $idpersona = $persona->getIdpersona();
        $nombres = $persona->getNombres(); 
        $apellidos = $persona->getApellidos(); 
        $direccion = $persona->getDireccion(); 
        $dni = $persona->getDni(); 
        $correo = $persona->getCorreo(); 
        $telefono = $persona->getTelefono(); 
        $brevete = $persona->getBrevete(); 
        $estado = $persona->getEstado(); 
        $idtipo = $persona->getIdtipoPersona();
          

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("insert into persona (nombres,apellidos,direccion,dni,correo,telefono,brevete,estado,idtipoPersona) 
values ('$nombres','$apellidos','$direccion','$dni','$correo','$telefono','$brevete','$estado','$idtipo')")or die('Error. '.mysql_error());  
                  
           
            //$this->conexion->desconectar();
      }
      
      public function actualizar($persona){ 
          
        $idpersona = $persona->getIdpersona();
        $nombres = $persona->getNombres(); 
        $apellidos = $persona->getApellidos(); 
        $direccion = $persona->getDireccion(); 
        $dni = $persona->getDni(); 
        $correo = $persona->getCorreo(); 
        $telefono = $persona->getTelefono(); 
        $brevete = $persona->getBrevete(); 
        $estado = $persona->getEstado(); 
        $idtipo = $persona->getIdtipoPersona();
          

//un ejemplo de una consulta a la base de datos
          $this->conexion->consultar("UPDATE `transporte`.`persona`
SET
`nombres` = '$nombres',
`apellidos` = '$apellidos',
`direccion` = '$direccion',
`dni` = '$dni',
`correo` = '$correo',
`telefono` = '$telefono',
`brevete` = '$brevete',
`estado` = '$estado',
`idtipoPersona` = '$idtipo'
WHERE `idpersona` = '$idpersona'")or die('Error. '.mysql_error());   
                  
           
            //$this->conexion->desconectar();
      }
      
      
      function listarPersonal(){
          
               $this->conexion->consultar("select p.idpersona,p.nombres,p.apellidos,p.direccion,p.dni,p.correo,p.telefono,p.brevete,p.estado,p.idtipoPersona,t.descripcion
 from persona p,tipopersona t where p.idtipoPersona = t.idtipoPersona
")or die('Error. '.mysql_error());  
                      
            
        $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idpersona" => $row[0],"nombres"=>$row[1],"apellidos"=>$row[2],"direccion"=>$row[3],"dni"=>$row[4],"correo"=>$row[5]
                    
                    ,"telefono"=>$row[6],"brevete"=>$row[7],"estado"=>$row[8],"idtipoper"=>$row[9],"tipo"=>$row[10]); }
                   
            
                return $array;
          
          
      }
      
      function listarPersonalSinAcceso(){
          
               $this->conexion->consultar("select p.idpersona,p.nombres,p.apellidos,p.direccion,p.dni,p.correo,p.telefono,p.brevete,p.estado,p.idtipoPersona,t.descripcion
 from persona p,tipopersona t where p.idtipoPersona = t.idtipoPersona and p.idpersona not in (select idpersona from usuario)
")or die('Error. '.mysql_error());  
                      
            
        $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idpersona" => $row[0],"nombres"=>$row[1],"apellidos"=>$row[2],"direccion"=>$row[3],"dni"=>$row[4],"correo"=>$row[5]
                    
                    ,"telefono"=>$row[6],"brevete"=>$row[7],"estado"=>$row[8],"idtipoper"=>$row[9],"tipo"=>$row[10]); }
                   
            
                return $array;
          
          
      }
      
      function buscarPersonal($idpersonal){
          
               $this->conexion->consultar("select p.idpersona,p.nombres,p.apellidos,p.direccion,p.dni,p.correo,p.telefono,p.brevete,p.estado,p.idtipoPersona,t.descripcion
 from persona p,tipopersona t where p.idtipoPersona = t.idtipoPersona and p.idpersona='$idpersonal'
")or die('Error. '.mysql_error());  
                      
            
        $array=array();
           
              while($row=$this->conexion->obtener_consulta()){
                  
            $array[] = array("idpersona" => $row[0],"nombres"=>$row[1],"apellidos"=>$row[2],"direccion"=>$row[3],"dni"=>$row[4],"correo"=>$row[5]
                    
                    ,"telefono"=>$row[6],"brevete"=>$row[7],"estado"=>$row[8],"idtipoper"=>$row[9],"tipo"=>$row[10]); }
                
            
                return $array;
          
          
      }
       function eliminarPersonal($idpersonal){
          
               $this->conexion->consultar("DELETE FROM `transporte`.`persona` WHERE `idpersona`='$idpersonal'")or die('Error. '.mysql_error());  
                      
            
   
          
          
      }
      
}

?>