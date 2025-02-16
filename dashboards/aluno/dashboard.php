<?php require_once "../templates/header.php"; ?>
<?php require_once "../templates/menu.php"; ?>
<?php require_once '../../config/db.php'; ?>

<?php

// Controle de rotas
$page = $_GET['page'] ?? 'board'; // Página padrão

// Lista de páginas permitidas
$valid_pages = ['board', 'reservar', 'reservas'];

if (in_array($page, $valid_pages)) {
    include "paginas/$page.php";
} else {
    echo "Página não encontrada!";
}

?>

<?php require_once "../templates/footer.php"; ?>