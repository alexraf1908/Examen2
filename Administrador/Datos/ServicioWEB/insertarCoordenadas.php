

<?php 
            
$imei=$_POST['imei'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$fecha=$_POST['fecha'];
$precision=$_POST['precision'];
$direccion=$_POST['direccion'];
$proveedor=$_POST['proveeedor'];


include_once '../../Negocio/Nlocalizacion.php';

$inserta = new Nlocalizacion();
$inserta->insertarLocalizacion($imei, $latitud, $longitud, $fecha, $precision, $direccion, $proveedor);

//$inserta->insertarLocalizacion('1','2','3','4','5','6','8');


//echo json_encode($arrayjson)
?>
