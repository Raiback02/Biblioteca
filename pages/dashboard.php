
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
