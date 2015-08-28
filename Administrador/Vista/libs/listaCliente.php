
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Ncliente.php");

$Ncliente=new Ncliente();

$cliente=$Ncliente->listarCliente();


echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    
                        <th>id</th><!--Estado-->
                        <th>Razon</th>
			<th>Ruc</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Representante</th>
                      
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      


     for($i=0;$i<count($cliente);$i++){
                   
                               echo '<tr>';
                               
                               echo '<td>'.$cliente[$i]['idcli'].'</td>';
                               echo '<td>'.$cliente[$i]['razon'];'</td>';
                               echo '<td>'.$cliente[$i]['ruc'];'</td>';
                               echo '<td>'.$cliente[$i]['direccion'];'</td>';
                               echo '<td>'.$cliente[$i]['correo'];'</td>';
                               echo '<td>'.$cliente[$i]['telefono'];'</td>';
                               echo '<td>'.$cliente[$i]['repre'];'</td>';
                               
                   $movi=$Ncliente->clienteSinMovimiento($cliente[$i]['idcli']);
                               
                               if($movi==$cliente[$i]['idcli']){
                                                      
                   echo '<td><ACRONYM title="No se Puede Eliminar Tiene Movimientos Pendientes"><img src="Imagenes/facturado.png" width="25" height="25" alt="editar"/></ACRONYM> </td>';
                    
                    }        
                    else{
 
                   echo '<td> <a style= "cursor:pointer;" onclick="eliminarDato('.$cliente[$i]['idcli'].');"><ACRONYM title="Eliminar Cliente"><img src="Imagenes/eliminar.png" width="25" height="25" alt="editar"/></ACRONYM></a> </td>';
                            
                    }                                                                
                               echo '<td><a href="formInsertarCliente.php?codclie='.$cliente[$i]['idcli'].'"><ACRONYM title="Editar Cliente"><img src="Imagenes/editarusuario.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
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
                        <th></th>
                        <th></th>
             
                    </tr>
                </tfoot>
            </table>';

                    ?>
                
