<?php
$resultado = null;
$error = "";

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
                $error = "No se puede dividir por cero.";
            } else {
                $resultado = $numero1 / $numero2;
            }
            break;
        default:
            $error = "Operación no válida.";
    }

    if ($resultado !== null) {
        $resultado = rtrim(rtrim(number_format($resultado, 6, ".", ""), "0"), ".");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 11 - Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="calculadora">
    <div class="pantalla" id="pantalla"><?php echo $error !== "" ? $error : ($resultado !== null ? $resultado : "0"); ?></div>

    <form method="post" id="formCalculadora">
        <input type="hidden" name="numero1" id="numero1">
        <input type="hidden" name="numero2" id="numero2">
        <input type="hidden" name="operacion" id="operacion">
    </form>

    <div class="botones">
        <button type="button" class="boton" data-accion="limpiar">C</button>
        <button type="button" class="boton" data-accion="borrar">←</button>
        <button type="button" class="boton" data-operador="division">/</button>
        <button type="button" class="boton" data-operador="multiplicacion">*</button>

        <button type="button" class="boton" data-digito="7">7</button>
        <button type="button" class="boton" data-digito="8">8</button>
        <button type="button" class="boton" data-digito="9">9</button>
        <button type="button" class="boton" data-operador="resta">-</button>

        <button type="button" class="boton" data-digito="4">4</button>
        <button type="button" class="boton" data-digito="5">5</button>
        <button type="button" class="boton" data-digito="6">6</button>
        <button type="button" class="boton" data-operador="suma">+</button>

        <button type="button" class="boton" data-digito="1">1</button>
        <button type="button" class="boton" data-digito="2">2</button>
        <button type="button" class="boton" data-digito="3">3</button>
        <button type="button" class="boton boton-igual" id="botonIgual">=</button>

        <button type="button" class="boton boton-cero" data-digito="0">0</button>
        <button type="button" class="boton" data-digito=".">.</button>
    </div>
</div>

<script>
    const pantalla = document.getElementById("pantalla");
    const inputNumero1 = document.getElementById("numero1");
    const inputNumero2 = document.getElementById("numero2");
    const inputOperacion = document.getElementById("operacion");
    const formCalculadora = document.getElementById("formCalculadora");

    let primerOperando = null;
    let operadorActual = null;
    let entradaActual = "<?php echo $error === "" && $resultado !== null ? $resultado : "0"; ?>";
    let debeReiniciar = <?php echo ($resultado !== null || $error !== "") ? "true" : "false"; ?>;

    function actualizarPantalla() {
        pantalla.textContent = entradaActual;
    }

    document.querySelectorAll("[data-digito]").forEach(function (boton) {
        boton.addEventListener("click", function () {
            const digito = boton.getAttribute("data-digito");

            if (debeReiniciar) {
                entradaActual = "0";
                debeReiniciar = false;
            }

            if (digito === "." && entradaActual.includes(".")) {
                return;
            }

            if (entradaActual === "0" && digito !== ".") {
                entradaActual = digito;
            } else {
                entradaActual += digito;
            }

            actualizarPantalla();
        });
    });

    document.querySelectorAll("[data-operador]").forEach(function (boton) {
        boton.addEventListener("click", function () {
            if (primerOperando !== null && !debeReiniciar) {
                primerOperando = calcularLocal(primerOperando, entradaActual, operadorActual);
                entradaActual = String(primerOperando);
            } else {
                primerOperando = entradaActual;
            }

            operadorActual = boton.getAttribute("data-operador");
            debeReiniciar = true;
            actualizarPantalla();
        });
    });

    function calcularLocal(a, b, operacion) {
        const numeroA = parseFloat(a);
        const numeroB = parseFloat(b);

        switch (operacion) {
            case "suma":
                return numeroA + numeroB;
            case "resta":
                return numeroA - numeroB;
            case "multiplicacion":
                return numeroA * numeroB;
            case "division":
                return numeroB === 0 ? 0 : numeroA / numeroB;
        }
    }

    document.querySelector('[data-accion="limpiar"]').addEventListener("click", function () {
        primerOperando = null;
        operadorActual = null;
        entradaActual = "0";
        debeReiniciar = false;
        actualizarPantalla();
    });

    document.querySelector('[data-accion="borrar"]').addEventListener("click", function () {
        if (debeReiniciar) {
            return;
        }

        entradaActual = entradaActual.length > 1 ? entradaActual.slice(0, -1) : "0";
        actualizarPantalla();
    });

    document.getElementById("botonIgual").addEventListener("click", function () {
        if (primerOperando === null || operadorActual === null) {
            return;
        }

        inputNumero1.value = primerOperando;
        inputNumero2.value = entradaActual;
        inputOperacion.value = operadorActual;
        formCalculadora.submit();
    });

    actualizarPantalla();
</script>

</body>
</html>
