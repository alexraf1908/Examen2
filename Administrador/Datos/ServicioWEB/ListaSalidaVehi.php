<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$idcliente =$_POST['idvalor'];

include_once ('../../Negocio/Nguia.php');

$Ngui = new Nguia();

$guia = $Ngui->listaSinLlegadaCliente($idcliente);

echo json_encode($guia);


?>
