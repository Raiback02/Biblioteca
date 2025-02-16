<?php
    require_once "modulos/livros/listarLivros.php";
    require_once "modulos/livros/buscarLivros.php";
?>
<div class="container mt-4">
    <h1 class="mb-4">Gestão de Livros</h1>

    <!-- Barra de busca -->
    <div class="mb-3">
        <form method="GET" action="index.php">
        <input type="hidden" name="page" value="livros"> <!-- Mantém -->
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar livro..." value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <!-- Botão para adicionar novo livro -->
    <div class="mb-3 text-end">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBookModal">+ Adicionar Livro</button>
    </div>
    <!--Exibir mensagens de sucesso ou erro após a exclusão-->
    <?php
    if (isset($_GET['message'])) {
        $messageType = $_GET['message'] === 'success' ? 'alert-success' : 'alert-danger';
        $messageText = $_GET['message'] === 'success' ? 'Operação efectuada com sucesso!' : 'Não foi possível efectuar a operação!';

        echo "<div class='alert $messageType' role='alert'>$messageText</div>";

        // Redireciona para a página sem o parâmetro 'message' após 3 segundos
        header("Refresh:3; url=?page=livros");
    }
    ?>

    <!-- Tabela de livros -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
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
                        <td>{$livro['genero']}</td>
                        <td>{$livro['ano']}</td>
                        <td>{$livro['quantidade']}</td>
                        <td>

                            <form method='POST' action='?page=livros' style='display:inline;>
                                <input type='hidden' name='id' value='{$livro['id']}'>
                                <input type='hidden' name='titulo' value='{$livro['titulo']}'>
                                <input type='hidden' name='autor' value='{$livro['autor']}'>
                                <input type='hidden' name='genero' value='{$livro['genero']}'>
                                <input type='hidden' name='ano' value='{$livro['ano']}'>
                                <input type='hidden' name='quantidade' value='{$livro['quantidade']}'>
                                <button type='submit' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editBookModal'>Editar</button>
                            </form>
                            
                            <form method='POST' action='modulos/livros/deleteLivros.php' style='display:inline;'>
                                <input type='hidden' name='id' value='{$livro['id']}'>
                                <button type='submit' class='btn btn-danger btn-sm' onclick=\"return confirm('Tem certeza que deseja excluir este livro?');\">Excluir</button>
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

<!-- Modal para adicionar livro -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="modulos/livros/addLivros.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Adicionar Novo Livro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Gênero</label>
                        <input type="text" class="form-control" id="genero" name="genero" required>
                    </div>
                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" class="form-control" id="ano" name="ano" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal para editar livro -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="modulos/livros/editarLivros.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Editar Livro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id" value="<?= $id ?>">

                    <!-- Campos para edição do livro (preenchidos com dados via PHP) -->
                    <div class="mb-3">
                        <label for="edit-titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="edit-titulo" name="titulo" value="<?= $titulo ?>" required>
                    </div>
                    <div class=" mb-3">
                        <label for="edit-autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="edit-autor" name="autor" value="<?= $autor ?>" required>
                    </div>
                    <div class=" mb-3">
                        <label for="edit-genero" class="form-label">Gênero</label>
                        <input type="text" class="form-control" id="edit-genero" name="genero" value="<?= $genero ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" class="form-control" id="edit-ano" name="ano" value="<?= $ano ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="edit-quantidade" name="quantidade" value="<?= $quantidade ?>" required>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>