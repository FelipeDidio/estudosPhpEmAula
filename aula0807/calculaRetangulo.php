<?php

function calcularAreaRetangulo($base, $altura) {
    $area = $base * $altura; 
    return $area;
}

$base = 2;
$altura = 5;
$area = calcularAreaRetangulo($base , $altura);
echo "A área do retângulo com base $base e altura $altura é $area.";;

?>