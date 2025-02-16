<?php 
session_start();
require_once '../../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = intval($_SESSION["usuario_id"]);
    $idLivro = intval($_POST['idLivros']);

    // Verifica se todos os campos estão preenchidos
    if (empty($idUser) || empty($idLivro)) {
        header("Location: ../../dashboard.php?page=reservar&message=erro");
        exit();
    }

    try {
        // Verifica se o usuário já tem uma reserva ativa
        $sqlCheck = "SELECT COUNT(*) FROM reservas WHERE id_aluno = :id_aluno AND status = 'Ativa'";
        $stmtCheck = $pdo->prepare($sqlCheck);
        $stmtCheck->bindParam(':id_aluno', $idUser, PDO::PARAM_INT);
        $stmtCheck->execute();
        $reservaAtiva = $stmtCheck->fetchColumn();

        if ($reservaAtiva > 0) {
            // Se já tem reserva ativa, impede a inserção
            header("Location: ../../dashboard.php?page=reservar&message=reserva_ja_existe");
            exit();
        }

        // Insere a reserva, pois não há nenhuma ativa
        $sqlInsert = "INSERT INTO reservas (id_aluno, id_livro) VALUES (:id_aluno, :id_livro)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->bindParam(':id_aluno', $idUser, PDO::PARAM_INT);
        $stmtInsert->bindParam(':id_livro', $idLivro, PDO::PARAM_INT);

        if ($stmtInsert->execute()) {
            header("Location: ../../dashboard.php?page=reservas&message=success");
        } else {
            header("Location: ../../dashboard.php?page=reservas&message=erro");
        }
    } catch (PDOException $e) {
        header("Location: ../../dashboard.php?page=reservas&message=" . urlencode($e->getMessage()));
    }
} else {
    header("Location: ../../dashboard.php?page=reservar");
    exit();
}
?>
