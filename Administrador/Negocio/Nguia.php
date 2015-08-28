<?php
include_once 'ruta.php';

include_once ("Entidad/GuiaRemision.php");
include_once ("Datos/GuiaRemisionDAO.php");
include_once("Datos/DetalleGuiaDAO.php");
include_once("Entidad/DetalleGuia.php");
include_once("NdetalleGuia.php");
include_once("Nvehiculo.php");
include_once("Npersona.php");

if (!empty($_POST)){
    
    if(isset($_POST['insertar'])){
session_start();
$serie=$_POST['serie'];
$nroGuia=$_POST['nroGuia'];
$fechaEmision=$_POST['fechaEmision'];
$fechaTraslado=$_POST['fechaTraslado'];
$puntoPartida=$_POST['puntoPartida'];
$puntoLlegada=$_POST['puntoLlegada'];                  
$idvehicul=$_POST['idvehiculo'];
$cliente=$_POST['idcliente'];
$chofer=$_POST['idchofer'];
$destinatario=$_POST['destinatario'];
//$pesototal=$_POST['pesoTotal'];
$descripcion=$_POST['descripcion'];
$pesoUnit=$_POST['pesouni'];
$cantidad=$_POST['cantidad'];
//$subTotal=$_POST['subtotal'];
//$pesoTotal=$_POST['pesoTotal'];
    
$canastadetalle = $_SESSION['itemsDetalle'];

$pesototal=0;   

if (isset($canastadetalle)) {
    
 for($i=0;$i<count($canastadetalle);$i++){
     
     $pesototal=$pesototal+($canastadetalle[$i]['sub']);
 }
    
$guiaremi= new GuiaRemision($serie, $nroGuia, $fechaEmision, $fechaTraslado, $puntoPartida, $puntoLlegada,$pesototal,'0','0',$cliente,$idvehicul,$chofer,$destinatario);

$Nguia= new Nguia();
$Nguia->insertar($guiaremi);
    
   for($i=0;$i<count($canastadetalle);$i++){ 

$detalle = new DetalleGuia($Nguia->ultimaGuia(), $canastadetalle[$i]['des'],$canastadetalle[$i]['pesoun'], $canastadetalle[$i]['cant'], $canastadetalle[$i]['sub']);
$detaGuia= new NdetalleGuia();
$detaGuia->insertar($detalle);

} 

}

$vehi = new Nvehiculo();
$vehi->actualizarEstado($idvehicul,'1');

$per = new Npersona();
$per->actualizarEstado($chofer,'1');

echo 'Se registro con exitoo';
echo '<script>alert("SE Registro los Datos");</script>';

echo '<script type="text/javascript">
window.location="../Vista/formGuiaRemision.php"; </script>';
unset($_SESSION['itemsDetalle']);

}

if (isset($_POST['eliminar'])){
    
    echo 'eliminado';
    
}

if (isset($_POST['actualizar'])){
    
    echo 'Actualizado';
    
}

if (isset($_POST['buscar'])){
    
    echo 'encontro';
    
}

if (isset($_POST['buscar'])){
    
    echo 'encontro';
    
}


}



class Nguia {
    //put your code here
    
    
    public $objetoGuia;
    
    function __construct() {
        $this->objetoGuia = new GuiaRemisionDAO();
    }
    

function insertar($guia)
    {
    
    $this->objetoGuia->insertar($guia);
    
    
    } 
    
    function ultimaGuia()
    {
    
      $ultimaGuia = $this->objetoGuia->ultimaGuia();
      
      return $ultimaGuia;
    
    
    } 
    
    function listar(){
        
        $detalle =$this->objetoGuia->lista();
        
        return $detalle;
        
    }
    
    function listaGuiaXEstado($fecha1,$fecha2,$estado){ 
        
        $detalle =$this->objetoGuia->listaGuiaXEstado($fecha1, $fecha2, $estado);
        
        return $detalle;
        
        
    }
    
    function enviaCliente($idguia){
        
        $idclie =$this->objetoGuia->enviarIdCliente($idguia);
        
        return $idclie;
        
    }
    
    function actualizaEstado($idGuia,$estado){
        
       $this->objetoGuia->ActualizaEstado($idGuia, $estado);
         
        
    }
    
    function listarSinSalida(){
        
        $detalle =$this->objetoGuia->listaSinSalida();
        
        return $detalle;
        
    }
     function listarSinLlegada(){
        
        $detalle =$this->objetoGuia->listaSinLlegada();
        
        return $detalle;
        
    }
    
       function listaSinLlegadaCliente($idcliente){
           
          $detalle =$this->objetoGuia->listaSinLlegadaCliente($idcliente);
        
        return $detalle; 
           
       }
    
    function buscarGuia($idguia){
        
        $detalle =$this->objetoGuia->buscarGuia($idguia);
        
        return $detalle;
        
    }
    
    function listaSinLlegadaPorCliente($idcliente){
        
        $detalle =$this->objetoGuia->listaSinLlegadaPorCliente($idcliente);
        
        return $detalle;
    }
}

?>
