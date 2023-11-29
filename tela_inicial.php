<?php
session_start();
?>

<!DOCTYPE html>
<html class="geral" lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Home</title>
    </head>

    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
        <h1 class="titulo">Sistema de Cadastro:</h1>
        <div class="index_cabecalho">
            <form action="login.php" method="post">      
                <?php
                    if(!isset($_SESSION["login"])){
                        echo "<a class='login' href='login.php'>Login</a>";
                    }
                    else{
                        echo "<p class='bemvindo'> Bem vindo, ".$_SESSION["login"]."!</p>";
                        echo "<a class='btn_logout' href='logout.php'>LogOut</a>";
                    }
                ?>
            </form>    
        </div>    

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="cadastro_usuarios.php">Cadastrar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" aria-current="page"href="relatorio_usuarios.php">Relatório</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" aria-current="page"href="atualizacao_usuarios.php">Atualizar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" aria-current="page"href="delecao_usuarios.php">Deletar</a>
            </li>
        </ul>

        <h2 class="titulo">Usuários Cadastrados:</h2>
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
    
    $conn->close();
?>