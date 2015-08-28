<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$idVehiculo = $_POST['idvalor'];

include_once ('../../Negocio/Nlocalizacion.php');

$Nlocalizacion = new Nlocalizacion();

$localizacion = $Nlocalizacion->consultaLocalizacion($idVehiculo);

echo json_encode($localizacion);



?>
