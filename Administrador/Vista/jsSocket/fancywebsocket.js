//var map;
var FancyWebSocket = function(url)
{
	var callbacks = {};
	var ws_url = url;
	var conn;
	
	this.bind = function(event_name, callback)
	{
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;
	};
	
	this.send = function(event_name, event_data)
	{
		this.conn.send( event_data );
		return this;
	};
	
	this.connect = function() 
	{
		if ( typeof(MozWebSocket) == 'function' )
		this.conn = new MozWebSocket(url);
		else
		this.conn = new WebSocket(url);
		
		this.conn.onmessage = function(evt)
		{
			dispatch('message', evt.data);
		};
		
		this.conn.onclose = function(){dispatch('close',null)}
		this.conn.onopen = function(){dispatch('open',null)}
	};
	
	this.disconnect = function()
	{
		this.conn.close();
	};
	 //pa(-8.100528, -79.021901);	
	var dispatch = function(event_name, message)
	{
		if(message == null || message == "")//aqui es donde se realiza toda la accion
			{
            prueba1();
			}
			else
			{
			    
			   prueba2();
				var JSONdata    = JSON.parse(message); //parseo la informacion
	
				switch(JSONdata[0].actualizacion)//que tipo de actualizacion vamos a hacer(un nuevo mensaje, solicitud de amistad nueva, etc )
				{
					case '1':
					actualiza_mensaje(message);
					break;
					case '2':
					
					//var f= mapa(-9.00528, -79.021901);
						actualiza_mensaje(message);	
	//actualiza_solicitud(message);
					break;
					
				}
				//aqui se ejecuta toda la accion
			
			}
	}
};

var Server;
function send1( text ) 
{
    Server.send( 'message', text );
}
$(document).ready(function() 
{
	Server = new FancyWebSocket('ws://192.168.1.100:12345');
    Server.bind('open', function()
	{
    });
    Server.bind('close', function( data ) 
	{
    });
    Server.bind('message', function( payload ) 
	{
    });
    Server.connect();
});


function actualiza_mensaje(message)
{
	var JSONdata    = JSON.parse(message); //parseo la informacion
				var tipo = JSONdata[0].tipo;
				var mensaje = JSONdata[0].mensaje;
				var fecha = JSONdata[0].fecha;
				
				var contenidoDiv  = $("#"+tipo).html();
				var mensajehtml   = fecha+' : '+mensaje;
				
				$("#"+tipo).html(contenidoDiv+'0000111'+mensajehtml);
}
function actualiza_solicitud()
{
	alert("tipo de envio 2");
}


function objetoAja(){
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
  divResultado = document.getElementById('fa');
  //recogemos los valores de los inputs
            //st=document.nueva_guia.subtotal.value;

   //instanciamos el objetoAjax
  ajax=objetoAja();
 
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
                
}

function prueba1(){
    var tipo = '2';
    $("#"+tipo).html('prueba1');
}

function prueba2(){
    var tipo = '2';
    $("#"+tipo).html('prueba2');
}

        function mapa(la,lo) {
		
        var latlng = new google.maps.LatLng(la,lo);
        var settings = {
            zoom: 15,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	 var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
		return map;
     //google.maps.event.addListener(map, 'click', marcador(la,lo));
	
		}
	
	function marcador(a,b,mpp) {
	var po= new google.maps.LatLng(a,b);
	
  var marker = new google.maps.Marker({
      position: po,
      map: mpp
  });

  map.setCenter(po);
}
		
	//send('hola');
	
	
