<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/sidebar.php"; ?>

<?php
require_once "../includes/restrito.php";
verificarAcesso(["Administrador"]);
?>

<h2>Painel do Administrador</h2>
<p>Aqui você pode gerenciar os assistentes, livros e usuários.</p>

<?php require_once "../includes/footer.php"; ?>
