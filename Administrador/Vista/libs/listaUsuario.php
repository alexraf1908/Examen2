
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Nusuario.php");

$Nusuario = new Nusuario();

$usuario =$Nusuario->listarUsuario();


echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                        
                        <th>Personal</th><!--Estado-->
                        <th>Usuario</th>
			<th>Clave</th>
                        <th>Cargo</th>
                     
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      


     for($i=0;$i<count($usuario);$i++){
                   
                               echo '<tr>';
                               
                               echo '<td>'.$usuario[$i]['persona'].'</td>';
                               echo '<td>'.$usuario[$i]['usuario'];'</td>';
                               echo '<td>***********</td>';
                               echo '<td>'.$usuario[$i]['tipo'];'</td>';          
                               
                
                                                      
             
 
                   echo '<td> <a style= "cursor:pointer;" onclick="eliminarUsuarioo('.$usuario[$i]['codusuario'].');"><ACRONYM title="Eliminar Usuario"><img src="Imagenes/eliminar.png" width="25" height="25" alt="editar"/></ACRONYM></a> </td>';
                            
                                                                                 
                               echo '<td><a href="formInsertarUsuario.php?codperso='.$usuario[$i]['idpersona'].'"><ACRONYM title="Editar Usuario/Clave"><img src="Imagenes/editarusuario.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
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
                