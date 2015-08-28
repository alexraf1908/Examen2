<?php
include_once 'ruta.php';

include_once ('Datos/LocalizacionDAO.php');

if (!empty($_POST)){
    
    if(isset($_POST['listarloca'])){
        
        $placa = $_POST['placa'];
        $fechaini = $_POST['fechaini'];
    $fechafin = $_POST['fechafin'];
    
    $Nlocalizacion = new Nlocalizacion();
    
    $fe1= $Nlocalizacion->cambioFormatoFecha($fechaini).' 00:00:00 a.m.';
    $fe2= $Nlocalizacion->cambioFormatoFecha($fechafin).' 24:59:59 p.m.';
    
    $loca = $Nlocalizacion->listaLocalizacion($placa, $fe1, $fe2);
    
    echo '<br><center><table border = "0" with="80%">
        <thead bgcolor="#eee" >
        <tr>
        <th>Cod</th>
        <th>Descri</th>
        <th>Imei</th>
        <th>latitud</th> 
        <th>longitud</th>
        <th>FechaLocalizada</th>
        <th>presicion</th>
        <th>direccion</th>
        <th>dispo</th>
        <th>provee</th>
        <th>Ver</th>
        
        </tr>
        </thead>
        <tbody>';

    for ($i = 0; $i < count($loca); $i++) {
        
    
      
    echo'            
        
        <tr>
        <td>'.$loca[$i]['idVehi'].'</td>
        <td>'.$loca[$i]['descri'].'</td>
        <td>'.$loca[$i]['imei'].'</td>
        <td>'.$loca[$i]['latitud'].'</td>
        <td>'.$loca[$i]['longitud'].'</td>
        <td>'.$loca[$i]['fecha'].'</td>
        <td>'.$loca[$i]['presicionn'].'</td>
        <td>'.$loca[$i]['direccion'].'</td>
        <td>'.$loca[$i]['dispo'].'</td>
        <td>'.$loca[$i]['provee'].'</td>
            <td>VER</td>        
        </tr>';   
  }
      echo  '</tbody>
        </table></center><br>';   
    }
    
}

class Nlocalizacion {
    //put your code here
    
    public $localizacion;
            
    function __construct() {
        
        $this->localizacion = new LocalizacionDAO();
        
        
    }
    
    function insertarLocalizacion($imei,$latitud,$longitud,$fecha,$precision,$direccion,$proveedor){
        
        $this->localizacion->insertarLocalizacion($imei, $latitud, $longitud, $fecha, $precision, $direccion, $proveedor);
        
    }
    
    function consultaLocalizacion($idVehiculo){
        
       $loca= $this->localizacion->consultaLocalizacion($idVehiculo);
        
        return $loca;
    }
    
    public function listaLocalizacion($placa,$fechaini,$fechafin){ 
        
       $loca= $this->localizacion->listaLocalizacion($placa, $fechaini, $fechafin);
        
        return $loca; 
        
    }
    
    function cambioFormatoFecha($cambio){ 
        
        $date= $this->localizacion->cambioFormatoFecha($cambio);
        
        return $date;
        
        
    }

}



?>

       
      