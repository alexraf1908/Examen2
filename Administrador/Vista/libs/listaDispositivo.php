
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Ndispositivo.php");

$Ndispo=new Ndispositivo();

$dispositivo=$Ndispo->listarDispositivo();


echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    
                        <th>imei</th><!--Estado-->
                        <th>Descripcion</th>
			<th>Estado</th>
                        <th>codvehiculo</th>
                       
                                            
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      


     for($i=0;$i<count($dispositivo);$i++){
                   
                               echo '<tr>';
                               
                               echo '<td>'.$dispositivo[$i]['imei'].'</td>';
                               echo '<td>'.$dispositivo[$i]['descri'];'</td>';
                               echo '<td>'.$dispositivo[$i]['estado'];'</td>';
                               
                             
                   
                               
                               if(($dispositivo[$i]['idvehiculo'])=='0'){
                       echo '<td>SIN ASIGNACION</td>';                               
                   echo '<td><a href="formAsignarVehiculo.php?imei='.$dispositivo[$i]['imei'].'"><ACRONYM title="Asignar Vehiculo"><img src="Imagenes/facturado.png" width="25" height="25" alt="editar"/></ACRONYM> </td>';
                    
                    }        
                    
                    else{
                     
                        echo '<td>'.$dispositivo[$i]['idvehiculo'];'</td>';
                   echo '<td> <a style= "cursor:pointer;" onclick="eliminarDispositivo('.$dispositivo[$i]['imei'].');"><ACRONYM title="Quitar Asignación"><img src="Imagenes/eliminar.png" width="25" height="25" alt="editar"/></ACRONYM></a> </td>';
                            
                    }                                                                
                               echo '<td><a href="formInsertardDispo.php?imei='.$dispositivo[$i]['imei'].'"><ACRONYM title="Editar Dispositivo"><img src="Imagenes/editarusuario.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
                               //echo '<td><a href="#"><img src="Imagenes/agregar.png" width="25" height="25" alt="editar"/></a></td>';
                             
                               
                               echo '</tr>';
                               
                              
                     
                        }echo '                    
            
             <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                     
             
                    </tr>
                </tfoot>
            </table>';

                    ?>
                