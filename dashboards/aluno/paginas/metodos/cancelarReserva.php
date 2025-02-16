<?php
session_start();
require_once '../../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idReserva = intval($_POST['idReserva']);

    // Verifica se todos os campos estão preenchidos
    if (empty($idReserva)) {
        header("Location: ../../dashboard.php?page=reservar&message=erro");
        exit();
    }

    try {
        // Actualizar a reserva para
        $query = "UPDATE reservas SET status = 'Cancelada' WHERE id = :id_reserva";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_reserva', $idReserva, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../../dashboard.php?page=reservar&message=success");
        } else {
            header("Location: ../../dashboard.php?page=reservar&message=erro");
        }
    } catch (PDOException $e) {
        header("Location: ../../dashboard.php?page=reservar&message=" . urlencode($e->getMessage()));
    }
} else {
    header("Location: ../../dashboard.php?page=reservar");
    exit();
}
