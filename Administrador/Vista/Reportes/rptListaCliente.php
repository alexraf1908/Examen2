<?php


require_once('class.ezpdf.php');
include_once("../../Negocio/NdetalleFactura.php");


$Ndeta = new NdetalleFactura();

$array= $Ndeta->listaDetalleMoviXCliente();
$monto=0;
for ($i = 0; $i < count($array); $i++) {
    
    $valor=$array[$i]['TOTAL'];
    
    $monto=$monto+$valor;
}

	
$pdf = new Cezpdf('A4','landscape');
$pdf->selectFont('fonts/Helvetica.afm');
//$pdf->Cezpdf('A4');
        
$texto= '<i><b>LISTA DE CLIENTE POR MOVIMIENTOS</b></i>';

$total='Total de Consumo : S/ '.$monto;
          
$pdf->ezText($texto,20,array('justification' => 'center'));  
$pdf->ezText('');

$pdf->ezTable($array);
$pdf->ezText(''); 
$pdf->ezText($total,'15');
$pdf->ezStream();


?>