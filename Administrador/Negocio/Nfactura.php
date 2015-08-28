<?php
include_once 'ruta.php';

include_once ("Datos/FacturaDAO.php");
include_once ("Datos/GuiaRemisionDAO.php");
include_once ("Entidad/Factura.php");
include_once ("Entidad/DetalleFactura.php");
include_once ("NdetalleFactura.php");
include_once ("Ncliente.php");
include_once ("Nguia.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nfactura
 *
 * @author Alex
 */
if (!empty($_POST)){

    if(isset($_POST['inserta'])){
session_start();          
$serie=$_POST['serie'];
$nro=$_POST['nro'];
$fecha=$_POST['fecha'];
$guia=$_POST['guia'];


 $detalleFactur= $_SESSION['canastafactura'];
 $total=0;
            for($i=0;$i<count($detalleFactur);$i++){
     
     $total=$total+($detalleFactur[$i]['subtotal']);
     $por=$total* 18/100;
            $sub=$total-$por;
            
            }

$fac = new Factura($serie, $nro, $fecha, $total,'0', $por, $sub,'PENDIENTE');
$nfac = new Nfactura();
$nfac->insertar($fac);
$codFactura=$nfac->ultimaFactura();

$guiaRemi = new Nguia();
$guiaRemi->actualizaEstado($guia,'1');

 for($i=0;$i<count($detalleFactur);$i++){
     
    $defac = new DetalleFactura($codFactura, $guia,$detalleFactur[$i]['descripcion'],$detalleFactur[$i]['cantidad'],$detalleFactur[$i]['precio'],$detalleFactur[$i]['subtotal']);
    $ndefac = new NdetalleFactura();
    $ndefac->insertar($defac);

            
            }
                       
            


   echo 'Registro con exito';
//$codFactura=$facDAO->ultimaFactura();
          
unset($_SESSION['canastafactura']);


}

if (isset($_POST['eliminar'])){
    
    echo 'eliminado';
    
}

if (isset($_POST['actualizar'])){
    
    echo 'Actualizado';
    
}

if (isset($_POST['enviaclie'])){
session_start();
    
    $idguia=$_POST['idguia'];
    
   $g = new Nguia();
$idcliente = $g->enviaCliente($idguia);

$ncliente= new Ncliente();
 $cliente=$ncliente->buscarCliente($idcliente);
 
                        echo 'RUC: '.$cliente[0]['ruc'].'<BR>';
                        echo 'SEÑORES: '.$cliente[0]['razon'].'<BR>';
                        echo 'DIRECCION: '.$cliente[0]['direccion'].'<BR>';
                        echo 'TELEFONO: '.$cliente[0]['telefono'].'<BR>';
 
 
 echo '</br>';
   
       
        $p = new NdetalleGuia();
        $cliente = $p->listarDetalle($idguia);
          echo '<form name="f"><center><table border="1">
            <tr>
                <td>Cantid.</td>
                <td>Unid.</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Importe</td>
                
               
            </tr>'; 

  for($i=0;$i<count($cliente);$i++){

     $detalleFactura[] = array("descripcion" => $cliente[$i]['descripcion'],"cantidad"=>$cliente[$i]['cantidad'],"precio"=>"0","subtotal"=>"0");         
   
           }
         
     
       $_SESSION['canastafactura']=$detalleFactura;
           
       for($i=0;$i<count($detalleFactura);$i++){
           
           $importe=$detalleFactura[$i]['descripcion']*$detalleFactura[$i]['descripcion'];
           
        echo '<tr><td><input type="text" name="txtcantidad" value="'.$detalleFactura[$i]['cantidad'].'" size="10" disabled="disabled" /></td>
              <td>TN</td>
              <td>'.$detalleFactura[$i]['descripcion'].'</td>
              <td><input type="text" id="txtprecio" name="txtprecio" value="'.$detalleFactura[$i]['subtotal'].'" size="10" onkeyup="alex(this.value,'.$i.','.$idguia.')"/></td>
              <td><input type="text" name="txtimporte" value="'.$importe.'" size="10" disabled="disabled" /> </td>
              </tr>';
     
  
           }
  
        echo'<tr><td colspan="4">Total</td><td><input type="text" id="txttotal" name="txttotal" value="0" size="10" disabled="disabled" /></td></tr>';
              
              echo'</table></center></form>';   
    
}


}

class Nfactura {
    //put your code here
    public $factura;
            
    function __construct() {    
        $this->factura= new FacturaDAO();
}

    function insertar($fac){
        
        $this->factura->insertar($fac);
    }
    
    function ultimaFactura(){
        
        $ultimaFac=$this->factura->ultimaFactura();
        
        return $ultimaFac;
    }
    
    function listarFactura(){
        
        $factura= $this->factura->listarFactura();
        
        return $factura;
            
                
    }
    
    public function listarXFechas($fecha1,$fecha2){
        
        $factura= $this->factura->listarXFechas($fecha1, $fecha2);
        
        return $factura;
        
    }
    
    function actualizaEstado($idfactura, $estado){
        
        $this->factura->actualizarEstado($idfactura, $estado);
    }
    
}

?>
