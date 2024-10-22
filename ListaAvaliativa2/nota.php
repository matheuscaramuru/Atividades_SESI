<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passou ou não?</title>
</head>
<body>

    <form method="POST" action="">
        <label for="nota">Me informe a nota do aluno:</label>
        <input type="number" id="nota" name="nota" step="0.1" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota = floatval($_POST['nota']);

        if ($nota >= 7) {
            echo "<p>O aluno foi <strong>aprovado</strong>!</p>";
        } elseif ($nota >= 4) {
            echo "<p>O aluno está em <strong>recuperação</strong>.</p>";
        } else {
            echo "<p>O aluno foi <strong>reprovado</strong>.</p>";
        }
    }
    ?>
</body>
</html>
