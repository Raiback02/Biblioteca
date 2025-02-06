<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php

    // Controle de rotas
    $page = $_GET['page'] ?? 'dashboard'; // Página padrão

    // Lista de páginas permitidas
    $valid_pages = ['dashboard', 'livros', 'usuarios', 'emprestimos'];

    if (in_array($page, $valid_pages)) {
        include "pages/$page.php";
    } else {
        echo "Página não encontrada!";
    }

    ?>
</main>