<?php
// Definindo as variáveis de conexão
function connectDatabase() {
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cadastroUsuario";

try {
    // Tentando criar uma nova instância de PDO para a conexão
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Configurando o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Se a conexão for bem-sucedida, exibe uma mensagem
    echo "Conexão bem-sucedida";
    return $conn;
} catch(PDOException $e) {
    // Se a conexão falhar, exibe a mensagem de erro
    echo "Conexão falhou: " . $e->getMessage();
    return null;
}
}
?>