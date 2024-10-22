<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];

$sql = "UPDATE produtos SET nome='$nome', preco='$preco' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto atualizado com sucesso!";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

$conn->close();
?>
