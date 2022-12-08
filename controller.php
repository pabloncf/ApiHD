<?php

include("conexao.php");

$dbController = new DBControler('localhost', 'root', '', 'users');

$dbController->envio($_GET['nome'], $_GET['email'], $_GET['cpf'], $_GET['telefone']);


?>