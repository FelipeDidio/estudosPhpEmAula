<?php
require 'connection.php';


if(isset($_POST['username']) && isset($_POST['password'])  && !empty($_POST['username']) && !empty($_POST['password'])){
    $nome = $_POST['username'];
    $senha = $_POST['password'];

    
} else {
    echo "Por favor, preencha todos os campos do formulário.";
}
?>
<a href="crudDAO.php"></a>