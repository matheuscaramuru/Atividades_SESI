<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Reais</title>
</head>
<body>
<form action='posneg.php' method="POST">
       Número: <input type="num" name="numero">
       <button type="submit">Verificar</button>
       </form>

       <?php
$numero = $_POST['numero'];
if($numero>0) 
  echo" $numero positivo";
else if($numero<0)
echo " $numero negativo";
else if ($numero==0)
echo " $numero é zero";

?>
</body>
</html>
</body>
</html>