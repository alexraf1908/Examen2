<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<link rel="stylesheet" href="menu.css" type="text/css"/>
<script type="text/javascript" src='date/jquery-1.4.2.min.js'></script>

<script src="date/date.js" type="text/javascript"></script>
        <script src="date/jquery.bgiframe.min.js" type="text/javascript"></script>
        <script src="date/jquery.datePicker.js" type="text/javascript"></script>
        <link href="date/datePicker.css" media="all"  rel="stylesheet" type="text/css"/>
        <link href="date/demo.css" media="all" rel="stylesheet" type="text/css"/>

<!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
      <script>
                    $(document).ready(function(){
                    $('.date-pick').datePicker
                     ({startDate:'1950-01-01'})
                     });
         </script>
<title>Reporte de Facturas</title>

</head>

<body bgcolor="#cccccc">
    
    <div id="DivMenu"><?php  include_once 'menu.php';?></div>
    <div class="statictitulo"><div id="DivTitulos">Reportes de Guias</div></div> 
   <div id="DivCuerpo">
       <div id="contenido">
           <center>
           <table border="0">
               <h1>Reporte de Guias:</h1>
               <tbody>
                   <tr>
                       <td>Fecha Inicio: </td>
                       <td><input type="text"disabled  class="date-pick" name="fechaTraslado" id="datepicker"/></td>
                    
                       <td>Fecha Fin: </td>
                       <td><input type="text"disabled  class="date-pick" name="fechaTraslado" id="datepicker1"/></td>
                       <td>Estado: </td>
                       <td>
                           <select name="cmb" id="cmbestado">
                              
                               <option value="1">Facturados</option>
                               <option value ="0">Por Facturar</option>
                           </select>  
                           
                       </td>
                       
                       <td> <input type="button" value="Ver" onclick="javascript:window.open('Reportes/rptListarGuia?fecha1='+document.getElementById('datepicker').value+'&fecha2='+document.getElementById('datepicker1').value+'&esta='+document.getElementById('cmbestado').value);"/>
                       </td>
                   
                   </tr>
                 
               </tbody>
           </table>

       </center> 
          
   </div>
   
   </div>

</body>
</html>