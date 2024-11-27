<?php
include 'db.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel='stylesheet' href='CSS/listar.css'>
</head>
<body>

<h2 class="clientes-header">Lista de Usuários</h2>

    <form action="crud.html">
        <input class="clientes-header" type="submit" value="Voltar">
    </form>

<table class="user-table">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Cidade</th>
        <th>Ações</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['celular']}</td>
                    <td>{$row['cidade']}</td>
                    <td>
                        <a href='editar.php?id={$row['id']}' class='action-link'>Editar</a>
                        <a href='excluir.php?id={$row['id']}' class='action-link'>Excluir</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nenhum usuário encontrado</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>