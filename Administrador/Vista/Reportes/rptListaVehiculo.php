<?php


require_once('class.ezpdf.php');
include_once("../../Negocio/Nlocalizacion.php");

$fechaini = $_GET['fecha1'];
$fechafin = $_GET['fecha2'];
$vehi = $_GET['vehiculo'];

   
    $Nlocalizacion = new Nlocalizacion();
    
    $fe1= $Nlocalizacion->cambioFormatoFecha($fechaini).' 00:00:00 a.m.';
    $fe2= $Nlocalizacion->cambioFormatoFecha($fechafin).' 24:59:59 p.m.';
    
    $array = $Nlocalizacion->listaLocalizacion($vehi, $fe1, $fe2);


$fechas = 'Desde: '.$fechaini.' hasta '.$fechafin;

	
$pdf = new Cezpdf('A4','landscape');
$pdf->selectFont('fonts/Helvetica.afm');
//$pdf->Cezpdf('A4');
        
$texto= '<i><b>Detalle de Ubicacion de Vehiculo</b></i>';

$total='Total de Movimientos:'.  count($array);
          
$pdf->ezText($texto,20,array('justification' => 'center'));  
$pdf->ezText('');
$pdf->ezText($fechas,16,array('justification' => 'center')); 
$pdf->ezText(''); 
$pdf->ezTable($array);
$pdf->ezText(''); 
$pdf->ezText($total,'15');
$pdf->ezStream();


?>

