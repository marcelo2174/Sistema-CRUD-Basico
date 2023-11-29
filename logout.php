<?php
session_start();

session_destroy();

header('Location: tela_inicial.php');

?>