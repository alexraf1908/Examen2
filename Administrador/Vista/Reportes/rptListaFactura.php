<?php


require_once('class.ezpdf.php');
include_once("../../Negocio/Nfactura.php");

$fecha1 = $_GET['fecha1'];
$fecha2 = $_GET['fecha2'];

$Nfactura = new Nfactura();

$array= $Nfactura->listarXFechas($fecha1, $fecha2);
$monto=0;
for ($i = 0; $i < count($array); $i++) {
    
    $valor=$array[$i]['importe'];
    
    $monto=$monto+$valor;
}

$fechas = 'Desde: '.$fecha1.' hasta '.$fecha2;
	
$pdf = new Cezpdf('A4','landscape');
$pdf->selectFont('fonts/Helvetica.afm');
//$pdf->Cezpdf('A4');
        
$texto= '<i><b>LISTA DE FACTURA PENDIENTES</b></i>';

$total='Deuda por Cobrar Total : S/ '.$monto;
          
$pdf->ezText($texto,20,array('justification' => 'center'));  
$pdf->ezText('');
$pdf->ezText($fechas,16,array('justification' => 'center')); 
$pdf->ezText(''); 
$pdf->ezTable($array);
$pdf->ezText(''); 
$pdf->ezText($total,'15');
$pdf->ezStream();


?>
