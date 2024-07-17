<?php
require 'connection.php';

	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
 
    $conn = connectDatabase();

    if ($conn) {
        try {
            // Usando prepared statements para evitar injeção de SQL
            $stmt = $conn->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);

            $stmt->execute();
        echo "Novo registro criado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Erro ao conectar ao banco de dados.";
}
}
?>
<br>
<a href="index.html">Voltar</a>