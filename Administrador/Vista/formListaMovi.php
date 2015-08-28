<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    
    <head>
        <script language="JavaScript" type="text/javascript" src="ajaxPago.js"></script>
        <link rel="stylesheet" href="menu.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="table.css" type="text/css"/>-->
        
       <meta charset="utf-8">
        <!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
        <!--    ESTILO GENERAL    -->
        <!--    JQUERY   -->
        <script type="text/javascript" src="js/jquery.js"></script>
      
        <!--    JQUERY    -->
        <!--    FORMATO DE TABLAS    -->
        <link type="text/css" href="css/demo_table.css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <!--    FORMATO DE TABLAS    -->  
        <script type="text/javascript" src='date/jquery-1.4.2.min.js'></script>
      
        <script src="date/date.js" type="text/javascript"></script>
        <script src="date/jquery.bgiframe.min.js" type="text/javascript"></script>
        <script src="date/jquery.datePicker.js" type="text/javascript"></script>
        <link href="date/datePicker.css" media="all"  rel="stylesheet" type="text/css"/>
        <link href="date/demo.css" media="all" rel="stylesheet" type="text/css"/>
        <!--<link href="../css/Formulario.css" rel="stylesheet" type="text/css" />-->
        <!--<link href="../css/inicio.css" rel="stylesheet" type="text/css" />-->
        <!--<script src='../js/validacionTercero.js'></script>-->
        
        <title>Vehiculos</title>
        <script>
                    $(document).ready(function(){
                    $('.date-pick').datePicker
                     ({startDate:'1950-01-01'})
                     });
         </script>
        
        
            <style>
        
        table {
   width: 80%;
   border: 0px solid #000;
}
th, td {
   width: 25%;
   text-align: center;
   vertical-align: top;
   border: 0px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
th {
   background: #eee;
}
        
    </style>
        
    </head>
    
<title>Lista Guias</title>

<body bgcolor="#cccccc">
 <div id="DivMenu"><?php  include_once 'menu.php';?></div>
 <div class="statictitulo"><div id="DivTitulos">Lista Movimiento Caja</div></div>  
   <div id="DivCuerpo">
        
       <div id="contenido">
           <div>
           <center><table border="0">
           
               <tbody>
                   <tr>
                       <td>FechaInicio: </td>
                       <td><input type="text"disabled  class="date-pick" name="txtfechaini" value="" id="idfecha1" /></td>
                       <td>FechaFin: </td>
                       <td><input type="text"disabled  class="date-pick" name="txtfechafin" value="" id="idfecha2" /></td>
                       <td><a style= 'cursor:pointer;color:blue;'><img src="Imagenes/buscar.png" width="50" height="50" alt="eliminar" onclick="ListarMovimientoCaja();"/></a> 
                       </td>
                   </tr>
               </tbody>
           </table></center>
           </div>
           <div id="resultado">
               
               
           </div>
           
           
       </div>
   </div> 
</body>
</html>