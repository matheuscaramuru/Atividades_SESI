<?php
session_start();
//print_r($_SESSION);
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: login.php');
?>