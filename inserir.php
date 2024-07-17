<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd= "aula";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $bd);

// Verificação da conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserir usuário
$user = 'user3';
$pass = password_hash('password123', PASSWORD_DEFAULT); // Criptografa a senha

$sql = "INSERT INTO user (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "sucesso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
