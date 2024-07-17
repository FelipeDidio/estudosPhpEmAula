<?php

require_once __DIR__ . '/./connection.php';



// $pdo->exec("
//         SET GLOBAL validate_password.length = 8;
//         SET GLOBAL validate_password.mixed_case_count = 1;
//         SET GLOBAL validate_password.number_count = 1;
//         SET GLOBAL validate_password.special_char_count = 1;
//         SET GLOBAL validate_password.policy = 'MEDIUM';
//     ");
//     echo "Política de senha configurada com sucesso<br>";


    // Cria um novo usuário
    function criaUsuario($username, $password){
        $pdo = connectDatabase();
        // Consulta SQL
        $sql = "CREATE USER :username@'localhost' IDENTIFIED BY :password";
       try {
        // Prepara a consulta
        $stmt = $pdo->prepare($sql);
        // Executa a consulta com os parâmetros
        $stmt->execute([':username' => $username, ':password' => $password]);
        echo "Usuário criado com sucesso<br>";
    } catch (PDOException $e){
        echo 'Erro: ' . $e->getMessage();
    }

    
     // Altera a senha de um usuário existente
     function alteraUser(){
        $pdo = connectDatabase();

         $existing_user = 'usuario_existente';
         $new_password = 'NovaSenha456!';
         $sql = "ALTER USER :user@'localhost' IDENTIFIED BY :password";
         $stmt = $pdo->prepare($sql);
         $stmt->execute(['user' => $existing_user, 'password' => $new_password]);
         echo "Senha alterada com sucesso<br>";
     }

    
    // // Configurar bloqueio de usuário após tentativas de login falhadas
    // function bloqueiaUsuario(){
    //     $pdo->exec("SET GLOBAL validate_password.max_password_errors = 3");
    //     echo "Configuração de bloqueio de usuário após tentativas de login falhadas foi aplicada<br>";
    // }
    }