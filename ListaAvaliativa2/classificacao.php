<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação</title>
</head>
<body>
<form action='classificacao.php' method="POST">
       Nota: <input type="num" name="nota">
       <button type="submit">Verificar</button>
       </form>

       <?php
$nota = $_POST['nota'];
if($nota<2)
  echo" $nota, Categoria E!";
else if($nota<4)
echo " $nota, Categoria D!";
else if($nota<6)
echo " $nota, Categoria C!";
else if($nota<8)
echo " $nota, Categoria B!";
else if($nota<10)
echo " $nota, Categoria A!";
else if($nota> 11)
echo "error";


?>
</body>
</html>
</body>
</html>