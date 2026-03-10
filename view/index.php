<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/home.css">
    <script src="./javascript/Logout.js" defer></script>

    <script type="module" src="./javascript/GetProdutos.js"></script>
</head>

<body>

    <nav class="navbar bg-body-tertiary sticky-top">
        <div class="container align-items-center">

            <a href="./index.php" class="navbar-brand fw-bold fs-3">
                Loja Virtual
            </a>

            <form class="mx-auto w-50">
                <input class="form-control" type="search" placeholder="Buscar produtos..." aria-label="Search">
            </form>

            <div class="action-buttons d-flex gap-2">
                <?php if (isset($_SESSION['id'])): ?>

                    <a href="./dashboard.php" class="btn btn-dark">Minha conta</a>

                    <button href="./javascript/Logout.js" id="btnSair" class="btn btn-dark">Sair</button>

                <?php else: ?>

                    <a href="login.php">
                        <a href="./login.php" class="btn btn-dark">Login</a>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </nav>


    <div class="container d-flex justify-content-center align-items-center banner-container">

        <div class="banner-text">

            <h1>Produtos de Tecnologia</h1>

            <p class="fs-4 text-muted">
                Descubra as melhores ofertas em eletrônicos, gadgets e acessórios para o seu dia a dia.
                Encontre notebooks, smartphones, fones de ouvido, periféricos e diversos dispositivos
                tecnológicos das melhores marcas com preços especiais e qualidade garantida.
            </p>

            <a class="btn btn-dark" href="#products-header">Ver produtos</a>

        </div>

        <img src="./imagens/banner_lojaVirtual.jpg" class="img-fluid rounded banner-img" alt="Banner da loja">

    </div>


    <div class="container">

        <div class="section-title" id="products-header">
            <h1>Nossos Produtos</h1>
        </div>

        <div id="listaProdutos" class="row g-4 mt-2">
        </div>


        <div class="container-footer">

            <div class="row container-lists g-4">

                <div class="footer-text col">
                    <h3>Sobre nós</h3>

                    <p>
                        Somos uma loja especializada em produtos de tecnologia,
                        oferecendo eletrônicos, acessórios e gadgets das melhores marcas.
                        Nosso objetivo é proporcionar qualidade, bons preços e uma experiência
                        de compra simples e confiável para nossos clientes.
                    </p>

                </div>


                <ul class="col list-group list-group-flush">

                    <h5>Links</h5>

                    <li class="list-group-item">
                        <a href="./login.php">Login</a>
                    </li>

                    <li class="list-group-item">
                        <a href="./cadastro.php">Cadastro</a>
                    </li>

                    <li class="list-group-item">
                        <a href="./index.php#products-header">Produtos</a>
                    </li>

                </ul>


                <ul class="col list-group list-group-flush">

                    <h5>Contate-nos</h5>

                    <li class="list-group-item">
                        Email: LojaVirtual@gmail.com
                    </li>

                    <li class="list-group-item">
                        Whatsapp: +55 (11) 12345-7891
                    </li>

                    <li class="list-group-item">
                        Endereço: São Paulo - SP
                    </li>

                </ul>


                <ul class="col list-group list-group-flush">

                    <h5>Suporte</h5>

                    <li class="list-group-item">
                        Email: suporte@lojaVirtual.com
                    </li>

                    <li class="list-group-item">
                        SAC: (11) 9999-9999
                    </li>

                </ul>

            </div>


            <div class="text-center text-muted">
                © 2026 LojaVirtual. Todos os direitos autorais reservados.
            </div>

        </div>
    </div>

</body>

</html>