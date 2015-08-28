<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<link rel="stylesheet" href="menu.css" type="text/css"/>
<script language="JavaScript" type="text/javascript" src="ajaxFactura.js"></script>
<script language="JavaScript" type="text/javascript" src="ajaxMapas.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
      
<title>Bienvenido al Sistema TransCar</title>

</head>
    <?php 
if(isset($_GET)){
   
    
    $idVehiculo = $_GET['codVehi'];

include ('../Negocio/Nlocalizacion.php');

$array = new Nlocalizacion();

$localizacion = $array->consultaLocalizacion($idVehiculo);
if (count($localizacion)>=1)
    {
?>

<body bgcolor="#cccccc" onload="initialize(<?php echo $localizacion[0]['latitud'] ?>,<?php echo $localizacion[0]['longitud'] ?>)">
    
    <div id="DivMenu"><?php  include_once 'menu.php';?></div>
    <div class="statictitulo"><div id="DivTitulos">TrasCar SRL</div></div> 
   <div id="DivCuerpo">
       <div id="contenido">
           <table border="0">
               <thead>
                   <tr>
                       <th>Ubicacion</th>
                       <th>Detalle </th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>
                           <div id="map_canvas" style="width:800px; height:500px">
  
                         </div>
                       </td>
                          
                       <td>
                          CodigoVehiculo: <?php echo $localizacion[0]['idVehi'] ?> <p>
                          Descripcion: <?php echo $localizacion[0]['descri'] ?> <p> 
                          Latitud: <?php echo $localizacion[0]['latitud'] ?> <p>
                          Longitud: <?php echo $localizacion[0]['longitud'] ?> <p>
                          Presicion: <?php echo $localizacion[0]['presicionn'] ?> <p> 
                          Fecha: <?php echo $localizacion[0]['fecha'] ?> <p>
                          Direccion: <?php echo $localizacion[0]['direccion'] ?> <p> 
                          Proveedor: <?php echo $localizacion[0]['provee'] ?> <p>
                              </td>
                   </tr>
                   
               </tbody>
           </table>




   </div>
   
   </div>

</body>
    
      <?php }else {?>
          
          <body bgcolor="#cccccc" >
    
    <div id="DivMenu"><?php  include_once 'menu.php';?></div>
    <div class="statictitulo"><div id="DivTitulos">TrasCar SRL</div></div> 
   <div id="DivCuerpo">
       <div id="contenido">
           
           <center><h2>No hay Coordenadas !!!</h2></center>
   </div>
   
   </div>

</body>
          
          
        <?php  
          ;}}
?>

</html>