<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Idade</title>
</head>
<body>
    <form method="post" action="">
        <label for="idade">Digite a sua idade: </label>
        <input type="number" id="idade" name="idade" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idade = intval($_POST['idade']);

        if ($idade >= 18) {
            echo "<h2>A pessoa é maior de idade.</h2>";
        } else {
            echo "<h2>A pessoa é menor de idade.</h2>";
        }
    }
    ?>
</body>
</html>

