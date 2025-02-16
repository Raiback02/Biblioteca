<!-- Cabeçalho -->
<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../../auth/home.php");
    exit();
}

$tipo_usuario = $_SESSION["usuario_tipo"];

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Gregório Semedo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-book me-2"></i> Painel | Biblioteca - Instituto Gregório Semedo
        </a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white me-3">Bem-vindo, <?= $_SESSION["usuario_nome"] ?></span>
            <a href="../../auth/logout.php" class="btn btn-danger btn-sm">Sair</a>
        </div>
    </nav>