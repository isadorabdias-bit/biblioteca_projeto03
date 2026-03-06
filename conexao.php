<?php
$host = "localhost"; // servidor
$user = "root";      // usuário do banco
$pass = "";          // senha
$db = "biblioteca";  // nome do banco

// Cria conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verifica erro
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>