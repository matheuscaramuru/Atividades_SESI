<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabeto</title>
</head>
<body>
<form action='' method="POST">
       Letras: <input type="txt" name="letras">
       <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letras = strtolower(trim($_POST['letras'])); 

    switch ($letras) {
        case 'b':
            echo "$letras é consoante";
            break;
        case 'c':
            echo "$letras é consoante"; 
            break;
        case 'd':
            echo "$letras é consoante"; 
            break;
        case 'f':
            echo "$letras é consoante"; 
            break;
        case 'g':
            echo "$letras é consoante"; 
            break;
        case 'h':
            echo "$letras é consoante"; 
            break;
        case 'j':
            echo "$letras é consoante"; 
            break;
        case 'k':
            echo "$letras é consoante"; 
            break;
        case 'l':
            echo "$letras é consoante"; 
            break;
        case 'm':
            echo "$letras é consoante"; 
            break;
        case 'n':
            echo "$letras é consoante"; 
            break;
        case 'p':
            echo "$letras é consoante"; 
            break;
        case 'q':
            echo "$letras é consoante"; 
            break;
        case 'r':
            echo "$letras é consoante"; 
            break;
        case 's':
            echo "$letras é consoante"; 
            break;
        case 't':
            echo "$letras é consoante"; 
            break;
        case 'v':
            echo "$letras é consoante"; 
            break;
        case 'w':
            echo "$letras é consoante"; 
            break;
        case 'x':
            echo "$letras é consoante"; 
            break;
        case 'y':
            echo "$letras é consoante"; 
            break;
        case 'z':
            echo "$letras é consoante"; 
            break; 
        case 'a':
            echo "$letras é vogal";
            break;
        case 'e':
            echo "$letras é vogal";
            break;
        case 'i':
            echo "$letras é vogal";
            break;
        case 'o':
            echo "$letras é vogal";
            break;
        case 'u':
            echo "$letras é vogal";
            break;
    }
}
?>
</body>
</html>