
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


function enviarDatosCanasta(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  
           // idguia=document.nueva_guia.idguia.value;       
            ser=document.nueva_guia.serie.value;
            nroguia=document.nueva_guia.nroGuia.value;
            fe=document.nueva_guia.fechaEmision.value;
            ft=document.nueva_guia.fechaTraslado.value;
            pp=document.nueva_guia.puntoPartida.value;
            pl=document.nueva_guia.puntoLlegada.value;
            
           v = document.getElementById('idvehi').value;
            c = document.getElementById('idcli').value;
            ch = document.getElementById('idper').value;
            d = document.getElementById('idcli1').value;
         
            //p=document.nueva_guia.pesoTotal.value;
            descrip=document.nueva_guia.descripcion.value;  
            pu=document.nueva_guia.pesouni.value;
            cant=document.nueva_guia.cantidad.value;
            //st=document.nueva_guia.subtotal.value;

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
   ajax.open("POST","../Negocio/guia/guia.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		document.nueva_guia.descripcion.value="";
                document.nueva_guia.pesouni.value="";
                document.nueva_guia.cantidad.value="";
           
	}
 }
    
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("serie="+ser+"&nroGuia="+nroguia
+"&fechaEmision="+fe+"&fechaTraslado="+ft+"&puntoPartida="+pp
+"&puntoLlegada="+pl+"&idvehiculo="+v+"&idcliente="+c+"&idchofer="+ch
+"&destinatario="+d+"&descripcion="+descrip+"&pesouni="+pu+"&cantidad="+cant)
 
}

//Función para recoger los datos del formulario y enviarlos por post  
function guardarGuia(){
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
        
            ser=document.nueva_guia.serie.value;
            nroguia=document.nueva_guia.nroGuia.value;
            fe=document.nueva_guia.fechaEmision.value;
            ft=document.nueva_guia.fechaTraslado.value;
            pp=document.nueva_guia.puntoPartida.value;
            pl=document.nueva_guia.puntoLlegada.value;
            v = document.getElementById('idvehi').value;
            c = document.getElementById('idcli').value;
            ch = document.getElementById('idper').value;
            d = document.getElementById('idcli1').value;
            //p=document.nueva_guia.pesoTotal.value;
            descrip=document.nueva_guia.descripcion.value;  
            pu=document.nueva_guia.pesouni.value;
            cant=document.nueva_guia.cantidad.value;
            //st=document.nueva_guia.subtotal.value;
            
            insertar = document.getElementById('btnInsertaGuia').value;

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST","../Negocio/Nguia.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		//divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//desactiva();
                alert('Se registro con Exito!!!!');
                window.location="formGuiaRemision.php";
	}
 }
 
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("serie="+ser+"&nroGuia="+nroguia
+"&fechaEmision="+fe+"&fechaTraslado="+ft+"&puntoPartida="+pp
+"&puntoLlegada="+pl+"&idvehiculo="+v+"&idcliente="+c+"&idchofer="+ch
+"&destinatario="+d+"&descripcion="+descrip+"&pesouni="+pu+"&cantidad="+cant+"&insertar="+insertar)
                
}
     

function devuelveCliente(codigo){
     
      //div donde se mostrará lo resultados
  divResultado= document.getElementById('resultado');
  //recogemos los valores de los inputs
       
          

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("GET","formGuiaRemision.php?codigo="+codigo);
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
           
ajax.send(null)
                
}


function eliminarDato(item){
   //donde se mostrará el resultado de la eliminacion
   divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea eliminar este dato?")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET","../Negocio/guia/eliminaItem.php?item="+item);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divResultado.innerHTML = ajax.responseText
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
   
}

function listarGuia(){
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultadoListaGuia');
  //recogemos los valores de los inputs
        fecha = document.getElementById('idfecha').value;
        razon = document.getElementById('idrazon').value;

   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST","../Negocio/guia/listarGuia.php",true);
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
 
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("fecha="+fecha+"&razon="+razon)
                
}


