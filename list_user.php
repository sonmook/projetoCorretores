<?php
    include_once('config.php');

    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $delete_query = "DELETE FROM usuarios WHERE id = $id";
        mysqli_query($conexao, $delete_query);
        header("Location: list_user.php");
        exit();
    }

    $select_query = "SELECT * FROM usuarios";
    $result = mysqli_query($conexao, $select_query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <div class="container">
        <h1>LISTA DE CORRETORES</h1>
        <div class="form-container">
            <table>
                <thead>
                    <tr>
                        <th class="titulo">CPF</th>
                        <th class="titulo">CRECI</th>
                        <th class="titulo">NOME</th>
                        <th class="actions-header">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th class="linhas"><?php echo $row['cpf']; ?></th>
                            <th class="linhas"><?php echo $row['creci']; ?></th>
                            <th class="linhas"><?php echo $row['nome']; ?></th>
                            <th>
                                <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="edit-link">EDITAR</a>
                            </th>
                            <th>
                            <a href="?delete_id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Tem certeza que deseja excluir este registro?')">EXCLUIR</a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
