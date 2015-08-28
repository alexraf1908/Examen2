
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
 

function ListarMovimientoCaja(){
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
            fecha1 = document.getElementById('idfecha1').value;
            fecha2 = document.getElementById('idfecha2').value;

listar='listar';
            //st=document.nueva_guia.subtotal.value;

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST","../Negocio/Npago.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//document.getElementById('botonguardar').disabled="False";
	}
 }
 
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("fechaini="+fecha1+"&fechafin="+fecha2+"&listar="+listar)
                
}

function ListarLocalizacion(){
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
            
            placa = document.getElementById('idplaca').value;
            fecha1 = document.getElementById('idfecha1').value;
            fecha2 = document.getElementById('idfecha2').value;

listarloca='listarr';
            //st=document.nueva_guia.subtotal.value;

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST","../Negocio/Nlocalizacion.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//document.getElementById('botonguardar').disabled="False";
	}
 }
 
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("placa="+placa+"&fechaini="+fecha1+"&fechafin="+fecha2+"&listarloca="+listarloca)
                
}



