<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Digitaliza Food</title>

    <link href="storage/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="storage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="storage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="storage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="storage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="storage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="storage/css/web.css">

</head>

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <img src="storage/img/LOGOprincipal.svg" alt="Logotipo" class="navbar-logo" />
        <nav id="navbar" class="navbar">
            <ul class="d-flex list-unstyled mb-0">
                <li><a class="nav-link scrollto active" href="{{ route('home') }}">Início</a></li>
                <li><a class="nav-link scrollto" href="{{ route('reservation') }}">Reservas</a></li>
                <li><a class="nav-link scrollto" href="#menu">Cardápio</a></li>
                <li><a class="nav-link scrollto" href="#about">Sobre nós</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contato</a></li>

                <!-- Verifica se o usuário está autenticado -->
                @if(Auth::check())
                <!-- Exibe o nome do usuário logado -->
                <li><a href="#" class="nav-link scrollto">Olá, {{ Auth::user()->name }}</a></li>

                <!-- Botão de Logout -->
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <!-- Link estilizado que aciona o logout -->
                        <a href="javascript:void(0);" class="nav-link scrollto"
                            onclick="this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </li>
                @else
                <!-- Caso não esteja logado, exibe o link de login -->
                <li><a href="{{ route('users.login') }}" class="nav-link scrollto">Login</a></li>

                <!-- Botão de Registro -->
                <li><a href="{{ route('users.register') }}" class="nav-link scrollto">Registrar</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">digitalizaFood6@gmail.com</a>
            <i class="bi bi-phone-fill phone-icon"></i><a href="https://wa.me/5513996662857">+55 (13)991234567 </a>
        </div>
        <div class="social-links d-none d-md-block">
            <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.whatsapp.com/"><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</section>

@yield('content')

<footer id="footer">
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div class="container">
        <h3>Digitaliza Food</h3>
        <a href="{{ route('users.login') }}" class="btn-login"><i class="bi bi-lock"></i> Area Restrita</a>
        <br>
        <br>
        <div class="social-links">
            <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.whatsapp.com/"><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>Digitaliza Food</span></strong>
        </div>
    </div>
    <span id="visit-count"></span>
</footer>

</html>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>