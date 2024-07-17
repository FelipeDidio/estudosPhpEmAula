<?php
if(isset($_POST['username']) && isset($_POST['email'])  && !empty($_POST['username']) && !empty($_POST['email'])){
    $nome = $_POST['username'];
    $email = $_POST['email'];

    echo "Nome: $nome<br>";
    echo "Email: $email<br>";
} else {
    echo "Por favor, preencha todos os campos do formulário.";
}
?>