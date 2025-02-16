<?php
session_start();
require_once '../config/db.php';

$msgErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    $stmt = $pdo->prepare("SELECT id, nome, senha, tipo, status FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) { // Verifica se o usuário foi encontrado no banco
        if (password_verify($senha, $usuario["senha"])) { // Verifica a senha antes
            if ($usuario["status"] == "activo") { // Agora verifica se o usuário está activo
                $_SESSION["usuario_id"] = $usuario["id"];
                $_SESSION["usuario_nome"] = $usuario["nome"];
                $_SESSION["usuario_tipo"] = $usuario["tipo"];
                $_SESSION["usuario_status"] = $usuario["status"];

                // Redirecionamento conforme o tipo de usuário
                require_once "../dashboards/rotacionador.php";
                exit();
            } else {
                $msgErro = "Desculpa! A sua conta foi <strong>" . $usuario["status"] . ".</strong>";
            }
        } else {
            $msgErro = "E-mail ou senha inválidos!";
        }
    } else {
        $msgErro = "Desculpa! Sistema em manutenção ou usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Biblioteca Gregório Semedo Namibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px;">
        <h3 class="text-center">Login</h3>
        <?php if ($msgErro): ?>
            <div class="alert alert-danger"><?= $msgErro ?></div>
        <?php endif; ?>
        <div class="login-bg">
            <div class="login-container">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">E-mail:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha:</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    <a href="../index.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>