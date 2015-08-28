
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



//Función para recoger los datos del formulario y enviarlos por post  
function buscarCliente(idguia){
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultadocliente');
  idcliente='enviaclie';
  //recogemos los valores de los inputs
  

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST","../Negocio/Nfactura.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//document.getElementById('botonguardar').disabled="false";
	}
 }
   
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("idguia="+idguia+"&enviaclie="+idcliente)

                
}
     



function eliminarDato(item){
   //donde se mostrará el resultado de la eliminacion
   //divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea eliminar este dato?")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
      
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET","formListaCliente?item="+item);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   //divResultado.innerHTML = ajax.responseText
   window.location="formListaCliente.php";
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
   
}

function eliminarDispositivo(item){
   //donde se mostrará el resultado de la eliminacion
   //divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea quitar la asignacion????")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
      
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET","formListaDispo.php?item="+item);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   //divResultado.innerHTML = ajax.responseText
   window.location="formListaDispo.php";
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
   
}
function eliminarPersonall(item){
   //donde se mostrará el resultado de la eliminacion
   //divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea eliminar este dato?")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
      
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET","formListarPersona.php?item="+item);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   //divResultado.innerHTML = ajax.responseText
   window.location="formListarPersona.php";
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
   
}

function eliminarUsuarioo(item){
   //donde se mostrará el resultado de la eliminacion
   //divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea eliminar este dato?")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
      
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET","formListaUsuario.php?item="+item);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   //divResultado.innerHTML = ajax.responseText
   window.location="formListaUsuario.php";
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
   
}


function eliminarDatoVehiculo(item){
   //donde se mostrará el resultado de la eliminacion
   //divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea eliminar este dato?")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
      
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET","formListaVehiculo?item="+item);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   //divResultado.innerHTML = ajax.responseText
   window.location="formListaVehiculo.php";
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
   
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
  ajax.open("POST","libs/DetalleGuia.php",true);
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

function msj(){
  
  alert('holassf');
}