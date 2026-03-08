<?php
require_once "../config/Conexao.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = $dados['senha'];

    $senhaHash = password_hash($senha,PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO usuario(nome,email,senha) VALUES (:nome,:email,:senha)");

    if (
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash,
        ])
    ) {
        echo json_encode(
            [
                "status" => "201",
                "msg" => "Criado"
            ]
        );
    }else{
        echo json_encode(
            [
                "status" => "400",
                "msg" => "Nao-Criado"
            ]
        );
    }
}