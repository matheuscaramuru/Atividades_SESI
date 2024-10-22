<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação de Temperatura</title>
</head>
<body>
<form action='temperatura.php' method="POST">
       Temperatura: <input type="num" name="graus">
       <button type="submit">Verificar</button>
       </form>

    <?php
$graus = $_POST['graus'];
if($graus<17)
  echo"$graus Cº, está frio!";
else if($graus< 26)
echo "$graus Cº, está ameno!";
else if($graus> 26)
echo "$graus Cº, está quente!";




?>

</body>
</html>