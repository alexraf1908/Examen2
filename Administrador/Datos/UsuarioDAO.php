<?php
include_once("Conexion.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Alex
 */
class UsuarioDAO {
    //put your code here
         public $conexion;
 
      //Constructor de la clase
      function __construct(){
            //inicializamos la clase para conectarnos a la bd
            $this->conexion = new Conexion(); //instanciamos la clase
           // $this->mysql->conectar(); //nos conectamos a la base de datos
      }
     
function validaUsuario($user,$clave){ //un ejemplo de una consulta a la base de datos
    
    $patron='ÑpOTud789#iod@Fg97@';
        $encriptada=$patron.sha1(md5($clave));
    
   $this->conexion->consultar("select usuario,clave from usuario where usuario='$user' and clave='$encriptada' and estado='1'")or die('Error. '.mysql_error());  

             
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $arraylogin[] = array("usuario" => $row['usuario'],"clave"=>$row['clave']);
            
                     }
                     return $arraylogin;
         
            //$this->conexion->desconectar();
      }
      
       public function inserta($usuario){
          
          $id  =$usuario->getIdusuario();
          $usu=$usuario->getUsuario();
          $clave =$usuario->getClave();
          $esta    =$usuario->getEstado();
          $idper  =$usuario->getIdpersona();
          
          $patron='ÑpOTud789#iod@Fg97@';
        $encriptada=$patron.sha1(md5($clave));
         
        $this->conexion->consultar("insert into usuario (usuario,clave,estado,idpersona) values ('$usu','$encriptada','$esta','$idper')")or die('Error. '.mysql_error());      
          
      }
      
      public function actualiza($usuario){
          
          $id  =$usuario->getIdusuario();
          $usu=$usuario->getUsuario();
          $clave =$usuario->getClave();
          $esta    =$usuario->getEstado();
          $idper  =$usuario->getIdpersona();
          
          $patron='ÑpOTud789#iod@Fg97@';
        $encriptada=$patron.sha1(md5($clave));
         
        $this->conexion->consultar("UPDATE usuario
                    SET usuario = '$usu',
                        clave = '$encriptada',
                        estado = '$esta'
                        WHERE idpersona = '$idper'")or die('Error. '.mysql_error());      
          
      }
      
      
      function verificaUsuario($idpersona){ //un ejemplo de una consulta a la base de datos
       
   $this->conexion->consultar("select u.idusuario,u.usuario,u.clave,u.estado,p.idpersona,concat(p.nombres,' ',p.apellidos)
 from usuario u,persona p where u.idpersona=p.idpersona and u.idpersona='$idpersona'")or die('Error. '.mysql_error());  

             $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("cod"=>$row[0],"usuario" => $row[1],"clave"=>$row[2],"estado"=>$row[3],"idpersona"=>$row[4],"persona"=>$row[5]);
            
                     }
                     return $array;
                     //$this->conexion->desconectar();
      }
      
            function listarUsuario(){ //un ejemplo de una consulta a la base de datos
       
   $this->conexion->consultar("select u.idusuario,u.usuario,u.clave,u.estado,concat(p.nombres,' ',p.apellidos),p.idpersona,t.descripcion
 from usuario u,persona p,tipopersona t where u.idpersona=p.idpersona and p.idtipopersona = t.idtipopersona")or die('Error. '.mysql_error());  

             $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("codusuario"=>$row[0],"usuario" => $row[1],"clave"=>$row[2],"estado"=>$row[3],"persona"=>$row[4],"idpersona"=>$row[5],"tipo"=>$row[6]);
            
                     }
                     return $array;
                     //$this->conexion->desconectar();
      }
      
      function eliminarUsuario($idusuario){ //un ejemplo de una consulta a la base de datos
       
   $this->conexion->consultar("Delete from Usuario where idusuario='$idusuario'")or die('Error. '.mysql_error());  


                     //$this->conexion->desconectar();
      }
      
      
      function usuarioPerfil($usuario){ //un ejemplo de una consulta a la base de datos
       
   $this->conexion->consultar("select u.usuario,tp.descripcion from tipopersona tp,persona p, usuario u 
where tp.idtipoPersona=p.idtipoPersona and p.idpersona=u.idpersona and u.usuario='$usuario'")or die('Error. '.mysql_error());  

             $array = array();
                  while($row=$this->conexion->obtener_consulta()){
                  
                        $array[] = array("usuario"=>$row[0],"perfil" => $row[1]);
            
                     }
                     return $array;
                     //$this->conexion->desconectar();
      }
}

?>
