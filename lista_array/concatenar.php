<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Nomes</title>
</head>
<body>
    <h1>Insira 5 Nomes</h1>

    <form method="POST" action="">
        <label for="nome1">Nome 1:</label>
        <input type="text" id="nome1" name="nome1" required><br><br>

        <label for="nome2">Nome 2:</label>
        <input type="text" id="nome2" name="nome2" required><br><br>

        <label for="nome3">Nome 3:</label>
        <input type="text" id="nome3" name="nome3" required><br><br>

        <label for="nome4">Nome 4:</label>
        <input type="text" id="nome4" name="nome4" required><br><br>

        <label for="nome5">Nome 5:</label>
        <input type="text" id="nome5" name="nome5" required><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nomes = array(
        $nome1 = $_POST["nome1"],
        $nome2 = $_POST["nome2"],
        $nome3 = $_POST["nome3"],
        $nome4 = $_POST["nome4"],
        $nome5 = $_POST["nome5"]
);

    $concatenar = implode(" ", $nomes);

    echo "<h2>Palavras Concatenadas:</h2>";
    echo $concatenar . "<br>";

}
    ?>

</body>
</html>
