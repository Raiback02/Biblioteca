$usuarios = [
    ["Riaz Marlindo", "Riaz@email.com", password_hash("123456", PASSWORD_DEFAULT), "Administrador"],
    ["Remy Vicuco", "Remy@email.com", password_hash("abcdef", PASSWORD_DEFAULT), "Assistente"],
    ["Benvindo Perdigão", "Benvindo@email.com", password_hash("a1b2c3", PASSWORD_DEFAULT), "Aluno"]
];


// Contagens para estatísticas
try {
    $livros = $pdo->query("SELECT COUNT(*) AS total FROM livros")->fetch();
    $usuarios = $pdo->query("SELECT COUNT(*) AS total FROM usuarios")->fetch();
    $emprestimos = $pdo->query("SELECT COUNT(*) AS total FROM emprestimos WHERE data_devolucao IS NULL")->fetch();
} catch (Exception $e) {
    die("Erro ao carregar dados: " . $e->getMessage());
}

<h1 class="mt-4">Dashboard</h1>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Livros Cadastrados</h5>
                <p class="card-text">Total: <?= $livros['total'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Funcionários Registrados</h5>
                <p class="card-text">Total: <?= $usuarios['total'] ?></p>
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


<div class="row">
            <!-- Menu Lateral -->
            <?php require_once "templates/menu.php" ?>

            <!-- Conteúdo Principal -->
            <?php require_once "templates/main.php" ?>
        </div>