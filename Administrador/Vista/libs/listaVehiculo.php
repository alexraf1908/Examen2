
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 include_once ('../../Negocio/Nvehiculo.php');
 
 $array = new Nvehiculo();
 
 $vehiculo=$array->listarVehiculo();


echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    
                        <th>id</th><!--Estado-->
                        <th>Descrip.</th>
			<th>Placa</th>
                        <th>Dispositivo</th>
                        <th>Imei</th>
                        
                      
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      
     for($i=0;$i<count($vehiculo);$i++){
                   
                               echo '<tr>';
                               echo '<td>'.$vehiculo[$i]['codVehi'].'</td>';
                               echo '<td>'.$vehiculo[$i]['descri'];'</td>';
                               echo '<td>'.$vehiculo[$i]['placa'];'</td>';
                               echo '<td>'.$vehiculo[$i]['dispo'];'</td>';
                               echo '<td>'.$vehiculo[$i]['imei'];'</td>';
			       echo '<td><center><ACRONYM title="Ver Posicion"><a href="formLocalizacion?codVehi='.$vehiculo[$i]['codVehi'].'"> <img src="Imagenes/mapa.png" width="20" height="30" alt="mapa"/></a></ACRONYM></center></td>';
							
                               echo '</tr>';
                     
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
            </table>';
                        


                    ?>