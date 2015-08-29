<?php

function primo($n){ 
for($i = 2; $i < $n; $i++){ 
if ($n % $i == 0){ 
return false; 
} 
} 
return true; 
} 
$desde = 1;
$hasta = 100;
$suma = 0;

for($i = 2; $desde <= $hasta; $i++){ 
if(primo($i)){ 
//echo $i." "; 
$desde =$desde+1;

$suma = $suma+$i;

} 
} 
echo 'la suma es: '.$suma;

?> 

