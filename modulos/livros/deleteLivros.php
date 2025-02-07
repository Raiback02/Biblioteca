<?php
require_once '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (!empty($id)) {
        try {
            // Query para deletar o livro
            $query = "DELETE FROM livros WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Redireciona de volta para a página de exibição com uma mensagem de sucesso
                header("Location: ../../index.php?page=livros&message=success");
                exit;
            } else {
                // Redireciona com uma mensagem de erro
                header("Location: ../../index.php?page=livros&message=erro");
                exit;
            }
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    } else {
        echo "ID do livro não fornecido.";
    }
} else {
    echo "Requisição inválida.";
}
?>
