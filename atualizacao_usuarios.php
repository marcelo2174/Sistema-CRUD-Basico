<!DOCTYPE html>
<html class="geral" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Atualizar Alunos</title>
    <script>
        function PreencherFormulario(id,nome,idade){
            document.getElementById('id_usuario').value=id;
            document.getElementById('login').value=nome;
            document.getElementById('senha').value=idade;
        }
    </script>
</head>
<body class="p-3">
    <h1 class="titulo">Atualizar Usuários:</h1>

    <form action = "#" method = "post">
        <input type="hidden" name="id_usuario" id="id_usuario">
 
        <label for="login" id="table-update">Login: </label>
        <input type="text" id="login" name="login" required>
       
        
        <label for="senha">Senha: </label>
        <input type="text" id="senha" name="senha" required>
        
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>

<?php
    include 'conexao.php';

    $sql = "SELECT id,login,senha FROM usuarios";
    $result =  $conn->query($sql);
    echo "<table class='table'>
            <thead class='table-dark'>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Selecione:</th>
                </tr>
            </thead>";
    
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['login']."</td>
                    <td>".$row['senha']."</td>
                    <td><input type='radio' name='selecao' onclick='PreencherFormulario(".$row["id"].", \"".$row['login']."\", ".$row['senha'].")'></td>
                </tr>";
            }
    }else{
        echo "<tr>
                <td colspan='3'>Nenhum Usuário Cadastrado</td>
            </tr>";
        }

    echo "</table>";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id_usuario'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "UPDATE usuarios SET Login='$login',Senha=$senha WHERE id=$id";

        if($conn->query($sql)===TRUE){
            header('location: atualizacao_usuarios.php');
            echo "Usuário Atualizado com Sucesso!!";
        }else{
            echo "Erro ao atualizar usuário".$conn->error;
        }
    }

    echo "<br><a class='home-update' href='tela_inicial.php'>Home</a>";

    $conn->close();
?>