<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Registrar Cliente</title>

   <link rel="stylesheet" href="table.css" type="text/css"/>
   <link rel="stylesheet" href="menu.css" type="text/css"/>
   <!--<script language="JavaScript" type="text/javascript" src="ajaxGuia.js"></script>
        <!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
<!-- Inicialización del script -->

</head>
    
<?php
include_once ('../Negocio/Npersona.php');
include_once ('../Entidad/Persona.php');

include_once ('../Negocio/NtipoPersona.php');

$idpersona= ' ';

$nombres =' ';    
 $apellidos = ' ' ;  
 $direccion = ' ';
 $dni= ' ';
 $correo = ' ';
 $telefono = ' ';
 $brevete = ' ';
$modificar= ' ';

$Npersona = new Npersona();

if(!empty($_POST)){

    if(isset($_POST)){
        
 $idtipoPersona = $_POST['cmbtipo'];       
 $nombres =$_POST['txtnom'];    
 $apellidos = $_POST['txtape'];  
 $direccion = $_POST['txtdire'];
 $dni= $_POST['txtdni'];
 $correo = $_POST['txtcorreo'];
 $telefono = $_POST['txttele'];
 $brevete = $_POST['txtbreve'];
 $estado = $_POST['chk'];
 
 if($idpersona == ' '){
    
$persona = new Persona($idpersona, $nombres, $apellidos, $direccion, $dni, $correo, $telefono, $brevete, $estado, $idtipoPersona);


$Npersona->insertar($persona);

echo '<script>alert("SE Registro los Datos");</script>';
   echo '<script type="text/javascript">
window.location="formInsertarPersonal.php"; </script>'; 
 }
 else{
     
$persona = new Persona($idpersona, $nombres, $apellidos, $direccion, $dni, $correo, $telefono, $brevete, $estado, $idtipoPersona);

 $Npersona->actualizar($persona);
  echo '<script>alert("SE MODIFICARON los Datos");</script>';   
 }
 
    }
}

if($_GET)
	{
	$modificar='* Modificando Datos';	
        $idperso   =$_GET['codper'];
        
	$array= $Npersona->buscarPersonal($idperso);
 

                   
$idpersona= $array[0]['idpersona'];

$nombres =$array[0]['nombres'];    
 $apellidos = $array[0]['apellidos'] ;  
 $direccion = $array[0]['direccion'];
 $dni= $array[0]['dni'];
 $correo = $array[0]['correo'];
 $telefono = $array[0]['telefono'];
 $brevete = $array[0]['brevete'];

        
         
	}

?>

    <body bgcolor="#cccccc">
       
   <div id="DivMenu"><?php  include_once 'menu.php';?></div>
   
   <div class="statictitulo"><div id="DivTitulos">Personal</div></div> 
<div id="DivCuerpo"><div id="contenido">
        <center><a style="color:red"><?php echo $modificar?></a></center>
        <form action="#" method="POST">
        <input type="hidden" name="txtid" value="<?php echo $idpersona?>" />
        <center><table border="0" width="60%">
     
            <tbody>
                <tr>
                    
                    <td><label>Tipo Persona: </label></td>
                    <td>
                         <SELECT NAME="cmbtipo" SIZE=1 id="idcli"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php      
                        $a = new NtipoPersona();
                        $cliente = $a->listar();
                    
                        for($i=0;$i<count($cliente);$i++){
                        echo '<OPTION VALUE="'.$cliente[$i]['idtipo'].'">'.$cliente[$i]['descri'].'</OPTION>';
                         }
                       ?>    
                </SELECT> 
                    </td>
                </tr>
               
                <tr>
                    <td><label>Nombres: </label></td>
                    <td><input required type="text" name="txtnom" value="<?php echo $nombres?>" size="45%" placeholder="Digite Nombres"/></td>
                </tr>
                <tr>
                    <td><label>Apellidos: </label></td>
                    <td><input required type="text" name="txtape" value="<?php echo $apellidos?>" size="45%" placeholder="Digite Apellidos"/></td>
                </tr>
                <tr>
                    <td><label>Direccion: </label></td>
                    <td><input required type="text" name="txtdire" value="<?php echo $direccion?>"size="45%" placeholder="Digite Direccion" /></td>
                </tr>
                <tr>
                    <td><label>DNI:</label></td>
                    <td><input required type="text" name="txtdni" value="<?php echo $dni?>"  placeholder="Digite su DNI"/></td>
                </tr>
                <tr>
                    <td><label>Correo: </label></td>
                    <td><input type="email" name="txtcorreo" value="<?php echo $correo?>" size="45%" placeholder="Digite Correo"/></td>
                </tr>
                <tr>
                    <td><label>Telefono:</label></td>
                    <td><input type="text" name="txttele" value="<?php echo $telefono?>" placeholder="Digite Telefono"/></td>
                </tr>
                <tr>
                    <td><label>Brevete:</label></td>
                    <td><input type="text" name="txtbreve" value="<?php echo $brevete?>" placeholder="Digite Nro Brevete"/></td>
                </tr>
               <tr>
                    <td><label>Estado:</label></td>
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