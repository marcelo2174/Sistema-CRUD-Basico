<!DOCTYPE html>
<html class="geral" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Relatório de Usuários</title>
</head>
<body class="p-3">
    <h1 class="titulo">Relatório de Usuários:</h1>
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
                </tr>
            </thead>";
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['login']."</td>
                    <td>".$row['senha']."</td>
                </tr>";
        }
    }else{
        echo "<tr>
                <td colspan='3'>Nenhum Usuário Cadastrado!</td>
            </tr>";
    }
    echo "</table>";

    echo "<br><a class='home-update' href='tela_inicial.php'>Home</a>";
    
    $conn->close();
?>