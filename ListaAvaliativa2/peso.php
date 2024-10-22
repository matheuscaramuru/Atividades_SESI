<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="POST" action="">
        <label for="peso">Digite o peso em kg:</label>
        <input type="number" id="peso" name="peso" step="0.01" required>
        <br>
        <label for="altura">Digite a altura (m):</label>
        <input type="number" id="altura" name="altura" step="0.01" required>
        <br>
        <input type="submit" value="Calcular IMC">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = floatval($_POST['peso']);
        $altura = floatval($_POST['altura']);
        $imc = $peso / ($altura * $altura);
        echo "<p>O seu IMC é: <strong>" . number_format($imc, 2) . "</strong></p>";
    }
    ?>
</body>
</html>
