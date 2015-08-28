<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    
    <head>
        <script language="JavaScript" type="text/javascript" src="ajaxGuia.js"></script>
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
        
  
     
    </head>
    
<title>Lista Guias</title>

<body bgcolor="#cccccc">
 <div id="DivMenu"><?php  include_once 'menu.php';?></div>
 <div class="statictitulo"><div id="DivTitulos">Realiza Pago</div></div>  
   <div id="DivCuerpo">
        <?php 
        include_once('../Negocio/Npago.php');
        include_once('../Negocio/Nfactura.php');
        include_once('../Entidad/Pago.php');
       
        
        if(!empty($_GET)){
            
            $idfactura= $_GET['codfactura'];
            $monto= $_GET['monto'];
        }
        
         
        if(!empty($_POST)){
            
            $idfactura= $_POST['txtfactura'];
            $fecha= $_POST['txtdate'];
            $estado= '1';
            $monto= $_POST['txtmonto'];
            
            $loca = new Pago($fecha, $monto, $estado, $idfactura);
            
            $Npago = new Npago();
            $Npago->insertar($loca);
            
            $Nfactura = new Nfactura();
            $Nfactura->actualizaEstado($idfactura,'PAGADO');

            echo '<script> alert ("Se Registro con Exito")</script>';
            echo '<script type="text/javascript">
               window.location="formListaFactura.php"; </script>';
            
        }
        
        ?>
       <div id="contenido">
           

  <form action="#" method="POST">
  <fieldset>
  <legend>Detalle Pago</legend>
 
  <center><table border="0" width="50%">

      <tbody>
          <tr>
              <td>CodFactura: </td>
              <td><input requeried type="text" name="txtfactura" value="<?php echo $idfactura?>"  readonly="readonly" /></td>
          </tr>
          <tr>
              <td>Fecha:</td>
              <td><input type="text" class="date-pick" name="txtdate" value=""/></td>
          </tr>
          <tr>
              <td>Monto:</td>
              <td><input required type="text" name="txtmonto" value="<?php echo $monto?>" readonly="readonly"/></td>
          </tr>
      </tbody>
  </table></center><br>

  <div><center><input type="submit" value="guardar" /></center></div>
</fieldset>
</form>     
           
       </div>
   </div> 
</body>
</html>