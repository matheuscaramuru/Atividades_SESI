<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fruta</title>
</head>
<body>
    <form method="post" action="">
        <label for="fruta">Digite um tipo de fruta: </label>
        <input type="text" id="fruta" name="fruta" required>
        <input type="submit" value="Verificar Cor">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fruta = strtolower(trim($_POST['fruta']));
        $cores = [
            'maçã' => 'vermelha',
            'banana' => 'amarela',
            'laranja' => 'laranja',
            'uva' => 'roxa',
            'melancia' => 'verde',
            'kiwi' => 'marrom',
            'limão' => 'verde',
            'morango' => 'vermelho',
            'abacaxi' => 'amarelo',
            'cereja' => 'vermelha'
        ];

        if (array_key_exists($fruta, $cores)) {
            echo "<h2>A cor da fruta $fruta é " . $cores[$fruta] . ".</h2>";
        } else {
            echo "<h2>Escreva somente frutas!</h2>";
        }
    }
    ?>
</body>
</html>
