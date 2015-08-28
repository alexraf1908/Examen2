session_start();
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
<link rel="stylesheet" href="menu.css" type="text/css"/>
	<title>css3menu.com</title>
		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="menu_files/css3menu1/style.css" type="text/css" />
        <style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->

        
<style>
    
    #DivUsuario {
	position: absolute;
top: 310px;
left: 1100px;

margin-top: -260px;
margin-left: -400px;
    }
  .staticMenu {position: fixed; z-index: 4;width:100%;background-color: #1C4583;;left: 10px;}
  .color {color: #cccccc;}
  
</style>
        
</head>

<body>
    <?php
$variable= $_SESSION['usuario'];

include_once '../Negocio/Nusuario.php';

$Nusuario = new Nusuario();

$array = $Nusuario->usuarioPerfil($variable);

$perfil = $array[0]['perfil'];
?>
   
    <div class="staticMenu">

        <h2><div class="color">   Sistema de Trasnportes TransCar SRL.</div></h2> 
<div id="DivUsuario" class="color"><?php echo 'Bienvenido Sr: '.$variable.' ('.$perfil.')' ?> </div>

<?php
switch($perfil) {
    
        case 'administrador':
             ?>
        <input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst"><a href="bienvenido.php" style="height:32px;line-height:32px;"><img src="menu_files/css3menu1/bhome.png" alt=""/>Home</a></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/service.png" alt=""/>Mantenimiento</span></a>
	<ul>
            <li><a href="#"><span>Cliente</span></a>
                <ul>
			<li><a href="formInsertarCliente">Nuevo</a></li>
			<li><a href="formListaCliente">Lista-Cliente</a></li>
		</ul>
                
                </li>
		<li><a href="#"><span>Vehiculo</span></a>
                <ul>
			<li><a href="formInsertarVehiculo">Nuevo</a></li>
			<li><a href="formListaVehiculo">Lista-Vehiculo</a></li>
		</ul>
                </li>
                <li><a href="#"><span>Dispositivo</span></a>
                <ul>
			<li><a href="formInsertardDispo">Nuevo</a></li>
			<li><a href="formListaDispo">Lista-Dispositivo</a></li>
		</ul>
                </li>
		<li><a href="#"><span>Personal</span></a>
                <ul>
			<li><a href="formInsertarPersonal">Nuevo</a></li>
			<li><a href="formListarPersona">Lista-Personal</a></li>
		</ul>
                </li>
		<li><a href="#"><span>Usuario</span></a>
                <ul>
			<li><a href="formInsertarUsuario">Nuevo</a></li>
			<li><a href="formListaUsuario">Lista-Usuario</a></li>
		</ul>
                </li>
               
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/bbuy.png" alt=""/>Movimiento</span></a>
	<ul>
		<li><a href="#"><span>Guia-Remision</span></a>
		<ul>
			<li><a href="formGuiaRemision.php">Nuevo</a></li>
			<li><a href="formListaGuias.php">Lista-Guias</a></li>
		</ul></li>
		<li><a href="#"><span>Factura</span></a>
		<ul>
			
			<li><a href="formListaFactura.php">Lista-Factura</a></li>
		</ul></li>
                <li><a href="#"><span>RegistroSalidas</span></a>
		<ul>
			
			<li><a href="formSalida.php">Nuevo</a></li>
                        <li><a href="formListaSalida.php">Lista-Salida</a></li>
		</ul></li>
            
            <li><a href="#"><span>RegistroLLegadas</span></a>
		<ul>
			<li><a href="formLlegada.php">Nuevo</a></li>
			<li><a href="formListaLlegada.php">Lista-Llegada</a></li>
		</ul></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/blue-calc.png" alt=""/>Caja</span></a>
	<ul>
		
		<li><a href="formPago">ListaDeudores</a></li>
		<li><a href="formListaMovi">Movimiento</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/find.png" alt=""/>Localizacion</span></a>
	<ul>
		<li><a href="formMapsEmpresa">Empresa</a></li>
		<li><a href="formDetaLocaVehi">Vehiculo</a></li>
		<li><a href="formMListVehi">Lista-Vehiculos</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/bnews.png" alt=""/>Reportes</span></a>
	<ul>
		<li><a href="formRptGuia">Report.Guia</a></li>
                <li><a href="formRptFactura">Report.Factura</a></li>
		<li><a href="formRptCliente">Report.Cliente</a></li>
		<li><a href="formRptVehiculo">Report.Vehiculo</a></li>
	</ul></li>
	<li class="toplast"><a href="../Negocio/usuario/cerrarSesion.php" style="height:32px;line-height:32px;"><img src="menu_files/css3menu1/256-2.png" alt=""/>Salir</a></li>
</ul>

        
            <?php
            break;
        
        case 'contador':
             ?>
        <input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst"><a href="bienvenido.php" style="height:32px;line-height:32px;"><img src="menu_files/css3menu1/bhome.png" alt=""/>Home</a></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/service.png" alt=""/>Mantenimiento</span></a>
	<ul>
           
		
               
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/bbuy.png" alt=""/>Movimiento</span></a>
	<ul>
		<li><a href="#"><span>Guia-Remision</span></a>
		<ul>
			<li><a href="formGuiaRemision.php">Nuevo</a></li>
			<li><a href="formListaGuias.php">Lista-Guias</a></li>
		</ul></li>
		<li><a href="#"><span>Factura</span></a>
		<ul>
			
			<li><a href="formListaFactura.php">Lista-Factura</a></li>
		</ul></li>
                <li><a href="#"><span>RegistroSalidas</span></a>
		<ul>
			
			<li><a href="formSalida.php">Nuevo</a></li>
                        <li><a href="formListaSalida.php">Lista-Salida</a></li>
		</ul></li>
            
            <li><a href="#"><span>RegistroLLegadas</span></a>
		<ul>
			<li><a href="formLlegada.php">Nuevo</a></li>
			<li><a href="formListaLlegada.php">Lista-Llegada</a></li>
		</ul></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/blue-calc.png" alt=""/>Caja</span></a>
	<ul>
		
		<li><a href="formPago">ListaDeudores</a></li>
		<li><a href="formListaMovi">Movimiento</a></li>
	</ul></li>

	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/bnews.png" alt=""/>Reportes</span></a>
	<ul>
		<li><a href="formRptGuia">Report.Guia</a></li>
                <li><a href="formRptFactura">Report.Factura</a></li>
		<li><a href="formRptCliente">Report.Cliente</a></li>
		<li><a href="formRptVehiculo">Report.Vehiculo</a></li>
	</ul></li>
	<li class="toplast"><a href="../Negocio/usuario/cerrarSesion.php" style="height:32px;line-height:32px;"><img src="menu_files/css3menu1/256-2.png" alt=""/>Salir</a></li>
</ul>

        
            <?php
            break;

             case 'cajero':
             ?>
        <input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst"><a href="bienvenido.php" style="height:32px;line-height:32px;"><img src="menu_files/css3menu1/bhome.png" alt=""/>Home</a></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/service.png" alt=""/>Mantenimiento</span></a>
	<ul>
            <li><a href="#"><span>Cliente</span></a>
                <ul>
			<li><a href="formInsertarCliente">Nuevo</a></li>
			<li><a href="formListaCliente">Lista-Cliente</a></li>
		</ul>
                
                </li>
		<li><a href="#"><span>Vehiculo</span></a>
                <ul>
			<li><a href="formInsertarVehiculo">Nuevo</a></li>
			<li><a href="formListaVehiculo">Lista-Vehiculo</a></li>
		</ul>
                </li>
                <li><a href="#"><span>Dispositivo</span></a>
                <ul>
			<li><a href="formInsertardDispo">Nuevo</a></li>
			<li><a href="formListaDispo">Lista-Dispositivo</a></li>
		</ul>
                </li>
		<li><a href="#"><span>Personal</span></a>
                <ul>
			<li><a href="formInsertarPersonal">Nuevo</a></li>
			<li><a href="formListarPersona">Lista-Personal</a></li>
		</ul>
                </li>
	
               
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/bbuy.png" alt=""/>Movimiento</span></a>
	<ul>
		<li><a href="#"><span>Guia-Remision</span></a>
		<ul>
			<li><a href="formGuiaRemision.php">Nuevo</a></li>
			<li><a href="formListaGuias.php">Lista-Guias</a></li>
		</ul></li>
		<li><a href="#"><span>Factura</span></a>
		<ul>
			
			<li><a href="formListaFactura.php">Lista-Factura</a></li>
		</ul></li>
                <li><a href="#"><span>RegistroSalidas</span></a>
		<ul>
			
			<li><a href="formSalida.php">Nuevo</a></li>
                        <li><a href="formListaSalida.php">Lista-Salida</a></li>
		</ul></li>
            
            <li><a href="#"><span>RegistroLLegadas</span></a>
		<ul>
			<li><a href="formLlegada.php">Nuevo</a></li>
			<li><a href="formListaLlegada.php">Lista-Llegada</a></li>
		</ul></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/blue-calc.png" alt=""/>Caja</span></a>
	<ul>
		
		<li><a href="formPago">ListaDeudores</a></li>
		<li><a href="formListaMovi">Movimiento</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menu_files/css3menu1/find.png" alt=""/>Localizacion</span></a>
	<ul>
		<li><a href="formMapsEmpresa">Empresa</a></li>
		<li><a href="formDetaLocaVehi">Vehiculo</a></li>
		<li><a href="formMListVehi">Lista-Vehiculos</a></li>
	</ul></li>

	<li class="toplast"><a href="../Negocio/usuario/cerrarSesion.php" style="height:32px;line-height:32px;"><img src="menu_files/css3menu1/256-2.png" alt=""/>Salir</a></li>
</ul>

        
            <?php
           

}
  ?> 

</div>
</body>
</html>
