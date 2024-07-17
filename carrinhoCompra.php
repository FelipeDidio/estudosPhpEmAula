<?php

session_start();  //inicia sessão.

// Armazena dados na sessão
$_SESSION['usuario'] = 'Felipe';
$_SESSION['email'] = 'f3lip3d3v@example.com';
$_SESSION['logado'] = true;

// Recupera e exibe os dados da sessão
echo 'Usuário: ' . $_SESSION['usuario'] .'<br>'; // Exibe: Usuário: Felipe
echo 'Email: ' . $_SESSION['email'] . '<br>'; // Exibe: Email: f3lip3d3v@example.com

// Verifica se o usuário está logado
if ($_SESSION['logado']) {
    echo 'Usuário está logado.<br>'; // Exibe: Usuário está logado.
}

$carrinhoDeComprra = 
[
    'celular' => 01,
    'notebook' => 01,
    'guarda-roupa' => 01, 
    'tv-smart' => 01
];

foreach($carrinhoDeComprra as $produto => $quantidade)
{
    echo 'Seu carinho tem os produtos:' . $produto .'unidades:' . $quantidade .'<br>';
}

// Tira um item do carrinho
unset($carrinhoDeComprra[2]);

echo 'Seu carrinho foi atualizado!<br>';
// Exibe ítens do carinho editado
foreach($carrinhoDeComprra as $produto => $quantidade)
{
    echo 'Seu carinho tem os produtos:' . $produto . 'unidades:' . $quantidade . '<br>';
}

//Destrui a sessão
session_destroy();
?>







<!-- Nesta atividade, vamos:

Iniciar uma sessão.
Adicionar um item ao carrinho.
Exibir os itens do carrinho.
Remover um item do carrinho.
Exibir o carrinho após a remoção. -->