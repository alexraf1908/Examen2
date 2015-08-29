<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Registrar Guia Remision</title>

   <link rel="stylesheet" href="table.css" type="text/css"/>
   <link rel="stylesheet" href="menu.css" type="text/css"/>
   <script language="JavaScript" type="text/javascript" src="ajaxGuia.js"></script>
   
   <script type="text/javascript" src="../../validarCampos.js"></script>
   
   <script type="text/javascript" src="select_dependientes_3_niveles.js"></script>
        <!--    ESTILO GENERAL   -->
        <link type="text/css" href="css/style.css" rel="stylesheet" />
<!-- Inicialización del script -->
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

<script>
function ventanaNueva(documento){	
		
x = (screen.width / 2) - (500/2);
y = (screen.height / 2) - (500/2);
window.open(documento,"Buscar Cliente", "width=800,height=400,menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left= "+ x + ",top=" + y +"");

}
</script>

</head>
      <?php include_once("../Negocio/Ncliente.php");?>  
      <?php include_once("../Negocio/Nvehiculo.php");?>
      <?php include_once("../Negocio/Npersona.php");?>
    <body bgcolor="#cccccc">
       
   <div id="DivMenu"><?php  include_once 'menu.php';?></div>
   
   <div class="statictitulo"><div id="DivTitulos">Nueva Guia de Remision</div></div> 
<div id="DivCuerpo"><div id="contenido">

       <div>         
                           
   <form name="nueva_guia" action="" onsubmit="enviarDatosCanasta(); return false">
   
    <table align="center">

    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Serie:</td>

      <td><input type="text" name="serie" value="" size="32" 
                 onchange="return valforms(this.form,this)" editcheck="req=Y=Por favor introduce la serie .;maxlen=9.;type=int"/></td>
      <td>NroGuia:</td>
      <td><input type="text" name="nroGuia" value="" size="32" 
          onchange="return valforms(this.form,this)" editcheck="req=Y=Por favor introduce la Nro Guia .;maxlen=9.;type=int" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">FechaEmision:</td>
      <td>
         <div class="demo">
           <input type="text"disabled  class="date-pick" name="fechaEmision" id="datepicker"/>
          </div>
      </td>
      <td>FechaTraslado:</td>
      <td>   
          <div class="demo">
           <input type="text"disabled  class="date-pick" name="fechaTraslado" id="datepicker"/>
          </div>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Cliente:</td>
      <td colspan="2">
          <SELECT NAME="idcliente" SIZE=1 id="idcli"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php      
                        $a = new Ncliente();
                        $cliente = $a->mostrarCombo();
                    
                        for($i=0;$i<count($cliente);$i++){
                        echo '<OPTION VALUE="'.$cliente[$i]['codigo'].'">'.$cliente[$i]['razon'].'</OPTION>';
                         }
                       ?>    
                </SELECT> 
      </td>
     
    </tr>
  
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">PuntoPartida:</td>
      <td colspan="3"><input type="text" name="puntoPartida" value="" size ="70" 
       onchange="return valforms(this.form,this);" editcheck="req=Y=Por favor introduce PUNTO PARTIDA.;cvt=UT;type=ALPHANUM"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Destinatario:</td>
      <td colspan="2">
          <SELECT NAME="idcliente1" SIZE=1 id="idcli1"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php      
                        $b = new Ncliente();
                        $array1 = $b->mostrarCombo();
                    
                        for($i=0;$i<count($cliente);$i++){
                        echo '<OPTION VALUE="'.$array1[$i]['codigo'].'">'.$array1[$i]['razon'].'</OPTION>';
                         }
                       ?>    
                </SELECT> 
      </td>
     
    </tr>
  
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">PuntoLlegada:</td>
      <td colspan="3"><input name="puntoLlegada" type="text" size="70" 
     onchange="return valforms(this.form,this);" editcheck="req=Y=Por favor introduce PUNTO llegada.;cvt=UT;type=ALPHANUM"/></td></td>
    </tr>

    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Vehiculo:</td>
      <td colspan="2">
          <SELECT NAME="idvehi" SIZE=1 id="idvehi"style="width: 50%"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php      
                        $c = new Nvehiculo();
                        $arrayvehi = $c->mostrarComboVehiculo();
                    
                        for($i=0;$i<count($arrayvehi);$i++){
                        echo '<OPTION VALUE="'.$arrayvehi[$i]['codigo'].'">'.$arrayvehi[$i]['nombre'].'</OPTION>';
                         }
                       ?>    
                </SELECT> 
      </td>
     
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Chofer:</td>
      <td colspan="2">
           <SELECT NAME="idper" SIZE=1 id="idper" style="width: 50%"> 
                    <OPTION VALUE="...">...</OPTION>
                      <?php      
                        $p = new Npersona();
                        $arrayp = $p->mostrarComboPersonaChofer();
                    
                        for($i=0;$i<count($arrayp);$i++){
                        echo '<OPTION VALUE="'.$arrayp[$i]['codigo'].'">'.$arrayp[$i]['nombres'].'</OPTION>';
                         }
                       ?>    
                </SELECT>
      </td>
     
  
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Producto:</td>
      <td colspan="2"><TEXTAREA COLS=53 ROWS=2 NAME="descripcion"
       onchange="return valforms(this.form,this);" editcheck="req=Y=Por favor introduce detalle Producto.;cvt=UT;type=ALPHANUM"/> </TEXTAREA></td>
      <td><input type="submit" name="Submit" value="Agregar" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left"><p>PesoUnt:</td>
      <td colspan="2">
        <input type="text" name="pesouni" value="" size="10"
               
         onchange="return valforms(this.form,this);" editcheck="req=Y=Por favor introduce PESO.;cvt=UT;type=float"/></td>
       <td colspan="2"> Cantidad:
        <input type="text" name="cantidad" value="" size="10"
         onchange="return valforms(this.form,this);" editcheck="req=Y=Por favor introduce PUNTO PARTIDA.;cvt=UT;type=ALPHANUM"/></td>
      </td>
     
    </tr>
    </table>  

   </form>
                <div>
        <input type="submit" name="Submit" id="btnInsertaGuia" onClick="guardarGuia()" value="insertar" />
    </div>
           </div>
       <div id="resultado" CLASS="cssTablaLista" style="padding-top: 10px; padding-left: 10px; margin-left: 10px; width: 95%">                
                    <table>
                        <tr>
                            <td>Item</td>
                            <td>Decripcion</td>
                            <td>PesoUnit.</td>
                            <td>Cantidad</td>
                            <td>SubTotal</td>
                            <td>Selecionar</td>
       
                       </tr>  
                     
                   </table><br>


               </div>
        
        <div class="push clear"></div> <div class=clear></div> 
                                                                                                                                                                                                        
<script type="text/javascript">var pkBaseURL=(("https:"==document.location.protocol)?"https://analytics.stammtec.de/":"http://analytics.stammtec.de/");document.write(unescape("%3Cscript src='"+pkBaseURL+"piwik.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">try{var piwikTracker=Piwik.getTracker(pkBaseURL+"piwik.php",3);piwikTracker.trackPageView();piwikTracker.enableLinkTracking()}catch(err){};</script><noscript><p><img src="http://analytics.stammtec.de/piwik.php?idsite=3" style="border:0" alt=""/></p></noscript> <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> <script>window.jQuery||document.write('<script src="./js/libs/jquery-1.6.4.min.js"><\/script>');</script> <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script> <script>window.jQuery.ui||document.write('<script src="./js/libs/jquery-ui-1.8.16.min.js"><\/script>');</script> <script defer src='./js/009eff1.js'></script> <script>$(window).load(function(){$("#accordion").accordion();$(window).resize()});</script> <!--[if lt IE 7 ]><script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script defer>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->

</div>
 </div>
   </body>
</html>




