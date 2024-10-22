<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par ou Ímpar</title>
</head>
<body>
<form action='parouimpar.php' method="POST">
    Número: <input type="num" name="numero">
    <button type="submit">Verificar</button>

</form>

<?php
$numero = $_POST['numero'];
     if($numero % 2 == 0)
       echo"$numero é par";
    else 
       echo"$numero é ímpar";
?>
</body>
</html>