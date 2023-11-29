<!DOCTYPE html>
<html class="geral" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Usuários</title>
</head>
<body class="p-3">
    <div class="div-login">

        <h1 class="titulo">Cadastrar Usuário:</h1>

        <form action = "#" method = "post">

            <div class="login_">
                <label for="login" class="form-label">Login: </label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>

            <div class="login_">
                <label for="senha" class="form-label">Senha: </label>
                <input type="text" class="form-control" id="senha" name="senha" required>
            </div>

            <button type="submit" class="btn btn-primary" id="submit-btn-cadastro">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO usuarios(login,senha) VALUES (?,?)";
        $insert = $conn->prepare($sql);
        $insert->bind_param("si",$login,$senha);

        if($insert->execute()){
            echo "<p class='confirmar-cadastro'>Cadastro realizado com sucesso!</p>";
        }
        else{
            echo "Erro ao cadastrar: ".$conn->error;
        }

        $insert->close();
    }

    echo "<br><a class='home-cadastro' href='tela_inicial.php'>Home</a>";

    $conn->close();
?>