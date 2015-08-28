<?php include("../Negocio/usuario/bloqueSeguridad.php");?>  


    <head>
        <script language="JavaScript" type="text/javascript" src="ajaxGuia.js"></script>
        <link rel="stylesheet" href="menu.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="table.css" type="text/css"/>-->

        <link type="text/css" href="css/style.css" rel="stylesheet" />
        <!--    ESTILO GENERAL    -->
        <!--    JQUERY   -->
        <script type="text/javascript" src="js/jquery.js"></script>
      
        <!--    JQUERY    -->
        <!--    FORMATO DE TABLAS    -->
        <link type="text/css" href="css/demo_table.css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <!--    FORMATO DE TABLAS    -->  
        
      <style type="text/css">
/*order ok: link,visited,hover,active*/
A:link, A:visited, A:hover, A:active{color:#0000ff;}

#flotante
{
	position: absolute;
	display:none;
	font-family:Arial;
	font-size:0.8em;
	width:70%;
	border:1px solid #808080;
	background-color:#ECCA97;
        z-index: 2;
}
</style>

<script>

//Funcion que muestra el div en la posicion del mouse
function showdiv(event,idguia)
{
    listarPro(idguia);
	//determina un margen de pixels del div al raton
	margin=5;

	//La variable IE determina si estamos utilizando IE
	var IE = document.all?true:false;
	//Si no utilizamos IE capturamos el evento del mouse
	if (!IE) document.captureEvents(Event.MOUSEMOVE)

	var tempX = 0;
	var tempY = 0;

	if(IE)
	{ //para IE
            
		tempX = event.clientX + document.body.scrollLeft;
		tempY = event.clientY + document.body.scrollTop;
	}else{ //para netscape
		tempX = event.pageX;
		tempY = event.pageY;
	}
	if (tempX < 0){tempX = 0;}
	if (tempY < 0){tempY = 0;}

	//modificamos el valor del id posicion para indicar la posicion del mouse
	//document.getElementById('posicion').innerHTML="PosX = "+tempX+" | PosY = "+tempY+"//idguia="+idguia;
    
        document.getElementById('flotante').style.top = (tempY+margin);
	document.getElementById('flotante').style.left = (tempX+margin);
	document.getElementById('flotante').style.display='block';
        
	return;
        }
        
        function listarPro(idguia){
     
      //div donde se mostrará lo resultados
  divproducto = document.getElementById('resultadoProducto');
  //recogemos los valores de los inputs
  

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST","DetalleGuia.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divproducto.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//desactiva();
	}
 }
 
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("idguia="+idguia)
                

}

</script>
        
        <script>
        $(document).ready(function(){
    verlistado()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO


       })
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/listaGuia.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido").html(data);
            });

        }
        </script>

    </head>
    
<title>Lista Guias</title>

<body bgcolor="#cccccc">
        
  <div id="flotante" onmouseout="this.style.display='none'"  onclick="this.style.display='none'"  onmouseover="this.style.display='block'">
      <br><center><h2>DETALLE DE GUIA</h2></center>
        
        <span id="posicion"></span>
          
        <div id='resultadoProducto'></div>
    
         </div>
    
 <div id="DivMenu"><?php  include_once 'menu.php';?></div>
<div class="statictitulo"><div id="DivTitulos">Lista Guias</div></div>  
   <div id="DivCuerpo">
       
       <div id="contenido">
          
       </div>
   
 
   </div>
 

</body>
</html>