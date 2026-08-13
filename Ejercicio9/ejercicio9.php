<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 - Lista de alumnos</title>
</head>
<body>

<?php
$alumnos = [
    "Juan",
    "Martina",
    "Lucas",
    "Sofía",
    "Mateo"
];

echo "<h1>Lista de alumnos</h1>";
echo "<ul>";

foreach ($alumnos as $alumno) {
    echo "<li>$alumno</li>";
}

echo "</ul>";
?>

</body>
</html>
