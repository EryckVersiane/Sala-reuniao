<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Meu Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css">
</head>

<body>

    <nav class="navbar minha-navbar fixed-top bg-dark px-3">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
                <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar">
                    ☰
                </button>
                <a class="navbar-brand text-white fw-bold" href="#">𝒩𝑒𝓍𝒮𝒶𝓁𝒶</a>
            </div>

            <form class="d-flex flex-grow-1 mx-3" method="GET" action="/">
                <input class="form-control me-2" type="search" name="s" placeholder="Pesquisar por qualquer coisa"
                    aria-label="Pesquisar">
                <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <div class="d-flex align-items-center gap-2">
                <a href="/wordpress/login" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </a>
                <a href="/wordpress/cadastro" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-plus-fill me-1"></i> Cadastrar
                </a>
            </div>


        </div>
    </nav>


    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Fechar"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="/">Salas</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/wordpress/apresentacao">Minhas reservas</a>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="/wordpress/formulario">Calendário de
                        Disponibilidade</a></li>
            </ul>

            <div class="mt-4 border-top pt-3">
                <a class="nav-link text-white" href="/wordpress/ajuda">Ajuda / Contato</a>
            </div>
        </div>
    </div>

    <div id="meuCarrossel" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/wp-content/themes/carrossel/s1.png" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="/wp-content/themes/carrossel/s2.png" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="/wp-content/themes/carrossel/s3.png" class="d-block w-100" alt="Slide 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#meuCarrossel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#meuCarrossel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#meuCarrossel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#meuCarrossel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#meuCarrossel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    </div>


    <div class="container mt-5">
        <h2 class="mb-4">📌 Meus últimos aluguéis</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Sala de Reunião A</h5>
                        <p class="card-text"><br>
                            Data: 01/07/2025<br>
                            Horário: 10h às 12h</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Sala de Treinamento</h5>
                        <p class="card-text"><br>
                            Data: 30/06/2025<br>
                            Horário: 14h às 17h</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Auditório</h5>
                        <p class="card-text"><br>
                            Data: 29/06/2025<br>
                            Horário: 9h às 12h</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>