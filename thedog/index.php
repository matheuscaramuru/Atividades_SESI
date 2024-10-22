<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$api_key = "live_S8uBQUq2pBiRgDvOp5q4UA0YvwTuT1A8nMKHnO3o1JE22aAXkTIZh1EqSlqMveBn";

function fetchDogBreed($breed_name, $api_key) {
    $url = "https://api.thedogapi.com/v1/breeds/search?q=" . urlencode($breed_name);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: ' . $api_key
    ));
    
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erro na requisição cURL: ' . curl_error($ch);
        return null;
    } else {
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($status_code == 200) {
            return json_decode($response, true);
        } else {
            echo "Erro: Status HTTP " . $status_code;
            echo "<br>Resposta: " . $response;  // Adicionado para ver o conteúdo da resposta
            return null;
        }
    }

    curl_close($ch);
}

$dog_data = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $breed_name = $_POST['breed_name'];

    if (!empty($breed_name)) {
        $dog_data = fetchDogBreed($breed_name, $api_key);
    } else {
        echo "Por favor, digite o nome de uma raça.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Raças de Cães</title>
    <style>
        /* Estilo do corpo e da caixa */
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #9ebbeb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #844c82;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: rebeccapurple;
        }

        .breed-info {
            margin-top: 20px;
        }

        .breed-info h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .breed-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #333;
        }

        img {
            margin-top: 20px;
            max-width: 100%;
            border-radius: 10px;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Busque Informações de Raças de Cães</h1>

        <form method="POST">
            <input type="text" name="breed_name" placeholder="Digite o nome da raça" required>
            <button type="submit">Buscar</button>
        </form>

        <?php if ($dog_data && count($dog_data) > 0): ?>
            <div class="breed-info">
                <h2>Informações da Raça: <?php echo $dog_data[0]['name']; ?></h2>
                <p><strong>Temperamento:</strong> <?php echo $dog_data[0]['temperament']; ?></p>
                <p><strong>Expectativa de Vida:</strong> <?php echo $dog_data[0]['life_span']; ?></p>
                <p><strong>Peso:</strong> <?php echo $dog_data[0]['weight']['metric']; ?> kg</p>
                <p><strong>Altura:</strong> <?php echo $dog_data[0]['height']['metric']; ?> cm</p>
                <?php if (isset($dog_data[0]['image'])): ?>
                    <img src="<?php echo $dog_data[0]['image']['url']; ?>" alt="Imagem da raça">
                <?php endif; ?>
            </div>
        <?php elseif ($dog_data === null && $_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <p class="error">Nenhuma informação encontrada para essa raça.</p>
        <?php endif; ?>
    </div>
</body>
</html>
