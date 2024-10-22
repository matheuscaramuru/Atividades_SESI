<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Imposto de Renda</h1>
    <form method="POST" action="">
        <label for="salario">Digite o salário:</label>
        <input type="number" id="salario" name="salario" step="0.01" required>
        <input type="submit" value="Calcular Imposto">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $salario = floatval($_POST['salario']);
        $imposto = 0;

        if ($salario > 2000) {
            $imposto = $salario * 0.15;
            echo "<p>O salário é de R$ " . number_format($salario, 2, ',', '.') . ".</p>";
            echo "<p>O imposto de renda a ser pago é de R$ " . number_format($imposto, 2, ',', '.') . ".</p>";
        } else {
            echo "<p>O salário é de R$ " . number_format($salario, 2, ',', '.') . " e não há imposto a ser pago.</p>";
        }
    }
    ?>
</body>
</html>

