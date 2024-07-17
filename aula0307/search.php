<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
</head>
<body>
    <h1>Resultados da Pesquisa</h1>
    <?php
    // Verifica se o parâmetro 'query' existe antes de usá-lo
    if (isset($_GET['query'])) {
        // Coleta o termo de pesquisa
        $query = $_GET['query'];
        
        // Simula uma lista de produtos
        $produtos = [
            "Notebook Dell",
            "Smartphone Samsung",
            "Tablet Apple",
            "Smartwatch Xiaomi",
            "Câmera Canon",
            "Fone de Ouvido Sony",
            "Monitor LG",
            "Teclado Mecânico Corsair"
        ];
 
        // Filtra os produtos que correspondem ao termo de pesquisa
        $resultados = array_filter($produtos, function($produto) use ($query) {
            return stripos($produto, $query) !== false;
        });
 
        // Exibe os resultados da pesquisa
        if (count($resultados) > 0) {
            echo "<ul>";
            foreach ($resultados as $produto) {
                echo "<li>" . htmlspecialchars($produto) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum produto encontrado para o termo: " . htmlspecialchars($query) . "</p>";
        }
    } else {
        echo "<p>Por favor, insira um termo de pesquisa.</p>";
    }
    ?>
</body>
</html>








<!-- Nesta atividade, você vai criar um pequeno sistema de pesquisa que permite aos usuários buscar por produtos em uma lista. O sistema será composto por um formulário HTML para inserir o termo de pesquisa e um script PHP para processar e exibir os resultados. -->