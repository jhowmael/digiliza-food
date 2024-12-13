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
    body{
        background-color: #BFBFBF;
    }

    hr {
        color: #BFBFBF;
        margin-top: 5px;    
        margin-bottom: 5px; 
        padding: 0;
    }
    .nav-link {
        transition: background-color 0.3s ease-in-out; /* Transição suave ao mudar a cor de fundo */
    }

    /* Efeito de escurecimento ao passar o mouse */
    .nav-link:hover {
        background-color: rgba(0, 0, 0, 0.2); /* Cor de fundo mais escura */
    }

    .small-extra-spacing {
        margin-bottom: 10px;
    }

    .midle-extra-spacing {
        margin-bottom: 20px;
    }

    .big-extra-spacing {
        margin-bottom: 100px;
    }

</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-lg custom-navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand" href="{{ route('home') }}">LOGO</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">nome usuario</a>
                </li>
                <li class="nav-item text-white">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-2">
        <ul class="nav flex-column bg-danger">
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#"><i class="fa-solid fa-calendar-check"> </i> Início</a>
            </li> 
            <hr>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#"><i class="fa-solid fa-calendar-check"> </i> Reservas</a>
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
            <li class="big-extra-spacing"></li>
            <li class="big-extra-spacing"></li>
            <li class="big-extra-spacing"></li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="midle-extra-spacing"></div>
        <div class="container bg-white p-4 rounded shadow-sm">
            @yield('content')
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="bg-danger text-white text-center py-3 mt-auto">
    <p>&copy; 2024 Digiliza Food. Todos os direitos reservados.</p>
</footer>
</html>
