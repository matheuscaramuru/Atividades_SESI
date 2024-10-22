<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Reais</title>
</head>
<body>
<form action='dez.php' method="POST">
       Número: <input type="num" name="numero">
       <button type="submit">Verificar</button>
       </form>

       <?php
$numero = $_POST['numero'];
if($numero>10) 
  echo" $numero maior que 10";
else if($numero<10)
echo " $numero menor que 10";
else if ($numero==10)
echo " $numero é dez";

?>
</body>
</html>
</body>
</html>