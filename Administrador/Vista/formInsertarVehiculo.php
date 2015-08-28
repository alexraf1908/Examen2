<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Registrar Vehiculo</title>

   <link rel="stylesheet" href="table.css" type="text/css"/>
   <link rel="stylesheet" href="menu.css" type="text/css"/>
   <script language="JavaScript" type="text/javascript" src="ajaxGuia.js"></script>
        <!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
<!-- Inicialización del script -->

</head>
    
<?php
include_once ('../Negocio/Nvehiculo.php');
include_once ('../Entidad/Vehiculo.php');

$idvehiculo =' ';    
 $descripcion = ' ' ;  
 $placa = ' ';
 $limitePeso= ' ';
 $estado = ' ';
 $modificar= ' ';

$Nvehiculo = new Nvehiculo();

if(!empty($_POST)){

    if(isset($_POST)){
 $idvehiculo = $_POST['txtid'];       
 $descripcion = $_POST['txtdescri'];  
 $placa = $_POST['txtplaca'];
 $limitePeso= $_POST['txtlimit'];
 $estado = '1';
 
 if($idvehiculo == ' '){
    
$cliente = new Vehiculo($idvehiculo, $descripcion, $placa, $limitePeso, $estado);


$Nvehiculo->insertar($cliente);

echo '<script>alert("SE Registro los Datos");</script>';
 }
 else{
     
     $cliente = new Vehiculo($idvehiculo, $descripcion, $placa, $limitePeso, $estado);


$Nvehiculo->actualizar($cliente);
  echo '<script>alert("SE MODIFICARON los Datos");</script>';   
 }
 
    }
}

if($_GET)
	{
	$modificar='* Modificando Datos';	
        $idve   =$_GET['codvehi'];
        
	$array= $Nvehiculo->buscarVehiculo($idve);
        
 $idvehiculo =$array[0]['idvehi'];    
 $descripcion = $array[0]['descri'] ;  
 $placa = $array[0]['placa'];
 $limitePeso= $array[0]['limitepeso'];
 $estado = $array[0]['estado'];
        
	}

?>

    <body bgcolor="#cccccc">
       
   <div id="DivMenu"><?php  include_once 'menu.php';?></div>
   
   <div class="statictitulo"><div id="DivTitulos">Vehiculo</div></div> 
<div id="DivCuerpo"><div id="contenido">
        <center><a style="color:red"><?php echo $modificar?></a></center>
        <form action="#" method="POST">
        <input type="hidden" name="txtid" value="<?php echo $idvehiculo?>" />
        <center><table border="0" width="60%">
     
            <tbody>
                <tr>
                    
                    <td><label>Descripcion: </label></td>
                    <td><input required type="text" name="txtdescri" value="<?php echo $descripcion?>" size="60%" placeholder="Digite Razon Social"/></td>
                </tr>
                <tr>
                    <td><label>Placa: </label></td>
                    <td><input required type="number" name="txtplaca" value="<?php echo $placa?>" maxlength="8" placeholder="Digita Ruc"/></td>
                </tr>
                <tr>
                    <td><label>Limite Peso: </label></td>
                    <td><input required type="text" name="txtlimit" value="<?php echo $limitePeso?>" size="45%" placeholder="Digite Direccion"/></td>
                </tr>
                <tr>
                    <td><label>Estado: </label></td>
                    <td><input type="checkbox" name="txtestado" value="<?php echo $estado?>" size="45" checked="checked" /></td>
                </tr>
                
          
            </tbody>
        </table><br>
            <input type="submit" value="Grabar" /></center>
        </form>
        
</div>
 </div>
   </body>
</html>