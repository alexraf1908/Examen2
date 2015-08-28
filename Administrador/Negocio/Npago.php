<?php
include_once 'ruta.php';

include_once ('Datos/PagoDAO.php');


if (!empty($_POST)){
    
    if(isset($_POST['listar'])){
        
        
        $fechaini = $_POST['fechaini'];
    $fechafin = $_POST['fechafin'];
    
    $Npago = new Npago();
    
    $loca = $Npago->listar($fechaini, $fechafin);
    
    echo '<br><center><table border = "0">
        <thead>
        <tr>
        <th>CodPago</th>
        <th>Fecha- Pago</th>
        <th>Nro - Factura</th>
        <th>Monto</th> 
        
        </tr>
        </thead>
        <tbody>';
    $total=0;
    for ($i = 0; $i < count($loca); $i++) {
        
    
      
    echo'            
        
        <tr>
        <td>'.$loca[$i]['idpago'].'</td>
        <td>'.$loca[$i]['fecha'].'</td>
        <td>'.$loca[$i]['serie'].' -- '.$loca[$i]['nro'].'</td>
        <td> S/.'.$loca[$i]['monto'].'</td>
        </tr>';
    $total=$total+$loca[$i]['monto'];
  }
      echo  '</tbody>
        </table></center><br>';
echo '<h1>Importe Total: S/. '.$total. '</h1>'; 
   
    }
    
}


class Npago{
    //put your code here
    
    public $pago;
            
    function __construct() {
        
        $this->pago = new PagoDAO();
        
        
    }
    
    function insertar($pago){
        
        $this->pago->insertarr($pago);
        
    }
    
    function listar($fechaini, $fechafin){
        
        $pagos=$this->pago->listar($fechaini, $fechafin);
        return $pagos;
        
    }
}
?>