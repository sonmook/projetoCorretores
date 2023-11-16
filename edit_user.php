<?php
include_once('config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $select_query = "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($conexao, $select_query);
    $user = mysqli_fetch_assoc($result);
}

$mensagem = ""; 

if(isset($_POST['submit'])) {
    $id = $_GET['id']; 

    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];
    $nome = $_POST['nome'];

    $result = mysqli_query($conexao, "UPDATE usuarios SET cpf='$cpf', creci='$creci', nome='$nome' WHERE id='$id'");

if ($result) {
    $mensagem = "Você editou as informações com sucesso!";
    header("Location: list_user.php");
    exit(); 
} else {
    $mensagem = "Ocorreu um erro ao editar as informações.";
}

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <div class="container">
        <form action="edit_user.php?id=<?php echo $id; ?>" method="POST">
            <h1>EDITAR USUÁRIO</h1>
            <div class="form-container">
                <?php if ($mensagem != "") { ?>
                    <p class="success-message"><?php echo $mensagem; ?></p>
                <?php } ?>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" maxlength="11" pattern="\d{11}" title="O CPF deve ter 11 dígitos" placeholder="Digite seu CPF..." value="<?php echo $user['cpf']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="creci">CRECI:</label>
                    <input type="text" id="creci" name="creci" pattern=".{2,}" title="O CRECI deve ter no mínimo 2 caracteres" placeholder="Digite seu Creci..." value="<?php echo $user['creci']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">NOME:</label>
                    <input type="text" id="nome" name="nome" pattern=".{2,}" title="O Nome deve ter no mínimo 2 caracteres" placeholder="Digite seu Nome..." value="<?php echo $user['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="SALVAR">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
