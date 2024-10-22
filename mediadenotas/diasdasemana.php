<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dias da Semana</title>
</head>
<body>
<form action='diasdasemana.php' method="POST">
       Dia: <input type="num" name="dia">
       <button type="submit">Verificar</button>
       </form>

       <?php
$dia = $_POST['dia'];
if($dia==1)
  echo"Dia $dia, Domingo!";
else if($dia==2)
echo "Dia $dia, Segunda-Feira!";
else if($dia==3)
echo "Dia $dia, Terça-Feira!";
else if($dia==4)
echo "Dia $dia, Quarta-Feira!";
else if($dia==5)
echo "Dia $dia, Quinta-Feira!";
else if($dia==6)
echo "Dia $dia, Sexta-Feira!";
else if($dia==7)
echo "Dia $dia, Sábado!";

?>
</body>
</html>