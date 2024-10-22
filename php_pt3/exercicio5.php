<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tempo </title>
</head>
<body>

    <h2>Calculadora de Tempo </h2>

    <form method="post" action="">
        <label for="distancia">Distância entre as cidades:</label><br>
        <input type="number" step="0.01" name="distancia" id="distancia" placeholder="Ex: 500" required><br><br>

        <label for="velocidade">Velocidade Média do Veículo:</label><br>
        <input type="number" step="0.01" name="velocidade" id="velocidade" placeholder="Ex: 80" required><br><br>

        <button type="submit" name="calcular">Calcular Tempo de Viagem</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        function calcularTempoViagem($distancia, $velocidade) {
         
            $tempoHoras = $distancia / $velocidade;

            $horas = floor($tempoHoras);
            $minutos = round(($tempoHoras - $horas) * 60);

            return [$horas, $minutos];
        }

        $distancia = $_POST['distancia'];
        $velocidade = $_POST['velocidade'];

        list($horas, $minutos) = calcularTempoViagem($distancia, $velocidade);

        echo "<h3>Resultado:</h3>";
        echo "<p>O tempo vai ser de:</p>";
        echo "<h3>$horas horas e $minutos minutos</h3>";
    }
    ?>

</body>
</html>
