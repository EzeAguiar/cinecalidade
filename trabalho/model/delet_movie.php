<?php
include './db_connect.php';

$id = $_GET['id'];

// Excluir filme
$sql = "DELETE FROM filmes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Erro: " . $conn->error;
}
?>
