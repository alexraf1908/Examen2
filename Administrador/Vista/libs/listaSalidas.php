
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Nsalida.php");

$guiar=new Nsalida();

$cliente=$guiar->listar();


echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    
                        <th>id</th><!--Estado-->
                        <th>Nro</th>
                        <th>Vehiculo</th>
			<th>Fecha-Salida</th>
                        <th>Cliente</th>
                        <th>P-Partida</th>
                        <th>Cliente</th>
                        <th>P-Llegada</th>
                        <th>Chofer</th>
                       
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      
    

     for($i=0;$i<count($cliente);$i++){
                   
                               echo '<tr>';
                               echo '<td> <a style= "cursor:pointer;color:black;" onclick="showdiv(event,'.$cliente[$i]['idguia'].');">'.$cliente[$i]['idguia'].'</a> </td>';
                               echo '<td>'.$cliente[$i]['nro'].'</td>';
                               echo '<td>'.$cliente[$i]['vehiculo'].'</td>';
                               echo '<td>'.$cliente[$i]['fechaSalida'];'</td>';
                               echo '<td>'.$cliente[$i]['razonSocial'];'</td>';
                               echo '<td>'.$cliente[$i]['ppartida'];'</td>';
                               echo '<td>'.$cliente[$i]['razonSocial'];'</td>';
                               echo '<td>'.$cliente[$i]['pLlegada'];'</td>';
                               echo '<td>'.$cliente[$i]['nombres'];'</td>';
                            
                             
                             
                               echo '</tr>';
                               
                              
                     
                        }echo '                    
            
             <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
             
                    </tr>
                </tfoot>
            </table>';
                        

                    ?>
                