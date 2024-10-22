<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Números</title>
</head>
<body>
    <h1>Insira 5 Números</h1>

    <form method="POST" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required><br><br>

        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required><br><br>

        <label for="numero3">Número 3:</label>
        <input type="number" id="numero3" name="numero3" required><br><br>

        <label for="numero4">Número 4:</label>
        <input type="number" id="numero4" name="numero4" required><br><br>

        <label for="numero5">Número 5:</label>
        <input type="number" id="numero5" name="numero5" required><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $numero3 = $_POST["numero3"];
        $numero4 = $_POST["numero4"];
        $numero5 = $_POST["numero5"];

        $media = ($numero1 + $numero2 + $numero3 + $numero4 + $numero5)/5   ;

        echo "<h2>Soma dos Números Inseridos:</h2>";
        echo $media . "<br>";
    }
    ?>

</body>
</html>