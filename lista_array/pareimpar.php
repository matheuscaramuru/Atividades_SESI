<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar Números Pares e Ímpares</title>
</head>
<body>
    <h1>Contar Números Pares e Ímpares</h1>

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

        <label for="numero6">Número 6:</label>
        <input type="number" id="numero6" name="numero6" required><br><br>

        <label for="numero7">Número 7:</label>
        <input type="number" id="numero7" name="numero7" required><br><br>

        <label for="numero8">Número 8:</label>
        <input type="number" id="numero8" name="numero8" required><br><br>

        <label for="numero9">Número 9:</label>
        <input type="number" id="numero9" name="numero9" required><br><br>

        <label for="numero10">Número 10:</label>
        <input type="number" id="numero10" name="numero10" required><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $numeros = array(
            $_POST["numero1"],
            $_POST["numero2"],
            $_POST["numero3"],
            $_POST["numero4"],
            $_POST["numero5"],
            $_POST["numero6"],
            $_POST["numero7"],
            $_POST["numero8"],
            $_POST["numero9"],
            $_POST["numero10"]
        );

        $pares = 0;
        $impares = 0;

        foreach ($numeros as $numero) {
            if ($numero % 2 == 0) {
                $pares++;
            } else {
                $impares++;
            }
        }

        echo "<h2>Resultados:</h2>";
        echo "Números Pares: " . $pares . "<br>";
        echo "Números Ímpares: " . $impares . "<br>";
    }
    ?>
</body>
</html>
