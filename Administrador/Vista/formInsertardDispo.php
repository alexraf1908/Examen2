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
include_once ('../Negocio/Ndispositivo.php');
include_once ('../Entidad/Dispositivo.php');

$imei =' ';    
 $descri = ' ' ;  
 $estado = ' ';
 $idvehiculo= ' ';

$modificar= ' ';

$Ndispositivo = new Ndispositivo();

if(!empty($_POST)){

    if(isset($_POST)){
 $imei = $_POST['txtimei'];       
 $descri = $_POST['txtdescri'];  
 $estado = $_POST['chk'];
 $idvehiculo = '0';

 $a= $Ndispositivo->buscarDispositivo($imei);
 
 if(count($a)<1){
    
$dispositivo = new Dispositivo($imei, $descri, $estado, $idvehiculo);


$Ndispositivo->insertarDispositivo($dispositivo);

echo '<script>alert("SE Registro los Datos");</script>';
 }
 else{
     
 $dispositivo = new Dispositivo($imei, $descri, $estado, $idvehiculo);

$Ndispositivo->actualizarDispositivo($dispositivo);
  echo '<script>alert("SE MODIFICARON los Datos");</script>';   
 }
 
    }
}

if($_GET)
	{
	$modificar='* Modificando Datos';	
        $imeii   =$_GET['imei'];
        
	$array= $Ndispositivo->buscarDispositivo($imeii);
        
 $imei =$array[0]['imei'];    
 $descri = $array[0]['descri'] ;  
 $estado = $array[0]['estado'];


	}

?>

    <body bgcolor="#cccccc">
       
   <div id="DivMenu"><?php  include_once 'menu.php';?></div>
   
   <div class="statictitulo"><div id="DivTitulos">Dispositivo</div></div> 
<div id="DivCuerpo"><div id="contenido">
        <center><a style="color:red"><?php echo $modificar?></a></center>
        <form action="#" method="POST">
        <input type="hidden" name="txtid" value="<?php echo $imei?>" />
        <center><table border="0" width="60%">
     
            <tbody>
                <tr>
                    
                    <td><label>Imei: </label></td>
                    <td><input required type="text" name="txtimei" value="<?php echo $imei?>" size="60%" placeholder="Digite Razon Social"/></td>
                </tr>
                <tr>
                    <td><label>Descripcion: </label></td>
                    <td><input required type="text" name="txtdescri" value="<?php echo $descri?>" maxlength="30" placeholder="Digita Ruc"/></td>
                </tr>
          
                <tr>
                    <td><label>Estado: </label></td>
                    <td><input type="checkbox" name="chk" value="1"  checked/></td>
                </tr>
                        
            </tbody>
        </table><br>
            <input type="submit" value="Grabar" /></center>
        </form>
        
</div>
 </div>
   </body>
</html>
