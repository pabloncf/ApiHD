<?php

include('conexao.php');

$dbController = new DBControler('localhost', 'root', '', 'users');

$dbController->consulta();
$dbController->consultaCPF($_GET['cpf']);

?>