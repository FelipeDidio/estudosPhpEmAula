<?php
// Inicia a sessão
session_start(); // Deve ser a primeira coisa no script
 
// Armazena dados na sessão
$_SESSION['usuario'] = 'Rudinei';
$_SESSION['email'] = 'rudinei.cruz@example.com';
$_SESSION['logado'] = true;
 
// Recupera e exibe os dados da sessão
echo 'Usuário: ' . $_SESSION['usuario'] . '<br>'; // Exibe: Usuário: Rudinei
echo 'Email: ' . $_SESSION['email'] . '<br>'; // Exibe: Email: rudinei.cruz@example.com
 
// Verifica se o usuário está logado
if ($_SESSION['logado']) {
    echo 'Usuário está logado.<br>'; // Exibe: Usuário está logado.
}
 
// Modificar um valor na sessão
$_SESSION['usuario'] = 'Rosimar';
echo 'Usuário atualizado: ' . $_SESSION['usuario'] . '<br>'; // Exibe: Usuário atualizado: Rosimar
 
// Remover um valor específico da sessão
unset($_SESSION['email']);
if (!isset($_SESSION['email'])) {
    echo 'Email foi removido da sessão.<br>'; // Exibe: Email foi removido da sessão.
}
 
// Destruir a sessão
session_destroy();
?>