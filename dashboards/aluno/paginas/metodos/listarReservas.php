<?php
$idUser = intval($_SESSION["usuario_id"]);

try {
    // Query para buscar os livros
    $query = "SELECT r.id, r.id_aluno, l.titulo, l.autor, r.data_reserva, r.status 
          FROM reservas AS r
          INNER JOIN livros AS l ON r.id_livro = l.id
          WHERE r.id_aluno = :idUser 
          AND r.status = 'Ativa'"
        ;

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $stmt->execute();
    // Armazena os resultados em uma variável
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao Listar os livros: " . $e->getMessage());
}
