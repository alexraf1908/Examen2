/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
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
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosCarga(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  
            codcar=document.nueva_carga.codPro.value;
            fe=document.nueva_carga.fecha.value;
            vehi=document.nueva_carga.vehiculo.value;
            cho=document.nueva_carga.chofer.value;
            cli=document.nueva_carga.cliente.value;
            pro=document.nueva_carga.producto.value;
            can=document.nueva_carga.cantidad.value;
            peso=document.nueva_carga.peso.value;
            pp=document.nueva_carga.direccionpar.value;
            pl=document.nueva_carga.direccionlle.value;
            desti=document.nueva_carga.destinatario.value;
            pt=document.nueva_carga.pesototal.value;         
           
   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "carga.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
        
  
ajax.send("vehiculo="+vehi+"&chofer="+cho+"&fecha="+fe+"&cliente="+cli+"&producto="+pro+"&cantidad="+can+"&peso="+peso+"&puntoPar="+pp+"&puntoLle="+pl+"&destinatario="+desti+"&pesototal="+pt+"&codcarga="+codcar)

}

function enviarDatosListaFiltroCliente(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  
            ra=document.formListaCliente.razon.value;
            ruc=document.formListaCliente.ruc.value;
          
   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "../ProcesarPHP/cliente/listaFiltroCliente.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		
	}
 }

	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
        
  
ajax.send("razon="+ra+"&ruc="+ruc)

}
 
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_empleado.nombre.value="";
  document.nuevo_empleado.apellido.value="";
  document.nuevo_empleado.web.value="";
  document.nuevo_empleado.nombre.focus();
}

function emsj(){
    
    alert('hola como estasss');
    
}

