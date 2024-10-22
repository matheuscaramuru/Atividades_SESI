<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média dos alunos</title>
</head>
<body> 
    <form action='Media.php' method="POST">
       1ª Nota: <input type="number" name="nota1">
       2ª Nota: <input type="number" name="nota2">
       3ª Nota: <input type="number" name="nota3">
       4ª Nota: <input type="number" name="nota4">
       5ª Nota: <input type="number" name="nota5">
       <button type="submit">Calcular</button>
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {  
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $nota4 = $_POST['nota4'];
        $nota5 = $_POST['nota5'];
      
        $media = ($nota1 + $nota2 + $nota3 + $nota4 + $nota5) / 5;
        echo "Média total: $media";
        
        if ($media <= 6) {
            echo " Reprovado!";
        } else {
            echo " Aprovado!";
        }
    }
    ?>

</body>
</html>
