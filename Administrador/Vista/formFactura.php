<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    
    <head>
        <link rel="stylesheet" href="menu.css" type="text/css"/>
        <link rel="stylesheet" href="table.css" type="text/css"/>
<script language="JavaScript" type="text/javascript" src="ajaxFactura.js"></script>

<!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
        
             <script type="text/javascript" src='date/jquery-1.4.2.min.js'></script>
      
        <script src="date/date.js" type="text/javascript"></script>
        <script src="date/jquery.bgiframe.min.js" type="text/javascript"></script>
        <script src="date/jquery.datePicker.js" type="text/javascript"></script>
        <link href="date/datePicker.css" media="all"  rel="stylesheet" type="text/css"/>
        <link href="date/demo.css" media="all" rel="stylesheet" type="text/css"/>
        <!--<link href="../css/Formulario.css" rel="stylesheet" type="text/css" />-->
        <!--<link href="../css/inicio.css" rel="stylesheet" type="text/css" />-->
        <!--<script src='../js/validacionTercero.js'></script>-->
        
     
        <script>
                    $(document).ready(function(){
                    $('.date-pick').datePicker
                     ({startDate:'1950-01-01'})
                     });
         </script>

<title>Registro Factura</title>
<!-- funcion de Impresion --> 
<script language="Javascript"> 
function imprSelec(nombre) 
{ 
    x = (screen.width / 2) - (600/2);
y = (screen.height / 2) - (700/2);

var articulo = document.getElementById(nombre); 
var ventimp = window.open(' ',"impresion", "width=800,height=570,menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left= "+ x + ",top=" + y +"");
 
ventimp.document.write(articulo.innerHTML ); 
ventimp.document.close(); 
ventimp.print(); 
ventimp.close(); 
} 
</script> 
<!-- Fin funcion de impresion--> 

</head>
    <?php
    
    include_once ('../Negocio/Nguia.php');
                    include_once("../Datos/GuiaRemisionDAO.php");
    
        
        $codGuia= $_GET['codGuia'];
       
                    ?>              

    <body bgcolor="#cccccc" onload="buscarCliente(<?php echo $codGuia ?>)">

 <div id="DivMenu"><?php  include_once 'menu.php';?></div>

<div class="statictitulo"><div id="DivTitulos">Resgistrar Factura</div></div> 
        
<div id="DivCuerpo"><div id="contenido">
     
     <div id="contenedor">
    <div id="contenidos">
        <div id="columna1">Serie: </div>
        <div id="columna2"><input type="text" id="idserie" name="txtserie" value="" requeried /></div>
        <div id="columna2">Nro: </div>
        <div id="columna2"><input type="text" id="idnro" name="txtnro" value="" /></div>
        <div id="columna2">Guia</div>
        <div id="columna2">
            <div id="columna2"><input type="text" id="idguia" name="txtguia" value="<?php echo $codGuia ?>" readonly /></div>                  
        </div>
    </div></div>

        <div><br>
                <div><label>Fecha Emision: </label><br>
               <input type="text" disabled  class="date-pick" id="datepicker"/><br>
          </div>
<br>
       </div>
        <div> 

<DIV ID="impresion">        
    <div id="resultadocliente" CLASS="cssTablaLista">
     
    <table>
    <tr>
                <td>Cantid.</td>
                <td>Unid.</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Importe</td>
                
               
            </tr>
    </table></div></div>
    <br>
        <div id="contenedor">
    <div id="contenidos">
        <div id="columna1"><input type="button" value="Guardar" onclick="guardarFactura()"/></div>
       
        <div id="columna2"><input type="button" value="Imprimir" onclick="imprSelec('impresion')"/></div>
        
    </div>
       </div>
       
        <div id="prueba">
           
        </div> </div>
 </div>
  
</body>
</html>

