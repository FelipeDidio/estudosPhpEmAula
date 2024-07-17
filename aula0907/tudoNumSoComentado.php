<?php
// Configuração de conexão com o banco de dados
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cadastrousuario";
    
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
    $conn = connectDatabase();

    if ($conn) {
        // Função para adicionar dados
        // Linha 29 -> verifica se as infos recebidas do form estão definidas e não são nulas e se são iguais ao vlr create.
        if (isset($_POST['action']) && $_POST['action'] == 'create') {
            $nome = $_POST['nome']; // Declaração de variável $nome e atribuinto a informação enviada do form por metodo POST.
            $email = $_POST['email']; // Declaração de variável $email e atribuinto a informação enviada do form por metodo POST.
            
            // linha 35 -> Criação da variável $sql ára receber instrução SQL para inserção dos dados no banco de dados
            $sql = "INSERT INTO usuario (nome, email) VALUES (:nome, :email)";
            $stmt = $conn->prepare($sql); // Criação da variável $stmt(Statement) e atribui valores de conexão com o bando e prepara o sql p/ execussão.
            $stmt->bindParam(':nome', $nome);  // vincula um valor de variável PHP a um placeholder na instrução SQL preparada.
            $stmt->bindParam(':email', $email); // Nesta linha acontece a mesma coisa, aqui, o placeholder :email é vinculado à variável PHP $email.
            
            // Linha 41 -> Tenta executar a instrução SQL que foi preparada
            if ($stmt->execute()) {
                echo "Novo registro criado com sucesso<br>";  // Ele retorna true se a execução for bem-sucedida
            } else {
                echo "Erro ao criar novo registro<br>";  // E retorna false se ocorrer algum erro.
            }
        }

        // Função para ler dados
        // Linha 50 -> verifica se as infos recebidas do form estão definidas e não são nulas e se são iguais ao vlr read.
        if (isset($_POST['action']) && $_POST['action'] == 'read') {
            $sql = "SELECT id, nome, email FROM usuario"; // linha 51 -> Criação da variável $sql ára receber instrução SQL para leitura dos dados no banco de dados
            $stmt = $conn->query($sql);  // Criação da variável $stmt(Statement) e atribui valores de conexão com o bando e prepara o sql p/ execussão.

            if ($stmt->rowCount() > 0) {  // Verifica se o num de linhas é maior que 0. O `rowCount()` é um método que retorna o número de linhas.
                // Output de dados em cada linha
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  // WHILE é um laço de repetição que continuará executando enquanto a condição dentro dos parênteses for verdadeira.
                   // fetch(PDO::FETCH_ASSOC) é um método que retorna a próxima linha do conjunto de resultados como um array associativo. Cada chamada a fetch() retorna a próxima linha ou false quando não há mais linhas.
                    echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
                } // Linha 58 -> Concatenação de variáveis para criar umalinha para imprimir os dados da linha atual na tela.
            } else {
                echo "0 resultados"; // Caso não encontre registro essa será a saída informada na tela.
            }
        }

        // Função para atualizar dados
        // Linha 67 -> verifica se as infos recebidas do form estão definidas e não são nulas e se são iguais ao vlr update.
        if (isset($_POST['action']) && $_POST['action'] == 'update') {
            $id = $_POST['id']; // Declaração de variável e atribuição de valor enviada do form por metodo POST.
            $nome = $_POST['nome']; // Igual linha 68.
            $email = $_POST['email']; // Igual linha 68

            $sql = "UPDATE usuario SET nome=:nome, email=:email WHERE id=:id"; // declaração da variável $sql e instrução SQL para atualizar usuário caso o ID de match.

            $stmt = $conn->prepare($sql);  // Mesmo comentário da linha 36
                $stmt->bindParam(':nome', $nome);  // Mesmo comentário da linha 37
                $stmt->bindParam(':email', $email);  // Mesmo comentário da linha 37
                $stmt->bindParam(':id', $id);  // Mesmo comentário da linha 37

                // Linha 80 -> Tenta executar a instrução SQL que foi preparada
                if ($stmt->execute()) {
                    echo "Registro atualizado com sucesso<br>";   // Ele retorna true se a execução for bem-sucedida
                } else {
                    echo "Erro ao atualizar registro<br>";  // E retorna false se ocorrer algum erro.
                }
}

// Função para excluir dados
// Linha 88 -> verifica se as infos recebidas do form estão definidas e não são nulas e se são iguais ao vlr delete.
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];  // Declaração de variável e atribuição de valor enviada do form por metodo POST.

    $sql = "DELETE FROM usuario WHERE id=:id";  // declaração da variável $sql e instrução SQL para atualizar usuário caso o ID de match.

    $stmt = $conn->prepare($sql); // Mesmo comentário da linha 74
        $stmt->bindParam(':id', $id);  // Mesmo comentário da linha 75

        // Linha 98 -> Tenta executar a instrução SQL que foi preparada
        if ($stmt->execute()) {
            echo "Registro excluído com sucesso<br>";  // Ele retorna true se a execução for bem-sucedida
        } else {
            echo "Erro ao excluir registro<br>";  // E retorna false se ocorrer algum erro.
        }
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Formulário para Adicionar Usuário</h2>
<form method="post">
  <input type="hidden" name="action" value="create">
  Nome: <input type="text" name="nome"><br>
  Email: <input type="text" name="email"><br>
  <input type="submit" value="Adicionar">
</form>

<h2>Formulário para Ler Usuários</h2>
<form method="post">
  <input type="hidden" name="action" value="read">
  <input type="submit" value="Ler">
</form>

<h2>Formulário para Atualizar Usuário</h2>
<form method="post">
  <input type="hidden" name="action" value="update">
  ID: <input type="text" name="id"><br>
  Novo Nome: <input type="text" name="nome"><br>
  Novo Email: <input type="text" name="email"><br>
  <input type="submit" value="Atualizar">
</form>

<h2>Formulário para Excluir Usuário</h2>
<form method="post">
  <input type="hidden" name="action" value="delete">
  ID: <input type="text" name="id"><br>
  <input type="submit" value="Excluir">
</form>

</body>
</html>

