<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    
    echo "Obrigado, $nome! Sua mensagem foi recebida.";
} else {
    echo "error";
}
?>
