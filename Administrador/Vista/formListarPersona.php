<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    
    <head>
       
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
        <script language="JavaScript" type="text/javascript" src="ajaxElimi.js"></script>
        
        <script>
        $(document).ready(function(){
    verlistado()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO


       })
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/listaPersonas.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido").html(data);
            });

        }
        </script>
    </head>
    
<title>Lista Guias</title>

<body bgcolor="#cccccc">
 <div id="DivMenu"><?php  include_once 'menu.php';?></div>
 <div class="statictitulo"><div id="DivTitulos">Lista Personal</div></div>  
   <div id="DivCuerpo">
        
       <div id="contenido">

       </div>
                  <?php 

include_once ('../Negocio/Npersona.php');

$Npersona = new Npersona();

if (isset($_GET['item'])){
    
    $idperso= $_GET['item'];
    
   $Npersona->eliminarPersonal($idperso);
           
   // echo $idvehiculo;
}
?>
 
   </div> 
 

</body>
</html>
