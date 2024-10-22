<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Valor no Array</title>
</head>
<body>
    <h1>Verificar se um Valor Existe no Array</h1>

    <form method="POST" action="">
        <label for="numero">Insira um número para verificar:</label>
        <input type="number" id="numero" name="numero" required><br><br>

        <button type="submit">Verificar</button>
    </form>

    <?php

$numeros = array(1, 3, 5, 7, 9, 11, 13, 15);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $verificar = $_POST["numero"];

        if (in_array($verificar, $numeros)) {
            echo "<h2>O número $verificar está presente no array.</h2>";
        } else {
            echo "<h2>O número $verificar não está presente no array.</h2>";
        }
    }
    ?>
</body>
</html>
