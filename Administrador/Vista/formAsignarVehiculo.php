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
include_once ('../Negocio/Nvehiculo.php');


$imei =' ';    
 $descri = ' ' ;  


$modificar= ' ';

$Ndispositivo = new Ndispositivo();
$Nvehiculo = new Nvehiculo();

if(!empty($_POST)){

    if(isset($_POST)){
  
 $imei =$_POST['txtimei'];       
  $idvehiculo =$_POST['cmb']; 
  

$Ndispositivo->AsignarVehiculo($imei, $idvehiculo);
  echo '<script>alert("SE Asigno Vehiculo a Dispositivo!!");</script>';   
  echo '<script type="text/javascript">
window.location="formListaDispo.php"; </script>'; 
    }
}

if($_GET)
	{
	$modificar='* Asignar Vehiculo';	
        $imeii   =$_GET['imei'];
        
	$array= $Ndispositivo->buscarDispositivo($imeii);
        
 $imei =$array[0]['imei'];    
 $descri = $array[0]['descri'] ;  
 
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
                    <td><input type="text" name="txtimei" value="<?php echo $imei?>" size="60%" readonly/></td>
                </tr>
                <tr>
                    <td><label>Descripcion: </label></td>
                    <td><input type="text" name="txtdescri" value="<?php echo $descri?>" maxlength="30" readonly/></td>
                </tr>
                <tr>
                    <td><label>Vehiculo Sin Asignacion: </label></td>
                    <td>
                        <SELECT NAME="cmb" SIZE=1 id="idcli"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php      
                        $a = new Nvehiculo();
                        $cliente = $a->listarVehiculoSinAsignacion();
                    
                        for($i=0;$i<count($cliente);$i++){
                        echo '<OPTION VALUE="'.$cliente[$i]['idvehi'].'">'.$cliente[$i]['descri'].' - Placa:/'.$cliente[$i]['placa'].'</OPTION>';
                         }
                       ?>    
                </SELECT> 
                    </td>
                </tr>
               
                        
            </tbody>
        </table><br>
            <input type="submit" value="Grabar" /></center>
        </form>
        
</div>
 </div>
   </body>
</html>
