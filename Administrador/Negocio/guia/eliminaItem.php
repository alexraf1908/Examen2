<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$item=$_GET['item'];

$canasta = $_SESSION['itemsDetalle'];

unset($canasta[$item]);

$canastadetall = array_values($canasta);
$_SESSION['itemsDetalle']=$canastadetall;

if (isset($canastadetall)) {
   $total=0; 
  echo '<table>
            <tr>
                <td>Item</td>
                <td>Decripcion</td>
                <td>PesoUnit.</td>
                <td>Cantidad</td>
                <td>SubTotal</td>
                <td>Selecionar</td>
            </tr> ';
for($i=0;$i<count($canastadetall);$i++){ 
$item=1+$i;

$total=$total+($canastadetall[$i]['sub']);
echo '
            <tr>
                <td>'.$item.'</td>
                <td>'.($canastadetall[$i]['des']).'</td>
                <td>'.($canastadetall[$i]['pesoun']).'</td>
                <td>'.($canastadetall[$i]['cant']).'</td>
                <td>'.($canastadetall[$i]['sub']).'</td>
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

?>
