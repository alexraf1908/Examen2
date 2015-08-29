<?php

$desde = 1;
$hasta = 10000;
$suma = 0;
$sum = 0;

for($i = 1; $desde <= $hasta; $i++){ 

$aleatorio =  rand ( 1 ,100);
$suma=$suma + $aleatorio; 

if($suma<=$hasta)
{
   $sum=$sum + $aleatorio; 
}
else {
$desde=10001;

}
}

echo 'La suma es: '.$sum ;

?>
