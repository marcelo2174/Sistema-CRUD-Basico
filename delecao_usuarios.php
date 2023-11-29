<!DOCTYPE html>
<html class="geral" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Deletar Aluno</title>
    <script>
        function ConfirmarDelecao(id){
            var resposta  = confirm("Você tem certeza que deseja apagar o usuario  "+id+"?");
            if(resposta){
                window.location.href="delecao_usuarios.php?id="+id;
            }
        };
    </script>
</head>
<body class="p-3">
    <h1 class="titulo">Deletar Usuários:</h1>
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
                    <td><button onclick='ConfirmarDelecao(".$row["id"].")'>Deletar</button></td>
                </tr>";
            }
    }else{
        echo "<tr>
                <td colspan='3'>Nenhum Usuário Cadastrado</td>
            </tr>";
        }

    echo "</table>";

    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $sql = "DELETE FROM usuarios WHERE id = $id";

        if($conn->query($sql)===TRUE){
            header('location: delecao_usuarios.php');
            echo "Usuário Deletado com Sucesso!!";
        }else{
            echo "Erro ao deletar usuário".$conn->error;
        }
    }

    echo "<br><a class='home-update' href='tela_inicial.php'>Home</a>";

    $conn->close();
?>