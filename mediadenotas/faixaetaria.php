<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faixa Etária</title>
</head>
<body>
<form action='faixaetaria.php' method="POST">
       Idade: <input type="num" name="idade">
       <button type="submit">Verificar</button>
       </form>

    <?php
$idade = $_POST['idade'];
if($idade<12)
  echo"$idade anos de idade, é uma criança!";
else if($idade< 17)
echo "$idade anos de idade, é um Adolescente!";
else if($idade< 64)
echo "$idade anos de idade, é um Adulto!";
else if($idade> 65)
echo "$idade anos de idade, é um Idoso!";



?>

</body>
</html>