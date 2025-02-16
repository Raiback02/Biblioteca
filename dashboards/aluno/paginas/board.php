<?php
require_once '../../config/db.php';
$idUser = intval($_SESSION["usuario_id"]);

// Contagens para estatísticas
try {
    $livros = $pdo->query("SELECT COUNT(*) AS total FROM livros")->fetch();

    $query = "SELECT COUNT(id) AS total
          FROM reservas
          WHERE id_aluno = :idUser 
          AND status = 'Ativa'";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $stmt->execute();
    $reservas = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    die("Erro ao carregar dados: " . $e->getMessage());
}
?>

<h2 class="mt-4">Painel do Estudante</h2>
<p>Aqui você pode consultar livros e fazer reservas.</p>
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
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Reservas Ativos</h5>
                <p class="card-text">Total: <?= $reservas['total'] ?></p>
            </div>
        </div>
    </div>
</div>
