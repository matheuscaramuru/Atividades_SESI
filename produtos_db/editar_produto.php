<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="atualizar_produto.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nome do Produto: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
        Preço do Produto: <input type="text" name="preco" value="<?php echo $row['preco']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
<?php
} else {
    echo "Produto não encontrado.";
}

$conn->close();
?>
