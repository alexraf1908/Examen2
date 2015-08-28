<?php
require_once('class.ezpdf.php');
include_once("../../Datos/detalleCronogramaDAO.php");

$detalle=new detalleCronogramaDAO();

$array= $detalle->listarCronograma('2015','17');

	
$pdf = new Cezpdf('A4');
$pdf->selectFont('fonts/Helvetica.afm');

        
        $texto= 'LISTA DE ESTUDIANTES';
        
 $pdf->ezText($texto,'20');       
$pdf->ezTable($array);


$pdf->ezStream();


?>