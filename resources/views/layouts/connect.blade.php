<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiliza Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="storage/css/connect.css">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-2">
            <ul class="nav flex-column">
                <div class="midle-extra-spacing"></div>
                <li class="nav-item text-center">
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto de Perfil" class="img-thumbnail">
                    <div class="small-extra-spacing"></div>
                    <h4 class="text-white">{{ auth()->user()->name }}</h4>
                </li>
                <div class="small-extra-spacing"></div>
                <hr>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('administrative') }}"><i class="fa-solid fa-calendar-check"></i> Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('reservations.dashboard') }}"><i class="fa-solid fa-calendar-check"></i> Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('foodTables.dashboard') }}"><i class="fa-solid fa-tags"></i> Mesas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('users.customers-dashboard') }}"><i class="fa-solid fa-users"></i> Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('users.collaborators-dashboard') }}"><i class="fa-solid fa-helmet-safety"></i> Colaboradores</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('users.auto-view') }}"> <i class="fa-solid fa-user"></i> Perfil</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}"><i class="fa-solid fa-backward"></i> Voltar para o Site</a>
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
            <div class="midle-extra-spacing"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="bg-danger text-white text-center py-3 custom-footer">
    <p>&copy; 2024 Digiliza Food. Todos os direitos reservados.</p>
</footer>
</html>
