<?php
require_once "../config/Conexao.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = $dados['senha'];

    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

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
    } else {
        echo json_encode(
            [
                "status" => "400",
                "msg" => "Nao-Criado"
            ]
        );
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "PUT") {
    session_start();

    if($_SESSION == []){
        echo json_encode(
            [
                "status" => "401",
                "msg" => "Nao-Autenticado"
            ]
        );
        exit;
    }

    $idUsuario = $_SESSION['id'];
    $dados = json_decode(file_get_contents("php://input"), true);

    $novoNome = $dados['nome'];
    $novoEmail = $dados['email'];

    $stmt = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id = :id");
    if (
        $stmt->execute(
            [
                ':nome' => $novoNome,
                ':email' => $novoEmail,
                ':id' => $idUsuario
            ]
        )
    ) {
        $_SESSION['nome'] = $novoNome;
        $_SESSION['email'] = $novoEmail;

        echo json_encode(
            [
                "status" => "200",
                "msg" => "Alterado"
            ]
        );
    } else {
        echo json_encode(
            [
                "status" => "400",
                "msg" => "Nao-Alterado"
            ]
        );
    }
}