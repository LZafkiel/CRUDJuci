<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO usuarios (nome, email, celular, cidade) VALUES ('$nome', '$email', '$celular', '$cidade')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<button onclick="window.location.href='crud.html'">Voltar para CRUD</button>