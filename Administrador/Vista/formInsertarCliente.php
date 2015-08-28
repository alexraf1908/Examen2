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
include_once ('../Negocio/Ncliente.php');
include_once ('../Entidad/Cliente.php');

$idcliente =' ';    
 $razonSocial = ' ' ;  
 $ruc = ' ';
 $direccion= ' ';
 $correo = ' ';
 $telefono = ' ';
 $representante = ' ';
$modificar= ' ';

$Ncliente = new Ncliente();

if(!empty($_POST)){

    if(isset($_POST)){
 $idclie = $_POST['txtid'];       
 $razonSocial = $_POST['txtrazon'];  
 $ruc = $_POST['txtruc'];
 $direccion= $_POST['txtdire'];
 $correo = $_POST['txtcorreo'];
 $telefono = $_POST['txttelefono'];
 $representante = $_POST['txtrepre'];
 $usuario = $_POST['txtusuario'];
 $clave = $_POST['txtclave'];
 $estado = '1';
 
 if($idclie == ' '){
    
$cliente = new Cliente($idclie,$razonSocial, $ruc, $direccion, $correo, $telefono, $representante, $usuario, $clave, $estado);


$Ncliente->insertar($cliente);

echo '<script>alert("SE Registro los Datos");</script>';
 }
 else{
     
     $cliente = new Cliente($idclie,$razonSocial, $ruc, $direccion, $correo, $telefono, $representante, $usuario, $clave, $estado);


$Ncliente->actualizar($cliente);
  echo '<script>alert("SE MODIFICARON los Datos");</script>';   
 }
 
    }
}

if($_GET)
	{
	$modificar='* Modificando Datos';	
        $idclient   =$_GET['codclie'];
        
	$array= $Ncliente->buscarCliente($idclient);
        
 $idcliente =$array[0]['idcli'];    
 $razonSocial = $array[0]['razon'] ;  
 $ruc = $array[0]['ruc'];
 $direccion= $array[0]['direccion'];
 $correo = $array[0]['correo'];
 $telefono =$array[0]['telefono'];
 $representante = $array[0]['repre'];
        
	}

?>

    <body bgcolor="#cccccc">
       
   <div id="DivMenu"><?php  include_once 'menu.php';?></div>
   
   <div class="statictitulo"><div id="DivTitulos">Clientes</div></div> 
<div id="DivCuerpo"><div id="contenido">
        <center><a style="color:red"><?php echo $modificar?></a></center>
        <form action="#" method="POST">
        <input type="hidden" name="txtid" value="<?php echo $idcliente?>" />
        <center><table border="0" width="60%">
     
            <tbody>
                <tr>
                    
                    <td><label>Razon Social: </label></td>
                    <td><input required type="text" name="txtrazon" value="<?php echo $razonSocial?>" size="60%" placeholder="Digite Razon Social"/></td>
                </tr>
                <tr>
                    <td><label>Ruc: </label></td>
                    <td><input required type="number" name="txtruc" value="<?php echo $ruc?>" maxlength="8" placeholder="Digita Ruc"/></td>
                </tr>
                <tr>
                    <td><label>Direccion: </label></td>
                    <td><input required type="text" name="txtdire" value="<?php echo $direccion?>" size="45%" placeholder="Digite Direccion"/></td>
                </tr>
                <tr>
                    <td><label>Correo: </label></td>
                    <td><input required type="email" name="txtcorreo" value="<?php echo $correo?>" size="45%" placeholder="Digite Correo"/></td>
                </tr>
                <tr>
                    <td><label>Telefono: </label></td>
                    <td><input required type="text" name="txttelefono" value="<?php echo $telefono?>" placeholder="Digite Telefono" /></td>
                </tr>
                <tr>
                    <td><label>Representante:</label></td>
                    <td><input required type="text" name="txtrepre" value="<?php echo $representante?>" size="45%" placeholder="Digite Representante Empresa"/></td>
                </tr>
                <tr>
                    <td><label>Usuario: </label></td>
                    <td><input type="text" name="txtusuario" value="" placeholder="Digite Usuario cliente"/></td>
                </tr>
                <tr>
                    <td><label>Clave:</label></td>
                    <td><input type="password" name="txtclave" value="" placeholder="Digite Clave"/></td>
                </tr>
          
            </tbody>
        </table><br>
            <input type="submit" value="Grabar" /></center>
        </form>
        
</div>
 </div>
   </body>
</html>