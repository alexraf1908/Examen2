<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$serie=$_POST['serie'];
$nro=$_POST['nro'];
$fecha=$_POST['fecha'];
$guia=$_POST['guia'];


include_once("../../Datos/FacturaDAO.php");
include_once("../../Entidad/Factura.php");

include_once("../../Datos/DetalleFacturaDAO.php");
include_once("../../Entidad/DetalleFactura.php");



 $detalleFactur= $_SESSION['canastafactura'];
 $total=0;
            for($i=0;$i<count($detalleFactur);$i++){
     
     $total=$total+($detalleFactur[$i]['subtotal']);
     $por=$total* 18/100;
            $sub=$total-$por;
            
            }

$fac = new Factura($serie, $nro, $fecha, $total,'0', $por, $sub,'PENDIENTE');
$facDAO = new FacturaDAO();
$facDAO->insertar($fac);
$codFactura=$facDAO->ultimaFactura();

 for($i=0;$i<count($detalleFactur);$i++){
     
    $defac = new DetalleFactura($codFactura, $guia,$detalleFactur[$i]['descripcion'],$detalleFactur[$i]['cantidad'],$detalleFactur[$i]['precio'],$detalleFactur[$i]['subtotal']);
    $defacDAO = new DetalleFacturaDAO();
    $defacDAO->insertar($defac);

            
            }
                       
            
   echo '<center><h1>factura Registrada</h1></center>';

   echo '<script> alert("Factura Registrada");</script>';
//$codFactura=$facDAO->ultimaFactura();
          
unset($_SESSION['canastafactura']);

?>
