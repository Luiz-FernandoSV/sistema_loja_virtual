<?php
require_once "../config/Conexao.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    // Obtém os dados da requisição
    $email = $dados['email'];
    $senha = $dados['senha'];

    if(empty($email) || empty($senha)){
        echo json_encode([
            "status"=>"400",
            "msg"=>"Campos invalidos!"
        ]);
        exit;
    }

    // Prepara a query para receber o parâmetro 
    // previne injeção de SQL
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    // Associa o parâmetro ao email enviado
    $stmt->execute([
        ':email' => $email
    ]);

    // Busca o resultado
    $usuario = $stmt->fetch();

    if(!$usuario){
        echo json_encode([
            "status"=>"404",
            "msg"=>"Nao Encontrado!"
        ]);
        exit;
    }

    // Verifica se o email existe, e se a senha enviada bate com o hash armazenado no banco
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Se sucesso, inicia a sessão do usuário e retorna uma mensagem de sucesso
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];

        // Retorno da mensagem e o status
        echo json_encode(
            [
                "status" => "200",
                "msg" => "OK",
            ]
        );
        exit;
    } else {
        // Caso o email ou a senha estejam
        echo json_encode(["status"=>"401","msg" => "email ou senha incorreta!"]);
        exit;
    }
}