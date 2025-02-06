<?php 
    try {    
        // Query para buscar os livros
        $query = "SELECT * FROM livros";
        $stmt = $pdo->query($query);
        
        // Armazena os resultados em uma variável
        $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao Listar os livros: " . $e->getMessage());
    }

?>