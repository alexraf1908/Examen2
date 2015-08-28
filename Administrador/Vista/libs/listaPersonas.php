
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Npersona.php");

$Npersona=new Npersona();

$persona=$Npersona->listarPersonal();

                    
echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    
                        <th>cod</th><!--Estado-->
                        <th>Personal</th>
			<th>Direccion</th>
                        <th>DNI</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Brevete</th>
                        <th>Cargo</th>
                                          
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      


     for($i=0;$i<count($persona);$i++){
                   
                               echo '<tr>';
                               
                               echo '<td>'.$persona[$i]['idpersona'].'</td>';
                               echo '<td>'.$persona[$i]['nombres'].' '.$persona[$i]['apellidos'].'</td>';
                               echo '<td>'.$persona[$i]['direccion'];'</td>';
                               echo '<td>'.$persona[$i]['dni'];'</td>';
                               echo '<td>'.$persona[$i]['correo'];'</td>';
                               echo '<td>'.$persona[$i]['telefono'];'</td>';
                               echo '<td>'.$persona[$i]['brevete'];'</td>';
                               echo '<td>'.$persona[$i]['tipo'];'</td>';
                               
                  
                               
                              
                
 
                   echo '<td> <a style= "cursor:pointer;" onclick="eliminarPersonall('.$persona[$i]['idpersona'].');"><ACRONYM title="Eliminar Personal"><img src="Imagenes/eliminar.png" width="25" height="25" alt="editar"/></ACRONYM></a> </td>';
                            
                                                                                   
                               echo '<td><a href="formInsertarPersonal.php?codper='.$persona[$i]['idpersona'].'"><ACRONYM title="Editar Personal"><img src="Imagenes/editarusuario.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
                               //echo '<td><a href="#"><img src="Imagenes/agregar.png" width="25" height="25" alt="editar"/></a></td>';
                             
                               
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
                                     
                    </tr>
                </tfoot>
            </table>';

                    ?>
                
