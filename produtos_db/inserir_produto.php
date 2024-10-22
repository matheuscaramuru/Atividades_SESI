<?php

$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "produtos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$preco = $_POST['preco'];

$sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome', '$preco')";

if ($conn->query($sql) === TRUE) {
    echo "Novo produto inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>