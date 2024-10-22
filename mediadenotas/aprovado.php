<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovação Escolar</title>
</head>
<body>
<form action='aprovado.php' method="POST">
       Nota: <input type="num" name="nota">
       <button type="submit">Verificar</button>
       </form>

       <?php
$nota = $_POST['nota'];
if($nota<5)
  echo"$nota pontos na média, foi reprovado!";
else if($nota<6)
echo "$nota pontos na média, está em recuperação!";
else if($nota<11)
echo "$nota pontos na média, foi aprovado!";
else if($nota>11)
echo "error";



?>
</body>
</html>