<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Frete</title>
</head>
<body>
    <h2>Faça o Cálculo do Frete</h2>
    
    <form method="POST">
        <label for="peso">Digite o peso (em kg):</label>
        <input type="number" step="0.01" name="peso" id="peso" required>
        <button type="submit">Calcule os valores</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST['peso'];

        function calcularFrete($peso) {
            if ($peso <= 1) {
                return 10.00;
            } elseif ($peso > 1 && $peso <= 5) {
                return 15.00;
            } elseif ($peso > 5 && $peso <= 10) {
                return 20.00;
            } else {
                return 25.00;
            }
        }

        $frete = calcularFrete($peso);
        echo "<p>O valor do frete para $peso kg é R$ " . number_format($frete, 2, ',', '.') . "</p>";
    }
    ?>

</body>
</html>