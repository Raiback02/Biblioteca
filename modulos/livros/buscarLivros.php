<?php
    // Verifica se há um termo de busca
    $search = $_GET['search'] ?? '';

    // Monta a query com busca
    if (!empty($search)) {
        $sql = "SELECT * FROM livros WHERE titulo LIKE :search OR autor LIKE :search OR genero LIKE :search OR ano LIKE :search";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    } else {
        $sql = "SELECT * FROM livros";
        $stmt = $pdo->prepare($sql);
    }

    $stmt->execute();
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
