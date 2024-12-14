<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiliza Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color: rgb(230, 230, 230);
    }

    hr {
        color: #BFBFBF;
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 0;
    }

    .nav-link {
        transition: background-color 0.3s ease-in-out;
        font-size: 16px;
    }

    .nav-link:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .small-extra-spacing {
        margin-bottom: 10px;
    }

    .midle-extra-spacing {
        margin-bottom: 20px;
    }

    .big-extra-spacing {
        margin-bottom: 50px;
    }

    .custom-navbar {
        background-color: #BA0000 !important;
    }

    .custom-footer {
        background-color: #BA0000 !important;
        color: white;
    }

    .sidebar {
        background-color: rgb(39, 39, 39);
        color: white;
        padding-top: 20px;
        height: 100vh;
    }

    .navbar-container {
        flex-grow: 1;
    }

    .navbar-nav {
        display: flex;
        justify-content: flex-end;
    }

    .container {
        padding: 20px;
    }

    .sidebar img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
    }

    /* Novo estilo para o conteúdo */
    .content-container {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Remover padding extra na sidebar e nos itens */
    .nav-item {
        padding-left: 0;
        padding-right: 0;
        margin-bottom: 0; /* Remover espaçamento entre os itens */
    }

    .nav.flex-column {
        padding-left: 0;
        padding-right: 0;
    }

    .nav-item a {
        font-size: 15px;
    }

    .navbar-nav .nav-item .nav-link {
        font-size: 16px;
    }

    .navbar-brand img {
        width: 120px;
    }
</style>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-2">
            <ul class="nav flex-column">
                <div class="midle-extra-spacing"></div>
                <li class="nav-item text-center">
                    <img src="{{ asset('storage/user.jpeg') }}" alt="Logo">
                    <div class="small-extra-spacing"></div>
                    <h4 class="text-white">Maria Lucia</h4>
                </li>
                <div class="small-extra-spacing"></div>
                <hr>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#"><i class="fa-solid fa-calendar-check"></i> Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#"><i class="fa-solid fa-calendar-check"></i> Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-tags"></i> Mesas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-users"></i> Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-helmet-safety"></i> Colaboradores</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-backward"></i> Voltar para o Site</a>
                </li>
                <div class="big-extra-spacing"></div>
            </ul>
        </div>

        <!-- Main Content (Navbar + Content) -->
        <div class="navbar-container col-9">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-lg custom-navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('storage/logo.png') }}" alt="Logo">
                        </a>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">nome usuario</a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="midle-extra-spacing"></div>

            <!-- Content Area -->
            <div class="container content-container">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="bg-danger text-white text-center py-3 custom-footer">
    <p>&copy; 2024 Digiliza Food. Todos os direitos reservados.</p>
</footer>
</html>
