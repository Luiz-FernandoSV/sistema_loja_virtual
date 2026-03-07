<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['nome'])){
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <h1>Bem-Vindo(a) <?php echo $_SESSION['nome']?> | <?php echo $_SESSION['email']?></h1>

    <a href="../controller/Logout.php">Sair</a>
</body>
</html>