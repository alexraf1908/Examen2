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

<body bgcolor="#cccccc" onload="initialize(-8.100528, -79.021901)">
    
    <div id="DivMenu"><?php  include_once 'menu.php';?></div>
    <div class="statictitulo"><div id="DivTitulos">TrasCar SRL</div></div> 
   <div id="DivCuerpo">
       <div id="contenido">

  <div id="map_canvas" style="width:800px; height:500px">
    
  </div>

   </div>
   
   </div>

</body>
</html>