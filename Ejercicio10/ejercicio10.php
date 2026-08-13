<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 - Tabla de productos</title>
</head>
<body>

<?php
$productos = [
    ["nombre" => "Mouse", "precio" => 15000],
    ["nombre" => "Teclado T-Dagger Bora", "precio" => 45000],//el que tengo yo, sale eso masomenos jajaj
    ["nombre" => "Monitor 27 pulgadas", "precio" => 180000]
];

echo "<h1>Productos</h1>";
echo "<table border='1'>";
echo "<tr><th>Producto</th><th>Precio</th></tr>";

foreach ($productos as $producto) {
    echo "<tr>";
    echo "<td>" . $producto["nombre"] . "</td>";
    echo "<td>$" . $producto["precio"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
