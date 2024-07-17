<?php 

session_start();
 
// Adiciona itens ao carrinho
$_SESSION['carrinho'][] = ['id' => 1, 'nome' => 'Produto A', 'preco' => 50];
$_SESSION['carrinho'][] = ['id' => 2, 'nome' => 'Produto B', 'preco' => 30];
 
// Exibe os itens do carrinho
echo 'Itens no carrinho:<br>';
foreach ($_SESSION['carrinho'] as $item) {
    echo 'ID: ' . $item['id'] . ' - Nome: ' . $item['nome'] . ' - Preço: R$' . $item['preco'] . '<br>';
    // Exibe cada item do carrinho
}
 
// Remover um item específico do carrinho
unset($_SESSION['carrinho'][1]); // Remove o segundo item (índice 1)
echo 'Item removido. Itens restantes no carrinho:<br>';
foreach ($_SESSION['carrinho'] as $item) {
    echo 'ID: ' . $item['id'] . ' - Nome: ' . $item['nome'] . ' - Preço: R$' . $item['preco'] . '<br>';
    // Exibe os itens restantes no carrinho
}
 
// Limpar o carrinho
unset($_SESSION['carrinho']);
if (empty($_SESSION['carrinho'])) {
    echo 'O carrinho está vazio.<br>';
    // Verifica se o carrinho está vazio e exibe mensagem
}

?>