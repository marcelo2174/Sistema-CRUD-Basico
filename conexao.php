<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Avaliacao";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    echo 'Conexão Falhou'.$conn -> connect_error;
}
?>