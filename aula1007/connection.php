<?php

function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "validaSenha";
    $dsn = "mysql:host=$servername;dbname=$dbname";
    
    try {
        // Tentando criar uma nova instância de PDO para a conexão
        $pdo = new PDO($dsn, $username, $password);
        
        // Configurando o modo de erro do PDO para exceção
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Se a conexão for bem-sucedida, exibe uma mensagem
        echo "Conexão bem-sucedida";
        return $pdo;
    } catch(PDOException $e) {
        // Se a conexão falhar, exibe a mensagem de erro
        echo "Conexão falhou: " . $e->getMessage();
        return null;
    }
    }
