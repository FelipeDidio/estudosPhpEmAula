<?php
require 'connection.php';
 
$conn = connectDatabase();

if ($conn) {
    try {
        $sql = "SELECT id, nome, email FROM usuario";
        $stmt = $conn->query($sql);
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            echo "<h1>Lista de Usuários</h1>";
            echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
            foreach ($result as $row) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["email"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Erro ao conectar ao banco de dados.";
}
?>