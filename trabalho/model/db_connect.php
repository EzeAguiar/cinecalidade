<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinecalidade";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
