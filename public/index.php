<?php
session_start();
require_once "../config/database.php"; // Conectar ao banco de dados


// Redirecionamento para o painel correto se o usuário já estiver logado
if (isset($_SESSION["usuario_tipo"])) {
    switch ($_SESSION["usuario_tipo"]) {
        case "Administrador":
            header("Location: ../app/views/dashboards/admin.php");
            exit();
        case "Assistente":
            header("Location: ../app/views/dashboards/assistente.php");
            exit();
        case "Aluno":
            header("Location: ../app/views/dashboards/aluno.php");
            exit();
    }
}

// Buscar informações da biblioteca no banco de dados
$sql = "SELECT sobre_instituicao, sobre_biblioteca FROM informacoes WHERE id = 1";
$result = $conn->query($sql);
$dados = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Gregório Semedo Namibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-book"></i> Biblioteca - Instituto Gregório Semedo</a>
            <div class="ms-auto">
                <a href="login.php" class="btn btn-light">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Sobre a Instituição</h2>
        <p><?= htmlspecialchars($dados['sobre_instituicao']) ?></p>

        <h2>Sobre a Biblioteca</h2>
        <p><?= htmlspecialchars($dados['sobre_biblioteca']) ?></p>
    </div>

    <footer class="text-center p-3 bg-dark text-white mt-5">
        &copy; <?= date("Y") ?> Biblioteca Gregório Semedo Namibe. Todos os direitos reservados.
    </footer>
</body>
</html>
