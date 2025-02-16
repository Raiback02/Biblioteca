<?php
require_once 'config/db.php';


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Cabeçalho -->
    <header class="navbar navbar-dark bg-primary sticky-top">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="#">
                <i class="bi bi-book-half"></i>Biblioteca - Instituto Superior Gregório Semedo
            </a>
            <div>
                <a href="auth/login.php" class="btn btn-warning">Login</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>


    <div class="container-fluid">
        <?php
        require_once "auth/home.php";
        ?>
    </div>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">© <?= date('Y') ?> Biblioteca IGS. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>