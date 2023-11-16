<?php
    $mensagem = ""; 

    if(isset($_POST['submit'])) {
        include_once('config.php');

        //print_r($_POST['cpf']);
        //print_r('<br>');
        //print_r($_POST['creci']);
        //print_r('<br>');
        //print_r($_POST['nome']);

        $cpf = $_POST['cpf'];
        $creci = $_POST['creci'];
        $nome = $_POST['nome'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(cpf, creci, nome) 
        VALUES ('$cpf', '$creci', '$nome')");

        if ($result) {
            $mensagem = "Você cadastrou suas informações com sucesso!";
        } else {
            $mensagem = "Ocorreu um erro ao cadastrar suas informações.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <div class="container">
        <form action="formulario.php" method="POST">
        <h1>CADASTRO DE CORRETORES</h1>
        <div class="form-container">
            <?php if ($mensagem != "") { ?>
                <p class="success-message"><?php echo $mensagem; ?></p>
            <?php } ?>
            <form onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" maxlength="11" pattern="\d{11}" title="O CPF deve ter 11 dígitos" placeholder="Digite seu CPF..." required>
                </div>
                <div class="form-group">
                    <label for="creci">CRECI:</label>
                    <input type="text" id="creci" name="creci" pattern=".{2,}" title="O CRECI deve ter no mínimo 2 caracteres" placeholder="Digite seu Creci..." required>
                </div>
                <div class="form-group">
                    <label for="nome">NOME:</label>
                    <input type="text" id="nome" name="nome" pattern=".{2,}" title="O Nome deve ter no mínimo 2 caracteres" placeholder="Digite seu Nome..." required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="ENVIAR">
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var cpf = document.getElementById('cpf').value;
            if (cpf.length !== 11) {
                alert('O CPF deve ter 11 dígitos.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
