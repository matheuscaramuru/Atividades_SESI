<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Pontos</title>
</head>
<body>
    <h2>Calculadora de Pontos </h2>
  
    <form method="post" action="">
        <label for="valorCompra">Valor da Compra :</label><br>
        <input type="number" step="0.01" name="valorCompra" id="valorCompra" placeholder="Ex: 120.50" required><br><br>

        <button type="submit" name="calcular">Calcular Pontos</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        function calcularPontos($valorCompra) {
            if ($valorCompra <= 50) {
                return 5; 
            } elseif ($valorCompra <= 100) {
                return 10; 
            } else {
                return 15; 
            }
        }

        $valorCompra = $_POST['valorCompra'];

        $pontos = calcularPontos($valorCompra);

        echo "<h3>Resultado:</h3>";
        echo "<p>Você acumulará:</p>";
        echo "<h3>$pontos pontos </h3>";
    }
    ?>

</body>
</html>

