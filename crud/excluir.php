<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Usuário excluído com sucesso!";
    header("Location: listar.php");
    exit();
} else {
    echo "Erro ao excluir usuário: " . $conn->error;
}

$conn->close();
?>