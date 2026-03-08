<?php
require_once "../config/Conexao.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    $nome = $dados['nome'] ?? null;
    $imagem = $dados['imagem'] ?? null;
    $descricao = $dados['descricao'] ?? null;
    $quantidade = $dados['quantidade'];
    $preco = $dados['preco'] ?? null;

    if (empty($nome) || empty($imagem) || empty($descricao) || empty($quantidade) || empty($preco)) {
        echo json_encode([
            "status" => "400",
            "msg" => "campos invalidos!"
        ]);
        exit;
    }

    if ($preco != null) {
        $precoFormatado = (float) $preco;
    }

    



    $stmt = $pdo->prepare("INSERT INTO produto(nome,imagem,descricao,quantidade,preco) VALUES (:nome,:imagem,:descricao,:quantidade,:preco)");
    if (
        $stmt->execute(
            [
                ":nome" => $nome,
                ":imagem" => $imagem,
                ":descricao" => $descricao,
                ":quantidade" => $quantidade,
                ":preco" => $precoFormatado
            ]
        )
    ) {
        echo json_encode([
            "status" => "201",
            "msg" => "Criado"
        ]);
    } else {
        echo json_encode([
            "status" => "400",
            "msg" => "Nao-Criado"
        ]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    $stmt = $pdo->prepare("SELECT * FROM produto");
    $stmt->execute();
    $produtos = $stmt->fetchAll();
    echo json_encode($produtos);

}