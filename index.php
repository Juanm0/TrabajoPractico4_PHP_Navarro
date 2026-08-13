<!DOCTYPE html>
<html lang="es">
<head><!-- tal vez podria hacer un navbar para navegar por los otros proyectos tambien -->
    <meta charset="UTF-8">
    <title>TP4 PHP - Navarro</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0b0a26;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        }

        .contenedor {
            width: 420px;
            background-color: #161339;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
        }

        h1 {
            color: #ffffff;
            font-size: 22px;
            margin: 0 0 24px 0;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        li a {
            display: block;
            padding: 14px 18px;
            border-radius: 12px;
            background-color: #211c4f;
            color: #d7d5ec;
            text-decoration: none;
            font-size: 15px;
            transition: background-color 0.15s ease;
        }

        li a:hover {
            background-color: #2a2465;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h1>TP4 - PHP Navarro</h1>
    <ul>
        <?php
        $ejercicios = [
            1 => "Saludo personalizado",
            2 => "Operaciones matemáticas",
            3 => "Número par o impar",
            4 => "Mayor de edad",
            5 => "Tabla de multiplicar",
            6 => "Contador de números pares",
            7 => "Promedio de notas",
            8 => "Página HTML generada con PHP",
            9 => "Lista de alumnos",
            10 => "Tabla de productos",
            11 => "Calculadora"
        ];

        foreach ($ejercicios as $numero => $titulo) {
            echo "<li><a href='Ejercicio$numero/ejercicio$numero.php'>Ejercicio $numero - $titulo</a></li>";
        }
        ?>
    </ul>
</div>

</body>
</html>
