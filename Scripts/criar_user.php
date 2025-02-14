<?php
require_once "../config/database.php";

$usuarios = [
    ["Riaz Marlindo", "Riaz@email.com", password_hash("123456", PASSWORD_DEFAULT), "Administrador"],
    ["Remy Vicuco", "Remy@email.com", password_hash("abcdef", PASSWORD_DEFAULT), "Assistente"],
    ["Benvindo Perdigão", "Benvindo@email.com", password_hash("a1b2c3", PASSWORD_DEFAULT), "Aluno"]
];

$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)");

foreach ($usuarios as $usuario) {
    $stmt->execute($usuario);
}

echo "Usuários criados com sucesso!";
?>
