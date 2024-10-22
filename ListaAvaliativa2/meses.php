<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meses do Ano</title>
</head>
<body>
<form action='' method="POST">
       Mês: <input type="text" name="mes">
       <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mes = strtolower(string: trim(string: $_POST['mes'])); 

    switch ($mes) {
        case 'janeiro':
            echo "$mes tem 31 dias.";
            break;
        case 'março':
            echo "$mes tem 31 dias.";
            break;
        case 'maio':
            echo "$mes tem 31 dias.";
            break;
        case 'julho':
            echo "$mes tem 31 dias.";
            break;
        case 'agosto':
            echo "$mes tem 31 dias.";
            break;
        case 'outubro':
            echo "$mes tem 31 dias.";
            break;
        case 'dezembro':
            echo "$mes tem 31 dias.";
            break;
        case 'abril':
            echo "$mes tem 30 dias.";
            break;
        case 'junho':
            echo "$mes tem 30 dias.";
            break;
        case 'setembro':
            echo "$mes tem 30 dias.";
            break;
        case 'novembro':
            echo "$mes tem 30 dias.";
            break;
         case 'fevereiro':
            echo "$mes tem 28 ou 29 dias.";
            break;


    }
}
?>

</body>
</html>