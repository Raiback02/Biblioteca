<?php
require_once "metodos/listarLivros.php";
require_once "metodos/buscarLivros.php";
?>
<div class="container mt-4">
    <h2 class="mt-4">Reservar Livros</h2>
    <p>...</p>

    <!-- Barra de busca -->
    <div class="mb-3">
        <form method="GET" action="dashboard.php">
            <input type="hidden" name="page" value="reservar"> <!-- Mantém -->
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar livro por título, autor, categoria ou ano." value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <!--Exibir mensagens de sucesso ou erro após a exclusão-->
    <?php
    if (isset($_GET['message'])) {
        $messageType = $_GET['message'] === 'success' ? 'alert-success' : 'alert-danger';
        $messageText = $_GET['message'] === 'success' ? 'Operação efectuada com sucesso!' : 'Não foi possível efectuar a operação!';

        echo "<div class='alert $messageType' role='alert'>$messageText</div>";

        // Redireciona para a página sem o parâmetro 'message' após 3 segundos
        header("Refresh:3; url=?page=reservar");
    }
    ?>

    <!-- Tabela de livros -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Ano</th>
                <th>Qtde</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibição dos livros
            if (count($livros) > 0) {
                foreach ($livros as $livro) {
                    echo "<tr>
                        <td>{$livro['id']}</td>
                        <td>{$livro['titulo']}</td>
                        <td>{$livro['autor']}</td>
                        <td>{$livro['categoria']}</td>
                        <td>{$livro['ano_publicacao']}</td>
                        <td>{$livro['quantidade']}</td>
                        <td>
                            <form method='POST' action='paginas/metodos/reservarLivros.php' style='display:inline;'>
                                <input type='hidden' name='idLivros' value='{$livro['id']}'>
                                <button type='submit' class='btn btn-warning btn-sm'>Reservar</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Nenhum livro encontrado.</td></tr>";
            }
            ?>

        </tbody>
    </table>
</div>