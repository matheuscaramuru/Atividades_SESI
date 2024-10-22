<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Juros Simples</title>
</head>
<body>

    <h2>Calculadora de Juros Simples</h2>

    <form method="post" action="">
        <label for="capital">digite a base? :</label><br>
        <input type="number" step="0.01" name="capital" id="capital" required><br><br>

        <label for="taxa">digite a taxa de juros anual? :</label><br>
        <input type="number" step="0.01" name="taxa" id="taxa"  required><br><br>

        <label for="tempo">guardar por quantos anos ?</label><br>
        <input type="number" name="tempo" id="tempo"  required><br><br>

        <button type="submit" name="calcular">Calcular Juros</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
     
        function calcularJurosSimples($capital, $taxa, $tempo) {
            return $capital * ($taxa / 100) * $tempo;
        }

        $capital = $_POST['capital'];
        $taxa = $_POST['taxa'];
        $tempo = $_POST['tempo'];

        if ($capital <= 0 || $taxa <= 0 || $tempo <= 0) {
            echo "<p>insira valores válidos</p>";
        } else {
            $jurosSimples = calcularJurosSimples($capital, $taxa, $tempo);
            $montanteTotal = $capital + $jurosSimples;

            echo "<h3>Resultado:</h3>";
            echo "<p>Investindo R$ " . number_format($capital, 2, ',', '.') . " a uma taxa de " . number_format($taxa, 2, ',', '.') . "% ao ano, durante " . $tempo . " anos, você ganhará:</p>";
            echo "<h3 >R$ " . number_format($jurosSimples, 2, ',', '.') . " de juros</h3>";
            echo "<p>o valor total com juros será de :<strong>R$ " . number_format($montanteTotal, 2, ',', '.') . "</strong>.</p>";
        }
    }
    ?>

</body>
</html>
