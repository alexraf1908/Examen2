
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../../Negocio/Nvehiculo.php");

$array = new Nvehiculo();

$vehicul = $array->listarVehiculoMan();

echo '
<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>id</th><!--Estado-->
                        <th>Descripcion</th>
			<th>Placa</th>
                        <th>LimitePeso</th>
                        <th>estado</th>
 
						
                    </tr>
                </thead>
                
          ';
?>
<?php

for ($i = 0; $i < count($vehicul); $i++) {


    // $movi = $Ncliente->clienteSinMovimiento($vehiculo[$i]['idcli']);
//    if ($movi == $vehiculo[$i]['idcli']) {
    
     echo '<tr>';

     echo '<td>'.$vehicul[$i]['placa'].'</td>';
     echo '<td>'.$vehicul[$i]['descri'].'</td>';
     echo '<td>'.$vehicul[$i]['placa'].'</td>';
     echo '<td>' . $vehicul[$i]['limitepeso'] . '</td>';
     echo '<td>' . $vehicul[$i]['estado'] . '</td>';
     
    //echo '<td>;<ACRONYM title="No se Puede Eliminar Tiene Movimientos Pendientes"><img src="Imagenes/facturado.png" width="25" height="25" alt="editar"/></ACRONYM> </td>';
    //  } else {

    echo '<td> <a style= "cursor:pointer" onclick="eliminarDatoVehiculo('.$vehicul[$i]['idvehi'].')"><ACRONYM title="Eliminar Cliente"><img src="Imagenes/eliminar.png" width="25" height="25" alt="editar"/></ACRONYM></a> </td>';
    //}
    echo '<td><a href="formInsertarVehiculo.php?codvehi='.$vehicul[$i]['idvehi'].'"><ACRONYM title="Editar Cliente"><img src="Imagenes/editarusuario.png" width="30" height="30" alt="editar"/></ACRONYM></a></td>';
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
                
