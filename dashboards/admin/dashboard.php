<?php require_once "../templates/header.php"; ?>
<?php require_once "../templates/menu.php"; ?>

<?php
require_once '../../config/db.php';

// Contagens para estatísticas
try {
    $livros = $pdo->query("SELECT COUNT(*) AS total FROM livros")->fetch();
    $usuariosAluno = $pdo->query("SELECT COUNT(*) AS total FROM usuarios WHERE tipo = 'aluno'")->fetch();
    $usuariosAssistente = $pdo->query("SELECT COUNT(*) AS total FROM usuarios WHERE tipo = 'assistente'")->fetch();
    $usuariosAdmin = $pdo->query("SELECT COUNT(*) AS total FROM usuarios WHERE tipo = 'administrador'")->fetch();
    $emprestimos = $pdo->query("SELECT COUNT(*) AS total FROM emprestimos WHERE data_devolucao IS NULL")->fetch();
} catch (Exception $e) {
    die("Erro ao carregar dados: " . $e->getMessage());
}
?>

<h2 class="mt-4">Painel do Administrador</h2>
<p>Aqui você pode gerenciar os assistentes, livros e usuários.</p>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Estudantes</h5>
                <p class="card-text">Total: <?= $usuariosAluno['total'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Assistentes</h5>
                <p class="card-text">Total: <?= $usuariosAssistente['total'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Administradores</h5>
                <p class="card-text">Total: <?= $usuariosAdmin['total'] ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Livros Cadastrados</h5>
                <p class="card-text">Total: <?= $livros['total'] ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Empréstimos Ativos</h5>
                <p class="card-text">Total: <?= $emprestimos['total'] ?></p>
            </div>
        </div>
    </div>
</div>


<?php require_once "../templates/footer.php"; ?>