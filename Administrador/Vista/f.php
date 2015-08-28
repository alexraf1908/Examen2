<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<!-- aCTUALIZACION POR SOCKET  -->
<?php echo '<script src="jsSocket/jquery-1.7.2.min.js"></script>'; ?>
<?php echo '<script src="jsSocket/fancywebsocket.js"></script>'; ?>

<script language="javascript">
    
    function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function insertar()
{
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('1');
  //recogemos los valores de los inputs
            //st=document.nueva_guia.subtotal.value;

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("GET","listaGuia.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//desactiva();
	}
        
 }
 
	//ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send();
//setTimeout('insertar()',1000);
       send1('h');         
}
</script>

</head>

<body>

    <div id="1"> </div>
    
    <input type="submit" value="enviar" onclick="insertar();" />
<div id="2"> </div>
</body>
</html>