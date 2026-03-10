<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['nome'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard- Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="./javascript/Logout.js"></script>
    <script type="module" src="./javascript/Dashboard.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">

            <a href="./index.php" class="navbar-brand fw-bold fs-3">
                Loja Virtual
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse gap-3" id="navbarContent">

                <form class="w-100 w-lg-50 mx-lg-auto my-3 my-lg-0">
                    <input class="form-control" type="search" placeholder="Buscar produtos..." aria-label="Search">
                </form>

                <div class="action-buttons d-flex flex-column flex-lg-row gap-2 align-items-start">

                    <?php if (isset($_SESSION['id'])): ?>

                        <a href="./dashboard.php" class="pageLink btn btn-dark text-nowrap">
                            Minha conta
                        </a>

                        <button id="btnSair" class="pageLink btn btn-dark">
                            Sair
                        </button>

                    <?php else: ?>

                        <a href="login.php" class="pageLink btn-dark">
                            Login
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>
    </nav>
    <div class="container main">
        <div class="container-fluid mt-5">
            <h1>Dashboard</h1>
            <h4 class="text-muted">Gerencie suas informações pessoais</h4>
            <div class="container-fluid rounded mb-4   ">
                <div class="container-header d-flex justify-content-between align-items-center p-3 border">
                    <h4 class="mb-0">Informações pessoais</h4>
                    <button id="editar" class="btn btn-dark">Editar</button>
                </div>
                <div class="container-body container-fluid border">
                    <form class="m-3 d-flex flex-column gap-4" id="formAlterar">
                        <div class="container-campo d-flex">
                            <span class="input-group-text">
                                <i class="bi bi-person fs-3"></i>
                            </span>
                            <div class="campo d-flex flex-column ms-3 flex-grow-1">
                                <h5>Nome</h5>
                                <input type="text" name="nome"
                                    class="input-dashboard form-control form-control-lg border-0 w-100" disabled
                                    value="<?php echo $_SESSION['nome'] ?>">
                            </div>
                        </div>

                        <div class="container-campo d-flex">
                            <span class="input-group-text">
                                <i class="bi bi-envelope fs-3"></i>
                            </span>
                            <div class="campo d-flex flex-column ms-3 flex-grow-1">
                                <h5>Email</h5>
                                <input type="text" name="email"
                                    class="input-dashboard form-control form-control-lg border-0 w-100" disabled
                                    value="<?php echo $_SESSION['email'] ?>">
                            </div>
                        </div>
                        <input type="submit" name="salvar" id="salvar" value="Salvar alterações" class="btn btn-dark"
                            hidden>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-footer container-fluid mt-5 py-5">

        <div class="container">

            <div class="row g-4">

                <div class="col-12 col-md-6 col-lg-3 footer-text">

                    <h3>Sobre nós</h3>

                    <p>
                        Somos uma loja especializada em produtos de tecnologia,
                        oferecendo eletrônicos, acessórios e gadgets das melhores marcas.
                        Nosso objetivo é proporcionar qualidade, bons preços e uma
                        experiência de compra simples e confiável.
                    </p>

                </div>


                <div class="col-6 col-md-6 col-lg-3">

                    <h5>Links</h5>

                    <ul class="list-unstyled">
                        <li><a href="./login.php">Login</a></li>
                        <li><a href="./cadastro.php">Cadastro</a></li>
                        <li><a href="./index.php#products-header">Produtos</a></li>
                    </ul>

                </div>


                <div class="col-6 col-md-6 col-lg-3">

                    <h5>Contate-nos</h5>

                    <ul class="list-unstyled">
                        <li>Email: LojaVirtual@gmail.com</li>
                        <li>Whatsapp: +55 (11) 12345-7891</li>
                        <li>Endereço: São Paulo - SP</li>
                    </ul>

                </div>


                <div class="col-12 col-md-6 col-lg-3">

                    <h5>Suporte</h5>

                    <ul class="list-unstyled">
                        <li>Email: suporte@lojaVirtual.com</li>
                        <li>SAC: (11) 9999-9999</li>
                    </ul>

                </div>

            </div>


            <div class="text-center text-muted mt-4">
                © 2026 LojaVirtual. Todos os direitos autorais reservados.
            </div>

        </div>

    </footer>
</body>

</html>