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
    ["nombre" => "Teclado", "precio" => 25000],
    ["nombre" => "Monitor", "precio" => 180000]
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
