<?php
require_once "metodos/listarReservas.php";
require_once "metodos/buscarReservas.php";
?>
<div class="container mt-4">
    <h2 class="mt-4">Minhas Reservas</h2>
    <p>...</p>

    <!-- Barra de busca -->
    <div class="mb-3">
        <form method="GET" action="dashboard.php">
            <input type="hidden" name="page" value="reservas"> <!-- Mantém -->
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar reservas por livro ou status." value="<?= htmlspecialchars($search) ?>">
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
        header("Refresh:3; url=?page=reservas");
    }
    ?>

    <!-- Tabela de livros -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Data de Reserva</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibição dos livros
            if (count($reservas) > 0) {
                foreach ($reservas as $reserva) {
                    echo "<tr>
                        <td>{$reserva['id']}</td>
                        <td>{$reserva['titulo']}</td>
                        <td>{$reserva['autor']}</td>
                        <td>{$reserva['data_reserva']}</td>
                        <td>{$reserva['status']}</td>
                        <td>
                            <form method='POST' action='paginas/metodos/cancelarReserva.php' style='display:inline;'>
                                <input type='hidden' name='idReserva' value='{$reserva['id']}'>
                                <button type='submit' class='btn btn-danger btn-sm'>Cancelar</button>
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