
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
     

function raf(precio){
   //pre = document.getElementById('txtprecio').value;
   divResultado = document.getElementById('resul');

   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado

   ajax.open("GET","../Negocio/factura/canastaDetalleFactura.php?precio="+precio);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divResultado.innerHTML = ajax.responseText
   
   //buscarCliente(idguia);
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
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

  function sumar(i) 
           {          
        
      var n1 = parseFloat(document.getElementById('txtcantidad'+i).value); 
      var n2 = parseFloat(document.getElementById('txtprecio'+i).value); 
      var total=n1*n2;
      //document.f.txtimporte.value=n1*n2; 
         document.getElementById("txtimporte"+i).value=total;
         //document.getElementById("txttotal").value=  total;
         
         //alert(n1);
            } 


function alex(precio,item,idguia){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultadocliente');
  //recogemos los valores de los inputs
  
 //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "../Negocio/factura/canastaDetalleFactura.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
               valor=document.getElementById("txtprecio"+item).value;
                document.getElementById("txtprecio"+item).value=valor
                document.getElementById("txtprecio"+item).focus();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
        
  
ajax.send("precio="+precio+"&item="+item+"&idguia="+idguia)
//buscarCliente(idguia);
}

function msj1(){
             serie = document.getElementById('idserie').value;     
            nro = document.getElementById('idnro').value;
            fecha = document.getElementById('datepicker').value;
            guia = document.getElementById('idguia').value;
  alert(serie);
  alert(nro);
  alert(fecha);
  alert(guia);
}

function msj4(){
    
    serie = document.getElementById('idserie').value;     
            nro = document.getElementById('idnro').value;
            fecha = document.getElementById('datepicker').value;
            guia = document.getElementById('idguia').value;
  alert(serie);
  alert(nro);
  alert(fecha);
  alert(guia);

}

function guardarFactura(){
     
      //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultadocliente');
  //recogemos los valores de los inputs
            serie = document.getElementById('idserie').value;
            nro = document.getElementById('idnro').value;
            fecha = document.getElementById('datepicker').value;
            guia = document.getElementById('idguia').value;
inserta='insertar';
            //st=document.nueva_guia.subtotal.value;

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
		//divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//document.getElementById('botonguardar').disabled="False";
                alert('Se registro con Exito!!!!');
                window.location="formListaFactura.php";
	}
 }
 
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
           
ajax.send("serie="+serie+"&nro="+nro+"&fecha="+fecha+"&guia="+guia+"&inserta="+inserta)
                
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

