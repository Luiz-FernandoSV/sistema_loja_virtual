<?php
// solicita o arquivo de conexão
require_once "../config/Conexao.php";

// verifica o método da requisição
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    // Prepara a query
    $stmt = $pdo->prepare("SELECT * FROM produto");
    // executa
    $stmt->execute();
    // guarda os resultados na variavel
    $produtos = $stmt->fetchAll();
    // retorna em json
    echo json_encode($produtos);

}