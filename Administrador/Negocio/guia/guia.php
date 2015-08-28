<?php
session_start();

$serie=$_POST['serie'];
$nroGuia=$_POST['nroGuia'];
$fechaEmision=$_POST['fechaEmision'];
$fechaTraslado=$_POST['fechaTraslado'];
$puntoPartida=$_POST['puntoPartida'];
$puntoLlegada=$_POST['puntoLlegada'];                  
$Vehiculo=$_POST['idvehiculo'];
$cliente=$_POST['idcliente'];
$chofer=$_POST['idchofer'];
$destinatario=$_POST['destinatario'];
//$pesoTotal=$_POST['pesoTotal'];
$descripcion=$_POST['descripcion'];
$pesoUnit=$_POST['pesouni'];
$cantidad=$_POST['cantidad'];
//$subTotal=$_POST['subtotal'];

$sub1=$pesoUnit*$cantidad;

$total=0;
if (isset($_SESSION['itemsDetalle'])){

$canastadetalle = $_SESSION['itemsDetalle'];

if ($serie) {
    if (!isset($canastadetalle)) {
   
       $canastadetalle[] = array("des" => $descripcion,"pesoun"=>
$pesoUnit,"cant"=>$cantidad,"sub"=>$sub1);
    } else {
     
        $canastadetalle[] = array("des" => $descripcion,"pesoun"=>
$pesoUnit,"cant"=>$cantidad,"sub"=>$sub1);    
   
    }
}
$_SESSION['itemsDetalle'] = $canastadetalle;

if (isset($canastadetalle)) {
    
  echo '<table>
            <tr>
                <td>Item</td>
                <td>Decripcion</td>
                <td>PesoUnit.</td>
                <td>Cantidad</td>
                <td>SubTotal</td>
                <td>Selecionar</td>
            </tr> ';
for($i=0;$i<count($canastadetalle);$i++){ 
$item=1+$i;

$total=$total+($canastadetalle[$i]['sub']);
echo '
            <tr>
                <td>'.$item.'</td>
                <td>'.($canastadetalle[$i]['des']).'</td>
                <td>'.($canastadetalle[$i]['pesoun']).'</td>
                <td>'.($canastadetalle[$i]['cant']).'</td>
                <td>'.($canastadetalle[$i]['sub']).'</td>
                <td><a style= "text-decoration:underline;cursor:pointer;" 
onclick="eliminarDato('.$i.')">Eliminar</a>     

                </td>            
            </tr>';
   
}
echo '
      <tr>
    <td colspan="4">Total</td>
    <td>'.$total.'</td>
  </tr>

</table>';
}

}


else {
   
    $canastadetalle[] = array("des" => $descripcion,"pesoun"=>
$pesoUnit,"cant"=>$cantidad,"sub"=>$sub1);
    $_SESSION['itemsDetalle']=$canastadetalle;
    $a=0;
      echo '<table>
          
    <tr>
                <td>Item</td>
                <td>Decripcion</td>
                <td>PesoUnit.</td>
                <td>Cantidad</td>
                <td>SubTotal</td>
                <td>Selecionar</td>
            </tr>
            <tr>
                <td>1</td>
                <td>'.($canastadetalle[0]['des']).'</td>
                <td>'.($canastadetalle[0]['pesoun']).'</td>
                <td>'.($canastadetalle[0]['cant']).'</td>
                <td>'.($canastadetalle[0]['sub']).'</td>
                <td><a style= "text-decoration:underline;cursor:pointer;" 
onclick="eliminarDato('.$a.')">Eliminar</a>

                </td>
              
            </tr>
            
<tr>
    <td colspan="4">Total</td>
    <td>'.($canastadetalle[0]['sub']).'</td>
  </tr>

</table>';
  
}

?>