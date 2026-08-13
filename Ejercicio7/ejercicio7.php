<?php

$nota1 = 8;
$nota2 = 7;
$nota3 = 7;

$promedio = ($nota1 + $nota2 + $nota3) / 3;

echo "Promedio: " . $promedio . "<br>";

if ($promedio >= 7) {
    echo "Estado: Aprobado";
} else {
    echo "Estado: Desaprobado";
}
?>
