<?php
// Inicia a sessão
session_start();
// Limpa os dados
$_SESSION = [];
// Destroi a sessão
session_destroy();

header('Content-Type: application/json');

// Retorna o status da operação
echo json_encode([
    "status" => "200"
]);
