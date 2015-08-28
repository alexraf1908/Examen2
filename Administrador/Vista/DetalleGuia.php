<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require("../Negocio/NdetalleGuia.php");

$idguia=$_POST['idguia'];
$total='';

$detalleguia = new NdetalleGuia();

$cliente = $detalleguia->listarDetalle($idguia);

echo '

            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="display">
                <thead>
                    
                        <th>idguia</th><!--Estado-->
                        <th>Producto</th>
			<th>Peso-Unitario</th>
                        <th>Cantidad</th>
                        <th>SubPeso</th>
                        
                     
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      
     for($i=0;$i<count($cliente);$i++){
                
                               echo '<tr>';
                               echo '<td>'.$cliente[$i]['idGuia'].'</td>';
                               echo '<td>'.$cliente[$i]['descripcion'];'</td>';
                               echo '<td>'.$cliente[$i]['pesoUnitario'];'</td>';
                               echo '<td>'.$cliente[$i]['cantidad'];'</td>';
                               echo '<td>'.$cliente[$i]['subTotalPeso'];'</td>';
 
							
                               echo '</tr>';
                     $total= $total+$cliente[$i]['subTotalPeso'];
                        }echo '                    
             <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
  
            </table><h2>Peso Total: '.$total.'</h2>
                    
                    ';
                    ?>
               

