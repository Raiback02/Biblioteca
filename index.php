<?php
require_once 'config/db.php';

// Contagens para estatísticas
try {
    $livros = $pdo->query("SELECT COUNT(*) AS total FROM livros")->fetch();
    $usuarios = $pdo->query("SELECT COUNT(*) AS total FROM usuarios")->fetch();
    $emprestimos = $pdo->query("SELECT COUNT(*) AS total FROM emprestimos WHERE data_devolucao IS NULL")->fetch();
} catch (Exception $e) {
    die("Erro ao carregar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Biblioteca</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Cabeçalho -->
    <header class="navbar navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-book-half"></i> Biblioteca Escolar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu Lateral -->
            <?php require_once "templates/menu.php" ?>

            <!-- Conteúdo Principal -->
            <?php require_once "templates/main.php" ?>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">© <?= date('Y') ?> Biblioteca Escolar. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
