<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$precio=$_POST['precio'];
$i=$_POST['item'];
$idguia=$_POST['idguia'];

include_once("../Nguia.php");
include_once("../Ncliente.php");


$total=0;
$g = new Nguia();
$idcliente = $g->enviaCliente($idguia);

$c= new Ncliente();
 $cliente=$c->buscarCliente($idcliente);
 
 echo 'RUC: '.$cliente[0]['ruc'].'<BR>';
                       echo 'SEÑORES: '.$cliente[0]['razon'].'<BR>';
                      echo 'DIRECCION: '.$cliente[0]['direccion'].'<BR>';
                       echo 'TELEFONO: '.$cliente[0]['telefono'].'<BR>';
 echo '</br>';

//echo $i.'<br>';
//echo $precio.'<br>';
//echo $idguia.'<br>';

$_SESSION["canastafactura"][$i]["precio"] = $precio;
        
 $detalleFactura= $_SESSION['canastafactura'];
 
 echo '<form name="f"><center><table border="1">
            <tr>
                <td>Cantid.</td>
                <td>Unid.</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Importe</td>
                
               
            </tr>';

for($i=0;$i<count($detalleFactura);$i++){
           
           $importe=$detalleFactura[$i]['cantidad']*$detalleFactura[$i]['precio'];
           $_SESSION["canastafactura"][$i]["subtotal"] = $importe;
           
        echo '<tr><td><input type="text" name="txtcantidad" value="'.$detalleFactura[$i]['cantidad'].'" size="10" disabled="disabled" /></td>
              <td>TN</td>
              <td>'.$detalleFactura[$i]['descripcion'].'</td>
              <td><input type="text" id="txtprecio'.$i.'" name="txtprecio" value="'.$detalleFactura[$i]['precio'].'" size="10" onkeyup="alex(this.value,'.$i.','.$idguia.')"/></td>
              <td><input type="text" name="txtimporte" value="'.$_SESSION["canastafactura"][$i]["subtotal"].'" size="10" disabled="disabled" /> </td>
              </tr>';
     
  
           }
            $detalleFactur= $_SESSION['canastafactura'];
            for($i=0;$i<count($detalleFactur);$i++){
     
     $total=$total+($detalleFactur[$i]['subtotal']);
     $por=$total* 18/100;
     $sub=$total-$por;
 }
echo'
    
    <tr><td colspan="4">SubTotal</td><td><input type="text" name="txtpor" value="'.$sub.'" size="10" disabled="disabled" /></td></tr>
    <tr><td colspan="4">Igv 18%</td><td><input type="text" name="txtpor" value="'.$por.'" size="10" disabled="disabled" /></td></tr>
    <tr><td colspan="4">Total</td><td><input type="text" name="txttotal" value="'.$total.'" size="10" disabled="disabled" /></td></tr>
    
    ';
              
              echo'</table></center></form>'; 
?>
