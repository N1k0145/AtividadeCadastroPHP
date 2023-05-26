<?php

function cadastrarDados($nome, $email, $senha)
{
    
    $conexao = mysqli_connect("localhost", "usuario", "senha", "banco");

    
    if (mysqli_connect_errno()) {
        echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
        return;
    }

    
    $nome = mysqli_real_escape_string($conexao, $nome);
    $email = mysqli_real_escape_string($conexao, $email);
    $senha = mysqli_real_escape_string($conexao, $senha);

    
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if (mysqli_query($conexao, $query)) {
        echo "Dados cadastrados com sucesso!";
    } else {
        echo "Erro ao cadastrar os dados: " . mysqli_error($conexao);
    }

    
    mysqli_close($conexao);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Cadastro de Usuário</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

</body>
</html>
