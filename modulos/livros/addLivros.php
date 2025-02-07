<?php
require_once '../../config/db.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $autor = trim($_POST["autor"]);
    $genero = trim($_POST["genero"]);
    $ano = intval($_POST["ano"]);
    $quantidade = intval($_POST["quantidade"]);

    // Verifica se todos os campos estão preenchidos
    if (empty($titulo) || empty($autor) || empty($genero) || empty($ano) || $quantidade <= 0) {
        header("Location: ../index.php?error=Preencha todos os campos corretamente");
        exit();
    }

    try {
        /// Prepara e executa a query com PDO
        $sql = "INSERT INTO livros (titulo, autor, genero, ano, quantidade) VALUES (:titulo, :autor, :genero, :ano, :quantidade)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../../index.php?page=livros&message=success");
        } else {
            header("Location: ../../index.php?page=livros&message=erro");
        }
    } catch (PDOException $e) {
        header("Location: ../../index.php?page=livros&message=" . urlencode($e->getMessage()));
    }
} else {
    header("Location: ../../index.php?page=livros");
    exit();
}
