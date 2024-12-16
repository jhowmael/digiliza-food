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
    .small-extra-spacing {
        margin-bottom: 10px;
    }

    .midle-extra-spacing {
        margin-bottom: 20px;
    }

    .big-extra-spacing {
        margin-bottom: 50px;
    }
</style>

<body>
    <div class="d-flex">
        <div class="container content-container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="bg-danger text-white text-center py-3 custom-footer">
    <p>&copy; 2024 Digiliza Food. Todos os direitos reservados.</p>
</footer>


</html>
