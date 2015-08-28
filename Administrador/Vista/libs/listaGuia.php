
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Nguia.php");

$guiar=new Nguia();

$cliente=$guiar->listar();


echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    
                        <th>id</th><!--Estado-->
                        <th>Nro</th>
			<th>Fecha-Emi</th>
                        <th>Cliente</th>
                        <th>P-Partida</th>
                        <th>Cliente</th>
                        <th>P-Llegada</th>
                        <th>Chofer</th>
                        <th>impreso</th>
						
                    </tr>
                </thead>
                
          ';
                    ?>
                    <?php
      


     for($i=0;$i<count($cliente);$i++){
                   
                               echo '<tr>';
                               echo '<td> <a style= "cursor:pointer;color:black;" onclick="showdiv(event,'.$cliente[$i]['idguia'].');">'.$cliente[$i]['idguia'].'</a> </td>';
                               echo '<td>'.$cliente[$i]['nro'].'</td>';
                               echo '<td>'.$cliente[$i]['fechaEmision'];'</td>';
                               echo '<td>'.$cliente[$i]['razonSocial'];'</td>';
                               echo '<td>'.$cliente[$i]['ppartida'];'</td>';
                               echo '<td>'.$cliente[$i]['razonSocial'];'</td>';
                               echo '<td>'.$cliente[$i]['pLlegada'];'</td>';
                               echo '<td>'.$cliente[$i]['nombres'];'</td>';
                               echo '<td>'.$cliente[$i]['impreso'];'</td>';
                               
                               if($cliente[$i]['estado']=='0'){
                               
			       echo '<td><a href="#"><ACRONYM title="Editar Guia"><img src="Imagenes/editar.png" width="25" height="25" alt="editar"/></ACRONYM></a></td>';
                                                                                               
                               echo '<td><a href="formFactura.php?codGuia='.$cliente[$i]['idguia'].'"><ACRONYM title="Este Documento Falta Facturar"><img src="Imagenes/folder.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
                               //echo '<td><a href="#"><img src="Imagenes/agregar.png" width="25" height="25" alt="editar"/></a></td>';
                               }
                               
                               else
                               {
                                  echo '<td><ACRONYM title="Este archivo ya esta Facturado"><img src="Imagenes/ok32.png" width="25" height="25" alt="editar"/></ACRONYM></td>';
                                                                                               
                                  echo '<td><ACRONYM title="Este archivo ya esta Facturado"><img src="Imagenes/ok32.png" width="25" height="25" alt="editar"/></ACRONYM></td>';
                               //ech 
                                   
                               }
                               
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
                



