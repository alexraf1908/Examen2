<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Registrar Dispositivo</title>

   <link rel="stylesheet" href="table.css" type="text/css"/>
   <link rel="stylesheet" href="menu.css" type="text/css"/>
   <!--<script language="JavaScript" type="text/javascript" src="ajaxGuia.js"></script>
        <!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
<!-- Inicialización del script -->

</head>
    
<?php
include_once ('../Negocio/Npersona.php');

include_once ('../Entidad/Usuario.php');

include_once ('../Negocio/Nusuario.php');


$idusuario = '';    
 $usuario = '';  
 $clave = '';
 $idpersona = '';

$modificar= '';

$Nusuario = new Nusuario();

if(!empty($_POST)){

    if(isset($_POST)){
        
 $idusuario = $_POST['txtid'];       
 $usuario= $_POST['txtusu'];  
 $clave = $_POST['txtclave'];
 $idpersona = $_POST['cmbpersona'];
 $estado= $_POST['chk'];

 $a= $Nusuario->verificaUsuario($idpersona);
 
 if(count($a)<1){
    
$usuari = new Usuario($idusuario, $usuario, $clave, $estado, $idpersona);


$Nusuario->inserta($usuari);

echo '<script>alert("SE Registro los Datos");</script>';

echo '<script type="text/javascript">
window.location="formInsertarUsuario.php"; </script>';
 }
 else{
     
$usuari = new Usuario($idusuario, $usuario, $clave, $estado, $idpersona);

$Nusuario->actualiza($usuari);// actualiza 
  echo '<script>alert("SE MODIFICARON los Datos");</script>';   
  
 }
 
    }
}

if($_GET)
	{
	$modificar='* Modificando Datos';	
        $idpersona   =$_GET['codperso'];
        
	$array= $Nusuario->verificaUsuario($idpersona);
        
 $idusuario =$array[0]['idusuario'];    
 
 $usuario= $array[0]['usuario'];
 
 $idpe= $array[0]['idpersona'];
 $perso= $array[0]['persona'];

	}

?>

    <body bgcolor="#cccccc">
       
   <div id="DivMenu"><?php  include_once 'menu.php';?></div>
   
   <div class="statictitulo"><div id="DivTitulos">Usuario</div></div> 
<div id="DivCuerpo"><div id="contenido">
        <center><a style="color:red"><?php echo $modificar?></a></center>
        <form action="#" method="POST">
        <input type="hidden" name="txtid" value="<?php echo $idusuario?>" />
        <center><table border="0" width="60%">
     
            <tbody>
                <tr>
                    
                    <td><label>Persona: </label></td>
                    <td>
          <?php 
          
          if ($modificar==''){
              ?>
                        
              <SELECT NAME="cmbpersona" SIZE=1 id="idcli"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php    
                      
                        $a = new Npersona();
                        $cliente = $a->listarPersonalSinAcceso();
                    
                        for($i=0;$i<count($cliente);$i++){
                        echo '<OPTION VALUE="'.$cliente[$i]['idpersona'].'">'.$cliente[$i]['nombres'].' '.$cliente[$i]['apellidos'].'</OPTION>';
                         }
                       ?>    
                </SELECT> 
                        
              <?php   
          }else{
              
              ?> 
                  <SELECT NAME="cmbpersona" SIZE=1 id="idcli" readonly="readonly"> 
                      <OPTION VALUE="<?php echo $idpe ?>"><?php echo $perso ?></OPTION>
                        
                </SELECT> 
                  
                        
                  <?php
              
              
          }
          
          ?>              
                        
                         
                        
                        
                        
                        
                    </td>
                </tr>
                
                <tr>
                    
                    <td><label>Usuario: </label></td>
                    <td><input required type="text" name="txtusu" value="<?php echo $usuario?>" placeholder="Digite su usuario"/></td>
                </tr>
                <tr>
                    <td><label>Clave: </label></td>
                    <td><input required type="text" name="txtclave" value="<?php echo $clave?>" maxlength="8" placeholder="Digita Clave"/></td>
                </tr>
             
                <tr>
                    <td><label>Estado: </label></td>
                    <td><input type="checkbox" name="chk" value="1" checked/></td>
                </tr>
                        
            </tbody>
        </table><br>
            <input type="submit" value="Grabar" /></center>
        </form>
        
</div>
 </div>
   </body>
</html>
