<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email', celular='$celular', cidade='$cidade' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso!";
        header("Location: listar.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel='stylesheet' href='CSS/crud.css'>
</head>
<body>

<h2 class="clientes-header">Edição de Clientes</h2>
<div class="container">
    <h2 class="form-title2">Editar Usuário</h2>

    <form action="" method="post" class="user-form">
        <label>Nome:</label><input type="text" name="nome" value="<?php echo $user['nome']; ?>" required><br>
        <label>Email:</label><input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <label>Celular:</label><input type="text" name="celular" value="<?php echo $user['celular']; ?>" required><br>
        <label>Cidade:</label><input type="text" name="cidade" value="<?php echo $user['cidade']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>