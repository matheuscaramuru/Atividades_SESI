<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Finder</title>
</head>
<body>
<form action='' method="POST">
       Cite aqui o código do erro: <input type="num" name="erro">
       <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erro = strtolower(trim($_POST['erro'])); 

    switch ($erro) {
        case '100':
            echo "$erro continue";
            break;
        case '101':
            echo "$erro Switching Protocols"; 
            break;
        case '200':
            echo "$erro OK"; 
            break;
        case '201':
            echo "$erro Created"; 
            break;
        case '202':
            echo "$erro Accepted"; 
            break;
        case '204':
            echo "$erro No Content"; 
            break;
        case'301':
            echo "$erro Moved Permanently"; 
            break;
        case '302':
            echo "$erro Found"; 
            break;
        case '400':
            echo "$erro Bad Request"; 
            break;
        case '401':
            echo "$erro Unauthorized"; 
            break;
        case '403':
            echo "$erro Forbidden"; 
            break;
        case '404':
            echo "$erro Not Found"; 
            break;
        case '405':
            echo "$erro Method Not Allowed"; 
            break;
        case '500':
            echo "$erro Internal Server Error"; 
            break;
        case '502':
            echo "$erro Bad Gateway"; 
            break;
        case '503':
            echo "$erro Service Unavaible"; 
            break;
    }
}
?>
</body>
</html>