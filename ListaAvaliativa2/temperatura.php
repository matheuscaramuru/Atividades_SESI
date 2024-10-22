<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperatura</title>
</head>
<body>
    <form method="POST" action="">
        <label for="celsius">Digite a temperatura em Celsius:</label>
        <input type="number" id="celsius" name="celsius" step="0.01" required>
        <input type="submit" value="Converter">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $celsius = floatval($_POST['celsius']);
        $fahrenheit = ($celsius * 9/5) + 32;
        echo "<p>A temperatura em Fahrenheit é: <strong>" . number_format($fahrenheit, 2) . "°F</strong></p>";
    }
    ?>
</body>
</html>
