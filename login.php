<?php
session_start();
?>

<!DOCTYPE html>
<html class="geral" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Tela de Login</title>
</head>
<body class="p-3">
    <div class="div-login">
        <h1 class="titulo">Login:</h1>
            <form action = "#" method = "post">
                <div class="login_">
                    <label for="login" class="form-label">Login: </label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
                <div class="login_">
                    <label for="senha" class="form-label">Senha: </label>
                    <input type="text" class="form-control" id="login" name="senha" required>
                </div>
                <button type="submit" class="btn btn-primary" id="submit-btn-login">Entrar</button>
            </form>
    </div>
</body>
</html>

<?php
    include 'conexao.php';

    $sql = "SELECT id,login,senha FROM usuarios";
    $result =  $conn->query($sql);

    if(isset($_POST['login'],$_POST['senha'])){
        if($result->num_rows >0){
            $auxiliar=0;
            while($row = $result->fetch_assoc()){
                $nome = $row['login'];
                $senha = $row['senha'];

                if($_POST['login']==$nome && $_POST['senha']==$senha){
                    $auxiliar=1;
                }
            }

            if($auxiliar==1){
                $_SESSION['loggedin'] = true;
                $_SESSION['login'] = $_POST['login'];
                header('location: tela_inicial.php');       
            }
            else{
                echo "Usuário ou Senha Invalidos!";
            }
        }
    }

    $conn->close();

?>