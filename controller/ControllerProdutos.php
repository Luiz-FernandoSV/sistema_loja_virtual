<?php
require_once "../config/Conexao.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $stmt = $pdo->prepare("SELECT * FROM produto");
    $stmt->execute();
    $produtos = $stmt->fetchAll();
    echo json_encode($produtos);

}