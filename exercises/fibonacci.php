<?php 

$x = 0;    
$y = 1; 

for($i = 0; $i <= 15; $i++) {    
    $z = $x + $y;    
    echo $i . ". " . $z . "\n";         
    $x=$y;       
    $y=$z;
    usleep(500000);
}



