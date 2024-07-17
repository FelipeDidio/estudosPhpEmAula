<?php

require_once __DIR__ . '/./crudDAO.php';

$username = $_POST['username'];
$password = $_POST['password'];

// chama  a função para criar usuário e passa os parametros
criaUsuario($username, $password);

