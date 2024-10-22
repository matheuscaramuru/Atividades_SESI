<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "setembro_amarelo_Sesi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta para obter os dados de "Sobre Nós"
$sql = "SELECT titulo, descricao FROM sobre_nos LIMIT 1";
$result = $conn->query($sql);

// Verifica se os dados foram encontrados
if ($result->num_rows > 0) {
    // Obtém os dados
    $sobre_nos = $result->fetch_assoc();
} else {
    $sobre_nos = [
        'titulo' => 'Sobre Nós',
        'descricao' => 'Informações sobre a organização não estão disponíveis no momento.'
    ];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sobre_nos['titulo']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head> 

<body>
    <?php include 'header.php'; ?>

    <main>
        <h1><?php echo $sobre_nos['titulo']; ?></h1>
        <section>
            <p><?php echo $sobre_nos['descricao']; ?></p>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
