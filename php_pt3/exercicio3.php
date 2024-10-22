<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Imposto de Renda</title>
</head>
<body>

    <h2>Calculadora de Imposto de Renda</h2>

    <form method="post" action="">
        <label for="salario">Salário Bruto (:</label><br>
        <input type="number" step="0.01" name="salario" id="salario" required><br><br>

        <button type="submit" name="calcular">Calcular Imposto</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        function calcularImpostoDeRenda($salario) {
            if ($salario <= 1903.98) {
                return 0; 
            } elseif ($salario <= 2826.65) {
                $aliquota = 0.075;
                $deducao = 142.80;
            } elseif ($salario <= 3751.05) {
                $aliquota = 0.15;
                $deducao = 354.80;
            } elseif ($salario <= 4664.68) {
                $aliquota = 0.225;
                $deducao = 636.13;
            } else {
                $aliquota = 0.275;
                $deducao = 869.36;
            }

            $imposto = ($salario * $aliquota) - $deducao;
            return $imposto > 0 ? $imposto : 0; 
        }

        $salario = $_POST['salario'];


        $imposto = calcularImpostoDeRenda($salario);

        echo "<h3>Resultado:</h3>";
        echo "<p>salário bruto de <strong>R$ " . number_format($salario, 2, ',', '.') . "</strong>, o imposto de renda devido será:</p>";
        echo "<h3>R$ " . number_format($imposto, 2, ',', '.') . "</h3>";
    }
    ?>

</body>
</html>
