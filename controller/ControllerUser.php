<?php
// solicita o arquivo de conexão do banco de dados
require_once "../config/Conexao.php";

// verifica qual o método da requisição
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    // Obtém os dados da requisição
    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = $dados['senha'];

    // transforma a senha que está em string em um hash
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    // prepara a query para receber os parâmetros
    // previne injeção de sql
    $stmt = $pdo->prepare("INSERT INTO usuario(nome,email,senha) VALUES (:nome,:email,:senha)");

    // associa os campos com as variáveis e executa
    if (
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash,
        ])
    ) {
        // caso tenha criado
        echo json_encode(
            [
                "status" => "201",
                "msg" => "Criado"
            ]
        );
    } else {
        // caso algo tenha dado errado
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