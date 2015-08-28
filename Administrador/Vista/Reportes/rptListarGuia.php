<?php


require_once('class.ezpdf.php');
include_once("../../Negocio/NGuia.php");

$fecha1 = $_GET['fecha1'];
$fecha2 = $_GET['fecha2'];
$estado = $_GET['esta'];

$NGuia = new Nguia();

$array= $NGuia->listaGuiaXEstado($fecha1, $fecha2, $estado);

if ($estado =='0'){
  $esta = 'Por Facturar';  
    
}
if ($estado =='1'){
  $esta = 'Facturadas';  
    
}



$fechas = 'Desde: '.$fecha1.' hasta '.$fecha2;
	
$pdf = new Cezpdf('A4','landscape');
$pdf->selectFont('fonts/Helvetica.afm');
//$pdf->Cezpdf('A4');
        
$texto= '<i><b>LISTA DE GUIAS '.$esta.'</b></i>';

$total='Total de guias :'.  count($array);
          
$pdf->ezText($texto,20,array('justification' => 'center'));  
$pdf->ezText('');
$pdf->ezText($fechas,16,array('justification' => 'center')); 
$pdf->ezText(''); 
$pdf->ezTable($array);
$pdf->ezText(''); 
$pdf->ezText($total,'15');
$pdf->ezStream();


?>
