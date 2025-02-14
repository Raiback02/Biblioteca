<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/sidebar.php"; ?>

<?php
require_once "../includes/restrito.php";
verificarAcesso(["Administrador"]);
?>

<h2>Painel do Aluno</h2>
<p>Aqui você pode consultar livros e fazer reservas.</p>

<?php require_once "../includes/footer.php"; ?>
