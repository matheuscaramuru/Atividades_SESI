<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Selecionar dados da tabela
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['preco'] . "</td>
                <td>
                    <a href='editar_produto.php?id=" . $row['id'] . "'>Editar</a> | 
                    <a href='deletar_produto.php?id=" . $row['id'] . "'>Deletar</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}

$conn->close();
?>
