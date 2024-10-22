<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estados Brasileiros</title>
</head>
<body>
<form action='' method="POST">
       Estado (em abreviação): <input type="text" name="estado">
       <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estado = strtolower(string: trim(string: $_POST['estado'])); 

    switch ($estado) {
        case 'sp':
            echo "São Paulo - São Paulo";
            break;
        case 'rj':
            echo "Rio de Janeiro - Rio de Janeiro";
            break;
        case 'es':
            echo "Espírito Santo - Vitória";
            break;
        case 'mg':
            echo "Minas Gerais - Belo Horizonte";
            break;
        case 'ac':
            echo "Acre - Rio Branco";
            break;
        case 'al':
            echo "Alagoas - Maceió";
            break;
        case 'ap':
            echo "Amapá - Macapá";
            break;
        case 'am':
            echo "Amazonas - Manaus";
            break;
        case 'ba':
            echo "Bahia - Salvador";
            break;
        case 'ce':
            echo "Ceará - Fortaleza";
            break;
        case 'df':
            echo "Distrito Federal - Brasília";
            break;
         case 'go':
            echo "Goiás - Goiânia";
            break;
        case 'ma':
            echo "Maranhão - São Luís";
            break;
        case 'mt':
            echo "Mato Grosso - Cuiabá";
            break;
        case 'ms':
            echo "Mato Grosso do Sul - Campo Grande";
            break;
        case 'pa':
            echo "Pará - Belém";
            break;
        case 'pb':
            echo "Paraíba - João Pessoa";
            break;
        case 'pr':
            echo "Paraná - Curitiba";
             break;
        case 'pe':
            echo "Pernambuco - Recife";
            break;   
        case 'pi':
            echo "Piauí - Teresina";
            break;
        case 'rn':
            echo "Rio Grande do Norte - Natal";
            break;
        case 'rs':
            echo "Rio Grande do Sul - Porto Alegre";
            break;
        case 'ro':
            echo "Rondônia - Porto Velho";
            break;
        case 'rr':
            echo "Roraima - Boa Vista";
             break;
        case 'sc':
            echo "Santa Catarina - Florianópolis";
            break;  
        case 'se':
            echo "Sergipe - Aracaju";
            break;
        case 'to':
            echo "Tocantins - Palmas";
            break;  



    }
}
?>

</body>
</html>