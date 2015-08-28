<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require("../../Negocio/Nfactura.php");

$array=new Nfactura();

$factura=$array->listarFactura();
//if (count($array)>=1)
echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>id</th><!--Estado-->
                        <th>Nro</th>
                        <th>Cliente</th>
                        <th>Ruc</th>
			<th>Fecha</th>
                        <th>Importe</th>
                        <th>Impreso</th>
                        <th>Igv</th>
                        <th>subIgv</th>
                        <th>estado</th>
                        

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                  <tbody>';?>
                    <?php
         
     for($i=0;$i<count($factura);$i++){
                   
                               echo '<tr>';
                               echo '<td >'. $factura[$i]['idfactura'].'</td>';
                               echo '<td >'. $factura[$i]['nro'].'</td>';
                               echo '<td >'. $factura[$i]['razon'].'</td>';
                               echo '<td >'. $factura[$i]['ruc'].'</td>';
                               echo '<td >'. $factura[$i]['fecha'].'</td>';
                               echo '<td >'. $factura[$i]['importe'].'</td>';
                               echo '<td >'. $factura[$i]['impreso'].'</td>';
                               echo '<td >'. $factura[$i]['igv'].'</td>';
                               echo '<td >'. $factura[$i]['subTotalIgv'].'</td>';
                               echo '<td >'. $factura[$i]['estado'].'</td>';
                               echo '<td><a href="formRealizaPago.php?codfactura='.$factura[$i]['idfactura'].'&monto='.$factura[$i]['importe'].'"><ACRONYM title="Pagar Factura"><img src="Imagenes/dinero.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
                               echo '</tr>';
                     
                        }echo '<tbody>
            </table>';
                    ?>
                