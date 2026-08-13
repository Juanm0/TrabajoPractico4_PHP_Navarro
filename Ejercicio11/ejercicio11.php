<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 11 - Calculadora</title>
</head>
<body>

<h1>Calculadora</h1>

<form method="post">
    <label for="numero1">Primer número:</label>
    <input type="number" step="any" name="numero1" id="numero1" required>

    <br><br>

    <label for="numero2">Segundo número:</label>
    <input type="number" step="any" name="numero2" id="numero2" required>

    <br><br>

    <label for="operacion">Operación:</label>
    <select name="operacion" id="operacion">
        <option value="suma">Suma</option>
        <option value="resta">Resta</option>
        <option value="multiplicacion">Multiplicación</option>
        <option value="division">División</option>
    </select>

    <br><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = (float) $_POST["numero1"];
    $numero2 = (float) $_POST["numero2"];
    $operacion = $_POST["operacion"];

    switch ($operacion) {
        case "suma":
            $resultado = $numero1 + $numero2;
            break;
        case "resta":
            $resultado = $numero1 - $numero2;
            break;
        case "multiplicacion":
            $resultado = $numero1 * $numero2;
            break;
        case "division":
            if ($numero2 == 0) {
                echo "<p>No se puede dividir por cero.</p>";
                exit;
            }
            $resultado = $numero1 / $numero2;
            break;
        default:
            echo "<p>Operación no válida.</p>";
            exit;
    }

    echo "<h2>Resultado: $resultado</h2>";
}
?>

</body>
</html>
